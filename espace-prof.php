<?php
session_start();

  require_once("dbConnection.php");

  if (isset($_SESSION['id']))
  { 
    $requser = $bdd->prepare("SELECT *  FROM membres WHERE id = ? ");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Espace professeurs</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/sticky-footer-navbar.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
<!-- -->

<?php
require "header.php";
?>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Liste des professeurs</h1>
  </div>

  <div class="container">

    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Nom</th>
          <th scope="col">Prénom</th>
          <th scope="col">Contact</th>
        </tr>
      </thead>
      <?php

        try {
          $bdd = new PDO('mysql:host=localhost;dbname=gestion_etudiants;charset=utf8', 'projet', 'iutv');
        } catch (Exception $e) {
          die('Erreur lors de la connexion : ' . $e->getMessage());
        }

        $reponse = $bdd->query('SELECT * FROM ENSEIGNANT ORDER BY ens_nom');
        while ($donnees = $reponse->fetch()) {
      
      ?>

      <tbody>
        <tr>
          <td><?php echo strtoupper($donnees['ens_nom']) ?></td>
          <td><?php echo $donnees['ens_prenom'] ?></td>
          <td><?php echo $donnees['ens_mail'] ?></td>
        </tr>

      <?php
  }
  $reponse->closeCursor();
  ?>
      </tbody>
    </table>

  </div>

</main>
</body>
</html>

<?php

  }
  else
  {
    header("Location: index.php");
  }

?>