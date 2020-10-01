<?php
require(__DIR__ . ('/../../models/sign-inModel.php'));
require(__DIR__ . ('/../../models/quoteModel.php'));
require(__DIR__ . ('/../../models/userModel.php'));

function processRequest(){
    //require_once(__DIR__ . ('/../../src/database/database.php'));
    
    $viewDatas = [
        'title' => 'Se connecter',
        'datas' => connectUser()
    ];
    
    if(!empty($viewDatas['datas'][2]) && $viewDatas['datas'][2] == 1){
        $loggedin = $viewDatas['datas'][2];
        
        $_SESSION['userId'] = $viewDatas['datas'][3];
        $userId = $viewDatas['datas'][3];
        $quoteDatas = [
            'datas' => personnalQuote()
        ];
        
        $connectedStatus = connectedStatus(); // from sql
        $connectedStatus = $connectedStatus[0];
        ob_start();
                include(__DIR__ . '/../views/user/pannel.view.php');
            $view = ob_get_contents();
            ob_end_clean();   
            return $view;
    
    }else{
        $loggedin = 0;
    
        ob_start();
            include(__DIR__ . '/../views/sign-in.view.php');
        $view = ob_get_contents();
        ob_end_clean();   
        return $view;
    }
}
