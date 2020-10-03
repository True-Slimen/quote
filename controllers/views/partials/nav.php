<?php ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php $title ?></title>
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
 <link rel="stylesheet" href="./assets/css/style.css">

</head>
<body>
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light mb-5">
 <a class="navbar-brand" href="index.php?action=home">C!tation ?</a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
 </button>
 <div class="collapse navbar-collapse" id="navbarText">
   <div class="col-md-8 col-sm-12 mr-auto">
   <a class="lien_a" href="index.php?action=home"><button class="btn btn-outline-dark btn-animate" type="button">Accueil</button></a>
   <?php 
           if(isset($connectedStatus) && $connectedStatus == 1){
              echo '<a class="lien_a" href="index.php?action=pannel"><button class="btn btn-outline-dark btn-animate" type="button">Mon compte</button></a>';  
               
           }else{
               echo '<a class="lien_a" href="index.php?action=sign-up"><button class="btn btn-outline-dark btn-animate" type="button">S\'inscrire</button></a>';
              echo '<a class="lien_a" href="index.php?action=sign-in"><button class="btn btn-outline-dark btn-animate" type="button">Se connecter</button></a>';
          }    
      ?>
   </div>
   
   

   <span class="col-md-4 col-sm-12 text-right navbar-text">
   <?php 
           if(isset($connectedStatus) && $connectedStatus == 1){
              echo '<a class="lien_a" href="index.php?action=user"><button class="btn btn-outline-danger btn-animate" type="button">Se déconnecter</button></a>';
           }   
       ?>
       <a class="lien_a" href="index.php?action=help"><button class="btn btn-outline-success btn-animate" type="button">Aide</button></a>
   </span>
 </div>
</nav>