<?php
	class Partage extends WebSocket{

		private function get_from_api($request){
			if (!empty($request)){
				return file_get_contents($request);
			}
		}
		private function get_weather($city){
			if (!empty($city)){
				$request = PAPI."weather?q=$city"."&appid=".KAPI;
				$w_result = json_decode($this->get_from_api($request),true);
				return $w_result;
			}
		}

		private function get_forecast($city){
			if (!empty($city)){
				$request = PAPI."forecast?q=$city"."&appid=".KAPI;
				$w_result = json_decode($this->get_from_api($request),true);
				return $w_result;
			}	
		}

		// Récupérer la liste des météo (5j/3h) donnée par l'API
		private function get_wlist($w_result){
			if ((!empty($w_result)) && (is_array($w_result))){
				array_key_exists("list", $w_result);
				return $w_result["list"];
			}
		}

		public static function get_date($element){
			if ((!empty($element)) && (is_array($element))){
				array_key_exists("dt", $element);
				return $element["dt"];
			}
		}

		public static function get_heure($element){
			return date('H',$element);
		}

		public static function pdateFr($timestamp){
			return date('d-m-Y',$timestamp);
		}

		/**
		*	@param : $date_input  : la date que l'on récupère au format unix timestamp
		*	@param : $date_donnée : la date à laquelle on la compare au format unix timestamp
		*	@return : boolean{
		*				true : si les dates sont identiques
		*				false : sinon
		*			}
		*	Cette fonction compare les deux dates. 
		*/
		public static function est_jour($date_input, $date_donnee){
			$d_i = Partage::pdateFr($date_input);
			$d_d = Partage::pdateFr($date_donnee);

			return ($d_d == $d_i);
		}


		public static function toDateFr($date_en){
			$a_date = explode("-", $date_en);
			
			return $a_date[2]."/".$a_date[1]."/".$a_date[0]; 
		}


		private function get_wicon($w_result){

			if (!empty($w_result)){
				$icon_name = $w_result["weather"][0]["icon"];
			}
			return WICON_P.$icon_name.'.png';
		}

		private function get_winfo($element){
			if ((!empty($element)) && (is_array($element))){
				array_key_exists("weather", $element);
				return $element["weather"][0];
			}
		}

		function process($user,$msg){

			if (!empty($msg)){
				$infos = json_decode($msg,true);

				if (isset($infos["cmd"])){
					if ($infos["cmd"] == 'meteo_j'){
						$w_result = $this->get_weather($infos["city"]);
						$this->sendjson($user,$w_result);
						$this->sendjson($user,$this->get_wicon($w_result));
						return true;
					}else if($infos["cmd"] == 'meteo_f'){
						$w_result = $this->get_forecast($infos["city"]);
						$liste = $this->get_wlist($w_result);

						$meteo_infos = array();

						foreach ($liste as $k => $data) {
							$tms = $this->get_date($data);
							$jour = Partage::pdateFr($tms);

							if (!array_key_exists($jour, $date_meteo)){
								$date_meteo[$jour]["heures"] = array();	// s*le interpréteur trop vieux. Il connait pas le =[]

							}
							
							$heure_i = $this->get_heure($tms);
							$date_meteo[$jour]["heures"][$heure_i] = array();
							$w_info = $this->get_winfo($data);
							$date_meteo[$jour]["heures"][$heure_i] = $w_info; 
						}
						$this->sendjson($user,$date_meteo);
						//$this->sendjson($user,$w_result);
						return true;
					}
				}
			}
		}

		function sendjson($user,$data){
			$this->send($user->socket,json_encode($data));
		}
	}
?>