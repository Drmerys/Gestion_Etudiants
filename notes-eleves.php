<?php
session_start();

  require_once("dbConnection.php");

  if (isset($_SESSION['id']))
  { 
    $requser = $bdd->prepare("SELECT *  FROM membres WHERE id = ? ");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Notes</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/sticky-footer-navbar.css">
	<link href="css/starter-template.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<?php
		require_once("header.php");
?>

<body>

	<h1 class="starter-template">Notes de l'élève</h1>

	<div class="col">
		<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#ajoutNote">
		  Ajouter une note
		</button>
	</div>
</body>
</html>

<!-- Modal ajout notes -->
<div class="modal fade" id="ajoutNote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      	<form method="POST" action="addNotes.php">
		  <div class="form-group">
		    <label>Matière</label>
		    <select class="form-control" name="not_matiere">
		    	<option>Mathématiques</option>
		    	<option>Développement web</option>
		    	<option>IHM Java</option>
		    	<option>Dév. app. mobiles</option>
		    	<option>Bases de données</option>
		    	<option>Algo. avancée</option>
		    	<option>Gestion</option>
		    	<option>Anglais</option>
		    	<option>Droit</option>
		    </select>
		  </div>
		  <div class="form-group">
		    <label>Note</label>
		    <input type="text" class="form-control" name="note" placeholder="15">
		  </div>
		  <div class="form-group">
		    <label>Date</label>
		    <input type="date" class="form-control" name="not_date">
		  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php

  }
  else
  {
    header("Location: index.php");
  }

?>