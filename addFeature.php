<?php
include 'init.php';
if(!empty($_POST['text'])){
echo $feature->add($_POST['user_id'], $_POST['text']);
}