<?php
require_once('dbConnection.php');

  	$req = $bdd->prepare('INSERT INTO ETUDIANT(etu_nom, etu_prenom) VALUES(:etu_nom, :etu_prenom)');
  	$req->execute(array(
  		'etu_nom' => $_POST['etu_nom'],
  		'etu_prenom' => $_POST['etu_prenom']
  	));
  
  header('Location: notes.php');
 ?>