<?php

class Mail
{
	public static function send($mailParams = array())
	{
		$message = new YiiMailMessage();
		
		$message->view = $mailParams['view'];		
		$message->subject = $mailParams['subject'];
		
		$message->setBody(array('data' => $mailParams['data']), 'text/html');
		
		$message->addTo($mailParams['to']);
		$message->setFrom($mailParams['from']);
		
		return Yii::app()->mail->send($message);
	}	
}