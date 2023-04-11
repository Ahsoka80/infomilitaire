<?php
require_once(__DIR__ . '/../helpers/database.php');

class User{

    private int $id;
    private string $pseudo;
    private string $mail;
    private string $password;
    private string $created_at;
    private string $validated_at;
    private string $disabled_at;
    private string $deleted_at;
    private int $id_role;

   //===========================================================
     public function setId(int $id):void{
        $this->id = $id;
     }

     public function getId():int{
        return $this->id;
     }
   //===========================================================
     public function setPseudo(string $pseudo):void{
        $this->pseudo = $pseudo;
     }

     public function getPseudo():string{
        return $this->pseudo;
     }
   //===========================================================
     public function setMail(string $mail):void{
        $this->mail = $mail;
     }

     public function getMail():string{
        return $this->mail;
     }
   //===========================================================
     public function setPassword(string $password):void{
        $this->password = $password;
     }

     public function getPassword():string{
        return $this->password;
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
     public function setdeleted_at(string $deleted_at):void{
        $this->deleted_at = $deleted_at;
     }

     public function getdeleted_at():string{
        return $this->deleted_at;
     }
   //===========================================================
     public function setId_role(int $id_role):void{
       $this->id_role = $id_role;
     }
     public function getId_role():int{
       return $this->id_role;
     }
   //===========================================================
   //                                              Méthodes
     //==========================================================================================================

     /**
     * 
     * Méthode pour vérifier si le email éxiste déjà dans la bdd
     * 
     * @param string $mail
     * 
     * @return bool
     */
    public static function isMailExists(string $email): bool|object
    {

        $sql = 'SELECT * FROM `users` WHERE `email` = :email';

        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':email', $email, PDO::PARAM_STR);
        $sth->execute();

        return $sth->fetch();
    }

    /** Méthode pour vérifier si le pseudo existe déjà dans la bdd
     * @param string $pseudo
     * 
     * @return bool
     */
    public static function isPseudoExists(string $pseudo): bool|object
    {

        $sql = 'SELECT * FROM `users` WHERE `pseudo` = :pseudo';

        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $sth->execute();

        return $sth->fetch();
    }


     /** Pour créer un compte dans sur l'inscription
      * @return [type]
      */
     public function insert()
     {
         // connection à la bd :
         $pdo = Database::getInstance();
 
         //On insère les données reçues   
         // on note les marqueurs nominatifs exemple :birthdate sert de contenant à une valeur
 
         $sql = 'INSERT INTO `users` (`pseudo`, `email`, `password`, `created_at`, `id_role`) 
                    VALUES (:pseudo, :email, :password, :created_at, :id_role) ;';

         $sth = $pdo->prepare($sql);

         //Affectation des valeurs aux marqueurs nominatifs
         $sth->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
         $sth->bindValue(':email', $this->mail, PDO::PARAM_STR);
         $sth->bindValue(':password', $this->password, PDO::PARAM_STR);
         $sth->bindValue(':created_at', $this->created_at, PDO::PARAM_STR);
         $sth->bindValue(':id_role', $this->id_role, PDO::PARAM_INT);

         $sth->execute();

         $results = $sth->rowCount();
         // On retourne directement true si la requête s'est bien exécutée ou false dans le cas contraire
         return ($results > 0) ? true : false ;
     }

     

      /**Méthode pour la connexion d'un compte éxistant
       * @param mixed $EmailOrPseudo
       * 
       * @return [type]
       */
      public static function isEmailOrPseudoExist($emailOrPseudo): bool
      {

         $sql = 'SELECT `pseudo`, `email` FROM `users` 
                  WHERE `email` = :emailOrPseudo OR `pseudo` = :emailOrPseudo;';
            
            $pdo = Database::getInstance();

            $sth = $pdo->prepare($sql);

            $sth->BindValue(':emailOrPseudo',$emailOrPseudo, PDO::PARAM_STR);

            $sth->execute();

            $results = $sth->rowCount();
            // On retourne directement true si la requête s'est bien exécutée ou false dans le cas contraire
            return ($results > 0) ? true : false ;
            
      }

      //Méthode pour récupérer le pseudo ou l'email de l'utilisateur inscrit dans la base de données 
      public static function getbyEmailOrPseudo($user_input): array | bool
      {
         
         $sql = 'SELECT * FROM `users` WHERE `email` = :user_input OR `pseudo` = :user_input;';
         $pdo = Database::getInstance();

         $sth = $pdo->prepare($sql);

         $sth->execute(
            array(":user_input"=>$user_input)
         );

         if( $t = $sth->fetch(PDO::FETCH_ASSOC) )
         {
            return $t;
         }
         else
         {
            return false;
         }
      }

      //Méthode pour modifier les informations d'un utilisateur
      public function update($id_users) : bool
      {
         $sql = 'UPDATE `users` SET 
                        `pseudo`    = :pseudo, 
                        `email`     = :email, 
                        `password`  = :password 
                  WHERE `id_users`  = :id_users ;';
               
         $pdo = Database::getInstance();
         
         $sth = $pdo->prepare($sql);
         $sth->bindValue(':pseudo'  , $this->pseudo);
         $sth->bindValue(':email'   , $this->mail);
         $sth->bindValue(':password', $this->password);
         $sth->bindValue(':id_users', $id_users, PDO::PARAM_INT);
         if ($sth->execute()) {
               return ($sth->rowCount() > 0) ? true : false;
         }
      }

      //Méthode pour supprimer un users de la base de données 
      public static function delete($idUsers)
      {
        $sql = 'DELETE FROM `users` 
                WHERE `users`.`id_users` = :idUsers ;';
        $pdo = Database::getInstance();
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':idUsers', $idUsers, PDO::PARAM_INT);
        
        $results = $sth->execute();
        if ($results) {
            return ($sth->rowCount() > 0) ? true : false;
        }
      }

      //Méthode pour récupérer toute les informations des utilisateurs
      public static function getAllUsers()
      {
        $sql = 'SELECT * FROM `users` 
                ORDER BY `pseudo`;';
        $pdo = Database::getInstance();
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $results = $sth->fetchAll();
        return $results;
      }

}