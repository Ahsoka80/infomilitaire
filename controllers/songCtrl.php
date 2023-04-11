<?php
    require_once (__DIR__ . '/../config/constants.php');
    require_once (__DIR__ . '/../models/Song.php');

try{
    session_start();

    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }  
    
    $songs = Song::getAll();

    //On ne controle que s'il y a des données envoyées 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //**** NETTOYAGE TITLE****/
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
        //**** NETTOYAGE DESCRIPTION****/
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);

        /************************* TITLE *************************/
        //**** VERIFICATION ****/
        if (empty($title)) {
            $errors['title'] = 'Le champ est obligatoire';
        } else {
            $isOk = filter_var($title, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_TITLE . '/')));
            if (!$isOk) {
                $errors['title'] = 'Merci de choisir un nom valide';
            }
        }
        /***********************************************************/

        /************************* DESCRIPTION *************************/
        //**** VERIFICATION ****/
        if (empty($description)) {
            $errors['description'] = 'Le champ est obligatoire';
        } else {
            $isOk = filter_var($description, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_TITLE . '/')));
            if (!$isOk) {
                $errors['description'] = 'Merci de choisir un nom valide';
            }
        }
        /***********************************************************/  
        // var_dump($errors);
        // die;
        if (empty($errors)) {

            $created_at = date('Y-m-d H:i:s');

            //On récupère l'id du user qui a envoyé le form
            $id_users = $user['id_users'];
            

            $song = New Song;
            $song->setTitle($title);
            $song->setDescription($description);
            $song->setCreated_at($created_at);
            $song->setId_users($id_users);


            $response = $song->insert();
        

            if ($response) {
                $message = 'Votre chant a bien été ajouté';
            }else{
                $message = 'une erreur est survenue';
            }

            header('Location: /controllers/songCtrl.php');
            die;
        }
        
    }


} catch (\Throwable $th) {
    // $errorMessage = $th->getMessage();
    var_dump($th);
    die;
    // header('Location: /controllers/homeCtrl.php');
    // die;
}
    
/***************AFFICHAGE DES VUES*******************/
include_once(__DIR__ . '/../views/templates/header.php');
include_once(__DIR__ . '/../views/song.php');
include_once(__DIR__ . '/../views/templates/footer.php');

/****************************************************/