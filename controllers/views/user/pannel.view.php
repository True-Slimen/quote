<?php
include(__DIR__ . ('/../partials/nav.php'));


$arrayPersonnalQuote = $quoteDatas['datas'];
//  echo '<pre>';
//  print_r($quoteMessage);
//  echo '</pre>';
?>

<div class="container-fluid">

<div class="jumbotron blur-bg ml-auto mr-auto row col-12 ">
    <div class="col-3 col-sm-2 border pl-0 pr-0 user-menu">
        
        <div class="user-nav-sticky">
            <button type="button" class="btn btn-info col-12 first-user-btn">Button</button>
            <hr class="ml-auto mr-auto mt-0 mb-0">
            <button type="button" class="btn btn-info col-12 second-user-btn">Button</button>
            <hr class="ml-auto mr-auto mt-0 mb-0">
            <button type="button" class="btn btn-info col-12 third-user-btn">Button</button>
        </div>
    </div>
    <div class=" pannel-container col-12 col-md-10">
        <h1 class="display-4">Bienvenue sur votre pannel
            <?php                 
                         echo '<strong class="username">';
                         if(isset($username[0])){
                            echo $username[0];
                         }else{
                             echo $arrayPersonnalQuote[0];
                         }
                         echo '</strong>';                  
                    ?>
                </h1>
        <p class="lead">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis inventore animi distinctio et sequi, quo aut?
        </p>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium totam ea, beatae ducimus maxime exercitationem fugiat et, placeat molestiae suscipit eius. Architecto, provident repellat nam, accusamus asperiores iste eos expedita exercitationem laborum, deserunt aut hic et eius facere rerum aliquam.
        </p>
       <hr class="my-4">
        <div class="row">
            <div class="col-12 col-md-6 border-right">
                <h3>Nouvelle citation</h3>
                <form action="../public/index.php?action=pannel" method="post">
                    <div class="form-group">
                        <textarea  rows="4" class="form-control" name="content" id="content" >Votre citation</textarea> 
                    </div>
                    <div class="form-group mb-2">
                        <input type="text" class="form-control" name="author" id="author" placeholder="L'auteur de la citation" required>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="public-check" class="form-check-input" id="public-check">
                        <label class="form-check-label" for="public-check">Ajouter aux citations publiques</label>
                    </div>
                    <button type="submit" name="newQuote" class="btn btn-info mt-4">Ajouter</button>
                    <div class="mt-4 mb-4" style="height:46px;">
            <?php 
                if (isset($quoteMessage)){
                    ?>            
                        <?php echo $quoteMessage['message'] ?>                
                    <?php
                }
            ?>
        </div>
                </form>
            </div>
            <div class="quote-container col-12 col-md-6">
                
                <?php
                if($arrayPersonnalQuote[1]== 1){
                    echo 
                    '<div class="row justify-content-between px-3 my-2">
                    <h3>Vos citations</h3>
                    <form action="../public/index.php?action=pannel" class="col-md-5 col-sm-6 row justify-content-between" method="post">
                        <button type="submit" value="fillDatabase"  name="fillDatabase" class="btn btn-success col-xs-12">Remplir la base
                        </button>
                        <button type="submit" value="dropDatabase"  name="dropDatabase" class="btn btn-danger col-xs-12">Vider la base
                        </button>
                    </form>
                    </div>'
                    ;
                }
                ?>
                <div class="personnal-quote-frame jumbotron">
                <?php 

                if($arrayPersonnalQuote[1]== 1){
;                    for($x = 2; $x < count($arrayPersonnalQuote); $x++){

                       $status = $arrayPersonnalQuote[$x]['public'];
                       $quoteId = $arrayPersonnalQuote[$x]['id'];
                        echo 
                       '<div class="card mt-2 mb-2 blur-bg">
                        <div class="card-header ml-0 mr-0 row justify-content-between">
                            <h4 class="col-md-7 col-sm-5">Citation</h4>
                            <form action="../public/index.php?action=pannel" class="col-md-5 col-sm-6 pr-0 row justify-content-between" method="post">';
                            if( $status == false){
                                echo '<button type="submit" name="publish" value="'.$quoteId .'" class="btn btn-outline-success col-xs-12">Publier</button>';
                            }else{
                                echo '<button type="submit" name="dispublish" value="'.$quoteId .'" class="btn btn-outline-success col-xs-12">Ne plus publier</button>';
                            }
                            echo'
                            <button type="submit" value="'.$quoteId .'"  name="removeQuote" class="btn btn-outline-danger col-xs-12">X</button>
                            </form>
                        </div>
                        <div class="card-body bg-white">
                            <blockquote class="blockquote mb-0">
                            <p>' . $arrayPersonnalQuote[$x][1] . '</p>
                            <footer class="blockquote-footer"><cite title="Source Title">' . $arrayPersonnalQuote[$x][[2][0]] . '</cite></footer>Partagé par  ' . $arrayPersonnalQuote[$x]['username'] . '
                            </blockquote>
                        </div>
                    </div><br>'; 
                    }
                }else{

                    for($i = 2; $i < count($arrayPersonnalQuote); $i++){
                       
                        echo 
                       '<div class="card mt-2 mb-2 blur-bg">
                  
                        <div class="card-header ml-0 mr-0 row justify-content-between">
                            <h4 class="col-md-7 col-sm-5">Citation</h4>
                            <form action="../public/index.php?action=pannel" class="col-md-5 col-sm-6 pr-0 row justify-content-between" method="post">'. $arrayPersonnalQuote[$i][2]['button'] .'
                            <button type="submit" value="'.$arrayPersonnalQuote[$i][0]['quoteId'] .'"  name="removeQuote" class="btn btn-outline-danger">X</button>
                            </form>
                        </div>
                        <div class="card-body bg-white">
                            <blockquote class="blockquote mb-0">
                            <p>' . $arrayPersonnalQuote[$i][3]['content'] . '</p>
                            <footer class="blockquote-footer"><cite title="Source Title">' . $arrayPersonnalQuote[$i][4]['author'] . '</cite></footer>' . $arrayPersonnalQuote[$i][5]['create_at'] . '
                            </blockquote>
                        </div>
                    </div><br>'; 
                    }}
                ?>
                
                </div>
                
            </div>
        </div>
            <a class="btn btn-outline-danger btn-animate" href="index.php?action=user" role="button">Se déconnecter</a>
        </p>
        </div>
    </div>
    </div>
<?php

include(__DIR__ . ('/../../views/partials/footer.php'));

