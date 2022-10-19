<?php
function Session ($nomU="",$mail="",$id="",$connect=false){
    
    $session=false;
    if ($connect=true){
        session_start();
        $_SESSION["user"] = $nomU;
        $_SESSION["mail"] = $mail;
        $_SESSION["id"] = $id;
        $session = true;
    }else{
        $session=false;
        //header("location:../index.html");
    }
    return $session;
}
?>