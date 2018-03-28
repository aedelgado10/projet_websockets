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

	<h1 id="banner-title">Création de Compte</h1>	

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
        	<p><b>Données de l'utilisateur</b></p>
        	<form method="post" class="signup" action="inputRegister.php">
			  Prénom:<br>
			  <input type="text" name="prenom" value="">
			  <br>
			  Nom:<br>
			  <input type="text" name="nom" value="">
			  <br>
			  Login:<br>
			  <input type="text" name="login" value="">
			  <br>
			  Mot de passe:<br>
			  <input type="text" name="mdp" value="">
			  <br>
			  Adresse:<br>
			  <input type="text" name="adresse" value="">
			  <br>
			  Téléphone:<br>
			  <input type="text" name="telephone" value="">
			  <br>
			  Mail:<br>
			  <input type="text" name="mail" value="">
			  <br>
			  <br>
			  <strong> /!\ -- MONTRER À L'USER UNE LISTE DE ACTIVITÉS À CHOISIR -- /!\ </strong>
			  <br><br>
			  <input type="submit" value="Créer">
        	</form>

        	<a href="index.php"> 
        		<button>
        			Annuler
        		</button>
        	</a>
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

	<script type="text/javascript">
		var host = "<?php echo WS_HOST; ?>";

		try{
			var cx = new WebSocket(host);

			console.log(cx.readyState);
			cx.onopen = function(msg){
				console.log(msg);
			};

			cx.onmessage = function(msg){ console.log("Received: "+msg.data); };
			cx.onclose   = function(msg){ console.log("Disconnected - status "+this.readyState); };
		}catch(ex){
			console.log(ex);
		}
	</script>
</body>
</html>

