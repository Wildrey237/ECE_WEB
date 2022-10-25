<?php include_once ("../modele/show_message.php");
      include_once ("../modele/session.php");
      if(!VerifySession()){
        header("location:../index.php");
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Chatbox</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Varela+Round&display=swap');

        nav {
            background-color: black;
            height: 70px;
            margin-bottom: 50px;
            font-family: 'Varela Round';
            font-size: 20px;
        }

        body {
            background-image: linear-gradient(to right, #fc5c7d, #6a82fb);
            font-family: 'Varela Round';
        }
    </style>
</head>
<body>
<nav>
    <p class="logo-upper p-3 m-0 border-0 bd-example text-light">WERJ</p>  
</nav>

<h1 class="text-center">Messagerie</h1><br>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-5 m-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <?php Message($_GET['id']); ?>
                            <form action="../modele/create_message.php" method="post">
                                <input type = "hidden" name= "id_annonce" value = '<?php echo $_GET['id'] ?>' ><br><br>
                                <input type="text" name="message" placeholder="entrer votre message"> <input type="submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>





<br><br><br>
<p><a href="../index.php" style="margin-left: 44%;"> Retourner sur la page principale</a></p><br><br>
<P style="margin-left: 40%; color: black">&copy;WERJ 2022|Powered by Groupe 1 Bachelor 2 ECE</P>
</body>
</html>