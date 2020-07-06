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
	$un = filter_input(INPUT_POST, 'un') or die('Missing or illegal un parameter');	
	$pw = filter_input(INPUT_POST, 'pw') or die('Missing or illegal pw parameter');	
	
	
	require_once('dbcon.php');
	
	$sql = 'SELECT id, pwhash FROM pi_users WHERE username=?';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('s', $un);
	$stmt->execute();
	$stmt->bind_result($userid, $pwhash);
	
	while ($stmt->fetch()){	}
	
	if (password_verify($pw,$pwhash)){
		echo 'un and pw matched user with id:'.$userid;
		$_SESSION['users_id'] = $userid;
		$_SESSION['uname'] = $un;
	}
	else{
		echo 'Illegal username/password combination';
	}
	
	
?>
	
	<br>
	<a href="postitboard.php">Go to the postit board</a>
	
</body>
</html>