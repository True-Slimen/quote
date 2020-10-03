<?php
require(__DIR__ . ('/../../models/quoteModel.php'));
require(__DIR__ . ('/../../models/userModel.php'));

function processRequest(){

        $connectedStatus = connectedStatus(); // from sql
        $connectedStatus = $connectedStatus[0];
        
        if(isset($connectedStatus) || $connectedStatus[0] == 1){

            $_SESSION['userId'];
            $username = manageQuote();
            

            if(isset($_POST['newQuote'])){
            
                $quoteMessage = [
                    'message' => addQuote()
                ];
            }

            if(isset($_POST['fillDatabase'])){
                fillDataBase();
            }

            if(isset($_POST['dropDatabase'])){
                echo 'deleter';
                dropDataBase();
            }

            $quoteDatas = [
                'datas' => personnalQuote()
            ];

            ob_start();
                include(__DIR__ . '/../views/user/pannel.view.php');
            $view = ob_get_contents();
            ob_end_clean();   
            return $view;

        }else{
            ob_start();
                include(__DIR__ . '/../views/sign-in.view.php');
            $view = ob_get_contents();
            ob_end_clean();   
            return $view;
        }
}