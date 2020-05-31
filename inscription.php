<?php
session_start();

  require_once("dbConnection.php");

  if (isset($_POST['pseudo'])) {
	// Hachage du mot de passe
	$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

	// Insertion
	$req = $bdd->prepare('INSERT INTO membres(pseudo, pass) VALUES(:pseudo, :pass)');
	  	$req->execute(array(
	  		'pseudo' => $_POST['pseudo'],
	  		'pass' => $pass_hache
	));
}

  if (isset($_SESSION['id']))
  { 
    $requser = $bdd->prepare("SELECT *  FROM membres WHERE id = ? ");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
  
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="starter-template.css" rel="stylesheet">
    <link href="sticky-footer-navbar.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="icon" type="image/png" sizes="96x96" href="images/favicon.png">
	<script src="https://kit.fontawesome.com/1750290906.js" crossorigin="anonymous"></script>
  </head>

<?php
	require('header.php');
?>

<body>

<h1 class="starter-template">Inscription</h1>

<div class="col">
		<div class="row">
			<div class="col-md-4">
  				<div class="card">
  				<div class="card-header">
            		<h5>Ajouter un membre</h5>
        		</div>
        		<div class="card-body">
        			<form method="POST">
               
		                <div class="form-group">
		                	<label class="required">Pseudo</label><input type="text" name="pseudo" required="required" class="form-control" placeholder="John Doe" />
		                </div>
		                <div class="form-group">
		                	<label class="required">Mot de passe</label><input type="password" name="pass" required="required" class="form-control" placeholder="azerty123" />
		                </div>
		                
		    			<button type="submit" class="btn btn-primary">Créer le membre</button>
					</form>
				</div>
    			</div>
    		</div>
		</div>
	</div>
</body>
</html>

<?php

	}
	else
	{
		header("Location: index.php");
	}

?>