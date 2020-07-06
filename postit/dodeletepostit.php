<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Postit Board</title>
	<link rel="shortcut icon" href="favicon.png">
</head>

<body>
	
	<?php
		if(isset($_SESSION['users_id'])){
			echo 'Currently logged in as '.$_SESSION['uname'].' with id='.$_SESSION['users_id'];
			
		}
	else{
		echo 'Not logged in';
	}
	?>
	<br>
<?php

	/* Ingen kan slette filer.
	$postitid = filter_input(INPUT_POST, 'pid', FILTER_VALIDATE_INT) 
		or die('Missing or illegal id parameter');
	$usersid = $_SESSION['users_id'];
	
	require_once('dbcon.php');
	
	$sql = 'DELETE FROM postit WHERE id = ? AND users_id = ?;';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('ii', $postitid, $usersid);
	$stmt->execute();
	
	echo 'Deleted '.$stmt->affected_rows.' PostIt notes';
	*/
	

	
	// Så alle kan slette alle filer.
	$postitid = filter_input(INPUT_POST, 'pid', FILTER_VALIDATE_INT) 
		or die('Missing or illegal id parameter');
	$userid = $_SESSION['users_id'];
	
	require_once('dbcon.php');
	
	$sql = 'DELETE FROM pi_postit WHERE id=? AND users_id=?';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('ii', $postitid, $userid);
	$stmt->execute();
	
	echo 'Deleted '.$stmt->affected_rows.' PostIt notes';
	
	?>
	<br>
	<?php
	
	if ($stmt->affected_rows == 0){
		echo 'You can only delete your own postits';
	}
		
	?>
	<br>
		<a href="postitboard.php">View the PostIt board</a>

</body>
</html>