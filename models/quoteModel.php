<?php

function manageQuote(){
    include(__DIR__ . ('/../src/database/database.php'));

    if(isset($_POST['publish'])){
        $quoteId = htmlspecialchars($_POST['publish']);
        echo 'publiée';
    
        $publishQuote = $debate->exec("UPDATE quote SET public = true WHERE id = $quoteId");
    
        $postPublicQuote = $debate->prepare("INSERT INTO public_quote(quote_id) VALUES(?)");
        $postPublicQuote->execute(array($quoteId));
    
        header("Location: ../index.php?action=userHome");
        exit;
    
    }else if(isset($_POST['dispublish'])){
        $quoteId = htmlspecialchars($_POST['dispublish']);
        echo 'dépubliée';
    
        $dispublishQuote = $debate->exec("UPDATE quote SET public = false WHERE id = $quoteId");
    
        $deletePublicQuote = $debate->exec("DELETE FROM public_quote WHERE quote_id = $quoteId");
        
        
    
    }else if(isset($_POST['removeQuote'])){
        $quoteId = htmlspecialchars($_POST['removeQuote']);
        echo 'delete';
    
        $deleteQuote = $debate->exec("DELETE FROM quote WHERE id = $quoteId");
        
    }

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
    echo $userId;
    //WHERE role_user.redactor_id = $userId
        $getUserRole = $debate->query("SELECT role_user.role_user_state, redactor.username 
        FROM role_user
        JOIN redactor ON role_user.redactor_id = redactor.id
        WHERE role_user.redactor_id = $userId
        
        ");
        while($userRole = $getUserRole->fetch()){
            $userName = $userRole['username'];
            $userRole = $userRole['role_user_state'];
                
        }

     if($userRole == 1){
        // $userRoleState = 1;

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
                    ['username' => $userName]
                    ]);
            }
            
          }
          //echo 'le rooolle' . $arrayPersonnalQuote[0];
          //print_r($arrayPersonnalQuote);
    return $arrayPersonnalQuote;
}
