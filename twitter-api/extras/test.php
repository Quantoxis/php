<!doctype html>
<html lang="da">
<head>
	<meta charset="utf-8">
	<title>Politker Tweets</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="images/favicon-2.png">

	<!--Boostrap-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<!--CSS-->
	<link rel="stylesheet" href="stylesheet.css">

	<!--jQuery-->
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<!--Icon on button-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">
	
	<!--Twitter javascript-->
	<script src="javascript/twitter-javascript/twitter.js"></script>

</head>

<body>
	<div class="container-fluid">
		<nav class="mb-3 navbar navbar-light bg-light">
			<a href="index.php"><img src="images/favicon-2.png" width="40"></a>
			<span class="navbar-brand mb-0 h1">Politiker Tweets</span>
		</nav>
		<form action="<?=$_SERVER['PHP_SELF']?>" method="get" autocomplete="off">
			<div class="col-12">
					<input type="text" class="mb-3 form-control col-12" id="formGroupExampleInput" name="search" placeholder="Søg efter en dansk politiker" style="border-radius: 0" required><br>
					<button type="submit" class="btn btn-block btn-outline-primary" name="submit">Søg nu</button>
					<input autocomplete="false" name="hidden" type="text" style="display:none;">
			</div>
		</form>
		<div>
			<input >
		</div>
		<div class="row">
			<div class="form-check form-check-inline col">
				<img src="images/socialdemokratiet.png" width="50px" height="50px">
  				<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
  				<label class="form-check-label" for="inlineCheckbox1">Socialdemokratiet</label>
			</div>
			<div class="form-check form-check-inline col">
				<img src="images/radikalevenstre.png" width="50px" height="50px">
  				<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
  				<label class="form-check-label" for="inlineCheckbox2">Radikale Venstre</label>
			</div>
			<div class="form-check form-check-inline col">
				<img src="images/konservativefolkeparti.png" width="50px" height="50px">
  				<input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
  				<label class="form-check-label" for="inlineCheckbox3">Konservative Folkeparti</label>
			</div>
			<div class="form-check form-check-inline col">
				<img src="images/socialistiskfolkeparti.png" width="50px" height="50px">
  				<input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
  				<label class="form-check-label" for="inlineCheckbox3">Socialistisk Folkeparti</label>
			</div>
			<div class="form-check form-check-inline col">
				<img src="images/liberalalliance.jpg" width="50px" height="50px">
  				<input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
  				<label class="form-check-label" for="inlineCheckbox3">Liberal Alliance</label>
			</div>
			<div class="form-check form-check-inline col">
				<img src="images/df.png" width="50px" height="50px">
  				<input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
  				<label class="form-check-label" for="inlineCheckbox3">Dansk Folkeparti</label>
			</div>
			<div class="form-check form-check-inline col">
				<img src="images/Venstre.png" width="50px" height="50px">
  				<input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
  				<label class="form-check-label" for="inlineCheckbox3">Venstre</label>
			</div>
			<div class="form-check form-check-inline col">
				<img src="images/enhedslisten.png" width="50px" height="50px">
  				<input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
  				<label class="form-check-label" for="inlineCheckbox3">Enhedslisten</label>
			</div>
			<div class="form-check form-check-inline col">
				<img src="images/alternativet.png" width="50px" height="50px">
  				<input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
  				<label class="form-check-label" for="inlineCheckbox3">Alternativet</label>
			</div>
		
		</div>
			
	<?php
			require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "724270258899562496-0KYsdmRTGyWzrZa28P4TXfE0wPxMlb1",
    'oauth_access_token_secret' => "2iY2JpkUeSigs8PxmH84MQg8xcoqYNhEmimEFOTP7FTur",
    'consumer_key' => "1fgLOFwMoLMsQRGBoQG1LtooG",
    'consumer_secret' => "eKM3qXGeVeEn19p90FT8sIZucT5FNPBIXwcMOI51JT1VwUD26D"
);	
$twitteruser = filter_input(INPUT_GET, 'search');//variable for the searh function

$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json'.$getfield;
$getfield = '?screen_name='.$twitteruser;
$requestMethod = 'GET';
			
// Perform the request
$twitter = new TwitterAPIExchange($settings);
$timeline = $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

$tweetlist = json_decode($timeline);
echo '<hr>';
			 
foreach($tweetlist as $tweet){ ?>
	
<div class="card">
  <div class="card-body">
    <h4 class="card-title"><?=$tweet->user->name?></h4>
    <p class="card-text">
		<?=$tweet->text?>
    </p>
  </div>
</div>

			
<?php } ?>
			
			
	</div>
	<!--Credit: https://codepen.io/matthewcain/pen/ZepbeR -->
	<a id="button"></a>
	<script src="javascript/scroll-to-top-button/button.js"></script>
</body>
</html>