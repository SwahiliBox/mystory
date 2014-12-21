<?php defined('SYSPATH') or die('No direct script access.');

class Story {
    public static function get_story($story_id = '')
    {
        $stories_config = Kohana::$config->load('stories');
        $stories = $stories_config->get('stories');
        $active_story_config = null;

        foreach($stories as $story_key => $story_value)
        {
            if($story_id == '')
            {
                if($story_value['current'] == true)
                {
                    $active_story_config = $story_value;
                    $active_story_config['id'] = $story_key;
                }
            }
            else
            {
                if($story_id == $story_key)
                {
                    $active_story_config = $story_value;
                    $active_story_config['id'] = $story_key;
                }
            }
        }

        return $active_story_config;
    }

    public static function get_all_stories()
    {
        $stories_config = Kohana::$config->load('stories');
        return $stories_config->get('stories');
    }

    public static function get_stories($story_id = '', $num_last_stories = null)
    {
        $limit = $num_last_stories;

        if($num_last_stories == null)
        {
            $stories_config = Kohana::$config->load('stories');
            $timeline_config = $stories_config->get('timeline');
            $limit = $timeline_config['limit'];
        }

        $story_config = self::get_story($story_id);
        $stories = ORM::factory('Story')->limit($limit)->order_by('story_datetime', 'desc')->
            where('story_id', '=', $story_config['id'])->
            find_all();

        return $stories;
    }

    public static function get_single_story($story_id)
    {
        $story = ORM::factory('Story')->where('id', '=', $story_id)->find();

        if($story->loaded())
        {
            return $story;
        }

        return false;
    }

    public static function build_all_stories()
    {
        // Start processing active stories
        $stories = self::get_all_stories();

        $json_return = array();

        foreach($stories as $story_key => $story)
        {
            if($story['active'])
            {
                $channel = "Channel_".$story['channel_type'];
                $channel = new $channel();
                $channel_settings = $channel->get_channel_settings($story_key);

                $channel_data = $channel->get_messages($story_key, $channel_settings);

                $json_return[] = $channel_data;

                foreach($channel_data as $channel_data_item)
                {
                    // Save story

                    $new_story = ORM::factory('Story');

                    $new_story->story_id = $channel_data_item->story_id;
                    $new_story->story_text = $channel_data_item->story_text;
                    $new_story->story_datetime = $channel_data_item->story_datetime;
                    $new_story->story_channel = $channel_data_item->story_channel;
                    $new_story->story_source = $channel_data_item->story_source;
                    $new_story->story_lat = $channel_data_item->story_lat;
                    $new_story->story_lon = $channel_data_item->story_lon;
                    $new_story->source_id = $channel_data_item->source_id;
                    $new_story->source_name = $channel_data_item->source_name;
                    $new_story->source_img = $channel_data_item->source_img;
                    $new_story->source_link = $channel_data_item->source_link;

                    $new_story->save();

                    $new_story_id = $new_story->id;

                    // Save images

                    foreach($channel_data_item->story_images as $media_item)
                    {
                        $story_media = ORM::factory('StoryMedia');

                        $story_media->story_id = $new_story_id;
                        $story_media->media_file = $media_item;

                        $story_media->save();
                    }
                }
            }
        }

        return $json_return;
    }
} 