<?php
require_once('dbConnection.php');

  	$req = $bdd->prepare('INSERT INTO ETUDIANT(etu_nom, etu_prenom, etu_section) VALUES(:etu_nom, :etu_prenom, :etu_section)');
  	$req->execute(array(
  		'etu_nom' => $_POST['etu_nom'],
  		'etu_prenom' => $_POST['etu_prenom'],
  		'etu_section' => $_POST['etu_section']
  	));
  
  header('Location: etudiants.php');
 ?>