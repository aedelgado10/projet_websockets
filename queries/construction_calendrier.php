<?php

	$recup_calend = "SELECT * FROM CALENDRIER";

	$res = exec_select($dbh,$recup_calend);
	$calendrier = array();

	if ($res[1]){
		while ($data = $res[0]->fetch(PDO::FETCH_ASSOC)){
			$calendrier[] = $data;
		}
	}
?>