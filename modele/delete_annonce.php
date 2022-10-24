<?php

include("../controller/database.php");
include_once("../modele/session.php");

function DoTable($id){
    $traitement ="";
    $leboncoin = new Database();
    $annonce = $leboncoin ->GetAnnonceFromUser($id);
    /*var_dump($annonce); */
    foreach ($annonce as $select){
        echo "<tr>
                   <td> <input type='radio' name='choixAnnonce' value ='{$select["id_Annonce"]}'> </td> <td>{$select["nom_annonce"]} </td> <td>{$select["detail"]} </td>
             </tr>";

    }

    

    if (isset($_POST['effacer'])){
        echo "<script>alert('Are you sure you want to delete this media ?')</script>";
        $leboncoin->DeletteAnnonce($_POST['choixAnnonce'], $id);
        header("location: ../views/good.html");
    }
}





?>