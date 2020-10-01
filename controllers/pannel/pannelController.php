<?php
require(__DIR__ . ('/../../models/quoteModel.php'));
require(__DIR__ . ('/../../models/userModel.php'));

function processRequest(){
    
        $connectedStatus = connectedStatus(); // from sql
        $connectedStatus = $connectedStatus[0];
        

        if(isset($connectedStatus) && $connectedStatus[0] == 1){

            $_SESSION['userId'];
            $username = manageQuote();

            if(isset($_POST['newQuote'])){
            addQuote();
            }

            $quoteDatas = [
                'datas' => personnalQuote()
            ];

            ob_start();
            $view = include(__DIR__ . '/../views/user/pannel.view.php');
            ob_get_contents();
            return $view;
            //ob_end_clean();

        }else{
            ob_start();
            $view = include(__DIR__ . '/../views/sign-in.view.php');
            ob_get_contents();
            return $view;
            //ob_end_clean();
        }

    
}