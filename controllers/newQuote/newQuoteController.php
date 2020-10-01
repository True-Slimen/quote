<?php
include(__DIR__ . ('/../../models/quoteModel.php'));

function processRequest()
{
    

    $viewDatas = [
        'title' => 'panneau',
        'datas' => personnalQuote() // from sql
    ];

    ob_start();
    $view = include(__DIR__ . '/../views/user/pannel.view.php');
    ob_get_contents();
    return $view;
    //ob_end_clean();
}