<?php
    function Message($id_annonce){
        include('..\controller\database.php');
        include_once ("session.php");
        $leboncoin = new Database();
        $id_createur_annonce = $leboncoin ->TakeMessage($id_annonce);
        $id_reponds = $leboncoin ->TakeMessage($id_annonce);

        if (!empty($id_createur_annonce) && !empty($id_reponds)){
            $id_createur_annonce = $id_createur_annonce[0];
            $id_createur_annonce = $id_createur_annonce["id_user_annonce"];
            $id_reponds = $id_reponds[0];
            $id_reponds = $id_reponds["id_recepteur"];
            function Nom($id){
                $leboncoin = new Database();
                $nom_recepteur = $leboncoin -> GetUsersbyID($id)[0];
                return $nom_recepteur["nom_user"];
            }

            $emeteurs = $leboncoin -> ShowUserMessage($id_annonce, $id_createur_annonce, $id_reponds);
            foreach ($emeteurs as $message){
                $nom = Nom($message['emmeteur']);
                echo("{$message["date"]} ---- <html><strong>{$nom}</strong></html> : {$message["detail"]}<br>");
            }
        }else{
            echo "<br> vous avez pas de messages </br>";
        }


    }




