<?php
$serverName = "localhost";
$dbName = "citationdb";
$username = "root";
$dbPassword = "";
// $debate;
//tentative de connexion
try{
    $debate = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $username, $dbPassword);

    
        //Définition du mode d'erreur de PDO sur Exception
    $debate->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
    header("Location: ../index.php?action=page404");
    exit;
}

if(isset($debate)){
    $resultSet = ' true';
    echo 'true';
}else{
    $resultSet = 'false';
}