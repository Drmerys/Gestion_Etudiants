<?php
require_once('dbConnection.php');

	$idEleve = $bdd->prepare('SELECT etu_id FROM ETUDIANT');
	$idEleve->execute();
	$idData = $idEleve->fetchAll();

	if ($POST['etu_id'] === $idData['etu_id']) {

		$req = $bdd->prepare('INSERT INTO NOTES( 	not_matiere, not_notes , not_date ) VALUES(:not_matiere, :not_notes, :not_date)');
  		$req->execute(array(
  		'not_matiere' => $_POST['not_matiere'],
  		'not_notes' => $_POST['not_notes'],
  		'not_date' => $_POST['not_date']
  	));
	}
  
  header("location:".  $_SERVER['HTTP_REFERER']);
 ?>