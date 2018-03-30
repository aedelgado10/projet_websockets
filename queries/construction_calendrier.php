<?php

	$recup_calend = "SELECT * FROM CALENDRIER";

	$res = exec_select($dbh,$recup_calend);
	$calendrier = array();

	if ($res[1]){
		while ($data = $res[0]->fetch(PDO::FETCH_ASSOC)){
			$calendrier[] = $data;
		}
	}

	$dependant_meteo_a = "SELECT needMeteoA FROM activite as a, interesser as i, personne as p WHERE p.login = '$_COOKIE[session]' and p.idPersonne = i.idPersonne and i.idActivite = a.idActivite and i.typeInteret = 'Apprendre';";

	$dependant_meteo_e = "SELECT needMeteoA FROM activite as a, interesser as i, personne as p WHERE p.login = '$_COOKIE[session]' and p.idPersonne = i.idPersonne and i.idActivite = a.idActivite and i.typeInteret = 'Enseigner';";


	$res = exec_select($dbh,$dependant_meteo_a);
	$res_a = array();

	if ($res[1]){
		while ($data = $res[0]->fetch(PDO::FETCH_ASSOC)){
			$res_a = $data;
		}
	}

	$res = exec_select($dbh,$dependant_meteo_e);
	$res_e = array();

	if ($res[1]){
		while ($data = $res[0]->fetch(PDO::FETCH_ASSOC)){
			$res_e = $data;
		}
	}

	$dependant_meteo = intval($res_a["needMeteoA"]) || intval($res_e["needMeteoA"]);

?>