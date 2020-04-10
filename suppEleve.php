<?php
	try {
      $bdd = new PDO('mysql:host=localhost;dbname=gestion_etudiants;charset=utf8', 'projet', 'iutv');
    } catch (Exception $e) {
      die('Erreur lors de la connexion : ' . $e->getMessage());
    }

    $delete = $bdd->prepare('DELETE FROM ETUDIANT WHERE etu_id = :etu_id;');
	$delete->execute( array( ':etu_id' => $_GET['etu_id']));

	header('Location: etudiants.php');
?>
