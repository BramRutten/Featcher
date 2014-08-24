<?php


class Feature {

	public function add($user_id, $text){
		global $db;
		
		$db->conn->query('INSERT INTO feature (created_on, user_id, text) VALUES (NOW(), "'.$user_id.'", "'.$text.'")');
	}

	public function remove($feature_id, $user_id){
		global $user, $db;

		if($user->isAdmin()){
			
			$db->conn->query('DELETE FROM feature WHERE feature_id="'.$feature_id.'"');

			return true;
		}

		return false;
	}

	public function vote($wise, $feature_id, $user_id){
		global $user,$db;

		$check_vote = $db->conn->query('SELECT feature_vote_id, state FROM feature_vote WHERE user_id="'.$user_id.'" AND feature_id="'.$feature_id.'" LIMIT 1');

		// Geen votes gevonden
		if($check_vote->num_rows == 0){
			// Vote toevoegen
			$state = ($wise == "up") ? 1 : 0;
			
			$db->conn->query('INSERT INTO feature_vote (user_id, feature_id, state, timestamp) VALUES ("'.$user_id.'", "'.$feature_id.'", "'.$state.'", NOW())');

			return true;
		} else {
			// Wel een vote gevonden ... als deze down is passen we deze aan naar up
			$check_vote = $check_vote->fetch_assoc();
			
			if($check_vote['state'] == 0 && $wise == "up"){
				
				$db->conn->query('UPDATE feature_vote SET state="1" WHERE feature_vote_id="'.$check_vote['feature_vote_id'].'"');

				return true;
			} elseif($check_vote['state'] == 1 && $wise == "down"){
				
				$db->conn->query('UPDATE feature_vote SET state="0" WHERE feature_vote_id="'.$check_vote['feature_vote_id'].'"');

				return true;
			} // else, dan heeft user reeds up of down gestemd
		}

	}

}

?>