<?php session_start(); ?>

<!doctype html>
<html>
<head>
<?php include 'include/header.php' ?>
</head>

<body>
	<?php include 'include/navbar.php' ?>
	
	<h1>title</h1>
	
	<hr>
	
	<h2>Opret bruger</h2>
	<form method="post" action="create-user.php" autocomplete="off">
		Brugernavn: <input name="username" type="text"><br>
		Password: <input name="password" type=password><br>
		<button type="reset">Nulstil alle felter</button>
		<button type="submit">Opret bruger</button>
	</form>
	
	<hr>
	
	<h2>Log ind</h2>
	<form action="login.php" method="post" autocomplete="off">
		Brugernavn: <input name="username" type="text"><br>
		Password: <input name="password" type="password">
		<button type="submit">Log ind</button>
	</form>
	
	<h2>Log ud:</h2>
	<form action="logout.php">
		<button type="submit">Log ud</button>
	</form>
	
	<?php
	if ( isset( $_SESSION[ 'admin' ] ) ) {
			?> admin
	<?php } else {
		?> ikke admin
	<?php } ?>
	
	
	<?php include __DIR__ . '/include/footer.php'; ?>
	<?php include 'include/footer.php' ?>
</body>
</html>