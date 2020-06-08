<?php

	require_once("dbConnection.php");

  	$req = $bdd->prepare('INSERT INTO NOTES(not_matiere, not_notes, not_date, not_id_etu) VALUES(:not_matiere, :not_notes, :not_date, :not_id_etu)');
  	$req->execute(array(
  		'not_matiere' => $_POST['not_matiere'],
  		'not_notes' => $_POST['not_notes'],
  		'not_date' => $_POST['not_date'],
  		'not_id_etu' => $_GET['id']
  	));
  
  header("location:".  $_SERVER['HTTP_REFERER']);

?>