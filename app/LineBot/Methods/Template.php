<?php

namespace App\LineBot\Methods;

class Template{
    public static function messageBuilder($text,$template){
        $input = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder($text,$template);
        return $input;
    }

    public static function multiMessageBuilder($array){
        $multi = new \LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
        foreach($array as $item){
            $input = $multi->add($item);
        }
        return $input;
    }

    //Text

    public static function textMessageBuilder($text){
        $input = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($text);
        return $input;
    }

    //Button

    public static function buttonTemplateBuilder($title,$text,$thumbnail,$actions){
        foreach($actions as $action){
            $options[] = new \LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder($action['label'],$action['text']);
        }
        $input = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder($title,$text,$thumbnail,$options);
        return $input;
    }

    //Confirm

    public static function confirmTemplateBuilder($text,$actions){
        foreach($actions as $action){
            $options[] = new \LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder($action['label'],$action['text']);
        }
        $input = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder($text,$options);
        return $input;
    }

    //Carousel

    public static function carouselTemplateBuilder($columns){
        foreach($columns as $column){
            foreach($column['actions'] as $action){
                $options[] = new \LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder($action['label'],$action['text']);
            }
            $template[] = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder($column['title'],$column['text'],$column['thumbnail'],$options);
            $options = [];
        }
        $input = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder($template);
        return $input;
    }
}