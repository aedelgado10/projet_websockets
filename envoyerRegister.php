<?php 
    include 'defaults.php';
    base_start();

	// On check si tout a été saisi correctement
	if(empty($_POST['ActiviteA']) || empty($_POST['ActiviteA'])){
       		header('Location: erreur.php?error=Vous n\'avez pas choisi une activité pour apprendre ou une activité a enseigner');
    }

    if(empty($_POST["nom"]) || empty($_POST["prenom"]) || empty($_POST["login"]) || empty($_POST["mdp"]) || empty($_POST["adresse"]) || empty($_POST["telephone"]) || empty($_POST["mail"])){
    		header('Location: erreur.php?error=Vous n\'avez pas saisi toutes les infos personnelles');
    }


    // On insère les infos de la personne dans la BDD
    $requete="INSERT INTO Personne (prenomP,nomP,login,mdp,adresseP,numeroTelP,mailP) VALUES ('$_POST[prenom]','$_POST[nom]','$_POST[login]','$_POST[mdp]','$_POST[adresse]','$_POST[telephone]','$_POST[mail]');";
   // echo "$requete";
	$res = exec_select($dbh,$requete);

    $query = "SELECT idPersonne FROM Personne WHERE nomP = '$_POST[nom]' and prenomP = '$_POST[prenom]';";

	    // exécution de la requête sql
	    $res = exec_select($dbh,$query); 
	    $resultats = [];
	    while ($data = $res[0]->fetch(PDO::FETCH_ASSOC)){
	            $resultats[] = $data;
	    }

	// Récuperation ID de la personne qu'on vient de créer
	$idp = $resultats[0]['idPersonne'];

	// Insertion de son choix d'activité a apprendre
	$typeActA = $_POST['ActiviteA'];
	$query = "SELECT idActivite FROM Activite WHERE nomA = '$_POST[ActiviteA]' and typeA = '$_POST[$typeActA]';";

	    // exécution de la requête sql
	    $res = exec_select($dbh,$query); 
	    $resultats = [];
	    while ($data = $res[0]->fetch(PDO::FETCH_ASSOC)){
	            $resultats[] = $data;
	    }
	$idAA = $resultats[0]['idActivite'];

	// Insertion de son choix d'activité a enseigner
	$typeActE = $_POST['ActiviteE'];
	$query = "SELECT idActivite FROM Activite WHERE nomA = '$_POST[ActiviteE]' and typeA = '$_POST[$typeActE]';";

	    // exécution de la requête sql
	    $res = exec_select($dbh,$query); 
	    $resultats = [];
	    while ($data = $res[0]->fetch(PDO::FETCH_ASSOC)){
	            $resultats[] = $data;
	    }
	$idAE = $resultats[0]['idActivite'];


	// envoi des infos concernant les activités au serveur

	$requete="INSERT INTO Interesser VALUES ('Apprendre', '$idAA', '$idp');
	          INSERT INTO Interesser VALUES ('Apprendre', '$idAE', '$idp');";
	$res = exec_select($dbh,$requete); 

	echo "<h3> Votre compte a été crée avec succès ! Vous pouvez désormais vous connecter.</h3>";

    base_end();
 ?>



