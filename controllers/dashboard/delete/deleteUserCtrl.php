<?php
require_once __DIR__ . '/../../../config/constants.php';
require_once __DIR__ . '/../../../models/User.php';

    session_start();

try {
    if( isset($_SESSION["user"]["id_users"]) && isset($_GET["user_id"]))
    {
        if( $_SESSION["user"]["id_users"] != $_GET["user_id"] )
        {
            $deleteUser = User::delete($_GET["user_id"]);
            header('location: /controllers/dashboard/userCtrl.php');
            die;
        }
        else
        {
            
            //user don't delete himself and get back to admin panel
            header('location: /controllers/dashboard/userCtrl.php');
            die;
        }    
    }
} catch (\Throwable $th) {
    $errorMessage = $th->getMessage();
    var_dump($th);
    die;

    // header('Location: /controllers/homeCtrl.php');
    // die();
}