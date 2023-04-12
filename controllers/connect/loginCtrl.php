<?php
require_once __DIR__ . '/../../config/constants.php';
require_once __DIR__ . '/../../models/User.php';

try {
    // ===============================================Vérification requête POST===========================================================================
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //========================================================================================================================================================

        // NETTOYAGE PSEUDO ET EMAIL
        $emailOrPseudo = trim(filter_input(INPUT_POST,'emailOrPseudo',FILTER_SANITIZE_SPECIAL_CHARS));

        if (empty($emailOrPseudo)) {
            $error['emailOrPseudo'] = 'Veuillez entrer votre pseudo ou email.';
        } else {
            $isOk = true;//filter_var($emailOrPseudo, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEXP_PSEUDO . '/'],]);

            if (!$isOk) {
                $error['emailOrPseudo'] = 'Merci de choisir un nom valide';
            }
            
            if (!User::isEmailOrPseudoExist($emailOrPseudo)) {
                $error['emailOrPseudo'] = 'Ce pseudo et email n\'existe pas';
            }
        }

        //========================================================================================================================================================
        isset($_POST['password']) ? ($password = $_POST['password']) : ($password = 'pas de mdp');

        // VERIFICATION
        if (empty($password)) {
            $error['password'] = 'Veuillez entrer un mot de passe.';
        } else {
            if ($user = User::getbyEmailOrPseudo($emailOrPseudo)) {
                
                $passbdd = $user['password'];
                
                if (!password_verify($password, $passbdd)) {
                    $error['password'] =
                        'Le mot de passe n\'existe pas dans la base de données.';
                    // var_dump('coucou');
                    // die;
                }
            }
        }
        //echo "<pre>",var_dump($error),"</pre>";
        if (empty($error)) {
            session_start();
            $_SESSION['user'] = $user;
            header('Location: /controllers/profile/profileCtrl.php');
            die();
        }
    }
} catch (\Throwable $th) {
    $errorMessage = $th->getMessage();

    header('Location: /controllers/homeCtrl.php');
    die();
}
/***************AFFICHAGE DES VUES*******************/
include_once __DIR__ . '/../../views/templates/header.php';
include_once __DIR__ . '/../../views/connect/login.php';
include_once __DIR__ . '/../../views/templates/footer.php';
/****************************************************/
