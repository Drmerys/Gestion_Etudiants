<?php
  try {
    $bdd = new PDO('mysql:host=localhost;port=3308;dbname=gestion_etudiants;charset=utf8', 'root', '');
  } catch (Exception $e) {
    die('Erreur lors de la connexion : ' . $e->getMessage());
  }
?>