<?php
require_once('dbConnection.php');

  	$req = $bdd->prepare('UPDATE ETUDIANT SET etu_nom = :etu_nom, etu_prenom = :etu_prenom, etu_section = :etu_section, etu_naissance = :etu_naissance, etu_telephone = :etu_telephone WHERE etu_id = "' . $_GET['etu_id'] . '" ');
  	$req->execute(array(
  		'etu_nom' => $_GET['etu_nom'],
  		'etu_prenom' => $_GET['etu_prenom'],
  		'etu_section' => $_GET['etu_section'],
  		'etu_naissance' => $_GET['etu_naissance'],
  		'etu_telephone' => $_GET['etu_telephone']
  	));
  header('Location: eleve.php?etu_id=' . $_GET['etu_id']);
 ?>