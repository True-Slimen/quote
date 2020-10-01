<?php ?>
<footer class="mt-5 pt-4 pb-4 bottom-footer blur-bg">
    <section class="container"> 
        <div class="row ml-auto mr-auto">
        <div class="col-md-4 col-sm-12">
        <ul class="">
                    <li>
                    <a class="lien_a" href="index.php?action=home">Accueil</a>
                    </li>
                    <li>
                    <?php 
                        if(isset($connectedStatus) && $connectedStatus == 1){
                            echo '<a class="lien_a" href="index.php?action=user">Se déconnecter</a>';
                            
                        }else{
                            echo '<a class="lien_a" href="index.php?action=sign-up">S\'inscrire</a>';
                            echo '<a class="lien_a" href="index.php?action=user">Se connecter</a>';
                        }    
                    ?>
                    </li>
                    <li>
                    <?php 
                        if(isset($connectedStatus) && $connectedStatus == 1){
                            echo '<a class="lien_a" href="index.php?action=pannel">Mon compte</a>';   
                        }   
                    ?>
                    </li>
            </ul>
        </div>
        <div class="col-md-4 col-sm-12">
            <ul class="">
                    <li>
                        <a class="lien_a" href="index.php?action=help">Aide</a>
                    </li>
                    <li>
                        <a href="#">Lorem ipsum dolor sit.</a>
                    </li>
                    <li>
                        <a href="#">Lorem ipsum dolor sit.</a>
                    </li>
            </ul>
        </div>
        <div class="col-md-4 col-sm-12">
        <ul class="">
                    <li>
                        <a href="#">Lorem ipsum dolor sit.</a>
                    </li>
                    <li>
                        <a href="#">Lorem ipsum dolor sit.</a>
                    </li>
                    <li>
                        <a href="#">Lorem ipsum dolor sit.</a>
                    </li>
            </ul>
        </div>
        <small class="ml-auto mr-auto"><i>Slimen Metatidj - Avec un peu de php saupoudré de café</i></small>
        </div>
    </section>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="./assets/js/bootstrap.min.js"></script>