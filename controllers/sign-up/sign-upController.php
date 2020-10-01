<?php
require_once(__DIR__ . ('/../../models/sign-upModel.php'));

function processRequest(){
    require(__DIR__ . ('/../../src/database/database.php'));

    $viewDatas = [
        'title' => 'S\'inscrire',
        'datas' => addUser()
    ];

    //print_r($viewDatas['datas']);
    //echo '<br>';
    //echo (gettype($viewDatas['datas'][2]);

    if(!empty($viewDatas['datas'][1])){
        $loggedAuth = $viewDatas['datas'][1];
    }else{
        $loggedAuth = 0;
    }

        if($loggedAuth == 1){
            ob_start();
            $view = include(__DIR__ . '/../views/sign-in.view.php');
            ob_get_contents();
            return $view;
            ob_end_clean();
        }else if($loggedAuth == 0)
            ob_start();
            $view = include(__DIR__ . '/../views/sign-up.view.php');
            ob_get_contents();
            return $view;
            ob_end_clean();
        
    
        
    
}