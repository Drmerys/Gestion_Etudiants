<!DOCTYPE html>
<html>
<head>
	<title>Notes</title>
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

	    /*$reponse = $bdd->query('SELECT * FROM NOTES WHERE etu_id =' . $_GET['etu_id'] . ' ');*/
	    /*$reponse = 'SELECT * FROM ETUDIANT JOIN NOTES
	     ON ETUDIANT.etu_id = NOTES.not_id';*/

	     /*$reponse = $bdd->prepare('SELECT * FROM ETUDIANT, NOTES
	     WHERE ETUDIANT.etu_id = NOTES.not_id');
	     $reponse->execute();*/

       $reponse = $bdd->prepare('SELECT * FROM NOTES');
       $reponse->execute();

	    while ($donnees = $reponse->fetch())
	    { 
	       	/*$id = $donnees['etu_id'];
	      	$nom = $donnees['etu_nom'];
	      	$prenom = $donnees['etu_prenom'];
	     	  $section = $donnees['etu_section'];
	     	  $niveau = $donnees['etu_niveau_scolaire'];*/

	     	  $not_id = $donnees['not_id'];
  	 		  $not_matiere = $donnees['not_matiere'];
  	 		  $not_notes = $donnees['not_notes'];
  	 		  $not_date = $donnees['not_date'];
  	 		  //$not_moyenne = $donnees['not_moyenne'];
	    }
    ?>

    <h1 class="mt-5">Notes de l'élève</h1>

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
                  <th>Modules</th>
                  <td><?php echo $not_matiere; ?></td>
                </tr>
                <tr>
                  <th>Notes</th>
                  <td><?php echo $not_notes; ?></td>
                </tr>
                <!--<tr>
                  <th>Moyènne</th>
                  <td><?php echo $section; ?></td>
                </tr> -->
                <tr>
                  <th>Date</th>
                  <td><?php echo $not_date; ?></td>
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

    </div>
</main>


<div class="modal fade" id="modifyProfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une notes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form method="POST" action="modifyEleve.php">

          <?php 
          		$reqEleve = $bdd->prepare('SELECT * FROM ETUDIANT');
          		$reqEleve->execute();
          		$studentData = $reqEleve->fetchAll();
          ?>	

          <label>Nom</label>
          <div class="form-group">
	          <select>
		          <?php 
		          	  foreach ($studentData as 
		          	  	$eleveDonnee ) : ?>
		          <option value="<?php echo $eleveDonnee['etu_nom']; ?>"><?php echo $eleveDonnee['etu_nom']; ?>
		          </option>
		          <?php endforeach; ?>
	          </select>
          </div>

          <label>Prénom</label>
          <div class="form-group">
	          <select>
		          <?php 
		          	  foreach ($studentData as 
		          	  	$eleveDonnee ) : ?>
		          <option value="<?php echo $eleveDonnee['etu_prenom']; ?>"><?php echo $eleveDonnee['etu_prenom']; ?>
		          </option>
		          <?php endforeach; ?>
	          </select>
          </div>

          <label>Id de l'elève</label>
          <div class="form-group">
	          <select>
		          <?php 
		          	  foreach ($studentData as 
		          	  	$eleveDonnee ) : ?>
		          <option value="<?php echo $eleveDonnee['etu_id']; ?>"><?php echo $eleveDonnee['etu_id']; ?>
		          </option>
		          <?php endforeach; ?>
	          </select>
          </div>

          <label>Modules</label>
          <div class="form-group">
          <input type="text" class="form-control" name="not_matiere" value="<?php echo $not_matiere; ?>">
          </div>
          <label>Notes</label>
          <div class="form-group">
          <input type="text" class="form-control" name="not_notes" value="<?php echo $not_notes; ?>">
          </div>
          <label>Date</label>
          <div class="form-group">
          <input type="date" class="form-control" name="not_date" value="<?php echo $not_date; ?>">
          </div>
      	  </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary">Sauvegarder</button>
      	  </div>
        </form>
      </div>
    </div>
  </div>
</div>


</body>
</html>