<?php session_start(); ob_start();?>

<!doctype html>
<html>
<head>
<?php include 'include/header.php' ?>
</head>

<body>
	<?php include 'include/navbar.php' ?>
	
	<?php
			$username = filter_input( INPUT_POST, 'username' )or die( 'Missing or illegal username parameter' );
			$password = filter_input( INPUT_POST, 'password' )or die( 'Missing or illegal password parameter' );


			require_once( 'dbcon.php' );

			$sql = 'SELECT id, pwhash, admin FROM vf_users WHERE username=?';
			$stmt = $link->prepare( $sql );
			$stmt->bind_param( 's', $username );
			$stmt->execute();
			$stmt->bind_result( $id, $pwhash, $admin );

			while ( $stmt->fetch() ) {

			if ( password_verify( $password, $pwhash ) ) {

				$_SESSION[ 'user_id' ] = $id;
				$_SESSION[ 'username' ] = $username;

				//admin=1, nonadmin=0. Checks session if user is set to 1
				if ( $admin == '1' ) {
					$_SESSION[ 'admin' ] = $admin;
				}
				
				header("location:index.php");
				
			} else {
				?>
			<p>Ugyldigt kombination af brugernavn/password.</p><br>
				<a href="index.php">Gå tilbage til login siden</a>
				<?php
				}
			}

			$stmt->close();
			$link->close();
			?>
	
	<?php include 'include/footer.php' ?>
</body>
</html>