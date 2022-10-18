<?php 

session_start();

$user = $_SESSION;


?>

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top ">
  <div class="container-fluid">
    <a class="navbar-brand me-5">Leboncoin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item me-5">
          <a class="nav-link" href="/leboncoin/index.php">Acceuil</a>
        </li>
        
       <?php
            if ( $user['user_id']== null ) {
                echo '<li class="nav-item me-5">
                <a class="nav-link" href="/leboncoin/auth.php">Connexion</a>
              </li>
              <li class="nav-item me-5">
                <a class="nav-link" href="/leboncoin/create_account.php">Création du compte</a>
              </li>';
            } else {
                echo '
                

                <li class="nav-item dropdown me-5">
                <a class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown">'.$user['user_name'].'</a> 
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/leboncoin/profile.php">Géréer son compte</a></li>
                  <li><a class="dropdown-item" href="/leboncoin/logout.php">Se déconnécter</a></li>
                  <li><a class="dropdown-item" href="#">Modifier son compte</a></li>
                </ul>
              </li> 
              
                
                
              <li class="nav-item dropdown me-5">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Mes annonces</a> 
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/leboncoin/create_annonce.php">Ajouter une annonce</a></li>
                  <li><a class="dropdown-item" href="/leboncoin/delet_annonce2.php">Supprimer une annonce</a></li>
                  <li><a class="dropdown-item" href="#">Modifer une annoce</a></li>
                </ul>
              </li> 
              ';
            }
            


        ?>
      <form class="d-flex">
        <textarea class="form-control me-5" type="text" placeholder="Recherche"cols="70" rows="1"></textarea>
        <button class="btn btn-primary" type="button">Rechercher</button>
      </form>
    </div>
  </div>
</nav>


