<?php 
    include 'defaults.php';
    base_start();
 ?>

 	<!-- DÉBUT DU CONTENU DE LA PAGE-->
 	<?php  
 		isset($_COOKIE["session"]) ? $logged = true : $logged = false;

 		if(!$logged){
 			include_once './views/not_logged.phtml';
 		}
 		else{
 			echo "<div class=\"indexcontent\">";
 			echo "<br>";

 			// Recherche des Activités liées à la personne 
 			echo "<h4> Voici l'activité que vous souhaitez apprendre </h4>";

 			$query = "SELECT nomA, typeA
					  FROM activite as a, interesser as i, personne as p
                      WHERE a.idactivite = i.idActivite and i.idPersonne = p.idPersonne and i.typeInteret = 'Apprendre' and p.login = '$_COOKIE[session]';";

		    // exécution de la requête sql
		    $res = exec_select($dbh,$query); 
		    $resultats = array();
		    while ($data = $res[0]->fetch(PDO::FETCH_ASSOC)){
		            $resultats[] = $data;
		    }

		    $act=$resultats[0]['nomA'];
		    $typ=$resultats[0]['typeA'];

		    echo "<p class=\"btn btn-danger\"> $act, $typ </p>";


 			echo "<h4> Voici l'activité dont vous êtes disponible pour enseigner</h4>";
 			$query = "SELECT nomA, typeA
					  FROM activite as a, interesser as i, personne as p
                      WHERE a.idactivite = i.idActivite and i.idPersonne = p.idPersonne and i.typeInteret = 'Enseigner' and p.login = '$_COOKIE[session]';";

		    // exécution de la requête sql
		    $res = exec_select($dbh,$query); 
		    $resultats = array();
		    while ($data = $res[0]->fetch(PDO::FETCH_ASSOC)){
		            $resultats[] = $data;
		    }
		    $act=$resultats[0]['nomA'];
		    $typ=$resultats[0]['typeA'];

		    echo "<p class=\"btn btn-success\"> $act, $typ </p> <br><br>";
		    echo "<h5>Vous devez choisir votre créneau (durée 2h) de disponibilité pour matcher avec quelqu'un</h5>";

		    echo "<h7> Le service est actuellement: <span id=\"status_ws\"></span></h7>";
		    echo "<p id='more_info'> </p>";

		    include './views/script_websocket.phtml';
		    include './views/affiche_dispo.phtml';

		}

/*
		    // Recherche des créneaux de disponibilité
		    $query = "SELECT p.idPersonne
					  FROM Personne as p, Etre_Disponible as e
                      WHERE p.idPersonne = e.idPersonne and p.login = '$_COOKIE[session]';";

		    // exécution de la requête sql
		    $res = exec_select($dbh,$query); 
		    $resultats = array();
		    while ($data = $res[0]->fetch(PDO::FETCH_ASSOC)){
		            $resultats[] = $data;
		    }

		    if(!isset($resultats[0]['idPersonne'])){
		    	echo "<h4> Vous devez choisir votre créneau (durée 2h) de disponibilité pour matcher avec quelqu'un </h4>";

		    	echo "<form method=\"post\" class=\"signup\" action=\"envoyerCalendrier.php\">";

    		  	$query = "SELECT idCalendrier,dateC, heureC FROM Calendrier";

		  		$res = exec_select($dbh,$query); 
		   		$resultats = array();
		   		while ($data = $res[0]->fetch(PDO::FETCH_ASSOC)){
		        	$resultats[] = $data;
		    	}

		    	// Domaine
		    	echo "<select name=\"calendrier\">";
		    	foreach ($resultats as $key => $value) {
		    		    $idc = $resultats[$key]['idCalendrier'];
		    		    $jour = $resultats[$key]['dateC'];
		    		    $heure = $resultats[$key]['heureC'];
						echo "<option value=\"$idc\"> $jour | $heure </option>";
		    	}
		    	echo "</select> <br>";
		    	echo "<input class=\"btn btn-primary\" type=\"submit\" value=\"Choisir\">";

		    }else{
		    	// Calenderier déjà choisi
		    	$query = "SELECT c.dateC, c.heureC FROM Calendrier as c, Personne as p, Etre_Disponible as e WHERE p.login = '$_COOKIE[session]' and p.idPersonne = e.idPersonne and e.idCalendrier = c.idCalendrier";

				$res = exec_select($dbh,$query); 
				$resultats = array();
				while ($data = $res[0]->fetch(PDO::FETCH_ASSOC)){
					$resultats[] = $data;
				}
				$date = $resultats[0]['dateC'];
				$heure = $resultats[0]['heureC'];

		    	echo "<h4> Vous avez déjà séléctionné votre date de disponibilité</h4>";

		    	echo "<p class=\"btn btn-info\"> $date | $heure </p> <br><br>";

		    }*/



 			echo "</div>";
 	?>

<?php 
    base_end();
 ?>