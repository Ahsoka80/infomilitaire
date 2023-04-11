<?php
require_once(__DIR__ . '/../helpers/database.php');

class Comment{

    private int $id_comment;
    private string $comment;
    private string $created_at;
    private string $validated_at;
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
     public function setCreated_at(string $created_at):void{
        $this->$created_at = $created_at;
     }

     public function getCreated_at():string{
        return $this->created_at;
     }
    //===========================================================
     public function setValidated_at(string $validated_at):void{
        $this->$validated_at = $validated_at;
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


    
}