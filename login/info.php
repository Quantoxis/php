<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	
	<?php
	
		session_start();
		if(isset($_SESSION['uid'])){
			echo 'Currently logged in as '.$_SESSION['uname'].' with id='.$_SESSION['uid'];
			
		}
	else{
		echo 'Not logged in';
	}
	
	?>
	
	<form action="logout.php">
		<button type="submit">Logout</button>
	</form>
										  
					
	
</body>
</html>