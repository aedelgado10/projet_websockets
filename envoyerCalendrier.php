<?php 
    include 'defaults.php';
    base_start();

    // On check si tout a été saisi correctement
	if(empty($_POST['calendrier'])){
       	header('Location: erreur.php?error=Erreur lors du renseignement d\'un créneau de disponibilité');
	}

	echo "$_POST[calendrier]";
    

    // Recuperation ID personne
    $query = "SELECT idPersonne FROM Personne WHERE login = '$_COOKIE[session]'";

	$res = exec_select($dbh,$query); 
	$resultats = [];
	while ($data = $res[0]->fetch(PDO::FETCH_ASSOC)){
		$resultats[] = $data;
	}
	$idp = $resultats[0]['idPersonne'];

    $query = "INSERT INTO Etre_Disponible VALUES ($_POST[calendrier],$idp);";
	$res = exec_select($dbh,$query); 

	header('Location: index_test.php');
		   		
    base_end();
 ?>