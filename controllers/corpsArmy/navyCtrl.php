<?php

try {
    session_start();

    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }
} catch (\Throwable $th) {

    var_dump($th);
    die;
    // header('Location: /controllers/errorCtrl.php');
    // die;
}
/***************AFFICHAGE DES VUES*******************/
include_once(__DIR__ . '/../../views/templates/header.php');
include_once(__DIR__ . '/../../views/corpsArmy/navy.php');
include_once(__DIR__ . '/../../views/templates/footer.php');

/****************************************************/