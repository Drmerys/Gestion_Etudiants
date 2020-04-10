<!DOCTYPE html>
<html>
<head>
	<title>Profil élève</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/sticky-footer-navbar.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>

</body>
</html>

<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="index.php">USPN</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Notes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="etudiants.php">Élèves</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Calendrier</a>
        </li>
      </ul>

<ul class="nav justify-content-end">
  <li class="nav-item">
    <div class="btn-group" role="group">
      <button id="btnGroupDrop1" type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">NOM Prénom
      </button>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
        <a class="dropdown-item" href="#">Profil</a>
        <a class="dropdown-item" href="#">Déconnexion</a>
      </div>
    </div>
  </li>
  
</ul>

    </div>
  </nav>
</header>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">

    <?php

    try {
      $bdd = new PDO('mysql:host=localhost;dbname=gestion_etudiants;charset=utf8', 'projet', 'iutv');
    } catch (Exception $e) {
      die('Erreur lors de la connexion : ' . $e->getMessage());
    }

    $reponse = $bdd->query('SELECT * FROM ETUDIANT WHERE etu_id =' . $_GET['etu_id'] . ' ');

    while ($donnees = $reponse->fetch())
    { 
      $id = $donnees['etu_id'];
      $nom = $donnees['etu_nom'];
      $prenom = $donnees['etu_prenom'];
      $section = $donnees['etu_section'];
      $naissance = $donnees['etu_naissance'];
      $telephone = $donnees['etu_telephone'];
    ?> 
    <?php 
    } 
    ?>

    <h1 class="mt-5">Profil de l'élève</h1>

  </div>

  <div class="container">
    <div class="row col-sm-5">
      <div class="card">
        <h5 class="card-header">Informations</h5>
            <table class="table">
              <tr>
                <th>Prénom</th>
                <td><?php echo $prenom ?></td>
              </tr>
              <tr>
                <th>Nom</th>
                <td><?php echo $nom ?></td>
              </tr>
              <tr>
                <th>Section</th>
                <td><?php echo $section ?></td>
              </tr>
              <tr>
                <th>Date de naissance</th>
                <td><?php echo $naissance ?></td>
              </tr>
              <tr>
                <th>Numéro de téléphone</th>
                <td><?php echo $telephone ?></td>
              </tr>
            </table>

            <div class="card-footer">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modifyProfil">
                Modifier les informations
              </button>
            </div>      
      </div>
    </div>
  </div>
</main>




<footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted">ENT - Projet DUT Informatique AS - 2020</span>
  </div>
</footer>

<div class="modal fade" id="modifyProfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier l'élève</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form method="get" action="modifyEleve.php">
          <label>Identifiant</label>
          <div class="form-group">
          <input type="text" class="form-control" name="etu_id" value="<?php echo $id; ?>">
          </div>
          <label>Nom</label>
          <div class="form-group">
          <input type="text" class="form-control" name="etu_nom" value="<?php echo $nom; ?>">
          </div>
          <label>Prénom</label>
          <div class="form-group">
          <input type="text" class="form-control" name="etu_prenom" value="<?php echo $prenom; ?>">
          </div>
          <label>Section</label>
          <div class="form-group">
          <input type="text" class="form-control" name="etu_section" value="<?php echo $section; ?>">
          </div>
          <label>Date de naissance</label>
          <div class="form-group">
          <input type="date" class="form-control" name="etu_naissance" value="<?php echo $naissance; ?>">
          </div>
          <label>Téléphone</label>
          <div class="form-group">
          <input type="int" class="form-control" name="etu_telephone" value="<?php echo $telephone; ?>">
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