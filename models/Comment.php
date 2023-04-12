<?php
require_once(__DIR__ . '/../helpers/database.php');

class Comment{

    private int $id_comment;
    private string $comment;
    private string $create_at;
    private string $validated_at;
    private int $id_event;
    private int $id_users;
    					
    //===========================================================
     public function setId_comment(int $id_comment):void{
        $this->id_comment = $id_comment;
     }

     public function getId_comment():int{
        return $this->id_comment;
     }
   //===========================================================
     public function setComment(string $comment):void{
        $this->comment = $comment;
     }

     public function getComment():string{
        return $this->comment;
     }
    //===========================================================
     public function setCreate_at(string $create_at):void{
      $this->create_at = $create_at;
     }

     public function getCreate_at():string{
        return $this->create_at;
     }
    //===========================================================
     public function setValidated_at(string $validated_at):void{
        $this->$validated_at = $validated_at;
     }

     public function getValidated_at():string{
        return $this->validated_at;
     }
    //===========================================================
     public function setId_event(int $id_event):void{
         $this->id_event = $id_event;
     }

     public function getId_event():int{
         return $this->id_event;
     }
 //===========================================================
     public function setId_users(int $id_users):void{
        $this->id_users = $id_users;
     }

     public function getId_users():int{
        return $this->id_users;
     }
   //===========================================================

   public function addComment(){

      $sql = 'INSERT INTO `comments` ( `comment`, `created_at` , `id_event`, `id_users`)
              VALUES (:comment, :create_at , :id_event ,  :id_users) ;';
      
      $pdo = Database::getInstance();

      $sth = $pdo->prepare($sql);

      $sth->bindValue(':comment',         $this->getComment(),      PDO::PARAM_STR);
      $sth->bindValue(':create_at',       $this->getCreate_at(),   PDO::PARAM_STR);
      $sth->bindValue(':id_event',        $this->getId_event(),     PDO::PARAM_INT);
      $sth->bindValue(':id_users',         $this->getId_users(),     PDO::PARAM_INT);

      $results =  $sth->execute();

        if ($results) {
            return ($sth->rowCount() > 0) ? true : false;
        }
   }

   public static function getAllComment(): array {

      $sql = 'SELECT `comments`.`id_event`,`comments`.`comment`, `users`.`pseudo` FROM `comments`
              LEFT JOIN `users`
                  ON `comments`.`id_users` = `users`.`id_users`
              LEFT JOIN `events`
                  ON `comments`.`id_event` = `events`.`id_event`
              WHERE `comments`.`validated_at` IS NOT NULL ;';

      $pdo = Database::getInstance();

      $sth = $pdo->prepare($sql);

      $sth->execute();
      $results = $sth->fetchAll(PDO::FETCH_ASSOC);

      return $results;
   }

   public static function getAllCommentForDashboard(){

      $sql = 'SELECT * , `users`.`pseudo` FROM `comments`
              LEFT JOIN  `users`
               ON `comments`.`id_users` = `users`.`id_users`
              ORDER BY `id_event`;';
      
      $pdo = Database::getInstance();
      $sth = $pdo->prepare($sql);
      $sth->execute();
      $results = $sth->fetchAll();
      return $results;
   }
    

   public static function delete($idComment){

      $sql = 'DELETE FROM `comments` 
              WHERE `comments`.`id_comment` = :idComment ;';

      $pdo = Database::getInstance();
      $sth = $pdo->prepare($sql);
      $sth->bindValue(':idComment', $idComment, PDO::PARAM_INT);
      
      $results = $sth->execute();
      if ($results) {
          return ($sth->rowCount() > 0) ? true : false;
      }
      
   }

   public static function getAllCommentWaiting(): array {

      $sql = 'SELECT `comments`.`id_event`,`comments`.`comment`, `users`.`pseudo` FROM `comments`
              LEFT JOIN `users`
                  ON `comments`.`id_users` = `users`.`id_users`
              LEFT JOIN `events`
                  ON `comments`.`id_event` = `events`.`id_event`
              WHERE `comments`.`validated_at` IS NULL ;';

      $pdo = Database::getInstance();

      $sth = $pdo->prepare($sql);

      $sth->execute();
      $results = $sth->fetchAll(PDO::FETCH_ASSOC);

      return $results;
   }
}