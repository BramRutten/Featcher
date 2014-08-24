<?php

include 'assets/classes/db.class.php';
include 'assets/classes/user.class.php';
include 'assets/classes/feature.class.php';

$db 		= new Db();
$user 		= new User($db);
$feature 	= new Feature($db);



ob_start();
session_start();

$user->isLoggedIn();
?>