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
	

$headertext = filter_input(INPUT_POST, 'headertext') or die('Missing headertext parameter');	
$bodytext = filter_input(INPUT_POST, 'bodytext') or die('Missing bodytext parameter');	
$colorid = filter_input(INPUT_POST, 'color_id') or die('Missing colorid parameter');
	
$userid = $_SESSION['users_id'];
	
	


	require_once('dbcon.php');
	
	$sql = 'INSERT INTO pi_postit (users_id, headertext, bodytext, color_id) VALUES (?, ?, ?, ?);';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('issi', $userid, $headertext, $bodytext, $colorid);
	$stmt->execute();
	
	echo 'Inserted '.$stmt->affected_rows.' new rows in the table';
	
?>
	<a href="postitboard.php">View the PostIt board</a>
	
</body>
</html>