<?php


function processRequest(){

    require_once(__DIR__ . ('/../../src/database/database.php'));

    //$loggedin = false;
    
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

            $userId = intval($result);
              
            $loggedin = true;
        }else{
            $err = "Erreur dans les identifiants de connexion";
            $errMessage = 
            '<div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p class="mb-0">' . $err . '</p>
            </div>';
            $loggedin = false;
        }   
}$err = "Tout les champs doivent être remplis";
    $errMessage = 
    '<div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p class="mb-0">' . $err . '</p>
    </div>';


    // $viewDatas = [
    //     'title' => 'Mon titre',
    //     'datas' => [$resultSet] // from sql
    // ];

    if($loggedin == true){
        ob_start();
        $view = include(__DIR__ . '/../views/user/pannel.view.php');
        ob_get_contents();
        return $view;
        ob_end_clean();
    }else if($loggedin == false){
        ob_start();
        $view = include(__DIR__ . '/../views/sign-in.view.php');
        ob_get_contents();
        return $view;
        ob_end_clean();
    }
}