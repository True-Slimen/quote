<?php

function connectUser(){
    include(__DIR__ . ('/../src/database/database.php'));
    $arrayUserDatas = [];
    $loggedin = 0;
    $userId = null;
    // get fields value, if exist and not empty

    if((!empty($_POST['name']) && !empty($_POST['password']))){
        $identifiant = htmlspecialchars($_POST['name']);
        $prefixe = 'solide96*';
        $pass = $_POST['password']. $prefixe;
        $hashedpass = hash('sha512', $pass);
        
            $reqIdPass = $debate->prepare("SELECT * FROM redactor WHERE username = ? AND password = ?");
            
            $reqIdPass->execute(array($identifiant, $hashedpass));
            $identifiantExist = $reqIdPass->rowCount();
    
            while($userId = $reqIdPass->fetch()){
                $result = $userId['id'];
                
            }
    
            if($identifiantExist == 1){
                $identifiantHTML = $identifiant;
                $loggedin = 1;
                $userId = intval($result);

                $updtateConenctedStatus = $debate->exec("UPDATE redactor SET connected_status = 1 WHERE id = $userId");
                $connectedStatus = 1;
                array_push($arrayUserDatas, $connectedStatus);
            }else{
                $err = "Erreur dans les identifiants de connexion";
              
    }if($loggedin == 1){
        $successContainer = 
        '<div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p class="mb-0">Connexion réussie</p>
        </div>';
        array_push($arrayUserDatas, $successContainer);
    }else if(isset($err)){
        $errContainer = 
        '<div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p class="mb-0">' . $err . '</p>
        </div>';  
        array_push($arrayUserDatas, $errContainer);
    }
 }
    array_push($arrayUserDatas, $loggedin, $userId);
    return $arrayUserDatas; 
}