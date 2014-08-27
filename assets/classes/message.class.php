<?php

class Message {
	
	public function success($text){
		$_SESSION['success'] = $text;
	}

	public function error($text){
		$_SESSION['error'] = $text;
	}

}