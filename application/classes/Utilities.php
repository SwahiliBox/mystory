<?php defined('SYSPATH') or die('No direct script access.');

class Utilities {
    public static function clean_text($text)
    {
        $new_text = str_replace("\n", '', $text);
        $new_text = str_replace("'", "\'", $new_text);

        return $new_text;
    }

    public static function construct_body($record)
    {
        $summary_text = self::clean_text(substr($record->story_text, 0, 40))."...";
        $images = ORM::factory('StoryMedia')->where('story_id', '=', $record->id)->find_all();
        $image_url = "";

        if(isset($images[0]))
        {
            $image_url = $images[0]->media_file;
        }

        if($image_url != '')
            return "<div><img style=\"height:200px;\" src=\"{$image_url}\"/></div><div>".$summary_text."</div><div><a href=\"".URL::site().'story/details/'.$record->id."\">See Story</a></div>";
        else
            return "<div>".$summary_text."</div><div><a href=\"".URL::site().'story/details/'.$record->id."\">See Story</a></div>";
    }
} 