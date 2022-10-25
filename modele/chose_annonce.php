<?php
    include('..\controller\database.php');
    include_once ("session.php");
//    var_dump($_SESSION);
if (isset($_POST)){
    $leboncoin = new Database();
    $annonce = $leboncoin ->GetAnnonceFromUserAndId($_SESSION["id"],$_POST["select"]);
    $categorie = $leboncoin ->GetCategorie();
    $options ="";
    foreach ($categorie as $option){
        $options = $options."<option value='{$option['id_categorie']}'> {$option['nom_categorie']} </option>";
    }
    $form = "
            <form action='modify_annonce.php' method='post'>
                Nom annonce <input type='text' name='nom_annonce' value='{$annonce[0]['nom_annonce']}' placeholder='Saisir le nom de l annonce' required> <br><br>
                Detail <input type='text' name='detail' value='{$annonce[0]['detail']}' placeholder='Saisir la description de l annonce'required> <br><br>
                Prix <input type='float' name='prix' value='{$annonce[0]['prix']}' placeholder='Saisir le prix de l annonce'required> <br><br>
                Media <input type='text' name='media' value='{$annonce[0]['Media']}' placeholder='Saisir le lien de la photo de l annonce'required> <br><br>
                Categorie: <select name='categorie' required>
                                   {$options}
                           </select> <br><br>
               <input type='hidden' name='id_annonce' value='{$annonce[0]['id_Annonce']}' required>
               <input type='hidden' name='id_categorie' value='{$annonce[0]['categorie_id_categorie']}' required> <br>
              <input type='submit' value='modifer'>  <input type='reset'>
            </form>";
    echo $form;
}


?>
