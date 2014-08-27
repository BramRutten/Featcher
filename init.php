<?php

include 'assets/classes/db.class.php';
include 'assets/classes/user.class.php';
include 'assets/classes/feature.class.php';
include 'assets/classes/message.class.php';

ob_start();
session_start();

$message	= new Message();
$db 		= new Db();
$user 		= new User($db);
$feature 	= new Feature($db);

$user->isLoggedIn();
?>