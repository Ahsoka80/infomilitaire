<?php
require_once(__DIR__ . '/../../config/constants.php');
require_once(__DIR__ . '/../../models/Comment.php');

try{
    session_start();

    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }

    if ($user['id_role'] != 1){
        header('Location: /../profile/profileCtrl.php');
        die;
    }


    $comments = Comment::getAllCommentForDashboard();


} catch (\Throwable $th) {
    // var_dump($_POST);
    // die;
    var_dump($th);
    die;
    // header('Location: /controllers/errorCtrl.php');
    // die;
}




/***************AFFICHAGE DES VUES*******************/
include_once(__DIR__ . '/../../views/templates/header.php');
include_once(__DIR__ . '/../../views/dashboard/comment.php');
include_once(__DIR__ . '/../../views/templates/footer.php');
/****************************************************/