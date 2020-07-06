<?php
ini_set( 'display-errors', true );
require_once( 'util.php' );
?>
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
	<link rel="stylesheet" href="stylesheet_adnan.css">
	<!--jQuery-->
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<!--Icon on button-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">
	<!-- database -->
	<script src="data.json"></script>
</head>
<body>
	<div class="container">
		<nav class="mb-3 navbar navbar-light bg-light">
			<a href="index.php"><img src="images/favicon-2.png" width="40"></a>
			<span class="navbar-brand mb-0 h1">Politiker Tweets</span>
		</nav>
		<form action="<?=$_SERVER['PHP_SELF']?>" method="get" autocomplete="off">
			<div class="col-12">
				<!--https://www.w3schools.com/tags/tryit.asp?filename=tryhtml5_datalist-->
				<input list="danish_politicians" type="text" class="mb-3 form-control col-12" id="formGroupExampleInput" name="search" placeholder="Søg efter en dansk politiker eller et hashtag" style="border-radius: 0" required value="<?=(isset($ts)?$ts:'')?>">
				<br>
				<button type="submit" class="btn btn-block btn-outline-primary" name="submit">Søg nu</button>
				<input autocomplete="false" name="hidden" type="text" style="display:none;">
			</div>
		</form>
		<br>
		<div class="row col-md-12 d-flex justify-content-center">
			<div>
				<p>Tryk på parti og så søg, for at se partiets politikers seneste tweets</p>
			</div>
			<div class="col-sm-12 d-flex justify-content-center">
				<div class="d-flex justify-content-between">
					<?php
						foreach ( $partier as $parti ) {
						echo '<a class="btn btn-outline-primary btn-sm" role="button" href="' . $_SERVER[ 'PHP_SELF' ] . '?party=' . $parti[ 'name' ] . '">' . $parti[ 'name' ] . '</a>&nbsp;';
						} ?>
				</div>
			</div>
		</div>
		<br>
		<hr>
		<div class="row">
			<?php
			require_once( 'TwitterAPIExchange.php' );
			/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
			$settings = array(
				'oauth_access_token' => "724270258899562496-0KYsdmRTGyWzrZa28P4TXfE0wPxMlb1",
				'oauth_access_token_secret' => "2iY2JpkUeSigs8PxmH84MQg8xcoqYNhEmimEFOTP7FTur",
				'consumer_key' => "1fgLOFwMoLMsQRGBoQG1LtooG",
				'consumer_secret' => "eKM3qXGeVeEn19p90FT8sIZucT5FNPBIXwcMOI51JT1VwUD26D"
			);

			$twitteruser = filter_input( INPUT_GET, 'search' ); //variable for the searh function

			if ( isset( $ts ) ) {
				$twitteruser = $ts;
			}


			$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
			$getfield = 'screen_name=' . $twitteruser . '&include_rts=false' . '&exclude_replies=true';
			$requestMethod = 'GET';


			// Perform the request
			$twitter = new TwitterAPIExchange( $settings );
			$timeline = $twitter->setGetfield( $getfield )->buildOauth( $url, $requestMethod )->performRequest();

			$tweetlist = json_decode( $timeline );

			//print_r($timeline);

			foreach ( $tweetlist as $tweet ) {
				$hashtagstring = '';
				if ( is_array( $tweet->entities->hashtags ) ) {
					foreach ( $tweet->entities->hashtags as $htag ) {
						$hashtagstring .= '#' . ( $htag->text ) . ' ';
					}
				}
				?>
			<div class="col-sm-6">
			<div class="card" id="searchUser">
				<div class="card-header">
					<h5 class="card-title"><img class="rounded-square" src="<?=$tweet->user->profile_image_url_https?>">&nbsp;</img><?=$tweet->user->name?></h5>
				</div>
				<div class="card-body">
					<div class="row">
						<p class="card-text"><?=$tweet->text?></p>
						<p class="card-text"><?=$hashtagstring?></p>
					</div>
				</div>
				<div class="card-footer">
					<p><?=$tweet->created_at?></p>
					<a href="https://twitter.com/<?=$tweet->user->screen_name?>" target="_blank">@<?=$tweet->user->screen_name?></a>
				</div>
			</div>
			</div>
			<?php } ?>
		</div>
		<br>
		<hr>
		<br>
		<div class="row">
			
			<?php
			$hashtagSearch = filter_input( INPUT_GET, 'search' ); //variable for the searh function
			$url = 'https://api.twitter.com/1.1/search/tweets.json';
			$getfield = '?q=%23' . $hashtagSearch . '&result_type=recent';
			$requestMethod = 'GET';

			//$twitter = new TwitterAPIExchange($settings);
			$search_json = $twitter->setGetfield( $getfield )->buildOauth( $url, $requestMethod )->performRequest();

			$searchResult = ( json_decode( $search_json ) );

			//print_r(search_json);

			foreach ( $searchResult->statuses as $tweet ) {
				$hashtagstring = '';
				foreach ( $tweet->entities->hashtags as $htag ) {
					$hashtagstring .= '#' . ( $htag->text ) . ' ';
				}
				?>
			<div class="col-sm-6">
			<div class="card" id="searchHashtag">
				<div class="card-header">
					<h5 class="card-title"><img class="rounded-square" src="<?=$tweet->user->profile_image_url_https?>">&nbsp;</img><?=$tweet->user->name?></h5>
				</div>
				<div class="card-body">
					<div class="row">
						<p class="card-text"><?=$tweet->text?></p>
						<p class="card-text"><?=$hashtagstring?></p>
					</div>
				</div>
				<div class="card-footer">
					<p><?=$tweet->created_at?></p>
					<a href="https://twitter.com/<?=$tweet->user->screen_name?>" target="_blank">@<?=$tweet->user->screen_name?></a>
				</div>
			</div>
			</div>
			<?php } ?>
			
		</div>
		
		<hr><br>
		<div class="row">
			<h4 class="justify-content-center">#dkpol</h4>
			<p class="justify-content-center">Følg med i den politiske debat</p>
		</div>	
		<div class="row">
			
			<?php
			$url = 'https://api.twitter.com/1.1/search/tweets.json';
			$getfield = '?q=%23dkpol';
			$requestMethod = 'GET';

			//		$twitter = new TwitterAPIExchange($settings);
			$dkpol_json = $twitter->setGetfield( $getfield )->buildOauth( $url, $requestMethod )->performRequest();

			$dkpol = ( json_decode( $dkpol_json ) );

			//print_r($dkpol_json);

			foreach ( $dkpol->statuses as $tweet ) {
				$hashtagstring = '';
				foreach ( $tweet->entities->hashtags as $htag ) {
					$hashtagstring .= '#' . ( $htag->text ) . ' ';
				}
				?>
			<div class="col-sm-4">
			<div class="card" id="showDKPOL">
				<div class="card-header">
					<h5 class="card-title"><img class="rounded-square" src="<?=$tweet->user->profile_image_url_https?>">&nbsp;</img><?=$tweet->user->name?></h5>
				</div>
				<div class="card-body">
					<div class="row">
						<p class="card-text"><?=$tweet->text?></p>
						<p class="card-text"><?=$hashtagstring?></p>
					</div>
				</div>
				<div class="card-footer">
					<p><?=$tweet->created_at?></p>
					<a href="https://twitter.com/<?=$tweet->user->screen_name?>" target="_blank">@<?=$tweet->user->screen_name?></a>
				</div>
			</div>
			</div>
			<?php } ?>
			
		</div>
		<br>
		<hr><br>
		<div class="row footer">
			<p>Politiker Tweets - Busy.dk</p>
		</div>

	</div>
	<!--Credit: https://codepen.io/matthewcain/pen/ZepbeR -->
	<a id="button"></a>
	<script src="javascript/scroll-to-top-button/button.js"></script>
</body>
</html>