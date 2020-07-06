<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href="styles_1.css" rel="stylesheet" type="text/css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>

<body>
	<div class="container-fluid">
		
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<img src="images/favicon-2.png" alt="politikertweets" width="30">
  <a class="navbar-brand ml-2" href="#">Politiker Tweets</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav">
		<li class="nav-item dropdown justify-content-center">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Filtrer efter partierne
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Dansk Folkeparti</a>
          <a class="dropdown-item" href="#">Venstre</a>
          <a class="dropdown-item" href="#">Enhedslisten</a>
        </div>
      </li>
      
			<form class="form-inline my-2 my-lg-0 rounded-0 d-inline" action="<?=$_SERVER['PHP_SELF']?>" method="get">
        <input class="form-control col-8 rounded-0 d-inline ml-3" type="search" placeholder="Søg efter en politiker" aria-label="Search">
        
        <button class="form-control rounded-0 col-3 d-inline" type="submit">SØG</button>
      </form>
      
    </ul>
  </div>
</nav>
	</div>
<div class="container">
  <div class="row mb-3">
          <div class="col">
            <h1 class="text-center">Politiker tweets</h1>
            <p class="text-center">Her kan du finde tweets af danske politikere</p>
          </div>
	</div>
    <div class="card-deck pb-4 justify-content-md-center">
              <div class="card">
                <div class="card-body">
                  <img src="images/lars.jpg" width="50" class="float-left mr-2 rounded-circle">
                  <h6 class="card-title">Lars Løkke Rasmussen<br>
                    <a href="https://twitter.com/larsloekke" class="font-weight-light" target="_blank">@larsloekke</a>
                    <small class="text-muted">12/12-2018, 12:23</small>
                  </h6>
                  <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus fuga saepe sed sint magni."</p>
                  <img src="images/like.png"  alt="likes"><p class="d-inline ml-2">117</p>
                  <p class="float-right">Kommentarer</p>
                </div>
        </div>
              <div class="card">
                <div class="card-body">
                  <img src="images/pernille.jpg" width="50" class="float-left mr-2 rounded-circle">
                  <h6 class="card-title">Pernille Bendixen<br>
                    <a href="https://twitter.com/BendixenPebe" class="font-weight-light" target="_blank">@bendixenpebe</a>
                    <small class="text-muted">12/12-2018, 12:23</small>
                  </h6>
                  <p class="card-text">"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus fuga saepe sed sint magni."</p>
                  <img src="images/like.png"  alt="likes"><p class="d-inline ml-2">17</p>
                  <p class="float-right">Kommentarer</p>
                </div>
              </div>
    </div>
	<div class="card-deck pb-4 justify-content-md-center">
              <div class="card">
                <div class="card-body">
                  <img src="images/anders.jpg" width="50" class="float-left mr-2 rounded-circle">
                  <h6 class="card-title">Andes Fogh Rasmussen<br>
                    <a href="https://twitter.com/AndersFoghR" class="font-weight-light" target="_blank">@AndersFoghR</a>
                    <small class="text-muted">12/12-2018, 12:23</small>
                  </h6>
                  <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus fuga saepe sed sint magni."</p>
                  <img src="images/like.png"  alt="likes"><p class="d-inline ml-2">1</p>
                  <p class="float-right">Kommentarer</p>
                </div>
        </div>
              <div class="card">
                <div class="card-body">
                  <img src="images/lise.jpg" width="50" class="float-left mr-2 rounded-circle">
                  <h6 class="card-title">Lise Bech<br>
                    <a href="https://twitter.com/lisebech" class="font-weight-light" target="_blank">@lisebech</a>
                    <small class="text-muted">12/12-2018, 12:23</small>
                  </h6>
                  <p class="card-text">"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus fuga saepe sed sint magni."</p>
                  <img src="images/like.png"  alt="likes"><p class="d-inline ml-2">17</p>
                  <p class="float-right">Kommentarer</p>
                </div>
              </div>
    </div>
  </div>
        

</body>
</html>