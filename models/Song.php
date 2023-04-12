<?php
require_once(__DIR__ . '/../helpers/database.php');

class Song {

    private int $id_music;
    private string $title;
    private string $description;
    private string $link;
    private string $created_at;
    private string $validated_at;
    private int $id_users;


    //===========================================================
     public function setId_music(int $id_music):void{
        $this->id_music = $id_music;
     }

     public function getIdEvent():int{
        return $this->id_music;
     }
    //===========================================================
     public function setTitle(string $title):void{
        $this->title = $title;
     }

     public function getTitle():string{
        return $this->title;
     }
    //===========================================================
     public function setDescription(string $description):void{
        $this->description = $description;
     }

     public function getDescription():string{
        return $this->description;
     }
    //===========================================================
    public function setLink(string $link):void{
      $this->link = $link;
    }

    public function getLink():string{
      return $this->link;
    }
  //===========================================================
     public function setCreated_at(string $created_at):void{
        $this->created_at = $created_at;
     }

     public function getCreated_at():string{
        return $this->created_at;
     }
    //===========================================================
     public function setValidated_at(string $validated_at):void{
        $this->validated_at = $validated_at;
     }

     public function getValidated_at():string{
        return $this->validated_at;
     }
    //===========================================================
     public function setId_users(int $id_users):void{
        $this->id_users = $id_users;
     }

     public function getId_users():int{
        return $this->id_users;
     }
    //===========================================================
     
    //Méthode qui permet d'ajouter des chants militaire dans la base de données 
     public function insert(){

        $sql = 'INSERT INTO `music` ( `title` , `description` , `links`, `created_at`, `id_users` ) 
                VALUES ( :title , :description , :links ,  :created_at , :id_users ) ;';

        $pdo = Database::getInstance();

        $sth = $pdo->prepare($sql);

        //Affectation des valeurs aux marqueurs nominatifs
        $sth->bindValue(':title', $this->title, PDO::PARAM_STR);
        $sth->bindValue(':description', $this->description, PDO::PARAM_STR);
        $sth->bindValue(':links', $this->link, PDO::PARAM_STR);
        $sth->bindValue(':created_at', $this->created_at, PDO::PARAM_STR);
        $sth->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);

        $sth->execute();

        $results = $sth->rowCount();
        // On retourne directement true si la requête s'est bien exécutée ou false dans le cas contraire
        return ($results > 0) ? true : false ;
     }

     //Méthode qui permet d'afficher tout les chants enregistrer dans la base de données 
     //SELECT m.id_music,m.title,m.description,m.id_users,u.pseudo FROM `music` as m LEFT JOIN users as u ON m.id_users = u.id_users;
     public static function getAll() {

        $sql = 'SELECT `music`.`id_music`, `music`.`title` , `music`.`description`,  `music`.`links`, `music`.`id_users` , `users`.`pseudo` 
                FROM `music` 
                LEFT JOIN `users` 
                ON music.id_users = users.id_users 
                ORDER BY `title`;';

        $pdo = Database::getInstance();
        $sth = $pdo->prepare($sql);
        
        $sth->execute();
        $results = $sth->fetchAll();
        return $results;
     }

     // Méthode qui permet de modifier le tire et la description du chant par l'utilisateur qui a ajouter le chant
   //   public static function update(){

   //      $sql = 'UPDATE `title`, `description` FROM `music` 
   //              VALUES ( :title , :description ) ;';

   //      $pdo = Database::getInstance();
        
   //      $sth = $pdo->prepare($sql);

   //      //Affectation des valeurs aux marqueurs nominatifs
   //      $sth->bindValue(':title', $this->title, PDO::PARAM_STR);
   //      $sth->bindValue(':description', $this->description, PDO::PARAM_STR);

   //      $sth->execute();

   //      $results = $sth->rowCount();
   //      // On retourne directement true si la requête s'est bien exécutée ou false dans le cas contraire
   //      return ($results > 0) ? true : false ;
   //   }

     //Méthode qui permet de supprimer le chant ajouter 
     public static function delete($idMusic){

        $sql = 'DELETE FROM `music` 
                WHERE `music`.`id_music` = :idMusic ;';

        $pdo = Database::getInstance();
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':idMusic', $idMusic, PDO::PARAM_INT);
        
        $results = $sth->execute();
        if ($results) {
            return ($sth->rowCount() > 0) ? true : false;
        }
        
     }

     //Méthode pour récupérer toute les informations des utilisateurs
     public static function getAllSongs()
     {
       $sql = 'SELECT `music`.`id_music`, `music`.`title` , `music`.`description` , `music`.`links`, `music`.`id_users`, `users`.`pseudo`, `music`.`created_at`
               FROM `music`
               LEFT JOIN `users` 
               ON music.id_users = users.id_users 
               ORDER BY `title`;';
       $pdo = Database::getInstance();
       $sth = $pdo->prepare($sql);
       $sth->execute();
       $results = $sth->fetchAll();
       return $results;
     }
}