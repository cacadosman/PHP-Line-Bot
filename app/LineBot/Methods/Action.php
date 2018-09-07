<?php

namespace App\LineBot\Methods;

use App\LineBot\Core;
use App\LineBot\Methods\Event;
use App\LineBot\Methods\Source;

class Action extends Core{

    public static function getProfile($event){
        $uid = Source::userId($event);
        $response = self::$bot->getProfile($uid);
        $profile = $response->getJSONDecodedBody();
        return $profile;
    }

    //Leave

    public static function leaveRoom($event) {
		return self::$bot->leaveRoom(Source::roomId($event));
    }
    
	public static function leaveGroup($event) {
		return self::$bot->leaveRoom(Source::groupId($event));
	}

    //Send Content

    public static function replyText($event, $message){
        $response = self::$bot->replyText(Event::replyToken($event), $message);
        return true;
    }

    public static function replyMessage($event, $message){
        $response = self::$bot->replyMessage(Event::replyToken($event), $message);
        return true;
    }

    public static function sendText($event, $text) {
        $input    = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($text);
        $response = self::$bot->replyMessage(Event::replyToken($event), $input);
        return true;
    }

    public static function sendImage($event, $url, $preview_url) {
        $input    = new \LINE\LINEBot\MessageBuilder\ImageMessageBuilder($url, $preview_url);
        $response = self::$bot->replyMessage(Event::replyToken($event), $input);
        return true;
    }

	public static function sendVideo($event, $url, $preview_url) {
		$input    = new \LINE\LINEBot\MessageBuilder\VideoMessageBuilder($url, $preview_url);
		$response = self::$bot->replyMessage(Event::replyToken($event), $input);
		return true;
	}

	public static function sendAudio($event, $content, $duration) {
		$input    = new \LINE\LINEBot\MessageBuilder\AudioMessageBuilder($content, $duration);
		$response = self::$bot->replyMessage(Event::replyToken($event), $input);
		return true;
	}

	public static function sendLocation($event, $title, $address, $latitude, $longitude) {
		$input    = new \LINE\LINEBot\MessageBuilder\LocationMessageBuilder($title, $address, $latitude, $longitude);
		$response = self::$bot->replyMessage(Event::replyToken($event), $input);
		return true;
	}

	public static function sendSticker($event, $packageId, $stickerId) {
		$input    = new \LINE\LINEBot\MessageBuilder\StickerMessageBuilder($packageId, $stickerId);
		$response = self::$bot->replyMessage(Event::replyToken($event), $input);
		return true;
	}
}