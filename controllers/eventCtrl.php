<?php

    require_once __DIR__ . '/../config/constants.php';
    require_once __DIR__ . '/../models/Event.php';

    try {
        session_start();

        if(isset($_SESSION['user'])){
            $user = $_SESSION['user'];
        }

        $events = Event::getAll();
        //On ne controle que s'il y a des données envoyées 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $id_user = isset($_SESSION["user"]["id_users"]) ? $_SESSION["user"]["id_users"] : false;
            //**** NETTOYAGE TITLE****/
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
            //**** NETTOYAGE ADDRESS****/
            $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
            //**** NETTOYAGE DATE ****/
            $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_NUMBER_INT);
            //**** NETTOYAGE HOUR****/
            $hour = filter_input(INPUT_POST, 'hour', FILTER_SANITIZE_SPECIAL_CHARS);
            //**** NETTOYAGE DESCRIPTION****/
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);

            $id_region = intval(filter_input(INPUT_POST, 'region', FILTER_SANITIZE_NUMBER_INT));

            $id_dep = filter_input(INPUT_POST, 'dep', FILTER_SANITIZE_SPECIAL_CHARS);

            $dateHour = $date.' '.$hour;


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

            /************************* ADDRESS *************************/
            //**** VERIFICATION ****/
            if (empty($address)) {
                $errors['address'] = 'Le champ est obligatoire';
            } else {
                $isOk = filter_var($address, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_TITLE . '/')));
                if (!$isOk) {
                    $errors['address'] = 'Merci de choisir un nom valide';
                }
            }
            /***********************************************************/

            /************************* DATE *************************/
            //**** VERIFICATION ****/
            if (empty($date)) {
                $errors['date'] = 'Le champ est obligatoire';
            } else {
                $isOk = filter_var($date, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_DATE . '/')));
                if (!$isOk) {
                    $errors['date'] = 'Le date n\'est pas valide, le format attendu est JJ/MM/AAAA';
                }
            }
            /***********************************************************/
    
            /************************* HOUR *************************/
            //**** VERIFICATION ****/
            if (empty($hour)) {
                $errors['hour'] = 'Le champ est obligatoire';
            } else {
                $isOk = filter_var($hour, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_HOUR . '/')));
                if (!$isOk) {
                    $errors['hour'] = 'L\'heure n\'est pas valide';
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
            
            if (empty($errors)) {

                $created_at = date('Y-m-d H:i:s');

                $event = New Event;
                $event->setId_users($id_user);
                $event->setTitle($title);
                $event->setAddress($address);
                $event->setDateHour($dateHour);
                $event->setDescription($description);
                $event->setCreated_at($created_at);
                $event->setId_region($id_region);
                $event->setId_dep($id_dep);

                $response = $event->insert();
            

                if ($response) {
                    $message = 'Votre compte a bien été ajouté';
                }else{
                    $message = 'une erreur est survenue';
                }
                header('Location: /controllers/eventCtrl.php');
                die;
                
            }
        
    }
    } catch (\Throwable $th) {

        var_dump($th);
        die;
        // header('Location: /controllers/errorCtrl.php');
        // die;
    }
    /***************AFFICHAGE DES VUES*******************/
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../views/event.php');
    include_once(__DIR__ . '/../views/templates/footer.php');

    /****************************************************/