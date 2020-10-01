<?php 

// echo $viewDatas['title'];

// foreach ($viewDatas['datas'] as $row){
//     echo $row;
   
// }


include(__DIR__ . ('/../views/partials/nav.php'));
?>
    <section class="container mt-5">
    <div class="jumbotron blur-bg">
        <h1 class="display-4">Bienvenue sur Citation !</h1>
        <p class="lead">Catalogue participatif des meilleurs citations que l'on croise sur nos routes</p>
        <hr class="my-4">
        <p>N'hésitez pas à nous rejoindre et laisser votre pierre à l'édifice.</p>
        <p class="lead">
            <a class="btn btn-outline-info" href="index.php?action=sign-up" role="button">Inscrivez-vous !</a>
        </p>
    </div>
    </section>
    <section class="container mt-5">
        <h2 class="mb-4">Citations publiques</h2>
        <?php 
                    for($i = 0; $i < count($viewDatas['datas']); $i++){
                       
                        echo 
                       '<div class="card mt-2 mb-2 blur-bg">
                  
                        <div class="card-header ml-0 mr-0 row justify-content-between">
                            <h4 class="col-12">Citation partagé par '. $viewDatas['datas'][$i]['username'] .'</h4>
                        
                        </div>
                        <div class="card-body bg-white">
                            <blockquote class="blockquote mb-0">
                            <p>' . $viewDatas['datas'][$i]['content'] . '</p>
                            <footer class="blockquote-footer"><cite title="Source Title">' . $viewDatas['datas'][$i]['author'] . '</cite></footer>
                            </blockquote>
                        </div>
                    </div><br>'; 
                    }
                ?>
                
                </div>
                
                </div>
    </section>
    <section class="container">
        <div class="row">
        <div class="col-md-4 col-sm-12 mt-3">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ipsa molestiae, fuga dolore temporibus magnam. Earum cum ipsam, asperiores aspernatur officia, illum eum omnis dignissimos assumenda unde molestias tenetur sed debitis odit hic suscipit eligendi est ullam facilis totam deleniti laboriosam culpa vel aliquid! Dignissimos enim eaque minima aut suscipit velit totam obcaecati modi dolore quae? Neque possimus nostrum dolore?
        </div>
        <div class="col-md-4 col-sm-12 mt-4">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ipsa molestiae, fuga dolore temporibus magnam. Earum cum ipsam, asperiores aspernatur officia, illum eum omnis dignissimos assumenda unde molestias tenetur sed debitis odit hic suscipit eligendi est ullam facilis totam deleniti laboriosam culpa vel aliquid! Dignissimos enim eaque minima aut suscipit velit totam obcaecati modi dolore quae? Neque possimus nostrum dolore?
        </div>
        <div class="col-md-4 col-sm-12 mt-4">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ipsa molestiae, fuga dolore temporibus magnam. Earum cum ipsam, asperiores aspernatur officia, illum eum omnis dignissimos assumenda unde molestias tenetur sed debitis odit hic suscipit eligendi est ullam facilis totam deleniti laboriosam culpa vel aliquid! Dignissimos enim eaque minima aut suscipit velit totam obcaecati modi dolore quae? Neque possimus nostrum dolore?
        </div>
        </div>
    </section>
<?php

require(__DIR__ . ('/../views/partials/footer.php'));


