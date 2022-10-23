<?php
    include("modele/session.php");
    require_once("views/navbar.php");
    require_once('controller/database.php');
    $database = new Database();
    $data = $database->getAnnonceByID($_GET['id']);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Le bon coin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>


      <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder"><?php echo $data['nom_annonce'] ?></h1>
                    <p class="lead fw-normal text-white-50 mb-0">Voici les informations de l'annonce qui vous intéresse.</p>
                </div>
            </div>
        </header>

        <div class="card mb-5">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                  <h1><?php echo $data['nom_annonce'] ?></h1>
                                  <h3><?php echo $data['prix'] ?> €</h3>    
                                </div>

                                <div>
                                <p class="text-muted"><?php echo $data['date_ajout'] ?></p>
                                </div>
                                    
                                
                            
                            </div>
                            <img src=" <?php echo $data['Media'] ?>" class="w-100 rounded" alt="">
                        </div>
                    </div>


                    <div class="card mb-3">
                        <div class="card-body"> 
                         <p class="text-muted"><?php echo $data['detail'] ?></p>
                         
                        </div>
                    </div>


                    <div class="card mb-5">
                        <div class="card-body  classe mx-auto">
                            <form method="post" action="">
                                <input type="hidden" value="<?php echo $_GET["id"]?>">
                                <input type="submit" class="btn btn-success" style="width: 250px" value="Contacter l'utilisateur pour acheter cette article">
                            </form>
                        </div>

                    </div>

            <?php require_once("views/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>