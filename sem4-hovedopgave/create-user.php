<?php session_start(); ?>

<!doctype html>
<html>
<head>
<?php include 'include/header.php' ?>
</head>

<body>
	<?php include 'include/navbar.php' ?>
	
	<?php
		require_once('dbcon.php');
	
		$username = filter_input(INPUT_POST, 'username') or die('Missing or illegal username parameter');	
		$password = filter_input(INPUT_POST, 'password') or die('Missing or illegal password parameter');	
		$pwhash = password_hash($password, PASSWORD_DEFAULT);
	
		//create user
		$sql = 'INSERT INTO vf_users (username, pwhash) VALUES (?,?)';
		$stmt = $link->prepare($sql);
		$stmt->bind_param('ss', $username, $pwhash);
		$stmt->execute();
		
		if ($stmt->affected_rows > 0){
		?> <p>Bruger <?= $username ?> oprettet</p> <?php
		} else {
			?> <p>Kunne ikke oprette bruger ved navn <?= $username ?> da denne bruger allerede findes. Prøv et andet navn.</p><?php
		}
		
		$stmt->close();
		$link->close();
	?>
	
	<?php include 'include/footer.php' ?>
</body>
</html>