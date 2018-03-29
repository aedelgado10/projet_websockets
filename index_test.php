<?php 
    include 'defaults.php';
    base_start();
 ?>

 	<!-- DÉBUT DU CONTENU DE LA PAGE-->


	
        <h2 id="banner-title"> Home </h2>

        <!-- Formulaire pour créer un compte-->
        <div id="register-box" class="register-popup">
        	<p><i>Nouvel arrivant?</i></p>
        	<form class="signup" action="register.php">
        		<button class="submit button" type="submit">Créer un compte</button>
        	</form>
        </div>	

<?php 
    base_end();
 ?>