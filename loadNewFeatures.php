<?php
$q = $db->conn->query('SELECT f.*, (SELECT COUNT(*) FROM feature_vote WHERE feature_id = f.feature_id AND state="1") AS voteUp,
								   (SELECT COUNT(*) FROM feature_vote WHERE feature_id = f.feature_id AND state="0") AS voteDown,
								   (
								   		(SELECT COUNT(*) FROM feature_vote WHERE feature_id = f.feature_id AND state="1")
								   		-
								   		(SELECT COUNT(*) FROM feature_vote WHERE feature_id = f.feature_id AND state="0")
								   	) as totalVote,
								   	u.name 
						FROM feature as f 
						LEFT JOIN feature_vote as fv ON (f.feature_id = fv.feature_id) 
						LEFT JOIN user 	as u ON (f.user_id = u.user_id)
						GROUP BY feature_id ORDER BY created_on DESC LIMIT 10');


?>

<?php
while($f = $q->fetch_assoc()){
?>
<div class="head col-lg-12">
<table class="table">
	<tr style="background-color: <?=($f['totalVote'] > 0) ? '#B3FFBF' : '#FFC5C5'; ?>;">
		<td width="40%"><?=$f['text']?></td>
		<td width="20%"><?=$f['name']?></td> <!-- MOET NAME UIT tabel USER-->
		<td width="20%"><?=($f['totalVote'])?></td>
		<td><a href="?vote=yes&userid=<?=$user->user_id?>&fid=<?=$f['feature_id']?>">Yes</a> / <a href="?vote=no&userid=<?=$user->user_id?>&fid=<?=$f['feature_id']?>">No</a></td>
		<!-- Delete feature -->
		<?php
			if($user->isAdmin()){
		?>		
		<td><a href="?remove=true&id=<?=$f['feature_id']?>">Delete</a>
		<?php 
			}
		?>
	</tr>
</table>
</div>
<?php
}
?>