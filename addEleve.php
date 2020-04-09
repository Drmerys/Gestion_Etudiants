<?php
  try {
    $bdd = new PDO('mysql:host=localhost;dbname=gestion_etudiants;charset=utf8', 'projet', 'iutv');
  } catch (Exception $e) {
    die('Erreur lors de la connexion : ' . $e->getMessage());
  }


  	$req = $bdd->prepare('INSERT INTO ETUDIANT(etu_nom, etu_prenom) VALUES(:etu_nom, :etu_prenom)');
  	$req->execute(array(
  		'etu_nom' => $_POST['etu_nom'],
  		'etu_prenom' => $_POST['etu_prenom']
  	));
  
  header('Location: notes.php');
 ?>