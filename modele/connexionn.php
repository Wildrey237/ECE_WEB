<?php
include('..\controller\database.php');
include('..\modele\session.php');
if (isset($_POST['mail'])&& $_POST['password']){
    $leboncoin = new Database();
    $users = $leboncoin->Connect($_POST['mail'], md5($_POST['password']));
        if  (count($users) >0){
            print_r ($users);
            Session($users[0]["nom_user"],$users[0]["mail_user"],$users[0]["id_user"],true);
//            header("location : index.php"); TODO :
        }else{
            echo "pas d'utilisateur";
            // TODO: faire les details pour RAYANE
        }

  /* $mail = stripslashes($_REQUEST['mail']);
  $mail = mysqli_real_escape_string($mail);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($password);
    $query = "SELECT * FROM `users` WHERE mail='$mail' and password='".hash('sha256', $password)."'";
  $result = mysqli_query( ) or die(mysql_error());
  $rows = mysqli_num_rows( );
  if($rows==1){
      $_SESSION['mail'] = $mail;
      header("Location: ");
  }else{
    $message = "L'adresse mail ou le mot de passe est incorrect.";
  } */

  
}
?>