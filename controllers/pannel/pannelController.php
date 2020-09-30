<?php
include(__DIR__ . ('/../../models/quoteModel.php'));

function processRequest()
{
    $_SESSION['userId'];
    // $viewDatas = [
    //     'title' => 'pannel',
    //     'datas' => manageQuote() // from sql
    // ];

    $quoteDatas = [
        'datas' => personnalQuote()
    ];

    ob_start();
    $view = include(__DIR__ . '/../views/user/pannel.view.php');
    ob_get_contents();
    return $view;
    //ob_end_clean();
}