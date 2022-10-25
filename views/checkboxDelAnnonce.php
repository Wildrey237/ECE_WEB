<?php include_once ("../modele/delete_annonce.php") ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Del Annonce</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Varela+Round&display=swap');

        nav {
            height: 70px;
            background-color: black;
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
    <p class="p-3 m-0 border-0 bd-example text-light">WERJ</p>
</nav>
<h3 class="text-dark text-center">Eliminer votre annonce</h3><br>
<form action="" method="post">
    <div class="container mt-5">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <table name="select">
                        <tr>
                            <td> Choix | </td> <td>Nom annonce | </td> <td> Detail </td>
                        </tr>
                        <?php $var = DoTable($_SESSION["id"]); ?>
                    </table>
                    <br><br><br><input type='submit' name='effacer' value='Eliminer cette annonce'>
                </div>
            </div>
        </div>
    </div>
</form>
<br><br><br>
<a href="../index.php" class="nav-link text-light text-center hover-zoom">Revenir à l'accueil</a>
<br><br><br><br><br>
<P style="margin-left: 40.5%; color: black">&copy;WERJ 2022|Powered by Groupe 1 Bachelor 2 ECE</P>
</body>
</html>



<!--
<form action="" method="post">
    <table name="select">
        <td> Choix | </td> <td>Nom annonce | </td> <td> Detail </td>

    </table>
</form>
-->
