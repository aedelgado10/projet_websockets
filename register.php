<?php 
    include 'defaults.php';
    base_start();
 ?>

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

        <h2 id="banner-title">Création de Compte</h2>	

        <!-- Formulaire pour saisir la creation de compte-->
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

        	<a href="index_test.php"> 
        		<button>
        			Annuler
        		</button>
        	</a>
        </div>	

<?php 
    base_end();
 ?>