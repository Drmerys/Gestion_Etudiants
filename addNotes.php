<?php
require_once('dbConnection.php');

	$idEleve = $bdd->prepare('SELECT etu_id FROM ETUDIANT');
	$idEleve->execute();
	$idData = $idEleve->fetch();

	if( isset($_GET['idElv']){

		function validDateFormat($date, $format = 'Y-m-d') {
    		$date = DateTime::createFromFormat($format, $date);
    		if ($date === false) {
        		return false;
    		}

    		return true;
		}

		$userDate = $_POST['not_date'];
		$dateFunc = validDateFormat($userDate);

		$idEl = $_GET['idElv'];
		//$date = date("Y-m-d", strtotime($date));

		if ($idEl === $idData['etu_id']) {

		$req = $bdd->prepare('INSERT INTO NOTES(not_matiere, not_notes , not_date ) VALUES(:not_matiere, :not_notes, :not_date)');
  		$req->execute(array(
  		'not_matiere' => $_POST['not_matiere'],
  		'not_notes' => $_POST['not_notes'],
  		'not_date' => $dateFunc; 
  			));
		}
		else{
			echo "Id différent !";
		}
	}
	else{
		echo "Id innexistant";
	}
  
  	header('Location: notes-eleves.php');
 ?>