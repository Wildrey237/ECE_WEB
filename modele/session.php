<?php
function Session ($nomU="",$mail="",$id="",$connect = false){
        session_start();
    if ($connect){
        $_SESSION["user"] = $nomU;
        $_SESSION["mail"] = $mail;
        $_SESSION["id"] = $id;
        $session = true;
//        print_r( $_SESSION["user"]);
//            print_r($_SESSION["mail"]);
//                print_r($_SESSION["id"]);
//                    print_r($session);
    }else{
        $_SESSION["user"] = $nomU;
        $_SESSION["mail"] = $mail;
        $_SESSION["id"] = $id;
        $session=false;
        //header("location:../index.html");
    }
    return $session;
}
?>