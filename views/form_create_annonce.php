
<?php
include_once ("../modele/session.php");
include_once ("../controller/database.php");
if(!VerifySession()){
    header("location:../index.php");
}
$leboncoin = new Database();
$categorie = $leboncoin ->GetCategorie();
$options ="";
foreach ($categorie as $option){
    $options = $options."<option value='{$option['id_categorie']}'> {$option['nom_categorie']} </option>";
}
// var_dump($options);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Ajout_annonce</title>
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
    <p class="p-3 m-0 border-0 bd-example text-light">WERJ</p>
</nav>

<h3 class="text-light text-center">Ajoutez votre annonce</h3>
<form action="../modele/create_annonce.php" method="post">
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-5 m-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <div class="input-group input-group mb-3 w-100 flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">Nom annonce</span>
                                <input class="form-control w-75 p-3" aria-describedby="addon-wrapping" type ="text" name="nom_annonce" required><br>
                            </div>
                            <div class="input-group input-group mb-3 w-100 flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">Prix annonce</span>
                                <input class="form-control w-75 p-3" aria-describedby="addon-wrapping" type ="float" name="prix_annonce" required><br>
                            </div>
                            <div class="input-group input-group mb-3 w-100 flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">Détail annonce</span>
                                <input class="form-control w-75 p-3" aria-describedby="addon-wrapping" type ="textarea" name="detail" required><br>
                            </div>
                            <div class="input-group input-group mb-3 w-100 flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">Catégorie annonce</span>
                                <select name="Categories" id="categorie_annonce">
                                    <?php echo($options);?>
                                </select><br><br>
                            </div>
                            <div class="input-group input-group mb-3 w-100 flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">URL Image</span>
                                <input class="form-control w-75 p-3" aria-describedby="addon-wrapping" type ="text" name="media" required><br>
                            </div><br>
                            <div class="form-group mb-3">
                                <input style="margin-left: 41%; height: 50px; width: 120px; font-size: 20px;" class="btn btn-primary" type="submit" value="Valider">
                            </div><br>
                            <p><a href="../index.php" style="margin-left: 27%;"> Retourner sur la page principale</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>







    <!--
    <label >Nom de l'annonce</label><br>
    <input type ="text" name="nom_annonce" placeholder="Nom de l'annonce"><br><br>
    <label >Prix</label><br>
    <input type ="float" name="prix_annonce" placeholder="prix de l'annonce"><br><br>
    <label for="story">Détail de l'annonce:</label>
    <textarea id="detail_annonce" name="detail"
            rows="5" cols="33">
    </textarea><br><br>
    <label for="pet-select">Choisi la catégorie</label>
    <select name="Categories" id="categorie_annonce">

    </select><br><br>
    <label >Image</label><br>
    <input type ="text" name="media" placeholder="image"><br><br>
    <input class="button-submit" type="submit" value="Valider">-->
</form>

<br><br><br>
<P style="margin-left: 40.5%; color: black">&copy;WERJ 2022|Powered by Groupe 1 Bachelor 2 ECE</P>
</body>
</html>

