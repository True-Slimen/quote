<?php
require_once(__DIR__ . ('/../../models/sign-inModel.php'));
include(__DIR__ . ('/../../models/quoteModel.php'));

function processRequest(){
    //require_once(__DIR__ . ('/../../src/database/database.php'));
    
    $viewDatas = [
        'title' => 'Se connecter',
        'datas' => connectUser()
    ];
    
    //print_r($viewDatas['datas']);
    if(!empty($viewDatas['datas'][1]) && $viewDatas['datas'][1] == 1){
        $loggedin = $viewDatas['datas'][1];
        
        $_SESSION['userId'] = $viewDatas['datas'][2];
        $userId = $viewDatas['datas'][2];

        $quoteDatas = [
            'datas' => personnalQuote()
        ];

        ob_start();
        $view = include(__DIR__ . '/../views/user/pannel.view.php');
        ob_get_contents();
        return $view;
        ob_end_clean();
    
    }else{
        $loggedin = 0;
    
        ob_start();
        $view = include(__DIR__ . '/../views/sign-in.view.php');
        ob_get_contents();
        return $view;
        ob_end_clean();
    }
}
