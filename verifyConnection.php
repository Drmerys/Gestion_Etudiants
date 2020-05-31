<?php 

require_once("dbConnection.php");

//  Récupération de l'utilisateur et de son pass hashé
$req = $bdd->prepare('SELECT id, pass FROM membres WHERE pseudo = :pseudo');
$req->execute(array(
    'pseudo' => $_POST['pseudo']));
$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

if (!$resultat)
{
    echo "t'es sur t'as un compte bouffon ?";
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $_POST['pseudo'];
        header('location: accueil.php');
    }
    else {
        echo "tu connais pas ton mot de passe bouffon ?";
        //header('location: index.php');
    }
}