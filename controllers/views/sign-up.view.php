<?php
include(__DIR__ . ('/../views/partials/nav.php'));
?>

<section class="container mt-5">
    <div class="row justify-content-between">
        <div class="jumbotron blur-bg col-md-5">
            <h1 class="display-4">Rejoignez Citation</h1>
            <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis inventore animi distinctio et sequi, quo aut?</p>
            <hr class="my-4">

                    <div class="mt-4 mb-4" style="height:46px;">

                        <?php
                        if (isset($viewDatas['datas'])){
                            echo $viewDatas['datas'][0];
                        }
                        ?>
                    </div>

            <form action="../public/index.php?action=sign-up" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Votre identifiant" required>
                </div>
                <div class="form-group mb-2">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Votre adress email" required>
                </div>
                <div class="form-group mt-5">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Votre mot de passe" required>
                </div>  
                <div class="form-group mb-4">
                    <input type="password" class="form-control" name="password2" id="password2" aria-describedby="passHelp" placeholder="Votre mot de passe" required>
                    <small id="emailHelp" class="form-text text-muted">Un jour une personne à dit <i>"Ne communiquez jamais votre mot de passe"</i></small>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="confidential-check" required>
                    <label class="form-check-label" for="confidential-check">J'accepte la politique de confidentialité de Citation</label>
                </div>
                <button type="submit" name="registration" class="btn btn-info mt-4">S'inscrire</button>
            </form>
        </div>
        <div class="col-md-6 col-sm-12">
            <h2>4 bonnes raisons de vous inscrire</h2>
            <ul>
                <li class="mt-3">
                    <i>"L'important c'est de participer"</i>
                </li>
                <li class="mt-3">
                    <i>"Plus on est de fou, plus on cite !"</i>
                </li>
                <li class="mt-3">
                    <i>"A cheval donné, on ne regarde pas ses dents"</i>
                </li>
                <li class="mt-3">
                    <i>Vous pouvez faire des notes personnel, c'est pas très pratique comme pense bête, mais ça marche !</i>
                </li>
            </ul>
            <a class="lien_a" href="index.php?action=sign-in"><button class="btn btn-info" type="button">Se connecter</button></a>
        </div>
    </div>
    </section>

    <?php include(__DIR__ . ('/../views/partials/footer.php'))?>