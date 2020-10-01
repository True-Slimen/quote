<?php
require(__DIR__ . ('/../../models/userModel.php'));

function processRequest()
{
    $userDatas = [
        'datas' => disconnect() // from sql
    ];

    ob_start();
    $view = include(__DIR__ . '/../views/sign-in.view.php');
    ob_get_contents();
    return $view;
    //ob_end_clean();
}