<?php
session_start();

  require_once("dbConnection.php");

  if (isset($_SESSION['id']))
  { 
    $requser = $bdd->prepare("SELECT *  FROM membres WHERE id = ? ");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    header("location: accueil.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/signin.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>

<form class="form-signin" method="POST" action="verifyConnection.php">
  <center><img class="mb-4" src="images/student.svg" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">S'identifier</h1></center>
  <input type="text" id="pseudo" name="pseudo" class="form-control" placeholder="Prénom NOM" required autofocus>
  <input type="password" id="pass" name="pass" class="form-control" placeholder="Mot de passe" required>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Entrer</button>
  <center><p class="mt-5 mb-3 text-muted">&copy; ENT - Projet DUT Informatique AS - 2020</p></center>
</form>

</body>
</html>