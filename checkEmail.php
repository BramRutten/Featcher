<?php

include 'init.php';

$email = $db->conn->query('SELECT user_id FROM user WHERE email="'.$_GET['email'].'"');

if($email->num_rows == 0){
?>
FALSE
<?php
}
?>