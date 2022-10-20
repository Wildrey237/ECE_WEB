<?php
    include('..\controller\database.php');
    include_once ("session.php");
//    var_dump($_SESSION);
    function DoOption(){
        $traitement ="";
        $leboncoin = new Database();
        $annonce = $leboncoin ->GetAnnonceFromUser($_SESSION["id"]);
        foreach ($annonce as $select){
            $traitement = $traitement . "<option value ='{$select["id_Annonce"]}'> {$select["nom_annonce"]} </option>";
        }
        return $traitement;
    }
if (isset($_POST)){
    var_dump($_POST);
    $leboncoin = new Database();
    //$leboncoin ->DeletteAnnonce($_POST[]);
}
