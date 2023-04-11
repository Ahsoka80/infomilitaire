<?php

try {
    session_start();

    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }
} catch (\Throwable $th) {
    // // $errorMessage = $th->getMessage();
    // var_dump($th);
    // die;
    header('Location: /../homeCtrl.php');
    die;
}

/***************AFFICHAGE DES VUES*******************/
include_once(__DIR__ . '/../../views/templates/header.php');
include_once(__DIR__ . '/../../views/corpsArmy/army.php');
include_once(__DIR__ . '/../../views/templates/footer.php');
/****************************************************/