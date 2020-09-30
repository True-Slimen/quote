<?php
require_once(__DIR__ . ('/../../models/quoteModel.php'));

function processRequest()
{
    $viewDatas = [
        'title' => 'Mon titre',
        'datas' => publicQuote() // from sql
    ];

    ob_start();
    $view = include(__DIR__ . '/../views/home.view.php');
    ob_get_contents();
    return $view;
    //ob_end_clean();
}