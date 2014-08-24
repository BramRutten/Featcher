<?php

class user{

	//Privates
	private $name;
	private $type;
	private $email;
	private $password;
	private $sex;
	private $image;
	

	//Getters
	public function __set($property, $value){
		
		switch ($property) {

			case 'user_id':
				$this->user_id = $value;
				break;

			case 'name':
				$this->name = $value;
				break;

			case 'type':
				$this->type = $value;
				break;
			
			case 'email':
				$this->email = $value;
				break;

			case 'password':
				$salt = "(TH!5-8e-Th3-54lT)";
				$this->password = sha1($value.$salt);
				break;

			case 'sex':
				$this->sex = $value;
				break;

			case 'image':
				$this->image = $value;
				break;

			case 'hash':
				$this->hash = $value;
				break;
		}

	}


	//Setters
	public function __get($property){
		switch ($property) {

			case 'user_id':
				return $this->user_id;
				break;

			case 'name':
				return $this->name;
				break;
			
			case 'type':
				return $this->type;
				break;

			case 'email':
				return $this->email;
				break;

			case 'password':
				return $this->password;
				break;

			case 'sex':
				return $this->sex;
				break;

			case 'image':
				return $this->image;
				break;

			case 'hash':
				return $this->hash;

		}

	}


	function login($email,$password){

		global $user, $db;

		$db = new Db();
		$salt = "(TH!5-8e-Th3-54lT)";
		$sql = 'SELECT * from user WHERE email = "'.$db->conn->real_escape_string($email).'" AND password = "'.$db->conn->real_escape_string(sha1($password.$salt)).'";';

		

		$result = $db->conn->query($sql);
		$row = $result->fetch_assoc();

		if($result->num_rows ==1){

			$hash = sha1($row['user_id'].$salt);

			$sql='UPDATE user SET hash="'.$hash.'" WHERE email ="'.$db->conn->real_escape_string($email).'";';

			$db->conn->query($sql);

			$_SESSION['hash'] = $hash;

			$this->fillUser($row['user_id']);

			header('Location: index.php');
		

		}
	}

	function signup($name, $email, $password, $isadmin){

		global $user, $db;

		$db = new Db();
		$salt = "(TH!5-8e-Th3-54lT)";
		$sql = "INSERT INTO user (name, email, password, is_admin) 
			VALUES ('".$db->conn->real_escape_string($name)."',
					'".$db->conn->real_escape_string($email)."',
					'".$db->conn->real_escape_string(sha1($password.$salt))."',
					'".$db->conn->real_escape_string($isadmin)."');";

		echo($sql);

		$db->conn->query($sql);
		header ('Location: index.php');
	}

	function fillUser($id){

		global $user, $db;

		$db = new Db();
		
		$salt = "(TH!5-8e-Th3-54lT)";
		$sql = 'SELECT * from user WHERE user_id = "'.$db->conn->real_escape_string($id).'";';

		$result = $db->conn->query($sql);
		$row = $result->fetch_assoc();

		$this->user_id = $row['user_id'];
		$this->name = $row['name'];
		$this->email = $row['email'];
		$this->image = $row['image'];
		$this->image = $row['is_admin'];
		$this->hash = $row['hash'];
	}

	 	function isLoggedIn($redirect=false){
		
		if(isset($_SESSION['hash'])){

			$db = new Db();
		
			$sql = 'SELECT * from user WHERE hash = "'.$_SESSION['hash'].'";';

			$result = $db->conn->query($sql);
			$row = $result->fetch_assoc();

			if($result->num_rows ==1){


				$this->fillUser($row['user_id']);
				return true;

			}else{
				if($redirect){
					header ('Location: logout.php');
					}else{
						return false;
					}
			}
			

		}else{
				if($redirect){
					header ('Location: logout.php');
				}else{
					return false;
				}
		}
	}

}
?>

