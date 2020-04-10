<?php
require_once('dbConnection.php');

  	$req = $bdd->prepare('UPDATE ETUDIANT SET etu_nom = :etu_nom, etu_prenom = :etu_prenom, etu_section = :etu_section, etu_naissance = :etu_naissance, etu_telephone = :etu_telephone');
  	$req->execute(array(
  		'etu_nom' => $_POST['etu_nom'],
  		'etu_prenom' => $_POST['etu_prenom'],
  		'etu_section' => $_POST['etu_section'],
  		'etu_naissance' => $_POST['etu_naissance'],
  		'etu_telephone' => $_POST['etu_telephone']
  	));

  	$id = 9;
  
  header('Location: eleve.php?etu_id=' . $_POST['etu_id']);
 ?>