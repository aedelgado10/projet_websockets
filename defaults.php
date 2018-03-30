<?php
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

	    include_once './views/doc_head.phtml';

		// vérification à faire par cookies non par session !
		if($logged)
		{
			include_once './views/logged_banner.phtml';
		}
		else
		{
			include_once './views/not_logged_banner.phtml';

		}
                            
		include_once './views/banner_closure.phtml';
	}



// code pour toutes les fins HTML
	function base_end()
	{
		include './views/footer.phtml';
	}

 ?>