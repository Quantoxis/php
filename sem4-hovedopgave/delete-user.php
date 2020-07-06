<?php session_start() ?>

<!doctype html>
<html>
<head>
<?php include 'include/header.php' ?>
</head>

<body>
	<?php include 'include/navbar.php' ?>
	
	<?php
		$user_id = filter_input( INPUT_POST, 'userid', FILTER_VALIDATE_INT )or die( 'Missing or illegal id parameter' );

		require_once( 'dbcon.php' );

		$sql = 'DELETE FROM vf_users WHERE id=?';
		$stmt = $link->prepare( $sql );
		$stmt->bind_param( 'i', $user_id );
		$stmt->execute();

		?>
		<p>Bruger med id " <?= $user_id ?>" slettet</p>
		<?php
			$link->close();
		?>
	
	<?php include 'include/footer.php' ?>
</body>
</html>