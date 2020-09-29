<?php $title = 'Se connecter'; ?>
<?php require_once(__DIR__ . '/partials/nav.php');?>
<section class="container">
        <div class="mt-4 mb-4" style="height:46px;">
            <?php 
                if (isset($success)){
                    
                    
                        $success;
                    
                    
                }elseif (isset($errMessage)){
            
                    
                        $errMessage;
                    
                 
                }
                // $_SESSION['success'] = " ";
                // $_SESSION['err'] = " ";
            ?>
        </div>
        <div class="jumbotron blur-bg row justify-content-between">
            <div class="col-md-5 col-sm-12">
                <h1 class="display-4">Connectez-vous</h1>
                <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis inventore animi distinctio et sequi, quo aut?</p>
                <hr class="my-4">
            
                <form action="./controller/controller.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Votre identifiant" required>
                    </div>
                    <div class="form-group mb-2">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Votre mot de passe" required>
                    </div>
                    <button type="submit" name="connection" class="btn btn-info mt-4 mb-4">Se connecter</button>
                </form>
        </div>
        <div class="col-md-6">
            <h2>Lorem ipsum dolor sit.</h2>
            <p class="mt-3 mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus officiis modi ratione quis! Tempore, dolores voluptatum! Voluptatum dignissimos aliquam mollitia quos dolores quibusdam impedit placeat, maiores nemo numquam veniam assumenda.</p>
            <p class="mt-3 mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus officiis modi ratione quis! Tempore, dolores voluptatum! Voluptatum dignissimos aliquam mollitia quos dolores quibusdam impedit placeat, maiores nemo numquam veniam assumenda.</p>
        </div>
    </section>
<?php
require_once(__DIR__ . '/partials/footer.php');