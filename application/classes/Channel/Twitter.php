<?php defined('SYSPATH') or die('No direct script access.');

class Channel_Twitter {

    public function __construct()
    {
        require_once(dirname(__FILE__).'/../../../lib/twitter/TwitterAPIExchange.php');
    }

    public function save_channel_settings($channel_id, $channel_settings)
    {
        $db_channel_settings = ORM::factory('ChannelSettings')->
            where('channel_id', '=', $channel_id)->
            where('channel_name', '=', 'twitter')->
            find();

        $extra_settings = new stdClass();
        $extra_settings->last_tweet_id = $channel_settings['last_tweet_id'];

        $db_channel_settings->channel_settings = json_encode($extra_settings);
        $db_channel_settings->save();
    }

    public function get_channel_settings($channel_id)
    {
        $configuration = Kohana::$config->load('stories');
        $config_channel_settings = $configuration->get('channels');
        $core_story_settings = $configuration->get('stories');

        $db_channel_settings = ORM::factory('ChannelSettings')->
            where('channel_id', '=', $channel_id)->
            where('channel_name', '=', 'twitter')->
            find();

        $extra_settings = null;
        $last_tweet_id = 0;

        if($db_channel_settings->loaded())
        {
            $extra_settings = json_decode($db_channel_settings->channel_settings);
            $last_tweet_id = $extra_settings->last_tweet_id;
        }
        else
        {
            $new_settings_record = ORM::factory('ChannelSettings');
            $new_settings_record->channel_name = 'twitter';
            $new_settings_record->channel_id = $channel_id;
            $new_settings_record->channel_settings = json_encode(new Data_TwitterSettings());
            $new_settings_record->save();
        }

        $db_channel_settings = array();

        $db_channel_settings['channel'] = $config_channel_settings['twitter'];
        $db_channel_settings['extra'] = array('last_tweet_id' => $last_tweet_id);
        $db_channel_settings['core'] = $core_story_settings[$channel_id];

        return $db_channel_settings;
    }

    private function process_follow($story_id, $response)
    {
        $objects = json_decode($response);
        $return_objects = array();
        $statuses = $objects;

        $last_id = 0;

        foreach($statuses as $status)
        {
            $user_name = "";
            $user_profile_image = "";
            $user_screen_name = "";

            $channel = 'twitter';
            $coordinates = isset($status->coordinates) ? $status->coordinates : null;
            $text = isset($status->text) ? $status->text : '';
            $lat = null;
            $lon = null;
            $entities = isset($status->entities) ? $status->entities : null;
            $id = isset($status->id_str) ? $status->id_str : "0";
            $user = isset($status->user) ? $status->user : null;

            if($user != null)
            {
                $user_name = $user->name;
                $user_profile_image = $user->profile_image_url;
                $user_screen_name = $user->screen_name;
            }

            // Fill in coordinates
            if($coordinates != null)
            {
                foreach($coordinates as $coordinates_entry)
                {
                    $lat = $coordinates_entry[1];
                    $lon = $coordinates_entry[0];
                }
            }

            $date_time = null;

            if(isset($status->created_at))
            {
                $date_time = gmdate('Y-m-d H:i:s', strtotime($status->created_at));
            }
            $images = [];

            // Get the image
            if(isset($entities->media))
            {
                foreach($entities->media as $media_item)
                {
                    $images[] = $media_item->media_url;
                }
            }

            if(intval($id) > $last_id)
                $last_id = intval($id);

            if($id != "0" && $text != '' && $user != null)
            {
                $return_object = new Data_Channel();
                $return_object->story_id = $story_id;
                $return_object->story_channel = $channel;
                $return_object->source_name = $user_name;
                $return_object->source_id = $id;
                $return_object->source_img = $user_profile_image;
                $return_object->source_link = "https://twitter.com/".$user_name."/status/".$id;
                $return_object->story_lat = $lat == null? 0 : $lat;
                $return_object->story_lon = $lon == null? 0 : $lon;
                $return_object->story_source = $user_screen_name;
                $return_object->source_img = $user_profile_image;
                $return_object->story_text = $text;
                $return_object->story_images = $images;
                $return_object->story_datetime = $date_time;

                $return_objects[] = $return_object;
            }
        }

        $this->save_channel_settings($story_id, array('last_tweet_id' => $last_id));

        return $return_objects;
    }

    private function process_search($story_id, $response)
    {
        $objects = json_decode($response);
        $return_objects = array();
        $statuses = isset($objects->statuses) ? $objects->statuses : null;

        if($statuses == null)
            return $return_objects;

        $last_id = 0;

        foreach($statuses as $status)
        {
            $user_name = "";
            $user_profile_image = "";
            $user_screen_name = "";

            $channel = 'twitter';
            $coordinates = isset($status->coordinates) ? $status->coordinates : null;
            $text = isset($status->text) ? $status->text : '';
            $lat = null;
            $lon = null;
            $entities = isset($status->entities) ? $status->entities : null;
            $id = isset($status->id_str) ? $status->id_str : "0";
            $user = isset($status->user) ? $status->user : null;

            if($user != null)
            {
                $user_name = $user->name;
                $user_profile_image = $user->profile_image_url;
                $user_screen_name = $user->screen_name;
            }

            if(isset($status->created_at))
            {
                $date_time = gmdate('Y-m-d H:i:s', strtotime($status->created_at));
            }
            $images = [];

            // Fill in coordinates
            if($coordinates != null)
            {
                foreach($coordinates as $coordinates_entry)
                {
                    $lat = $coordinates_entry[1];
                    $lon = $coordinates_entry[0];
                }
            }

            // Get the image
            if(isset($entities->media))
            {
                foreach($entities->media as $media_item)
                {
                    $images[] = $media_item->media_url;
                }
            }

            if(intval($id) > $last_id)
                $last_id = intval($id);

            if($id != "0" && $text != '' && $user != null)
            {
                $return_object = new Data_Channel();
                $return_object->story_id = $story_id;
                $return_object->story_channel = $channel;
                $return_object->source_name = $user_name;
                $return_object->source_id = $id;
                $return_object->source_img = $user_profile_image;
                $return_object->source_link = "https://twitter.com/".$user_name."/status/".$id;
                $return_object->story_lat = $lat == null? 0 : $lat;
                $return_object->story_lon = $lon == null? 0 : $lon;
                $return_object->story_source = $user_screen_name;
                $return_object->source_img = $user_profile_image;
                $return_object->story_text = $text;
                $return_object->story_images = $images;
                $return_object->story_datetime = $date_time;

                $return_objects[] = $return_object;
            }
        }

        $this->save_channel_settings($story_id, array('last_tweet_id' => $last_id));

        return $return_objects;
    }

    public function get_messages($story_id, $parameters)
    {
        if($parameters['core']['channel_settings']['type'] == 'search')
        {
            $url = 'https://api.twitter.com/1.1/search/tweets.json';
            $getfield = '?q='.$parameters['core']['channel_settings']['term'].'&since_id='.
                $parameters['extra']['last_tweet_id'].
                "&exclude_replies=true&include_rts=false&include_entities=true&contributor_details=true&count=200";

            $requestMethod = 'GET';

            $twitter = new TwitterAPIExchange($parameters['channel']);
            $response = $twitter->setGetfield($getfield)
                ->buildOauth($url, $requestMethod)
                ->performRequest();

            return $this->process_search($story_id, $response);
        }
        else if($parameters['core']['channel_settings']['type'] == 'follow')
        {
            $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
            $getfield = '?screen_name='.$parameters['core']['channel_settings']['account'].'&since_id='.
                $parameters['extra']['last_tweet_id']."&exclude_replies=true&include_rts=true&count=200";
            $requestMethod = 'GET';

            $twitter = new TwitterAPIExchange($parameters['channel']);
            $response = $twitter->setGetfield($getfield)
                ->buildOauth($url, $requestMethod)
                ->performRequest();

            return $this->process_follow($story_id, $response);
        }

        return false;
    }
} 