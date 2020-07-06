<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Postit Board</title>
	

	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="favicon.png">
</head>

<body>
	<div class="container">
		<div id="left">
			<div id="innerLeft">
			<!--INFO AND LOGOUT START-->
			<div class="loginInfo">
			<p class="loggedInText">
	<?php
			if(isset($_SESSION['users_id'])){
			echo 'Currently logged in as '.$_SESSION['uname'].' with id='.$_SESSION['users_id'];
		}
	else{
		echo 'Not logged in';
	}

	?>
				</p>
	<?php
	if(isset($_SESSION['users_id'])){
		?>
	<form action="logout.php">
		<button type="submit">Logout</button>
	</form>
		<?php } ?>
	</div>
	<!--INFO AND LOGOUT END-->
	<!--LOGIN START-->
	<div class="createUser">
	<form action="create-user.php" method="post" class="mb-5">
			<h2>Create User</h2>
			<input type="text" autocomplete="off" name="un" placeholder="Username" class="inputLeft" required>
			<input type="password" autocomplete="off" name="pw" placeholder="Password" class="inputLeft" required>
			<button type="submit">Create user</button>
	</form>
	</div>
				

	<div class="login">
	<form action="login.php" method="post" class="mb-5">
			<h2>Login</h2>
			<input type="text" name="un" placeholder="Username" class="inputLeft" required>
			<input type="password" name="pw" placeholder="Password" class="inputLeft" required>
			<button type="submit">Login</button>
	</form>
	</div>
	<!--LOGIN END-->


	<!--POSTIT BOARD CREATE BEGIN-->
	<div class="create">
	<h2>Create new PostIt</h2>
	<form action="docreatepostit.php" method="post">
		<input type="text" name="headertext" maxlength="20" placeholder="Title" class="inputLeft">
		<input type="text" name="bodytext" maxlength="500" rows="5" placeholder="Text" class="inputLeft">

		Color:
		<select name="color_id" required>
<?php
			require_once('dbcon.php');
			$sql = 'SELECT id, colorname FROM pi_color';
			$stmt = $link->prepare($sql);
			$stmt->execute();
			$stmt->bind_result($cid, $cnam);

			while($stmt->fetch()){
				echo '<option value="'.$cid.'">'.$cnam.'</option>';
// Radio button example:
// echo '<input type="radio" name="colorid" value="'.$cid.'"> '.$cnam.'<br>'; 
			}
?>
		</select>


		<button type="submit">Create postit</button>
	</form>
	</div>
	<!--POSTIT BOARD CREATE END-->
</div>
</div><!--left end-->
		<div id="right">
	<div id="postit-board">
		<h1>The postit board</h1>

<?php
	require_once('dbcon.php');
	$sql = 'SELECT pi_postit.id AS pid, date(createdate), headertext, bodytext, pi_users.id AS users_id, username, cssclass
FROM pi_postit, pi_users, pi_color
WHERE users_id=pi_users.id
AND color_id = pi_color.id';

	$stmt = $link->prepare($sql);
	$stmt->execute();
	$stmt->bind_result($pid, $createdate, $headertext, $bodytext, $userid, $username, $cssclass);

	while($stmt->fetch()){ ?>


<div class="postit draggable">
	<div class="postit <?php echo $cssclass ?>">
		<p class="header"><?php echo $headertext?></p>

		<div class="delete">
			<form action="dodeletepostit.php" method="post">
				<input type="hidden" name="pid" value="<?php echo $pid?>">
				<div class="delete-img">
					<input type="image" src="delete-img.png" title="Delete" width="20" height="20" alt="Delete">
				</div>
			</form>
		</div>


		<p class="text"><?php echo $bodytext?></p>
		<p class="date"><?php echo $createdate?>&copy;</p><p class="username"><?php echo $username?></p>

	</div>
		</div>

<?php	
	}
?>
		</div>
			</div>
			</div>
	<!--POSTIT BOARD END-->
	<script src="js/interact-v1.3.4.js"></script>
	<script src="js/draggable.js"></script>
</body>
</html>