<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="parti_test.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<!--Firebase link-->
<script src="https://www.gstatic.com/firebasejs/5.5.8/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyDu_TyOQ62U1bp1GyYxBF5ETwO9J88CV9U",
    authDomain: "politik-e11ef.firebaseapp.com",
    databaseURL: "https://politik-e11ef.firebaseio.com",
    projectId: "politik-e11ef",
    storageBucket: "politik-e11ef.appspot.com",
    messagingSenderId: "731087311340"
  };
  firebase.initializeApp(config);
var database = firebase.database();
	
	database.ref('partier/alternativet/0/member/').once('value', function(snapshot) {
		snapshot.forEach(function (childSnap) {
			let altTitle = childSnap.child('title').val();
			let altTwitter = childSnap.child('twitterhandle').val();
			let altPicture = childSnap.child('picture').val();
			console.log(childSnap);
			document.getElementById('result').innerHTML += '<hr><img class="float-left mr-2" src="' + altPicture + '">' + '</div>' + '<div>' + altTitle + ' (ALT)' + '<br>' + '<a href="https://twitter.com/' + altTwitter + '" target="_black">' + altTwitter + '</a>' + '</br><br><br><hr>' ;
		});
	});
	database.ref('partier/danskfolkeparti/0/member/').once('value', function(snapshot) {
		snapshot.forEach(function (childSnap) {
			let dfTitle = childSnap.child('title').val();
			let dfTwitter = childSnap.child('twitterhandle').val();
			let dfPicture = childSnap.child('picture').val();
			//console.log(snapshot);
			document.getElementById('result').innerHTML += '<hr><img class="float-left mr-2" src="' + dfPicture + '">' + '</div>' + '<div>' + dfTitle + ' (DF)' + '<br>' + '<a href="https://twitter.com/' + dfTwitter + '" target="_black">' + dfTwitter + '</a>' + '</br><br><br><hr>' ;
		});
	});
	database.ref('partier/enhedslisten/0/member/').once('value', function(snapshot) {
		snapshot.forEach(function (childSnap) {
			let elTitle = childSnap.child('title').val();
			let elTwitter = childSnap.child('twitterhandle').val();
			let elPicture = childSnap.child('picture').val();
			//console.log(snapshot);
			document.getElementById('result').innerHTML += '<hr><img class="float-left mr-2" src="' + elPicture + '">' + '</div>' + '<div>' + elTitle + ' (EL)' + '<br>' + '<a href="https://twitter.com/' + elTwitter + '" target="_black">' + elTwitter + '</a>' + '</br><br><br><hr>' ;
		});
	});
	database.ref('partier/konservative/0/member/').once('value', function(snapshot) {
		snapshot.forEach(function (childSnap) {
			let kfTitle = childSnap.child('title').val();
			let kfTwitter = childSnap.child('twitterhandle').val();
			let kfPicture = childSnap.child('picture').val();
			//console.log(snapshot);
			document.getElementById('result').innerHTML += '<hr><img class="float-left mr-2" src="' + kfPicture + '">' + '</div>' + '<div>' + kfTitle + ' (KF)' + '<br>' + '<a href="https://twitter.com/' + kfTwitter + '" target="_black">' + kfTwitter + '</a>' + '</br><br><br><hr>' ;
		});
	});
	database.ref('partier/liberalalliance/0/member/').once('value', function(snapshot) {
		snapshot.forEach(function (childSnap) {
			let laTitle = childSnap.child('title').val();
			let laTwitter = childSnap.child('twitterhandle').val();
			let laPicture = childSnap.child('picture').val();
			//console.log(snapshot);
			document.getElementById('result').innerHTML += '<hr><img class="float-left mr-2" src="' + laPicture + '">' + '</div>' + '<div>' + laTitle + ' (LA)' + '<br>' + '<a href="https://twitter.com/' + laTwitter + '" target="_black">' + laTwitter + '</a>' + '</br><br><br><hr>' ;
		});
	});
	database.ref('partier/radikalevenstre/0/member/').once('value', function(snapshot) {
		snapshot.forEach(function (childSnap) {
			let rvTitle = childSnap.child('title').val();
			let rvTwitter = childSnap.child('twitterhandle').val();
			let rvPicture = childSnap.child('picture').val();
			//console.log(snapshot);
			document.getElementById('result').innerHTML += '<hr><img class="float-left mr-2" src="' + rvPicture + '">' + '</div>' + '<div>' + rvTitle + ' (RV)' + '<br>' + '<a href="https://twitter.com/' + rvTwitter + '" target="_black">' + rvTwitter + '</a>' + '</br><br><br><hr>' ;
		});
	});
	database.ref('partier/socialdemokratiet/0/member/').once('value', function(snapshot) {
		snapshot.forEach(function (childSnap) {
			let sTitle = childSnap.child('title').val();
			let sTwitter = childSnap.child('twitterhandle').val();
			let sPicture = childSnap.child('picture').val();
			//console.log(snapshot);
			document.getElementById('result').innerHTML += '<hr><img class="float-left mr-2" src="' + sPicture + '">' + '</div>' + '<div>' + sTitle + ' (S)' + '<br>' + '<a href="https://twitter.com/' + sTwitter + '" target="_black">' + sTwitter + '</a>' + '</br><br><br><hr>' ;
		});
	});
	database.ref('partier/socialistiskfolkeparti/0/member/').once('value', function(snapshot) {
		snapshot.forEach(function (childSnap) {
			let sfTitle = childSnap.child('title').val();
			let sfTwitter = childSnap.child('twitterhandle').val();
			let sfPicture = childSnap.child('picture').val();
			//console.log(snapshot);
			document.getElementById('result').innerHTML += '<hr><img class="float-left mr-2" src="' + sfPicture + '">' + '</div>' + '<div>' + sfTitle + ' (SF)' + '<br>' + '<a href="https://twitter.com/' + altTwitter + '" target="_black">' + altTwitter + '</a>' + '</br><br><br><hr>' ;
		});
	});
	database.ref('partier/venstre/0/member/').once('value', function(snapshot) {
		snapshot.forEach(function (childSnap) {
			let vTitle = childSnap.child('title').val();
			let vTwitter = childSnap.child('twitterhandle').val();
			let vPicture = childSnap.child('picture').val();
			//console.log(snapshot);
			document.getElementById('result').innerHTML += '<hr><img class="float-left mr-2" src="' + vPicture + '">' + '</div>' + '<div>' + vTitle + ' (V)' + '<br>' + '<a href="https://twitter.com/' + altTwitter + '" target="_black">' + altTwitter + '</a>' + '</br><br><br><hr>' ;
		});
	});
	/*$( document ).ready( function () {

			function init( arr ) {
				var title = '';
				if ( arr.length == 0 ) {
					$.each( jsn, function ( key, value ) {
						title += '<div class="border">' + '<img class="float-left" src="' + jsn[ key ].picture + '">' + '<br>' +
							'<h3>' + jsn[ key ].title + '</h3>' +
							'<p>' + jsn[ key ].twitterhandle + '<p>' + '</div>';
					} );
				} else {
					$( arr ).each( function ( i, v ) {
						$.each( jsn, function ( key, value ) {
							if ( jsn[ key ][ v ] == "true" )
								title += '<div class="border">' + '<img class="float-left" src="' + jsn[ key ].picture + '">' + '<br>' +
								'<h3>' + jsn[ key ].title + '</h3>' +
								'<p>' + jsn[ key ].twitterhandle + '<p>' + '</div>';
						} );

					} );

				}

				$( '#container' ).html( title );
			}

			var CheckArr = new Array();
			init( CheckArr );

			$( '#btnFilter' ).click( function () {
				var CheckArr = new Array();
				$( 'input[type=checkbox]' ).each( function () {
					if ( $( this ).is( ':checked' ) ) {
						CheckArr.push( $( this ).attr( 'value' ) )
					}
				} );
				init( CheckArr );
			} )
		} );*/
	</script>
</head>

<body>
	
	<div class="container">
		<label><input type="checkbox" value="socialdemokratiet">Socialdemokratiet</label>
		<label><input type="checkbox" value="dansk folkeparti">Dansk Folkeparti</label>
		<label><input type="checkbox" value="venstre">Venstre</label>
		<label><input type="checkbox" value="enhedslisten">Enhedslisten</label>
		<label><input type="checkbox" value="liberal alliance">Liberal Alliance</label>
		<label><input type="checkbox" value="alternativet">Alternativet</label>
		<label><input type="checkbox" value="radikale venstre">Radikale Venstre</label>
		<label><input type="checkbox" value="socialistisk folkeparti">Socialistisk Folkeparti</label>
		<label><input type="checkbox" value="det konservative folkeparti">Det Konservative Folkeparti</label>
		<label><input type="button" id="btnFilter" value="Filter">
	
		</div>
		<div class="container">
			<div id="result"></div>
		</div>
</body>
</html>