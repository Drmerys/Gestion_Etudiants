<!DOCTYPE html>
<html>
<head>
  <title>Liste des étudiants</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/sticky-footer-navbar.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/searchEleve.js"></script>
</head>
<body>
<!-- -->

<?php
require "header.php";
?>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">

    <h1 class="mt-5">Liste des étudiants</h1>

  </div>

  <div class="container">

    <div class="row">

    <div class="col-sm-4">
    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addEleve">Ajouter un nouvel élève</button>
    </div>

    <div class="col-sm-8">
    <div class="input-group">
    <input id="inputSearchEleves" class="form-control" type="search" placeholder="Rechercher un étudiant" aria-label="Search">
    <div class="input-group-append">
    <div class="input-group-text"><img src="images/search.svg"></div>
    </div>
    </div>
    </div>

    </div>

  </div>

  <div class="container">

    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Section</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>

  <?php

    try {
      $bdd = new PDO('mysql:host=localhost;dbname=gestion_etudiants;charset=utf8', 'projet', 'iutv');
    } catch (Exception $e) {
      die('Erreur lors de la connexion : ' . $e->getMessage());
    }

    $reponse = $bdd->query('SELECT * FROM ETUDIANT');
    while ($donnees = $reponse->fetch()) {
  
  ?>

  <tbody>
    <tr class="donneesEleves">
      <td><?php echo $donnees['etu_nom'] ?></td>
      <td><?php echo $donnees['etu_prenom'] ?></td>
      <td><?php echo $donnees['etu_section'] ?></td>
      <td><a href="suppEleve.php?etu_id=<?php echo $donnees['etu_id'];?>"><img src="images/x-circle.svg"></a>    <a href="eleve.php?etu_id=<?php echo $donnees['etu_id'];?>"><img src="images/eye.svg"></a></td>
    </tr>

  <?php
  }
  $reponse->closeCursor();
  ?>
  </tbody>
</table>
</div>
    
</main>

<div class="modal fade" id="addEleve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouvel élève</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form method="post" action="addEleve.php">
          <label>Nom</label>
          <div class="form-group">
          <input type="text" class="form-control" name="etu_nom">
          </div>
          <label>Prénom</label>
          <div class="form-group">
          <input type="text" class="form-control" name="etu_prenom">
          </div>
          <label>Section</label>
          <div class="form-group">
          <input type="text" class="form-control" name="etu_section">
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
require "footer.php";
?>

</body>
</html>