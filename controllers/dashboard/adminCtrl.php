<?php
require_once __DIR__ . '/../../config/constants.php';
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../models/Song.php';

try {

    $users = User::getAllUsers();
    $songs = Song::getAllSongs();

    session_start();

    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }

    if ($user['id_role'] != 1){
        header('Location: /../profile/profileCtrl.php');
        die;
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
include_once(__DIR__ . '/../../views/dashboard/admin.php');
include_once(__DIR__ . '/../../views/templates/footer.php');
/****************************************************/