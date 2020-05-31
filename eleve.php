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

<?php
require_once("header.php");
?>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">

    <?php

    require_once("dbConnection.php");

    $reponse = $bdd->query('SELECT * FROM ETUDIANT WHERE etu_id =' . $_GET['etu_id'] . ' ');

    while ($donnees = $reponse->fetch())
    { 
      $id = $donnees['etu_id'];
      $nom = $donnees['etu_nom'];
      $prenom = $donnees['etu_prenom'];
      $section = $donnees['etu_section'];
      $naissance = $donnees['etu_naissance'];
      $telephone = $donnees['etu_telephone'];
      $nomresp = $donnees['etu_nom_responsable'];
      $prenomresp = $donnees['etu_prenom_responsable'];
      $niveau = $donnees['etu_niveau_scolaire'];
    }
    ?>

    <h1 class="mt-5">Profil de l'élève</h1>

  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <h5 class="card-header">Informations</h5>
              <table class="table">
                <tr class="d-none">
                  <th>ID</th>
                  <td><?php echo $id; ?></td>
                </tr>
                <tr>
                  <th>Prénom</th>
                  <td><?php echo $prenom; ?></td>
                </tr>
                <tr>
                  <th>Nom</th>
                  <td><?php echo $nom; ?></td>
                </tr>
                <tr>
                  <th>Section</th>
                  <td><?php echo $section; ?></td>
                </tr>
                <tr>
                  <th>Date de naissance</th>
                  <td><?php echo $naissance; ?></td>
                </tr>
                <tr>
                  <th>Numéro de téléphone</th>
                  <td><?php echo $telephone; ?></td>
                </tr>
              </table>

              <div class="card-footer">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modifyProfil">
                  Modifier les informations
                </button>
              </div>      
        </div>
      </div>

      <div class="col-md-6">
        <div class="card">
        <h5 class="card-header">Scolarité</h5>
            <table class="table">
              <tr class="d-none">
                <th>ID</th>
                <td><?php echo $id; ?></td>
              </tr>
              <tr>
                <th>Responsable</th>
                <td><?php echo "<b>" . $nomresp . "</b> " . $prenomresp; ?></td>
              </tr>
              <tr>
                <th>Niveau scolaire</th>
                <td><?php echo $niveau; ?></td>
              </tr>
            </table>

      </div>
          </div>
          </div>
          </div>
</main>

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
          <div class="form-group d-none">
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

</body>
</html>