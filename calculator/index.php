<?php
ini_set('display_errors', true);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Calculator</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--Bootstrap link-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
	
<body>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="jumbotron mt-5">
					<h3 class="title">Calculator</h3>
							
					<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
						<div class="form-group">
							<label for="val1">Number 1</label>
							<input autocomplete="off" class="form-control" value="<?php echo $_GET['val1'] ?>" type="number" name="val1" required>
						</div>
						<div class="form-group">
							<button class="btn btn-info" type="submit" name="operator" value="add">+</button>
							<button class="btn btn-info" type="submit" name="operator" value="sub">-</button>
							<button class="btn btn-info" type="submit" name="operator" value="mul">*</button>
							<button class="btn btn-info" type="submit" name="operator" value="div">/</button>
							<button class="btn btn-info" type="submit" name="operator" value="mod">%</button>
						</div>
					<div class="form-group">
						<label for="val2">Number 2</label>
						<input autocomplete="off" class="form-control" value="<?php echo $_GET['val2'] ?>" type="number" name="val2" required> 
					</div>
					</form>
					<!--PHP-->
					<?php
						
						// $v1 = $_GET['$val1'];
						// $v2 = $_GET['$val2'];
						
						//if isset henter operater hvis det er sat, ellers giv fejl.
						if (isset($_GET['operator'])){
						$op = $_GET['operator'];
							$v1 = filter_input(INPUT_GET, 'val1', FILTER_VALIDATE_INT) or die('Missing or illegal val1 parameter');
							$v2 = filter_input(INPUT_GET, 'val2', FILTER_VALIDATE_INT) or die('Missing or illegal val2 parameter');
						
						
						switch($op){
							case 'add':
								$res = $v1+$v2;
								$operator = '+';
								
								break;
							
							case 'sub':
								$res = $v1-$v2;
								$operator = '-';
								
								break;
								
							case 'mul':
								$res = $v1*$v2;
								$operator = '*';
								
								break;
								
							case 'div':
								$res = $v1/$v2;
								$operator = '/';
								
								break;
								
							case 'mod':
								$res = $v1%$v2;
								$operator = '%';
								
								break;
								
							default:
								$res = 'Unknown operator ".$op."';
								$operator = $op;
								
								break;
						}
							echo "<h2 class='text-primary font-weight-bold'>{$v1} {$operator} {$v2} = {$res}</h2>";	
						}  
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>