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
                            <img src=" <?php echo $data['Media'] ?>" class="w-50 rounded" style="margin-left:27%"  alt="">
                        </div>
                    </div>


                    <div class="card mb-3">
                        <div class="card-body mx-auto" > 
                         <p class="text-muted"><?php echo $data['detail'] ?></p>
                         
                        </div>
                    </div>

                    

                    <div class="card mb-5">
                        <div class="card-body mx-auto">

                        <?php 
            
                            if ( $database->userLikesAnnonce($_SESSION['id'],$_GET['id']) == true ) {
                                echo '
                                <a href="like_annonce.php?id='.$_GET["id"].'" style="width: 250px" class="btn btn-danger mx-auto" style="width: 250px">  
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                    </svg> Ajouter aux favoris
                                </a> &nbsp;&nbsp;&nbsp;
                       
                                                                                                                    
                                ';
                            }else{

                                echo '
                                <a href="like_annonce.php?id='.$_GET["id"].'" style="width: 250px" class="btn btn-danger mx-auto" style="width: 250px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heartbreak-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8.931.586 7 3l1.5 4-2 3L8 15C22.534 5.396 13.757-2.21 8.931.586ZM7.358.77 5.5 3 7 7l-1.5 3 1.815 4.537C-6.533 4.96 2.685-2.467 7.358.77Z"/>
                                    </svg> Retirer de mes favories
                                </a> &nbsp;&nbsp;&nbsp;
                                ';
                            }
                        
                        ?> 
                        <a class="btn btn-success mx-auto" style="width: 250px" value="<?php echo $_GET["id"]?>" href="views/chatbox.php?id=<?php echo $_GET['id'] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                            <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
                            </svg> Contacter l'utilisateur
                        </a>
                        <!-- <a class="btn btn-success mx-auto" style="width: 250px"  value="<?php echo $_GET["id"]?>" href="views/chatbox.php?id=<?php echo $_GET['id'] ?>"> Contacter l'utilisateur </a>


                            
                         -->
                       

                        </div>

                    </div>
                    
                    

            <?php require_once("views/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>