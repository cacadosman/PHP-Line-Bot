<?php

namespace App\LineBot;

use App\LineBot\Core;

class Functions extends Core{

  public function botEventReplyToken($event){
    return $event['replyToken'];
  }

  public function botEventType($event){
    return $event['type']; //message, follow, unfollow, join, leave, postback, beacon
  }

  /* ===== SOURCE ===== */

  public function botEventSourceType($event){
    return $event['source']['type'];
  }

  public function botEventSourceUid($event){
    return $event['source']['userId'];
  }

  public function botEventSourceRoomId($event){
    return $event['source']['roomId'];
  }

  public function botEventSourceGroupId($event){
    return $event['source']['groupId'];
  }

  public function botEventSourceIsGroup($event){
    if($event['source']['type'] == "group"){
      return true;
    }
  }

  public function botEventSourceIsRoom($event){
    if($event['source']['type'] == "room"){
      return true;
    }
  }

  /* ===== Message ===== */

  public function botEventMessageType($event){
    return $event['message']['type'];
  }
  public function botEventMessageId($event){
    return $event['message']['id'];
  }

  //Text

  public function botEventMessageText($event){
    return $event['message']['text'];
  }

  //File

  public function botEventMessageFileName($event){
    return $event['message']['fileName'];
  }
  public function botEventMessageFileSize($event){
    return $event['message']['fileSize'];
  }

  //Location

  public function botEventMessageTitle($event){
    return $event['message']['title'];
  }
  public function botEventMessageAddress($event){
    return $event['message']['address'];
  }
  public function botEventMessageLatitude($event){
    return $event['message']['latitude'];
  }
  public function botEventMessageLogtitude($event){
    return $event['message']['logtitude'];
  }

  //Sticker

  public function botEventMessagePackageID($event){
    return $event['message']['packageId'];
  }
  public function botEventMessageStickerID($event){
    return $event['message']['stickerId'];
  }

  //Postback

  public function botEventPostbackData($event) {
		return $event['postback']['data'];
	}

  /* ===== Action ===== */

  // Get profile

  public function botGetProfile($event){
    $uid = $this->botEventSourceUid($event);
    $response = $this->bot->getProfile($uid);
    if($response->isSucceeded()){
      $profile = $response->getJSONDecodedBody();
      return $profile;
    }
  }

  //Leave

  public function botEventLeaveRoom($event) {
		return $this->bot->leaveRoom($this->botEventSourceRoomId($event));
	}
	public function botEventLeaveGroup($event) {
		return $this->bot->leaveRoom($this->botEventSourceGroupId($event));
	}

  //Send Content

  public function botReplyText($event, $message){
    $response = $this->bot->replyText($this->botEventReplyToken($event), $message);
    if($response->isSucceeded()){
      return true;
    }
  }

  public function botReplyMessage($event, $message){
    $response = $this->bot->replyMessage($this->botEventReplyToken($event), $message);
    if($response->isSucceeded()){
      return true;
    }
  }

  public function botSendText($event, $text) {
		$input    = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($text);
		$response = $this->bot->replyMessage($this->botEventReplyToken($event), $input);
		if ($response->isSucceeded()) {
			return true;
		}
	}

  public function botSendImage($event, $url, $preview_url) {
		$input    = new \LINE\LINEBot\MessageBuilder\ImageMessageBuilder($url, $preview_url);
		$response = $this->bot->replyMessage($this->botEventReplyToken($event), $input);
		if ($response->isSucceeded()) {
			return true;
		}
	}

	public function botSendVideo($event, $url, $preview_url) {
		$input    = new \LINE\LINEBot\MessageBuilder\VideoMessageBuilder($url, $preview_url);
		$response = $this->bot->replyMessage($this->botEventReplyToken($event), $input);
		if ($response->isSucceeded()) {
			return true;
		}
	}

	public function botSendAudio($event, $content, $duration) {
		$input    = new \LINE\LINEBot\MessageBuilder\AudioMessageBuilder($content, $duration);
		$response = $this->bot->replyMessage($this->botEventReplyToken($event), $input);
		if ($response->isSucceeded()) {
			return true;
		}
	}

	public function botSendLocation($event, $title, $address, $latitude, $longitude) {
		$input    = new \LINE\LINEBot\MessageBuilder\LocationMessageBuilder($title, $address, $latitude, $longitude);
		$response = $this->bot->replyMessage($this->botEventReplyToken($event), $input);
		if ($response->isSucceeded()) {
			return true;
		}
	}

	public function botSendSticker($event, $packageId, $stickerId) {
		$input    = new \LINE\LINEBot\MessageBuilder\StickerMessageBuilder($packageId, $stickerId);
		$response = $this->bot->replyMessage($this->botEventReplyToken($event), $input);
		if ($response->isSucceeded()) {
			return true;
		}
	}

  /* ===== Template Builder ===== */

  public function botTemplateMessageBuilder($text,$template){
    $input = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder($text,$template);
    return $input;
  }

  public function botMultiMessageBuilder($array){
    $multi = new \LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
    foreach($array as $item){
      $input = $multi->add($item);
    }
    return $input;
  }

  //Text

  public function botTextMessageBuilder($text){
    $input = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($text);
    return $input;
  }

  //Button

  public function botButtonTemplateBuilder($title,$text,$thumbnail,$actions){
    foreach($actions as $action){
      $options[] = new \LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder($action['label'],$action['text']);
    }
    $input = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder($title,$text,$thumbnail,$options);
    return $input;
  }

  //Confirm

  public function botConfirmTemplateBuilder($text,$actions){
    foreach($actions as $action){
      $options[] = new \LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder($action['label'],$action['text']);
    }
    $input = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder($text,$options);
    return $input;
  }

  //Carousel

  public function botCarouselTemplateBuilder($columns){
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

?>
