<?php
	class ConnexionBD extends PDO{

		public function __construct($usr,$mdp,$addr_host,$nom_bd){
			$this->dsn = "mysql:host=$addr_host;dbname=$nom_bd;";
			parent::__construct($this->dsn,$usr,$mdp);
		}

		
	}


?>