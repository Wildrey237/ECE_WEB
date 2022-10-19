<?php

// controller
class Database
{

    private static $dns;
    private static $user;
    private static $password;
    private static $database;

    public function __construct()
    {
        self::$dns = "mysql:host=localhost;dbname=leboncoin;port=3306"; // À changer selon vos configurations
        self::$user = "root"; // À changer selon vos configurations
        self::$password = ""; // À changer selon vos configurations
        self::$database = new PDO(self::$dns, self::$user, self::$password);
    }



    // user function

    public function GetUsers(){
        $sql = 'SELECT * FROM user';
        $statement = self::$database->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function ChangePassword($id, $newPassword){
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

    public function Connect($mail, $password){
        $sql = "SELECT * FROM `user`
                WHERE mail_user = :mail
                AND mot_de_passe = :password";
        $statement = self::$database->prepare($sql);

        $statement->execute(array(":mail" => $mail, ":password" => $password ));
        return $statement->fetchAll();
    }


    // Annonce Function

    public function AddAnnnonce ($nom_annonce, $detail, $date, $id_user, $id_categorie, $media){
        $sql = "INSERT INTO `annonce` (`id_Annonce`, `nom_annonce`, `detail`, `date_ajout`, `USER_id_user`, `categorie_id_categorie`, `Media`) 
                VALUES (NULL, :nom_annonce, :detail, :date, :id_user, :id_categorie, :media)";
        $statement = self::$database->prepare($sql);
        $statement->execute(array(":nom_annonce" => $nom_annonce, ":detail" => $detail, ":date" => $date, ":id_user" => $id_user, ":id_categorie" => $id_categorie, ":media" => $media));
    }

    public function AlterAnnnonce ($id_Annonce,$nom_annonce, $detail, $date, $id_user, $id_categorie, $media){
        $sql = "UPDATE `annonce` SET `nom_annonce` = :nom_annonce, `detail` = :detail, `Media` = :Media 
                 WHERE `annonce`.`id_Annonce` = :id_Annonce
                   AND `annonce`.`USER_id_user` = :id_user
                   AND `annonce`.`categorie_id_categorie` = :id_categorie ";
        $statement = self::$database->prepare($sql);
        $statement->execute(array(":id_Annonce" => $id_Annonce,":nom_annonce" => $nom_annonce, ":detail" => $detail, ":date" => $date, ":id_user" => $id_user, ":id_categorie" => $id_categorie, ":Media" => $media ));
        //TODO : Invalid parameter number: number of bound variables does not match number of tokens
    }

    public function GetAnnonce(){
        $sql = 'SELECT * FROM `annonce`';
        $statement = self::$database->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function DeletteAnnonce($id){
        $sql = "DELETE FROM `annonce` WHERE `annonce`.`id_Annonce` = :id_Annonce";
        $statement = self::$database->prepare($sql);
        $statement->bindParam(":id_Annonce",$id,PDO::PARAM_INT);
        $statement->execute();
    }

    // Categorie Function

    public function GetCategorie(){
        $sql = 'SELECT * FROM `categorie`';
        $statement = self::$database->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    // FUNCTION POUR LA PAGE ADMIN SI ON A FINI
    public function AddCategorie ($nom_categorie){
        $sql = "INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) 
                VALUES (NULL, :nom_categorie)";
        $statement = self::$database->prepare($sql);
        $statement->bindParam(":iduser",$nom_categorie,PDO::PARAM_INT);
        $statement->execute();
    }


}

