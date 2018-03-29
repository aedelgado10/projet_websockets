<?php 
    include 'defaults.php';
    base_start();
 ?>

 	<!-- DÉBUT DU CONTENU DE LA PAGE-->
 	<?php  
 		isset($_COOKIE["session"]) ? $logged = true : $logged = false;

 		if($logged){
 			echo "<br>";
 			echo "<h4> Voici l'activité que vous souhaitez apprendre </h4>";
 			echo "<h4> Voici l'activité dont vous êtes disponible pour enseigner</h4><br><br>";
 		}
 		else{
 			echo"<br>";
 			echo "<h4> Envie de découvrir et partager? Vous avez des connaissances et vous souhaitez apprendre d'avantage? </h4>";
 			echo "<h5> INSCRIVEZ VOUS GRATUITEMENT </h5>";
 			echo "<i> Le partage c'est du savoir </i><br><br>";
 		}
 	?>

<?php 
    base_end();
 ?>