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
	
		//Showing admin users
		$sql = 'SELECT username, id FROM vf_users WHERE admin=1 ORDER BY username ASC';
		$stmt = $link->prepare($sql);
		$stmt->execute();
		$stmt->bind_result ($un, $user_id);
		$stmt->store_result();//num_rows
	
		$num_rows = $stmt->num_rows;
		?> <h2>Antal admin brugere: <?= $num_rows ?><br></h2>
		<p>Liste over admin-brugere:</p><?php
	
		while ($stmt->fetch() ){
			if ($num_rows > 0){
				?> Brugernavn: <?= $un ?>
			<form action="remove-admin.php" method="post">
				<input type="hidden" name="user_id" value="<?= $user_id ?>">
				<button>Fjern administrator rettigheder</button>
			</form>
			<form action="delete-user.php" method="post">
				<input type="hidden" name="userid" value="<?= $user_id ?>">
				<button>Slet bruger</button>
			</form>
	<?php } else {
				?> <p>Der er ikke nogle admin brugere på siden.</p> <?php
			} ?>
			
		<?php }
	
		$stmt->close();
	?>
	
	<hr>
	
	<?php
		require_once('dbcon.php');
	
		//Showing non-admin users
		$sql = 'SELECT username, id FROM vf_users WHERE admin=0 ORDER BY username ASC';
		$stmt = $link->prepare($sql);
		$stmt->execute();
		$stmt->bind_result ($un, $user_id);
		$stmt->store_result();//num_rows
	
		$num_rows = $stmt->num_rows;
		?> <h2>Antal ikke-admin brugere: <?= $num_rows ?><br></h2>
		<p>Liste over ikke-admin-brugere:</p><?php
	
		while ($stmt->fetch() ){
			if ($num_rows > 0){
				?> Brugernavn: <?= $un ?>
			<form action="make-admin.php" method="post">
				<input type="hidden" name="user_id" value="<?= $user_id ?>">
				<button>Giv bruger administrator rettigheder</button>
			</form>
			<form action="delete-user.php" method="post">
				<input type="hidden" name="userid" value="<?= $user_id ?>">
				<button>Slet bruger</button>
			</form>
	<?php } else {
				?> <p>Der er ikke nogle ikke-admin brugere på siden.</p> <?php
			} ?>
			
		<?php }
	
		$stmt->close();
		$link->close();//link->close only on the last one in the file
	?>
		
	<?php include 'include/footer.php' ?>
</body>
</html>