<?php
include_once './Classes/ConnexionBD.php';
include_once './config/config.php';


// code pour tous les débuts HTML
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
			<head>
				<meta charset=\"utf-8\">
					<title>Partage de compétences</title>
					<link rel=\"stylesheet\" type=\"text/css\" href=\"config/modules/bootstrap4/css/bootstrap.css\">
					<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">
					<link rel=\"stylesheet\" type=\"text/css\" href=\"./css/thecascade.css\">
			</head>
			<body>

				<div id=\"pagecontent\" class=\"pre-scrollable\">

				
  					<div class=\"container\">
    					<a href=\"index_test.php\" id=\"logonavbar\">
    						<div class=\"page-header\"><h1 id=\"banner-title\">Plateforme de Partage de Compétences</h1>
    						</div>
    					</a>
  					</div>
				

					<div class=\"connexion\">";
					// vérification à faire par cookies non par session !
		    		if($logged)
		    		{
		        		echo "<p class=\"connectedDialog\"><b>  Bonjour " . $_COOKIE["session"] . "</b></p>";

		        		echo "<div class=\"login-window connectedDialog\"><a href=\"connexion.php?action=deconnexion\" class=\"btn btn-default\">Déconnexion</a></div>";

		            echo "<h2 id=\"banner-title\"> Home </h2>";    
		    		}
		    		else
		    		{
		        		echo "
		       			<div id=\"login-box\" class=\"login-popup\">
		          			<form method=\"post\" class=\"signin\" action=\"connexion.php\">
			                <fieldset class=\"textbox\">
				                <label class=\"username\">
					                <span>Identifiant</span>
					                <input id=\"username\" class=\"form-control\" name=\"username\" value=\"\" type=\"text\" autocomplete=\"on\" placeholder=\"identifiant\">
				                </label>
				                
				                <label class=\"password\">
					                <span>Mot de Passe</span>
					                <input id=\"password\" class=\"form-control\" name=\"password\" value=\"\" type=\"password\" placeholder=\"mot de passe\">
				                </label>
			                
			                	<button class=\"btn btn-default\" type=\"submit\">Se Connecter</button>
		                	</fieldset>
		          			</form>
	        			</div>";

	        			echo " <div id=\"register-box\" class=\"register-popup\">
	        					<p><i>Nouvel arrivant?</i></p>
	        					<form class=\"signup\" action=\"register.php\">
	        						<button class=\"btn btn-default\" type=\"submit\">Créer un compte</button>
	        					</form>
	        				</div>	
							";
		   			 }
			                            
					echo "	</div>";


					echo "<h5> Notre site a été visité : $visites fois!!<h5>";

				

	}



// code pour toutes les fins HTML
	function base_end()
	{
		echo "
						</div>
			            <div id=\"footercontent\" class=\"fixed-bottom\">
	            			
	                    	<p id=\"contactus\"> Contact : contact@andresdelgado.fr </p>
	                		
	        			</div>


					<script type=\"text/javascript\" src=\"config/modules/bootstrap4/js/bootstrap.js\"></script>
					<script type=\"text/javascript\" src=\"config/modules/jquery/jquery-3.3.1.min.js\"></script>
					
			</body>
		</html>

		";
	}

 ?>