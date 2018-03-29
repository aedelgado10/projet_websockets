<?php 
    include 'defaults.php';
    base_start();
 ?>


 		<!-- DÉBUT DU CONTENU DE LA PAGE-->

        <h2 id="banner-title">Création de Compte</h2>	

        <!-- Formulaire pour saisir la creation de compte-->
        <div id="register-box" class="register-popup">
        	<p><b>Données de l'utilisateur</b></p>
        	<form method="post" class="signup" action="envoyerRegister.php">
			  Prénom:<br>
			  <input type="text" name="prenom" value="" placeholder="Jean">
			  <br>
			  Nom:<br>
			  <input type="text" name="nom" value="" placeholder="Dupont">
			  <br>
			  Login:<br>
			  <input type="text" name="login" value="" placeholder="jd">
			  <br>
			  Mot de passe:<br>
			  <input type="password" name="mdp" value="" placeholder="******">
			  <br>
			  Adresse:<br>
			  <input type="text" name="adresse" value="" placeholder="Avenue de l'université">
			  <br>
			  Téléphone:<br> 
			  <input type="text" name="telephone" value="" placeholder="06 69 69 69 69">
			  <br>
			  Mail:<br>
			  <input type="text" name="mail" value="" placeholder="Jean@dupont.com">
			  <br>
			  <br>
			  
			  <br><br>
			  

			  <h3> Activité que vous souhaitez apprendre </h3>


			  <?php  
			  		$query = "SELECT nomA FROM Activite GROUP BY nomA";

				    // exécution de la requête sql
				    $res = exec_select($dbh,$query); 
				    $resultats = [];
				    while ($data = $res[0]->fetch(PDO::FETCH_ASSOC)){
				            $resultats[] = $data;
				    }

				    // Activité
				  	foreach ($resultats as $key => $value) {
				  		$val = $resultats[$key]['nomA'];
				  		echo "<input type=\"radio\" name=\"ActiviteA\" value=\"$val\"> $val <br>";

				  		$query2 = "SELECT typeA FROM Activite WHERE nomA='$val' GROUP BY typeA";

				  		$res2 = exec_select($dbh,$query2); 
				   		$resultats2 = [];
				   		while ($data2 = $res2[0]->fetch(PDO::FETCH_ASSOC)){
				        	$resultats2[] = $data2;
				    	}

				    	// Domaine
				    	echo "<select name=\"$val\">";
				    	foreach ($resultats2 as $key2 => $value2) {
				    		    $val2 = $resultats2[$key2]['typeA'];
    							echo "<option value=\"$val2\"> $val2 </option>";
				    	}
				    	echo "</select> <br>";
				  	}
				    
			  ?>

			  <h3> Activité que vous souhaitez enseigner </h3>

			  <?php  
			  		$query = "SELECT nomA FROM Activite GROUP BY nomA";

				    // exécution de la requête sql
				    $res = exec_select($dbh,$query); 
				    $resultats = [];
				    while ($data = $res[0]->fetch(PDO::FETCH_ASSOC)){
				            $resultats[] = $data;
				    }

				  	foreach ($resultats as $key => $value) {
				  		$val = $resultats[$key]['nomA'];
				  		echo "<input type=\"radio\" name=\"ActiviteE\" value=\"$val\"> $val <br>";

				  		$query2 = "SELECT typeA FROM Activite WHERE nomA='$val' GROUP BY typeA";

				  		$res2 = exec_select($dbh,$query2); 
				   		$resultats2 = [];
				   		while ($data2 = $res2[0]->fetch(PDO::FETCH_ASSOC)){
				        	$resultats2[] = $data2;
				    	}

				    	echo "<select name=\"$val\">";
				    	foreach ($resultats2 as $key2 => $value2) {
				    		    $val2 = $resultats2[$key2]['typeA'];
    							echo "<option value=\"$val2\"> $val2 </option>";
				    	}
				    	echo "</select> <br>";
				  	}
				    
			  ?>

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