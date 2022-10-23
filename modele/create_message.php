<?php
    include_once ("session.php");
    include('..\controller\database.php');
    $leboncoin = new Database();
    var_dump($_POST);
    if (isset($_POST['message'])){
        $id_user_annonce = $leboncoin ->getAnnonceByID($_POST['id_annonce']);
        $date = date("Y-m-d H:i:s");
        $leboncoin -> CreateMessagefromEmeteur($_SESSION['id'], $_POST['id_annonce'], $_POST['message'], $id_user_annonce['USER_id_user'], $date, 0);
        header("location:../views/chatbox.php?id={$_POST['id_annonce']}");
    }else{
        echo "false";
    }