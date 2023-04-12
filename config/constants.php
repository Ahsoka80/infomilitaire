<?php

//Connection base de données
    define('DATABASE_NAME','mysql:host=localhost;dbname=info_militaire_site;');
    define('DATABASE_USER' , 'administrateur');
    define('DATABASE_PASSWORD' , ']76ZvH.7zsF48CyI');

 // Déclaration de REGEXP
 define('REGEXP_PSEUDO', '^[a-zA-Z]*$');
 define('REGEXP_PASSWORD', '^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$');

 define('REGEXP_TITLE', '^[a-zA-Z]*$');
 define('REGEXP_HOUR','^(0[0-9]|1[0-9]|2[0-3]|[0-9]):[0-5][0-9]$');
 define('REGEXP_DATE','^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$');
 define('REGEXP_LINKS','^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube(-nocookie)?\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|v\/)?)([\w\-]+)(\S+)?$');
//  define('REGEXP_DESCRIPTION','^[a-zA-Z0-9éçà.!\'^\',""^\s()-œ]$');


 define('ERRORS', [
    0=>'Une erreur inconnue s\'est produite',
    1=>'Problème de connexion à la BDD',
    2=>'Erreur lors de la récupération du patient',
    3=>'Patient non trouvé',
    4=>'Aucune mise à jour n\'a été effectuée',
    5=>'Patient non mis à jour, ce patient existe déjà',
    6=>'Erreur lors de la création du rendez-vous',
    7=>'Rendez-vous non créé',
    8=>'Erreur lors de la récupération du rendez-vous',
    9=>'Erreur 9 à préciser dans "config.php',
    10=>'Aucune mise à jour du rdv n\'a été effectuée ',
]);