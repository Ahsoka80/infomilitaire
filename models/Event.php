<?php
require_once(__DIR__ . '/../helpers/database.php');

class Event{

    private int $id_event;
    private string $title;
    private string $address;
    private string $description;
    private string $dateHour;
    private string $created_at;
    private string $validated_at;
    private string $disabled_at;
    private int $id_region;
    private int $id_users;

   //===========================================================
     public function setIdEvent(int $id_event):void{
        $this->id_event = $id_event;
     }

     public function getIdEvent():int{
        return $this->id_event;
     }
   //===========================================================
     public function setTitle(string $title):void{
        $this->title = $title;
     }

     public function getTitle():string{
        return $this->title;
     }
   //===========================================================
     public function setAddress(string $address):void{
        $this->address = $address;
     }

     public function getAddress():string{
        return $this->address;
     }
   //===========================================================
     public function setDateHour(string $dateHour):void{
        $this->dateHour = $dateHour;
     }

     public function getDateHour():string{
        return $this->dateHour;
     }
   //===========================================================
     public function setDescription(string $description):void{
        $this->description = $description;
     }

     public function getDescription():string{
        return $this->description;
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
     public function setdisabled_at(string $disabled_at):void{
        $this->disabled_at = $disabled_at;
     }

     public function getdisabled_at():string{
        return $this->disabled_at;
     }
   //===========================================================
     public function setId_region(int $id_region):void{
        $this->id_region = $id_region;
     }

     public function getId_region():int{
        return $this->id_region;
     }
   //===========================================================
     public function setId_users(int $id_users):void{
       $this->id_users = $id_users;
     }
     public function getId_users():int{
       return $this->id_users;
     }
   //===========================================================

   public function insert(){

      $pdo = Database::getInstance();

      $sql = 'INSERT INTO `events` ( `title`, `address`, `dateHour`, `description`, `created_at` )
               VALUES ( :title, :address, :dateHour, :description, :created_at) ;';
      
      

      $sth = $pdo->prepare($sql);

      $sth->bindValue(':title', $this->getTitle(), PDO::PARAM_STR);
      $sth->bindValue(':address', $this->getAddress(), PDO::PARAM_STR);
      $sth->bindValue(':dateHour', $this->getDateHour(), PDO::PARAM_STR);
      $sth->bindValue(':description', $this->getDescription(), PDO::PARAM_STR);
      $sth->bindValue(':created_at', $this->getCreated_at(), PDO::PARAM_STR);

      $results =  $sth->execute();
        if ($results) {
            return ($sth->rowCount() > 0) ? true : false;
        }

   }

   public static function getAll() : array {

      $pdo = Database::getInstance();

      $sql = 'SELECT `title`, `address`, `dateHour`, `description` FROM `events`;';
      
      $sth = $pdo->prepare($sql);

      $sth->execute();
      $results = $sth->fetchAll();
      return $results;

   }
   
   

}