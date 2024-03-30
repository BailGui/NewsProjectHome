<?php
/*

Contrôleur frontal */

/*
chargement des dépendances
*/

require_once("../config.php");
require_once("../model/CategoryModel.php");
require_once("../model/NewsModel.php");

/*
Connexion PDO
*/
try {
    // instanciation de la connexion PDO
    $db = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET . ";port=" . DB_PORT, DB_LOGIN, DB_PWD);

    // on met l'attribut en FETCH_ASSOC
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

} catch (Exception $e) {
    // Gestion de l'erreur
    die($e->getMessage());
}

// chargement des catégories pour le menu
$menuSlug = getAllCategoriesBySlug($db);

// chargement des news pour la page d'accueil
$newsHomepage = getAllNewsHomePage($db);

// chargement des articles de news
$getNews = getNews ($db);

// var_dump($menuSlug);
// var_dump($newsHomepage);
//var_dump($getNews);

/*
Appel de la vue
*/
if(isset($_GET['p'])){
    
    switch($_GET['p']){

        case 'astrobiologie':
            $title = "astrobiologie";
            include('../view/astrobiologie.php');
            break;
        case 'astronomie':
            $title="astronomie";
            include('../view/astronomie.php');
            break;
        case 'extragalactique':
            $title="extragalactique";
            include('../view/extragalactique.php');
            break;
        case 'galactique':
            $title="galactique";
            include('../view/galactique.php');
            break;
        case 'solaire':
            $title="solaire";
            include('../view/solaire.php');
            break;
        case 'stellaire':
            $title="stellaire";
            include('../view/stellaire.php');
            break;
        case 'planetologie':
            $title = "planetologie";
            include('../view/planetologie.php');
            break;
        case 'post':
            $title = "post";
            include('../view/post.php');
            break;
        case 'contact':
            $title = "contact";
            include('../view/contact.php');
            break;
                        
                                   
       
        default:
            $title="page404";
            include('../view/page-404.php');
    }

}else{
    
    $title = "homepage"; 
    include('../view/homepage.view.php');
}

// Fermeture de connexion
$db = null;