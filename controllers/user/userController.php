<?php


function processRequest(){

    require_once(__DIR__ . ('/../../src/database/database.php'));
    
    // $viewDatas = [
    //     'title' => 'Mon titre',
    //     'datas' => [$resultSet] // from sql
    // ];

    $arrayPublicQuote = [];

    if(isset($_POST['newQuote'])){
        $content = htmlspecialchars($_POST['content']);
        $author = htmlspecialchars($_POST['author']);
        
        if(!empty($_POST['content'] AND !empty($_POST['author']))){
            if(isset($_SESSION['username'])){
    
                if(isset($_POST['public-check'])){
                    $public = true;
                }else{
                    $public = false;
                }
    
                $userId = $_SESSION['userId'];
                
                $postQuote = $debate->prepare("INSERT INTO quote(content, author, public, redactor_id) VALUES(?, ?, ?, ?)");
                $postQuote->execute(array($content, $author, $public,$userId));
    
                $quoteId = $debate->lastInsertId();
                if($public == true){
            
                    $postPublicQuote = $debate->prepare("INSERT INTO public_quote(quote_id) VALUES(?)");
                    $postPublicQuote->execute(array($quoteId));
               
                }
    
                $success = 'Citation ajoutée';
                $_SESSION['loggedin']= true;
                $_SESSION['userId']= $userId;
                $_SESSION['success'] = 
                '<div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <p class="mb-0">' . $success . '</p>
                </div>';
               header("Location: ../index.php?action=userHome");
               exit;
    
            }$err = "Pas de nom d'utilisateur";
            $_SESSION['err'] = 
            '<div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p class="mb-0">' . $err . '</p>
            </div>';
            header("Location: ../index.php?action=userHome");
            exit;
    
        }$err = "Tout les champs doivent être remplis";
        $_SESSION['err'] = 
        '<div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p class="mb-0">' . $err . '</p>
        </div>';
        header("Location: ../index.php?action=userHome");
        exit;
    }    
    $viewDatas = [
        'title' => 'Mon titre',
        'datas' => [$arrayPublicQuote] // from sql
    ];

    ob_start();
    $view = include(__DIR__ . '/../views/user/pannel.view.php');
    ob_get_contents();
    return $view;
    ob_end_clean();
}