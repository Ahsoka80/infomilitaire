<?php
    require_once __DIR__ . '/../config/constants.php';

    session_start();

    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }  

    
    $xml = simplexml_load_file('https://www.lemonde.fr/rss/une.xml');
    $items = $xml->channel->item; 
    $count = count($items);

    


/***************AFFICHAGE DES VUES*******************/
include_once(__DIR__ . '/../views/templates/header.php');
include_once(__DIR__ . '/../views/home.php');
include_once(__DIR__ . '/../views/templates/footer.php');

/****************************************************/