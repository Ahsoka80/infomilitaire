<?php
require_once __DIR__ . '/../../../config/constants.php';
require_once __DIR__ . '/../../../models/Event.php';

try {
    session_start();

    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }

    if ($user['id_role'] != 1){
        header('Location: /../profile/profileCtrl.php');
        die;
    }

    if( isset($_GET["id_event"])  )
    {
        $validated_at = date('Y-m-d H:i:s');
        $pdo = Database::getInstance();
        $validate = $pdo->prepare("UPDATE `events` SET `validated_at` = :validated_at WHERE id_event = :id_event");
        $validate->execute(array(":validated_at"=>$validated_at,":id_event"=>$_GET["id_event"]));
    }
   
    header('Location: /controllers/dashboard/modoCtrl.php');
    die;

    
    
    
} catch (\Throwable $th) {

    // // $errorMessage = $th->getMessage();
    // var_dump($th);
    // die;
    header('Location: /../homeCtrl.php');
    die;
}

/***************AFFICHAGE DES VUES*******************/
include_once(__DIR__ . '/../../views/templates/header.php');
include_once(__DIR__ . '/../../views/dashboard/song.php');
include_once(__DIR__ . '/../../views/templates/footer.php');
/****************************************************/