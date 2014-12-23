<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Story extends Controller_Template {

    public $template = 'layout';
    protected $stories_config = null;

    private $active_story_config = null;
    private $timeline_stories = null;

    private $stories = null;
    private $story_id = 0;
    /**
     * Construct a timeline
     *
     * @param string $story_id
     * @return string
     */
    private function construct_timeline($story_id = '')
    {
        $this->stories = Story::get_stories($story_id);

        $timeline = View::factory('timeline', array(
            'stories' => $this->stories,
        ));

        return $timeline;
    }

    /**
     * Construct a map
     *
     * @return string
     */
    private function construct_map()
    {
        if($this->stories != null)
        {
            $map_config = Kohana::$config->load('map');

            $map = View::factory('map', array(
                'stories' => $this->stories,
                'map_config' => $map_config,
            ));

            return $map;
        }

        return "";
    }

    private function fill_common_template_variables()
    {
        $this->story_id = $this->request->param('id', '');
        $this->template->stories = Story::get_all_stories();
    }

    /**
     * Landing controller
     *
     * @throws HTTP_Exception
     */
	public function action_index()
	{
        $this->fill_common_template_variables();

        $this->active_story_config = Story::get_story($this->story_id);

        if($this->active_story_config == null)
        {
            throw HTTP_Exception::factory(404, 'Story not found!');
        }

        $this->template->story_id = $this->active_story_config['id'];
        $this->template->story_name = $this->active_story_config['name'];

        $this->template->page_layout = View::factory('landing_page', array(
            'timeline' => $this->construct_timeline($this->story_id),
            'map' => $this->construct_map(),
        ));
	}

    /**
     * Get the details of a specific story
     *
     * @throws HTTP_Exception
     */
    public function action_details()
    {
        $this->fill_common_template_variables();

        $story = Story::get_single_story($this->story_id);

        if($story == false)
        {
            throw HTTP_Exception::factory(404, 'Story not found!');
        }

        $parent_story_id = $story->story_id;
        $media_files = array();

        $db_media_files = ORM::factory('StoryMedia')->where('story_id', '=', $story->id)
            ->find_all();

        foreach($db_media_files as $db_media_file)
        {
            $media_files[] = $db_media_file->media_file;
        }

        $this->active_story_config = Story::get_story($parent_story_id);
        $this->template->story_id = $this->active_story_config['id'];
        $this->template->story_name = $this->active_story_config['name'];

        $this->template->page_layout = View::factory('details_page', array(
            'story' => $story,
            'media_files' => $media_files,
        ));
    }

    public function action_media()
    {
        $this->fill_common_template_variables();

        $this->active_story_config = Story::get_story($this->story_id);

        if($this->active_story_config == null)
        {
            throw HTTP_Exception::factory(404, 'Story not found!');
        }

        $this->template->story_id = $this->active_story_config['id'];
        $this->template->story_name = $this->active_story_config['name'];

        // Find all stories in this specific storyline
        $all_stories = ORM::factory('Story')->where('story_id', '=', $this->active_story_config['id'])
            ->find_all();

        $media = ORM::factory('StoryMedia')->where('story_id', '=', 0);

        foreach($all_stories as $all_stories_item)
        {
            $media->or_where('story_id', '=', $all_stories_item->id);
        }

        $media = $media->find_all();

        $this->template->page_layout = View::factory('story_media', array(
            'media' => $media
        ));
    }
} // End Welcome
