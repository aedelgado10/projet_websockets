<?php 
    require_once('./Classes/ConnexionBD.php');

    if($_GET["action"] == "deconnexion")
    {
        setcookie("session", "", time() - 10000);
        header('Location: index_test.php');
        die();
    }

    $username = (isset($_POST['username'])) ? $_POST['username'] : '' ;
    $password = (isset($_POST['password'])) ? $_POST['password'] : '' ;

    if($username == '')
    {
        // si l'username est null il y a un problème
        header('Location: erreur.php?error=Pas de user saisi');
        die();
    }
    else if($password == '')
    {
        // si le password est null il y a un problème
        header('Location: erreur.php?error=pas de mot de passe saisi');
        die();
    }

    // on forme la requête permettant de trouver
    // le mot de passe correspondant à l'utilisateur
    // donné dans le forumlaire
    $query = "SELECT mdp from Personne
              WHERE Personne.login = '" . $username . "';";

    // exécution de la requête sql
    $res = exec_select($dbh,$query); 
    $resultats = array();
    while ($data = $res[0]->fetch(PDO::FETCH_ASSOC)){
            $resultats[] = $data;
    }

    //var_dump($liste_tables_resultats);
    //echo $resultats[0]['mdp'];

    if(!$res)
    {
        // il y a une erreur ! (Problème bdd)
        header('Location: erreur.php?error=Erreur bdd');
        die();
    }

    if(!$resultats[0]['mdp'])
    {
        // si il n'y a aucune ligne alors
        // l'utilisateur n'existe pas !
        // réaction à changer peut être...
        header('Location: erreur.php?error=User non trouve');
        die();
    }
    else if($resultats[0]['mdp'] != $password)
    {
        // utilisateur correct mais mauvais mot de passe
        header('Location: erreur.php?error=Erreur mot de passe');
        die();
    }
    else
    {   // username et password OK
        // le cookie expire en 15 minutes (valeur arbitraire à revoir plus tard probablement)
        setcookie("session", "$username", time() + 600);

        header('Location: index_test.php');
        die();
    }
?>