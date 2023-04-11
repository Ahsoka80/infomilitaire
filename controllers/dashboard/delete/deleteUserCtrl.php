<?php
require_once __DIR__ . '/../config/constants.php';
require_once __DIR__ . '/../models/User.php';

    session_start();

try {
    

    $idUser = intval(filter_input(INPUT_GET, 'idUser', FILTER_SANITIZE_NUMBER_INT));
    
    $deleteUser = User::delete($idUser);

    var_dump($deleteUser);
    die;
    header('location: /controllers/dashboard/adminCtrl.php');
    die;

} catch (\Throwable $th) {
    $errorMessage = $th->getMessage();
    var_dump($th);
    die;

    // header('Location: /controllers/homeCtrl.php');
    // die();
}