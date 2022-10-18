<?php
    include ("controller/database.php");
    $leboncoin = new Database();

    //$leboncoin ->AddAnnnonce("voiture Mercedes","bonne voiture","10-10-2022","1","1","image.png");
    //$leboncoin ->DeletteAnnonce(4);
    $leboncoin -> AlterAnnnonce(1,"wilfried","humain","2022-04-20","1","1","pinterest.png");
    $Annonce = $leboncoin ->GetAnnonce();
    print_r($Annonce);

    $categorie = $leboncoin ->GetCategorie();
    print_r($categorie[0]['nom_categorie']);