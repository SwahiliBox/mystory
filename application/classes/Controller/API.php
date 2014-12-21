<?php defined('SYSPATH') or die('No direct script access.');

class Controller_API extends Controller {
    public function before()
    {
        $api_config = Kohana::$config->load('api');
        $request_api_key = $this->request->query('key');

        if($request_api_key != $api_config['key'])
        {
            throw HTTP_Exception::factory(403, 'Access forbidden');
        }
    }

    public function action_timeline()
    {
        $output_json = new stdClass();
        $output_json->timeline = new stdClass();
        $output_json->timeline->slides = array();

        $story_id = $this->request->param('story_id');
        $stories = Story::get_stories($story_id);

        foreach($stories as $story)
        {
            $story_item = new stdClass();

            $story_item->start_date = new stdClass();
            $story_item->media = new stdClass();
            $story_item->text = new stdClass();

            $date_time = strtotime($story->story_datetime);

            $story_item->start_date->year = date("Y", $date_time);
            $story_item->start_date->month = date("m", $date_time);
            $story_item->start_date->day = date("d", $date_time);
            $story_item->start_date->hour = date("H", $date_time);
            $story_item->start_date->minute = date("i", $date_time);
            $story_item->start_date->second = date("S", $date_time);

            $story_item->end_date = $story_item->start_date;

            // Get media items
            $media = ORM::factory('StoryMedia')->where('story_id', '=', $story->id)->find();

            if($media->loaded())
            {
                $story_item->media->caption = "Story image";
                $story_item->media->credit = $story->source_name;
                $story_item->media->url = $media->media_file;
            }

            $story_item->text->headline = substr($story->story_text, 0, 30);
            $story_item->text->headline = $story->story_text;

            $output_json->timeline->slides[] = $story_item;
        }

        echo json_encode($output_json);
    }

    /**
     * For CRON jobs
     */
    public function action_buildtimeline()
    {
        // It may take a while
        set_time_limit(0);
        // Process stories
        echo(json_encode(Story::build_all_stories()));
    }
} 