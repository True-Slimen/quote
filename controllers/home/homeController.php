<?php
include(__DIR__ . ('/../../models/quoteModel.php'));
include(__DIR__ . ('/../../models/userModel.php'));

function processRequest()
{
    $connectedStatus = connectedStatus(); // from sql
    $connectedStatus = $connectedStatus[0];

    $viewDatas = [
        'title' => 'Accueil',
        'datas' => publicQuote() // from sql
    ];

    ob_start();
    $view = include(__DIR__ . '/../views/home.view.php');
    ob_get_contents();
    return $view;
    //ob_end_clean();
}