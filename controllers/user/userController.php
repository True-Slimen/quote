<?php
require(__DIR__ . ('/../../models/userModel.php'));

function processRequest()
{
    $userDatas = [
        'datas' => disconnect() // from sql
    ];

    ob_start();
        include(__DIR__ . '/../views/sign-in.view.php');
    $view = ob_get_contents();
    ob_end_clean();   
    return $view;
}