<?php

// controller
class Database
{

    private static $dns;
    private static $user;
    private static $password;
    public static $database;

    public function __construct()
    {
        self::$dns = "mysql:host=localhost;dbname=leboncoin;port=3306"; // À changer selon vos configurations
        self::$user = "root"; // À changer selon vos configurations
        self::$password = ""; // À changer selon vos configurations
        self::$database = new PDO(self::$dns, self::$user, self::$password);
    }

    public function getUsers(){
        $sql = 'SELECT * FROM user';
        $statement = self::$database->prepare($sql);
        $statement->execute();
        $users = $statement->fetchAll();
        return $users;
    }

    public function changePassword($id, $newPassword){
        $sql = 'UPDATE users SET password = ? WHERE id = ?';
        $statement = self::$database->prepare($sql);
        $statement->execute(array($newPassword, $id));
    }

    public function AddUser($nomuser, $prenomuser, $mailuser, $motdepasse){
        $sql = "INSERT INTO `user` (`nom_user`, `prenom_user`, `mail_user`, `mot_de_passe`)
                VALUES (:nomuser, :prenomuser, :mail, :motdepasse)";
        $statement = self::$database->prepare($sql);
        $statement->execute(array(":nomuser"=>$nomuser,":prenomuser"=>$prenomuser,":mail"=>$mailuser,":motdepasse"=>$motdepasse));
    }

    public function DeletteUser($id){
        $sql = "DELETE FROM `user` WHERE `user`.`id_user` = :iduser";
        $statement = self::$database->prepare($sql);
        $statement->bindParam(":iduser",$id,PDO::PARAM_INT);
        $statement->execute();
    }
    public function AddComment(){
        return "hello";
    }
}
