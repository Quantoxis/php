<?php
ini_set('display_errors', true);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('util.php');

/*
errors:
1. hvad siger folk om - på parti
2. ingenn navn på h1
*/
?>
<!doctype html>
<html lang="da">
<head>
	<meta charset="utf-8">
	<title>Politker Tweets</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
	<link rel="shortcut icon" href="images/twitter-orange.png">
	<!--Boostrap-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!--CSS-->
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="EasyAutocomplete/easy-autocomplete.min.css">
	<!--Icon on button-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">
</head>

<body>
	<!-- Header top -->
	<div class="container-fluid">
		<nav class="mb-3 navbar">
			<a href="index.php"><img src="images/twitter-orange.png" width="40" alt=""></a>
			<span class="navbar-brand mb-0 h1">Politiker Tweets</span>
		</nav>
		<!-- Search input -->
		<form action="<?=$_SERVER['PHP_SELF']?>" method="get" autocomplete="off" class="col-md-12 col-sm-12 ">
			<div class="row justify-content-center">
				<div class="col-md-7 col-sm-4 mb-1">
					<div class="easy-autocomplete eac-description">
						<input type="text" id="function-data" class="form-control shadow-none" placeholder="Søg efter politiker" autocomplete="off">
					</div>
				</div>
				<div class="row col-md-3 col-sm-4">
					<!--https://www.w3schools.com/tags/tryit.asp?filename=tryhtml5_datalist-->
					<input type="text" class="mb-3 form-control col-12 form-control shadow-none" id="data-holder" name="search" placeholder="Søg efter twitternavn eller hashtag" value="<?php
					if(isset($ts)){
					echo $ts;
					//$_GET['search'] = $ts;
					}
					?>">
				</div>
				<div class="col-md-2 col-sm-4">
					<button type="submit" class="btn btn-block btn-outline-primary btn-lg shadow-none partibutton" name="submit">Søg</button>
					<input autocomplete="off" name="hidden" type="text" style="display:none;">
				</div>
			</div>
		</form>
		<!-- Search input END -->
		<br>
		<!-- Filter by party -->
		<div class="row text-center">
			<div class="col-12">
				<h1>Følg med i den danske politiske debat</h1>
			</div>
		</div>
		<div class="row text-center">
			<div class="col-12">
				<p>Søg på en politiker, eller tryk på et parti for at se partiets politikers seneste tweets</p>
			</div>
		</div>
		<div class="col-md-12 text-center">
			<?php
			foreach ( $partier as $parti ) {
				echo '<a class="mb-3 btn btn-outline-primary btn-lg shadow-none partibutton" role="button" href="' . $_SERVER[ 'PHP_SELF' ] . '?party=' . $parti[ 'name' ] . '">' . $parti[ 'name' ] . '</a>&nbsp;';
			}
			?>
		</div>
		<!-- Filter by party END -->
		<!-- Vis seneste tweets for en enkelt bruger -->
		<div class="row firstsection">
		
			<div class="row col-md-10 col-sm-12 justify-content-center mt-5 mb-5">
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
				?>
				<?php
				foreach ( $tweetlist as $tweet ) {
					$hashtagstring = '';
					if ( is_array( $tweet->entities->hashtags ) ) {
						foreach ( $tweet->entities->hashtags as $htag ) {
							$hashtagstring .= '#' . ( $htag->text ) . ' ';
						}
					}
					?>
				<div class="col-md-6 col-sm-12">
					<div class="card mb-3 searchUser">
						<div class="card-header">
							<h5 class="card-title"><img class="rounded-square" src="<?=$tweet->user->profile_image_url_https?>" alt="">&nbsp;<?=$tweet->user->name?></h5>
						</div>
						<div class="card-body">
							<div class="row">
								<p class="card-text">
									<?=$tweet->text?>
								</p>
								<p class="card-text">
									<?=$hashtagstring?>
								</p>
							</div>
						</div>
						<div class="card-footer">
							<p>
								<?=$tweet->created_at?>
							</p>
							<a href="https://twitter.com/<?=$tweet->user->screen_name?>" target="_blank">@<?=$tweet->user->screen_name?></a>
						</div>
					</div>
				</div>
				<?php } // end foreach ?>
			</div>
		</div>
		<!-- Vis seneste tweets for en enkelt bruger END -->
		<!-- Vis seneste tweets for flere brugere OG hashtags -->
		<div class="row midsection">
			<?php /*
			<div class="row mt-5">
				<h4 class="justify-content-center col-12 text-center text-light"><img class="rounded-circle" src="<?=$tweet->user->profile_image_url_https?>">&nbsp; #
			<?=$tweet->user->screen_name?>-
			<?=$tweet->user->name?>
			</h4>
			<p class="justify-content-center col-12 text-center text-light">Følg med i den politiske debat nedenfor</p>
		</div>
		*/?>
		<br>
		<div class="row mt-5">
			<h4 class="text-white col-12">
				<?php if(isset($twitteruser)){
					echo "Hvad siger folk om " . $tweet->user->name;
				} else {
					echo "Søg på en politiker for at se hvad folk siger om dem!";
				} ?>
			</h4>
		</div>
		<div class="row col-md-10 col-sm-12 justify-content-center mt-5 mb-5">
			<?php
			$hashtagSearch = filter_input( INPUT_GET, 'search' ); //variable for the searh function

			if ( isset( $ts ) ) {
				$hashtagSearch = $ts;
			}

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
				
			<div class="col-md-6 col-sm-12">
				<div class="card mb-3 searchHashtag">
					<div class="card-header">
						<h5 class="card-title"><img class="rounded-square" src="<?=$tweet->user->profile_image_url_https?>" alt="">&nbsp;<?=$tweet->user->name?></h5>
					</div>
					<div class="card-body">
						<div class="row">
							<p class="card-text">
								<?=$tweet->text?>
							</p>
							<p class="card-text">
								<?=$hashtagstring?>
							</p>
						</div>
					</div>
					<div class="card-footer">
						<p>
							<?=$tweet->created_at?>
						</p>
						<a href="https://twitter.com/<?=$tweet->user->screen_name?>" target="_blank">@<?=$tweet->user->screen_name?></a>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<!-- Vis seneste tweets for flere brugere OG hashtags END -->
	<!-- Vis seneste tweets for hashtagget #dkpol -->
	<div class="row lastsection">
		<div class="row mt-5">
			<h4 class="justify-content-center col-12 text-center">#dkpol</h4>
			<p class="justify-content-center col-12 text-center">Følg med i den politiske debat</p>
		</div>
		<br><br>
		<div class="row col-md-10 col-sm-12 justify-content-center mb-5">
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
			<div class="col-md-4 col-sm-4">
				<div class="card mb-3 showDKPOL">
					<div class="card-header">
						<h5 class="card-title"><img class="rounded-square" src="<?=$tweet->user->profile_image_url_https?>" alt="">&nbsp;<?=$tweet->user->name?></h5>
					</div>
					<div class="card-body">
						<div class="row">
							<p class="card-text">
								<?=$tweet->text?>
							</p>
							<p class="card-text">
								<?=$hashtagstring?>
							</p>
						</div>
					</div>
					<div class="card-footer">
						<p>
							<?=$tweet->created_at?>
						</p>
						<a href="https://twitter.com/<?=$tweet->user->screen_name?>" target="_blank">@<?=$tweet->user->screen_name?></a>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<!-- Vis seneste tweets for hashtagget #dkpol END -->
	<!-- Footer -->
	<div class="footer bg-dark col-12 text-white">
		<div class="col-10 mx-auto pt-3 pb-3 text-center" id="footertext">Politiker Tweets - Busy.dk</div>
	</div>
	<!-- Footer END -->
	</div>
	<!-- Up Top Button fra https://codepen.io/matthewcain/pen/ZepbeR -->
	<a id="button"></a>
	<!-- Page END -->


	<!-- bootstrap -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<!--jQuery-->
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<!-- up top button -->
	<script src="javascript/scroll-to-top-button/button.js"></script>
	<!-- Easy autocomplete -->
	<script src="EasyAutocomplete/jquery.easy-autocomplete.min.js"></script>
	<script src="javascript/autocomplete/autocomplete.js"></script>
</body>
</html>