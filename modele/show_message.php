<?php
    function Message($id_annonce,$id){
        include('..\controller\database.php');
        include_once ("session.php");
        $leboncoin = new Database();
        $id_createur_annonce = $leboncoin ->TakeMessage($id_annonce)[0];
        $id_createur_annonce = $id_createur_annonce["id_user_annonce"];
        $id_reponds = $leboncoin ->TakeMessage($id_annonce)[0];
        $id_reponds = $id_reponds["id_recepteur"];

        function Nom($id){
            $leboncoin = new Database();
            $nom_recepteur = $leboncoin -> GetUsersbyID($id)[0];
            return $nom_recepteur["nom_user"];
        }

        $emeteurs = $leboncoin -> ShowUserMessage($id_annonce, $id_createur_annonce, $id_reponds);
        foreach ($emeteurs as $message){
            $nom = Nom($message['emmeteur']);
            echo("{$message["date"]} ---- {$nom} : {$message["detail"]}<br>");
        }

    }

?>




