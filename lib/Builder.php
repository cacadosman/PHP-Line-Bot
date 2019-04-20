<?php
    namespace Lib;

    class Builder
    {
        public static function templateMessageBuilder($text, $template)
        {
            $input = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder($text, $template);
            return $input;
        }

        public static function multiMessageBuilder($array)
        {
            $multi = new \LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
            foreach($array as $item){
                $input = $multi->add($item);
            }
            return $input;
        }

        public static function textMessageBuilder($text)
        {
            $input = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($text);
            return $input;
        }

        public static function imageMessageBuilder($event, $url, $preview_url) 
        {
            $input    = new \LINE\LINEBot\MessageBuilder\ImageMessageBuilder($url, $preview_url);
            return $input;
        }

        public static function videoMessageBuilder($event, $url, $preview_url) 
        {
            $input    = new \LINE\LINEBot\MessageBuilder\VideoMessageBuilder($url, $preview_url);
            return $input;
        }

        public static function audioMessageBuilder($event, $content, $duration) 
        {
            $input    = new \LINE\LINEBot\MessageBuilder\AudioMessageBuilder($content, $duration);
            return $input;
        }

        public static function locationMessageBuilder($event, $title, $address, $latitude, $longitude) 
        {
            $input    = new \LINE\LINEBot\MessageBuilder\LocationMessageBuilder($title, $address, $latitude, $longitude);
            return $input;
        }

        public static function stickerMessageBuilder($event, $packageId, $stickerId) 
        {
            $input    = new \LINE\LINEBot\MessageBuilder\StickerMessageBuilder($packageId, $stickerId);
            return $input;
        }

        public static function messageTemplateActionBuilder($array)
        {
            foreach($array as $action)
            {
                $options[] = new \LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder($action['label'] ,$action['text']);
            }
            return $options;
        }

        public static function postbackTemplateActionBuilder($array)
        {
            foreach($array as $action)
            {
                $options[] = new \LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder(
                    $action['label'], $action['data'], $action['displaytext']
                );
            }
            return $options;
        }

        public static function buttonTemplateBuilder($title, $text, $thumbnail, $actions)
        {
            $input = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder($title, $text, $thumbnail, $actions);
            return $input;
        }

        public static function confirmTemplateBuilder($text, $actions)
        {
            $input = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder($text, $actions);
            return $input;
        }

        public static function carouselTemplateBuilder($columns)
        {
            foreach($columns as $column)
            {
                $template[] = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder(
                    $column['title'], $column['text'], $column['thumbnail'], $column['actions']
                );
            }
            $input = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder($template);
            return $input;
        }
    }