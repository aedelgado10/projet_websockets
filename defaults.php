<?php

function base_start($secure = false)
	{
	    isset($_COOKIE["session"]) ? $logged = true : $logged = false;

	    // ici on vérifie si l'utilisateur a le droit
	    // de voir la page
	    if($secure && !$logged)
	    {
	    	header('Location: erreur.php?error=Forbidden');
	    	die();
	    }

	    $file = fopen("nbr_visites.txt", "c+");
	    if(!$file)
	    {
	        header("Location: erreur.php?error=file_access_denied");
	        die();
	    }

	    $visites = fgets($file);
	    if(!$visites)
	    {
	        $visites = 0;
	    }
	    $visites++;
	    rewind($file);
	    fwrite($file, $visites);

		echo "
		<!DOCTYPE html>
		<html lang=\"fr\">
			<?php
				include_once './config/config.php';
				include_once './Classes/ConnexionBD.php';
			?>
			<head>
				<meta charset=\"utf-8\">
					<title>Partage de compétences</title>
					<link rel=\"stylesheet\" type=\"text/css\" href=\"config/modules/bootstrap4/css/bootstrap.css\">
					<link rel=\"stylesheet\" type=\"text/css\" href=\"config/modules/bootstrap4/css/bootstrap.css\">
			</head>
			<body>
				<h1 id=\"banner-title\"><a href=\"index_test.php\">Plateforme de Partage de Compétences</a></h1>	

				<div class=\"connexion\">";
				// vérification à faire par cookies non par session !
	    		if($logged)
	    		{
	        		echo "<p>  Bonjour " . $_COOKIE["session"] . "</p>";
	        		echo "<div class=\"post\">
	                <div class=\"btn-sign\">
	                   <a href=\"connexion.php?action=deconnexion\" class=\"login-window\">Déconnexion</a>
	                </div>
	            </div>";    
	    		}
	    		else
	    		{
	        		echo "
	       			<div id=\"login-box\" class=\"login-popup\">
	          			<form method=\"post\" class=\"signin\" action=\"connexion.php\">
		                <fieldset class=\"textbox\">
			                <label class=\"username\">
				                <span>Identifiant</span>
				                <input id=\"username\" name=\"username\" value=\"\" type=\"text\" autocomplete=\"on\" placeholder=\"identifiant\">
			                </label>
			                
			                <label class=\"password\">
				                <span>Mot de Passe</span>
				                <input id=\"password\" name=\"password\" value=\"\" type=\"password\" placeholder=\"mot de passe\">
			                </label>
		                
		                	<button class=\"submit button\" type=\"submit\">Se Connecter</button>
	                	</fieldset>
	          			</form>
        			</div>";
	   			 }
		                                
				echo "	</div>";

	}

	function base_end()
	{
		echo "
			            <div class=\"mentions\">
	            			<caption>Mention légales</caption>
	            			<table height=\"75px\" width=\"100%\" border =\"1\" cellspacing=\"1\" cellpadding=\"1\" >
	               		 		<tr>
	                    			<td> Nous contacter : contact@andresdelgado.fr</td>
	                			</tr>
	            			</table>
	        			</div>


					<script type=\"text/javascript\" src=\"config/modules/bootstrap4/js/bootstrap.js\"></script>
					<script type=\"text/javascript\" src=\"config/modules/jquery/jquery-3.3.1.min.js\"></script>	
			</body>
		</html>

		";
	}

 ?>