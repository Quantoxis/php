<?php
$json_string = 'data.json';
$jsondata = file_get_contents($json_string);
$obj = json_decode($jsondata,true);
$partier = $obj['partier'];			  


if(isset($_GET['party'])){
	
	$selectedParty = $_GET['party'];


	$first = true;
	$ts = '';

	foreach($partier as $parti){
		if($selectedParty == $parti['name']){
			foreach($parti['member'] as $member){
				if (!$first){
					$ts = $ts.' OR ';
				}
				$ts = $ts.'from:'.$member['twitterhandle'];

				$first=false;
			}
		}
	}
}
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
	<link rel="stylesheet" href="stylesheet.css">

	<!--jQuery-->
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	
	<!--Icon on button-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">
	
	<script src="data.json"></script>
</head>

<body>	
	<div class="container-fluid mx-auto">
		<nav class="mb-3 navbar navbar-light bg-light">
			<a href="index.php"><img src="images/favicon-2.png" width="40"></a>
			<span class="navbar-brand mb-0 h1">Politiker Tweets</span>
		</nav>
		<form action="<?=$_SERVER['PHP_SELF']?>" method="get" autocomplete="off">
			<div class="col-12">
				<!--https://www.w3schools.com/tags/tryit.asp?filename=tryhtml5_datalist-->
				<input list="danish_politicians" type="text" class="mb-3 form-control col-12" id="formGroupExampleInput" name="search" placeholder="Søg efter en dansk politiker eller et hashtag" style="border-radius: 0" required value="<?=(isset($ts)?$ts:'')?>">
				<datalist id="danish_politicians">
					<option value="larsloekke">Lars Løkke Rasmussen</option>
					<option value="metteabildgaard">Mette Abildgaard</option>
					<option value="padelsteen">Pia Adelsteen</option>
					<option value="adsboladsbl">Karina Adsbøl</option>
					<option value="yildizakdogan">Yildiz Akdogan</option>
					<option value="simonemilammitz">Simon Emil Ammitzbøll-Bille</option>
					<option value="hansandersenv">Hans Andersen</option>
					<option value="kirstennormann">Kirsten Norman Andersen</option>
					<option value="magniarge">Magni Arge</option>
					<option value="idaauken">Ida Auken</option>
					<option value="carstenbachft">Carsten Bach</option>
					<option value="brittbager">Britt Bager</option>
					<option value="lisebech">Lise Bech</option>
					<option value="bendixenpebe">Pernille Bendixen</option>
					<option value="kristensenberth">Kenneth Kristiensen Berth</option>
					<option value="blixt22">Liselotte Blixt</option>
					<option value="mettebock">Mette Boch</option>
					<option value="erlingbonnesen">Erling Bonnesen</option>
					<option value="tildebork">Tilde Bork</option>
					<option value="trinebramsen">Trine Bramsen</option>
					<option value="smbrix">Stine Brix</option>
					<option value="kirstenbrosbol">Kirsten Brosbol</option>
					<option value="mfmorten">Morten Bødskov</option>
					<option value="ech58">Erik Christensen</option>
					<option value="villumc">Villum Christensen</option>
					<option value="dfkichkim">Kim Christiansen</option>
					<option value="sociologenhd">Henrik Dahl</option>
					<option value="jthulesen">Jens Henrik Thulsesen Dahl</option>
					<option value="kristianthdahl">Kristian Thulsesen Dahl</option>
					<option value="thdanielsen">Thomas Danielsen</option>
					<option value="dfmehd_mette">Mette Hjermind Dencker</option>
					<option value="pelledragsted">Pelle Dragsted</option>
					<option value="due2karina">Karina Due</option>
					<option value="kaaredybvad">Kaare Dybvad</option>
					<option value="piaolsen">Pia Olsen Dyhr</option>
					<option value="christinaegelun">Christina Egelund</option>
					<option value="eilersen_df">Susanna Eilersen</option>
					<option value="uffeelbaek">Uffe Elbæk</option>
					<option value="louiseelholm">Louise Schack Elholm</option>
					<option value="ellemannkaren">Karen Ellemann</option>
					<option value="jakobellemann">Jabob Ellemann Jensen</option>
					<option value="bennyengelbrech">Benny Engelbrech</option>
					<option value="engelschmidt">Jakob Engel-Schmidt</option>
					<option value="espersendf">Søren Espersen</option>
					<option value="flydtkjaer">Dennis Flydtkjær</option>
					<option value="evaflyvholm">Eva Flyvholm</option>
					<option value="mettefrederiks">Mette Frederiksen</option>
					<option value="madsfuglede">Mads Fuglede</option>
					<option value="soerengade">Søren Gade</option>
					<option value="geertsenvenstre">Martin Geerten</option>
					<option value="torstengejl">Torsten Gejl</option>
					<option value="mettegjerskov">Mette Gjerskov</option>
					<option value="grantzau">Julius Gorm Graakjær Grantzau</option>
					<option value="karingaardsted">Karin Gaardsted</option>
					<option value="anehalsboe">Ane Holsboe-Jørgensen</option>
					<option value="aleqahammond">Aleqa Hammond</option>
					<option value="clauskvist_df">Claus-Kvist Hansen</option>
					<option value="evakjerhansen">Eva Kjer Hansen</option>
				</datalist>
					<br>
				<button type="submit" class="btn btn-block btn-outline-primary" name="submit">Søg nu</button>
				<input autocomplete="false" name="hidden" type="text" style="display:none;">
			</div>
		</form>
		<?php
			  
			  
echo '<ul>';			  
foreach($partier as $parti){	
	echo '<li><a href="'.$_SERVER['PHP_SELF'].'?party='.$parti['name']
		.'">'.$parti['name'].'</a></li>';
}
echo '</ul>';				  
			  
			  
			  
			  


			  
			  
			  
			  ?>
		<div class="row">

		<?php
		ini_set('display_errors', true);
		require_once( 'TwitterAPIExchange.php' );

		/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
		$settings = array(
			'oauth_access_token' => "724270258899562496-0KYsdmRTGyWzrZa28P4TXfE0wPxMlb1",
			'oauth_access_token_secret' => "2iY2JpkUeSigs8PxmH84MQg8xcoqYNhEmimEFOTP7FTur",
			'consumer_key' => "1fgLOFwMoLMsQRGBoQG1LtooG",
			'consumer_secret' => "eKM3qXGeVeEn19p90FT8sIZucT5FNPBIXwcMOI51JT1VwUD26D"
		);
			  
		$twitteruser = filter_input( INPUT_GET, 'search' ); //variable for the searh function
			
if(isset($ts)){
	$twitteruser = $ts;
}			
			
		
		$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
		$getfield = 'screen_name=' . $twitteruser . '&include_rts=false' . '&exclude_replies=true';
		$requestMethod = 'GET';

			
		// Perform the request
		$twitter = new TwitterAPIExchange($settings);
			  $timeline = $twitter->setGetfield($getfield)
    		  ->buildOauth($url, $requestMethod)
    		  ->performRequest();
 
		$tweetlist = json_decode( $timeline );
		
		//print_r($timeline);

		foreach ( $tweetlist as $tweet ) {
			$hashtagstring = '';
			if(is_array($tweet->entities->hashtags)){
				foreach($tweet->entities->hashtags as $htag){		
					$hashtagstring .= '#'.($htag->text).' ';
				}
			}
			?>

			<div class="searchUser card col-md-8 col-sm-12">
			<div class="card-body">
				<div class="row">
					<img class="rounded-circle" src="<?=$tweet->user->profile_image_url_https?>"></img>
					<h4 class="card-title col-6"><?=$tweet->user->name?></h4>
				</div>
				
				<p class="card-text">
					<?=$tweet->text?>
				</p>
				
				<p class="card-text"><?=$hashtagstring?></p>
				<p><?=$tweet->created_at?></p>
			</div>
		</div>	

		<?php } ?>
		
		<?php	  
		$hashtagSearch = filter_input( INPUT_GET, 'search' ); //variable for the searh function
		$url = 'https://api.twitter.com/1.1/search/tweets.json';
		$getfield = '?q=%23' . $hashtagSearch . '&result_type=recent';
		$requestMethod = 'GET';

		//$twitter = new TwitterAPIExchange($settings);
		$search_json = $twitter->setGetfield($getfield)
    		->buildOauth($url, $requestMethod)
    		->performRequest();
		
		$searchResult = (json_decode($search_json));
		
		//print_r(search_json);

		foreach ( $searchResult->statuses as $tweet ) {
			$hashtagstring = '';
			foreach($tweet->entities->hashtags as $htag){		
				$hashtagstring .= '#'.($htag->text).' ';
			}
			?>

		<div class="searchHashtag card col col-8">
			<div class="card-body">
				<div class="row">
					<img class="rounded-circle" src="<?=$tweet->user->profile_image_url_https?>"></img>
					<h4 class="card-title col-6"><?=$tweet->user->name?></h4>
				</div>
				
				<p class="card-text">
					<?=$tweet->text?>
				</p>
				
				<p class="card-text"><?=$hashtagstring?></p>
				<p><?=$tweet->created_at?></p>
			</div>
		</div>
		


		<?php } ?>	
		<?php
		$url = 'https://api.twitter.com/1.1/search/tweets.json';
		$getfield = '?q=%23dkpol';
		$requestMethod = 'GET';

//		$twitter = new TwitterAPIExchange($settings);
		$dkpol_json = $twitter->setGetfield($getfield)
    		->buildOauth($url, $requestMethod)
    		->performRequest();
		
		$dkpol = (json_decode($dkpol_json));
		
		//print_r($dkpol_json);

		foreach ( $dkpol->statuses as $tweet ) {
			$hashtagstring = '';
			foreach($tweet->entities->hashtags as $htag){		
				$hashtagstring .= '#'.($htag->text).' ';
			}
			?>
<hr>
	dkpol:
			<div class="showDKPOL card col-md-4 col-sm-12">
			<div class="card-body">
				<div class="row">
					<img class="rounded-circle" src="<?=$tweet->user->profile_image_url_https?>"></img>
					<h4 class="card-title col"><?=$tweet->user->name?></h4>
				</div>
				
				<p class="card-text">
					<?=$tweet->text?>
				</p>
				
				<p class="card-text"><?=$hashtagstring?></p>
				<p><?=$tweet->created_at?></p>
			</div>
		</div>	
		


		<?php } ?>		
		
</div>
		
	</div>
	<?php
		$url = 'http://oda.ft.dk/api/';
		$getfield = 'Akt%C3%B8r?$inlinecount=allpages&$filter=typeid%20eq%204';
		$requestMethod = 'GET';

		$data = file_get_contents($url . $getfield);
		$dataobj = json_decode($data);
		//print_r($dataobj);
			
		$partier = array();
		$partier = $dataobj->value;
		foreach ($partier as $parti) {
		   echo $parti->navn . ' ';
			echo $parti->gruppenavnkort . '<br>';
		}
		
		/*if (->periodeid="148") {
			echo $parti->navn; 
		}*/
		?>
	<!--Credit: https://codepen.io/matthewcain/pen/ZepbeR -->
	<a id="button"></a>
	<script src="javascript/scroll-to-top-button/button.js"></script>
</body>
</html>