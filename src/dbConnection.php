<?php
  try {
    $bdd = new PDO('mysql:host=localhost;dbname=gestion_etudiants;charset=utf8', 'projet', 'iutv');
  } catch (Exception $e) {
    die('Erreur lors de la connexion : ' . $e->getMessage());
  }
?>