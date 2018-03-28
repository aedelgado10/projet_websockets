<?php
	class Partage extends WebSocket{
		 function process($user,$msg){
			switch ($msg) {
				case 'test':
					$this->send($user->socket,"Test partage de compétences");
					break;
				default:
					$this->send($user->socket,"Test partage de compétences");
					break;
			}
		}
	}
?>