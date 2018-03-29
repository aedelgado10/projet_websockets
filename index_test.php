<!DOCTYPE html>
<html lang="fr">
<?php
	include './config/config.php';
?>
<head>
	<meta charset="utf-8">
	<title>Partage de compétences</title>
	<link rel="stylesheet" type="text/css" href="config/modules/bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="config/modules/bootstrap4/css/bootstrap.css">
</head>
<body>

	<h1 id="banner-title">Plateforme de Partage de Compétences</h1>	

	<!-- Formulaire pour se connecter-->
        <div id="login-box" class="login-popup">
          <form method="post" class="signin" action="connexion.php">
                <fieldset class="textbox">
	                <label class="username">
		                <span>Identifiant</span>
		                <input id="username" name="username" value="" type="text" autocomplete="on" placeholder="identifiant">
	                </label>
	                
	                <label class="password">
		                <span>Mot de Passe</span>
		                <input id="password" name="password" value="" type="password" placeholder="mot de passe">
	                </label>
	                
	                <button class="submit button" type="submit">Se Connecter</button>
                </fieldset>
          </form>
        </div>

        <div id="register-box" class="register-popup">
        	<p><i>Nouvel arrivant?</i></p>
        	<form class="signup" action="register.php">
        		<button class="submit button" type="submit">Créer un compte</button>
        	</form>
        </div>	


        <div class="mentions">
            <caption>Mention légales</caption>
            <table height="75px" width="100%" border ="1" cellspacing="1" cellpadding="1" >
                <tr>
                    <td> Nous contacter : contact@andresdelgado.fr</td>
                </tr>
            </table>
        </div>






	<script type="text/javascript" src="config/modules/bootstrap4/js/bootstrap.js"></script>
	<script type="text/javascript" src="config/modules/jquery/jquery-3.3.1.min.js"></script>
</body>
</html>

