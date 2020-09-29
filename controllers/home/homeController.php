<?php


function processRequest(){

    require_once(__DIR__ . ('/../../src/database/database.php'));

    // $viewDatas = [
    //     'title' => 'Mon titre',
    //     'datas' => [$resultSet] // from sql
    // ];

    $arrayPublicQuote = [];

    $getPublicQuote = $debate->prepare("SELECT quote.content, quote.author, redactor.username
    FROM public_quote
    JOIN quote ON public_quote.quote_id = quote.id
    JOIN redactor ON quote.redactor_id = redactor.id
    ");
    
        $getPublicQuote->execute();

            while($publicQuote = $getPublicQuote->fetch()){

                array_push($arrayPublicQuote, [$publicQuote]);
            }
            
    $viewDatas = [
        'title' => 'Mon titre',
        'datas' => [$arrayPublicQuote] // from sql
    ];

    ob_start();
    $view = include(__DIR__ . '/../views/home.view.php');
    ob_get_contents();
    return $view;
    ob_end_clean();
}