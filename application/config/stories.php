<?php defined('SYSPATH') OR die('No direct access allowed.');

$twitter_settings = array('oauth_access_token' => "OAUTH_ACCESS_TOKEN",
    'oauth_access_token_secret' => "OAUTH_ACCESS_SECRET",
    'consumer_key' => "CONSUMER_KEY",
    'consumer_secret' => "CONSUMER_SECRET"
);

return array(
    'channels' => array(
        'twitter' => $twitter_settings,
    ),
    'stories' => array(
        'story_a' => array(
            'name' => 'Story A',
            'channel_type' => 'Twitter',
            'channel_settings' => array(
                'type' => 'search',
                'term' => '#story_a',
            ),
            'active' => true,
            'current' => true,
        ),
        'story_b' => array(
            'name' => 'Story B',
            'channel_type' => 'Twitter',
            'channel_settings' => array(
                'type' => 'follow',
                'term' => 'account',
            ),
            'active' => true,
            'current' => true,
        )
    ),
    'timeline' => array(
        'limit' => 10,
    ),
);