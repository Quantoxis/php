<?php session_start(); ?>

<!doctype html>
<html>
<head>
<?php include 'include/header.php' ?>
</head>

<body>
	<?php include 'include/navbar.php' ?>
	
	<?php
			$user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT) or die('Missing or illegal id parameter');
			
			require_once( 'dbcon.php' );

			$sql = 'UPDATE vf_users SET admin = 1 WHERE id=?';
			$stmt = $link->prepare( $sql );
			$stmt->bind_param( 'i', $user_id );
			$stmt->execute();
				
			if ( $stmt->affected_rows > 0 ) {
					?><p>Bruger med id "<?= $user_id ?>" er nu admin.</p><br>
	<?php
				} else {
					?><p>Fejl upstået under forsøg på lave bruger med id "<?= $user_id ?>" til admin da denne bruger allerede er admin.</p><?php
				}
			$stmt->close();
			$link->close();
			?>
	
	<?php include 'include/footer.php' ?>
</body>
</html>