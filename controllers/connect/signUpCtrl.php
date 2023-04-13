<?php
require_once(__DIR__. '/../../config/constants.php');
require_once(__DIR__. '/../../models/User.php');
require_once(__DIR__. '/../../helpers/dd.php');

try {
    
    // ===============================================Vérification requête POST===========================================================================
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //========================================================================================================================================================

        // NETTOYAGE et VALIDATION input pseudo
        $pseudo = trim(filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS));

        if(empty($pseudo)){
            $error['pseudo'] = 'Votre pseudo n\'est pas renseigné';
        }else{
            $isOk = filter_var($pseudo, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_PSEUDO . '/')));
                if (!$isOk) {
                    $error['pseudo'] = 'Merci de choisir un pseudo valide';
                }
                if (User::isPseudoExists($pseudo)) {
                    $errors['pseudo'] = 'Ce pseudo existe déjà';
                }
        }

    //========================================================================================================================================================

        // NETTOYAGE EMAIL
        $email = trim(filter_input(INPUT_POST, 'email' , FILTER_SANITIZE_EMAIL)); 
        // NETTOYAGE EMAIL
        $emailVerif = trim(filter_input(INPUT_POST, 'emailVerif' , FILTER_SANITIZE_EMAIL)); 

        if (empty($email)) {
            $errors['email'] = 'Le champ est obligatoire';
        } else {
            $isOk = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$isOk) {
                $errors['email'] = 'Le mail n\'est pas valide';
            }
            if ($email!= $emailVerif){
                $error['email'] = 'Veuillez entrer le même email';
            }
            if (User::isMailExists($email)) {
                $errors['mail'] = 'Ce mail existe déjà';
            }
        }

    //========================================================================================================================================================

        // NETTOYAGE PASSWORD
        $password = filter_input(INPUT_POST, 'password'); 
        
        // NETTOYAGE PASSWORD
        $passwordVerif = filter_input(INPUT_POST, 'passwordVerif');

        if (empty($password) && empty($passwordVerif)) {
            $errors['password'] = 'Veuillez entrer un mot de passe.';
        } else {
            // Mots de passe identiques ?
            if ($password != $passwordVerif) {
                $errors['password'] = 'Les mots de passe doivent être identiques.';
            } else {
                
                // Mot de passe correspond à la regex ?
                if (!filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_PASSWORD . '/')))){
                    $errors['password'] = 'Votre mot de passe doit contenir au moins 8 caractère dont 1 Majuscule, 1 miniscule, 1 caractère spécial et 1 chiffre.';
                } else {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                }
            }
        }
        
        //Checkbox à faire
        //=======================================================================================================================================================
        
        if(empty($errors)){
            $created_at = date('Y-m-d H:i:s');
            $id_role = '2';
            //**** HYDRATATION ****/
            $user = new User;
            $user->setPseudo($pseudo);
            $user->setMail($email);
            $user->setPassword($password);
            $user->setCreated_at($created_at);
            $user->setId_role($id_role);
            $response = $user->insert();
            

            if ($response) {
                $message = 'Votre compte a bien été ajouté';
            }else{
                $message = 'une erreur est survenue';
            }
            
        }
        else
        {
            $message = "";
            foreach ($errors as $error) 
            {
                $message .= $error . '<br>';
            }
        }
    }
} catch (\Throwable $th) {
    // $errorMessage = $th->getMessage();
    var_dump($th);
    die;
    header('Location: /controllers/homeCtrl.php');
    die;
}

// phpmailer pour confirgurer l'envoie de mail
/***************AFFICHAGE DES VUES*******************/
include_once(__DIR__ . '/../../views/templates/header.php');
include_once(__DIR__ . '/../../views/connect/signUp.php');
include_once(__DIR__ . '/../../views/templates/footer.php');
/****************************************************/