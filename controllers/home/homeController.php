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
        include(__DIR__ . '/../views/home.view.php');
    $view = ob_get_contents();
    ob_end_clean();
    return $view;
}