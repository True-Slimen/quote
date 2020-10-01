<?php
include(__DIR__ . ('/../../models/quoteModel.php'));

function processRequest()
{
    

    $viewDatas = [
        'title' => 'panneau',
        'datas' => personnalQuote() // from sql
    ];

    ob_start();
        include(__DIR__ . '/../views/user/pannel.view.php');
    $view = ob_get_contents();
    ob_end_clean();
    return $view;
}