<?php
//gets twitter verification file
require_once( 'TwitterAPIExchange.php' );

//decodes json
$json_string = 'json/data.json';
$jsondata = file_get_contents( $json_string );
$obj = json_decode( $jsondata, true );
$partier = $obj[ 'partier' ];

//searching for all members in a given party
if ( isset( $_GET[ 'party' ] ) ) {
	$selectedParty = $_GET[ 'party' ];
	$first = true;
	
	//$ts is the multi-user search.
	$ts = '';

	foreach ( $partier as $parti ) {
		if ( $selectedParty == $parti[ 'name' ] ) {
			foreach ( $parti[ 'member' ] as $member ) {
				if ( !$first ) {
					//the multi-user search syntax: from:larsloekke+OR+from:larsloekke
					$ts = $ts . ' OR ';
				}
				$ts = $ts . 'from:' . $member[ 'twitterhandle' ];
				$first = false;
			}
		}
	}
}



//everything under here is not used
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$TWITTER_SETTINGS = array(
	'oauth_access_token' => "724270258899562496-0KYsdmRTGyWzrZa28P4TXfE0wPxMlb1",
	'oauth_access_token_secret' => "2iY2JpkUeSigs8PxmH84MQg8xcoqYNhEmimEFOTP7FTur",
	'consumer_key' => "1fgLOFwMoLMsQRGBoQG1LtooG",
	'consumer_secret' => "eKM3qXGeVeEn19p90FT8sIZucT5FNPBIXwcMOI51JT1VwUD26D"
);

$TWITTER_URL_TIMELINE = 'https://api.twitter.com/1.1/statuses/user_timeline.json';

					  


function getTwitterTimeline($twitterid, $params = array() ){
	
	global $TWITTER_SETTINGS, $TWITTER_URL_TIMELINE;

	$requestMethod = 'GET';
	
	$params['screen_name'] = $twitterid;

	// Perform the request
	$twitter = new TwitterAPIExchange( $TWITTER_SETTINGS );
	$timeline = $twitter->setGetfield( http_build_query($params) )->buildOauth( $TWITTER_URL_TIMELINE, $requestMethod )->performRequest();

	$tweetlist = json_decode( $timeline );

	return $tweetlist;	
}


function getLatestTweet($twitterid){
	
	$params = array(
		'count'=>1,
		'exclude_replies'=>true,
		'include_rts'=>false
	);
	
	$tweetlist = getTwitterTimeline($twitterid, $params);
	return $tweetlist[0];	
}

			
