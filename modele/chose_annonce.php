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
    $form = "<html>
            <head>
                <style>
                @import url('https://fonts.googleapis.com/css2?family=Varela+Round&display=swap');

                    nav {
                        background-color: black;
                        height: 70px;
                        color: white;
                        font-family: 'Varela Round';
                        margin: 0;
                        padding: 0;
                        top: 0;
                        overflow: hidden;
                        position: fixed;
                        width: 100%;
                    }

                    body {
                        background-image: linear-gradient(to left, #fffbd5, #b20a2c);
                    }

                    h1 {
                        margin-left: 44%;
                        font-size: 20px;
                        font-family: 'Varela Round';
                    }

                    form {
                        margin-left: 32%;
                    }

                    fieldset {
                        margin-left: 37%;
                        margin-right: 37%;
                        border-radius: 15px;
                        background-color: white;
                    }
                </style>
            </head>
            <body>
            <nav>
                <p style='padding-top: 20px; margin-left: 10px;'>WERJ</p>
            </nav><br><br><br><br>
            <h1>Supprimer une annonce</h1><br><br>
            <fieldset>
            <br>
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
              <input style='background-color: red; color: white; width: 70px; height: 35px; border-radius: 10px;' type='submit' value='Modifier'>  <input style='background-color: chartreuse; color: black; width: 70px; height: 35px; border-radius: 10px;' type='reset'>
            </form>
            </fieldset><br><br>
            <p><a href='../index.php' style='margin-left: 45%;'> Retourner sur la page principale</a></p><br><br>
            ";
    echo $form;
}


?>
