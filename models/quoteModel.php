<?php

function manageQuote(){
    include(__DIR__ . ('/../src/database/database.php'));

    if(isset($_POST['publish'])){
        $quoteId = htmlspecialchars($_POST['publish']);

    
        $publishQuote = $debate->exec("UPDATE quote SET public = true WHERE id = $quoteId");
    
        $postPublicQuote = $debate->prepare("INSERT INTO public_quote(quote_id) VALUES(?)");
        $postPublicQuote->execute(array($quoteId));
    
    }else if(isset($_POST['dispublish'])){
        $quoteId = htmlspecialchars($_POST['dispublish']);

    
        $dispublishQuote = $debate->exec("UPDATE quote SET public = false WHERE id = $quoteId");
    
        $deletePublicQuote = $debate->exec("DELETE FROM public_quote WHERE quote_id = $quoteId");
           
    }else if(isset($_POST['removeQuote'])){
        $quoteId = htmlspecialchars($_POST['removeQuote']);

    
        $deleteQuote = $debate->exec("DELETE FROM quote WHERE id = $quoteId");
    }

    $userId = $_SESSION['userId'];

    $getUserName = $debate->prepare("SELECT username FROM redactor WHERE id = $userId");

    $getUserName->execute();
    while($username = $getUserName->fetch()){
        $currentUsername = $username;
    }
    return $currentUsername;
}

function addQuote(){
    include(__DIR__ . ('/../src/database/database.php'));

    
        $content = htmlspecialchars($_POST['content']);
        $author = htmlspecialchars($_POST['author']);
        
        if(!empty($_POST['content'] AND !empty($_POST['author']))){

            $userId = $_SESSION['userId'];

            $getUserName = $debate->prepare("SELECT username FROM redactor WHERE id = $userId");

            $getUserName->execute();

        while($username = $getUserName->fetch()){
              $currentUsername = $username;
        }
    
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
    
                $quoteAdded = 1;
                
                $message = 'Citation ajoutée';
                $messageContainer =
                '<div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <p class="mb-0">' . $message . '</p>
                </div>';

    
        }$message = "Tout les champs doivent être remplis";
        $messageContainer = 
        '<div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p class="mb-0">' . $message . '</p>
        </div>';

        return $messageContainer;
    
}

function publicQuote(){
    include(__DIR__ . ('/../src/database/database.php'));
    $arrayPublicQuote = [];

    $getPublicQuote = $debate->prepare("SELECT quote.content, quote.author, redactor.username
    FROM public_quote
    JOIN quote ON public_quote.quote_id = quote.id
    JOIN redactor ON quote.redactor_id = redactor.id
    ");
    
        $getPublicQuote->execute();

            while($publicQuote = $getPublicQuote->fetch()){
                //print_r($publicQuote);
                array_push($arrayPublicQuote, $publicQuote);
            }
            // print_r($arrayPublicQuote);
            return $arrayPublicQuote;
}

function personnalQuote(){
    include(__DIR__ . ('/../src/database/database.php'));
    $arrayPersonnalQuote = [];

    $userId = $_SESSION['userId'];
    //WHERE role_user.redactor_id = $userId
        $getUserRole = $debate->prepare("SELECT role_user.role_user_state, redactor.username 
        FROM role_user
        JOIN redactor ON role_user.redactor_id = redactor.id
        WHERE role_user.redactor_id = $userId
        ");

        $getUserRole-> execute();

        while($userRole = $getUserRole->fetch()){
            $userName = $userRole['username'];
            $userRole = $userRole['role_user_state'];
            array_push($arrayPersonnalQuote, $userName, $userRole);
        }
        $userRole = $arrayPersonnalQuote[1];

        if($userRole == 1){
            
            $arrayAllQuote = [];
            $getAllQuote = $debate->prepare("SELECT quote.id, quote.content, quote.author, quote.create_at, quote.public, redactor.username FROM quote
            JOIN redactor ON quote.redactor_id = redactor.id 
            ");

            $getAllQuote->execute();

            while($allQuote = $getAllQuote->fetch()){
            array_push($arrayPersonnalQuote, $allQuote);
            }
            if($arrayPersonnalQuote){
            $status = $arrayPersonnalQuote[0][[4][0]];
            }

            

        }else{
       
        $getPersonnalQuote = $debate->query("SELECT id, content, author, create_at, public FROM quote WHERE redactor_id = '$userId'");

            while($personnalQuote = $getPersonnalQuote->fetch()){
               $quoteId = $personnalQuote['id'];
               $content = $personnalQuote['content'];               
               $author = $personnalQuote['author'];               
               $create_at = $personnalQuote['create_at'];
               $status = $personnalQuote['public'];

               if($status == false){
                    $updateBtn = '<button type="submit" name="publish" value="'.$quoteId .'" class="btn btn-outline-success col-9">Publier</button>';
               }else{
                    $updateBtn = '<button type="submit" name="dispublish" value="'.$quoteId .'" class="btn btn-outline-success col-9">Ne plus publier</button>';
               }
               
               array_push($arrayPersonnalQuote, 
                   [ ['quoteId' => $quoteId], 
                    ['quoteStatus' => $status], 
                    ['button' => $updateBtn], 
                    ['content' => $content], 
                    ['author' => $author], 
                    ['create_at' => $create_at],
                    ['userRole' => 0],
                    
                    ]);
            }
            
          }

    return $arrayPersonnalQuote;
}
