<?php
	class Partage extends WebSocket{

		private function get_from_api($request){
			if (!empty($request)){
				return file_get_contents($request);
			}
		}
		private function get_weather($city){
			if (!empty($city)){
				$request = PAPI."$city"."&appid=".KAPI;
				$w_result = json_decode($this->get_from_api($request),true);
				return $w_result;
			}
		}

		private function get_wicon($w_result){

			if (!empty($w_result)){
				$icon_name = $w_result["weather"][0]["icon"];
			}
			return WICON_P.$icon_name.'.png';
		}

		function process($user,$msg){

			if (!empty($msg)){
				$infos = json_decode($msg,true);

				if (isset($infos["cmd"])){
					if ($infos["cmd"] == 'meteo'){
					$w_result = $this->get_weather($infos["city"]);
					$this->sendjson($user,$w_result);
					$this->sendjson($user,$this->get_wicon($w_result));
					//var_dump($w_result);
					//var_dump($this->get_wicon($w_result));	
					}
				}
				//$this->send($user->socket,);
			}
		}

		function sendjson($user,$data){
			$this->send($user->socket,json_encode($data));
		}
	}
?>