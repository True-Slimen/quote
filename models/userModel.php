<?php

function disconnect(){
    include(__DIR__ . ('/../src/database/database.php'));

    $userId = $_SESSION['userId'];

    $updtateConenctedStatus = $debate->exec("UPDATE redactor SET connected_status = 0 WHERE id = $userId");

    $connectedStatus = 0;

    return $connectedStatus;
}

function connectedStatus(){
    include(__DIR__ . ('/../src/database/database.php'));

    $userId = $_SESSION['userId'];

    $getConnectedStatus = $debate->prepare("SELECT connected_status FROM redactor WHERE id = $userId");

    $getConnectedStatus->execute();
    while($currentStatus = $getConnectedStatus->fetch()){
        $connectedStatus = $currentStatus;
    }

    return $connectedStatus;
}
