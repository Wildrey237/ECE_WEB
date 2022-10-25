<?php include_once ("../modele/show_message.php");
      include_once ("../modele/session.php")
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbox</title>
</head>
<body>
<p class="logo-upper">WERJ</p>
<hr>
<h1>Identification</h1>
<?php Message($_GET['id']); ?>
<form action="../modele/create_message.php" method="post">
    <input type = "hidden" name= "id_annonce" value = '<?php echo $_GET['id'] ?>' >
    <input type="text" name="message" placeholder="entrer votre message"> <input type="submit">
</form>
<br><br><br>
<P style="margin-left: 43%; color: black">&copy;WERJ 2022|Powered by Groupe 1 Bachelor 2 ECE</P>
</body>
</html>