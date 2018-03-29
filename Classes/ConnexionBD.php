<?php
	$dsn = 'mysql:host=localhost;dbname=WebSockets';
	$username = 'root';
	$password = '';
	$options = array(
	    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	);

	$dbh = new PDO($dsn, $username, $password, $options);

	function exec_select($dbh,$req){

		if (!empty($req)){
			$stm = $dbh->prepare($req);
			$res = $stm->execute();

			return [$stm,$res];
		}

		return false;
	}
?>