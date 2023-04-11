<?php
require_once(__DIR__. '/../../config/constants.php');
require_once(__DIR__. '/../../models/User.php');
require_once(__DIR__. '/../../helpers/dd.php');

try {
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION['user'])){
    header("Location: /../connect/loginCtrl.php");
    exit(); 
  } else {
    $user = $_SESSION['user'];
  }



} catch (\Throwable $th) {
    // // $errorMessage = $th->getMessage();
    // var_dump($th);
    // die;
    header('Location: /../homeCtrl.php');
    die;
}

// phpmailer pour confirgurer l'envoie de mail
/***************AFFICHAGE DES VUES*******************/
include_once(__DIR__ . '/../../views/templates/header.php');
include_once(__DIR__ . '/../../views/profile/profile.php');
include_once(__DIR__ . '/../../views/templates/footer.php');
/****************************************************/