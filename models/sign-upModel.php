<?php

function addUser(){
    include(__DIR__ . ('/../src/database/database.php'));
    $arrayUserDatas = [];
    // get fields value, if exist and not empty

    $loggedAuth = 0;

        if(!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['password2'])){

            function dataValid($userData){
                $userData = trim($userData);
                $userData = stripslashes($userData);
                $userData = htmlspecialchars($userData);
                return $userData;
            }
        
            if(isset($_POST['registration'])){
                $prefixe = 'solide96*';
                $identifiant = dataValid($_POST['name']);
                $mail = dataValid($_POST['email']);
                $pass = htmlspecialchars($_POST['password']). $prefixe;
                $pass2 = htmlspecialchars($_POST['password2']). $prefixe;
                $hashedpass = hash('sha512', $pass);
                $hashedpass2 = hash('sha512', $pass2);
            
            $identifiantLength = strlen($identifiant);
            if($identifiantLength <=30){
    
                $reqIdentifiant = $debate->prepare("SELECT * FROM redactor WHERE username = ?");
                $reqIdentifiant->execute(array($identifiant));
                $identifiantExist = $reqIdentifiant->rowCount();
                if($identifiantExist == 0){
    
                    
                        if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
    
                            $reqMail = $debate->prepare("SELECT * FROM redactor WHERE mail = ?");
                            $reqMail->execute(array($mail));
                            $mailExist = $reqMail->rowCount();
                            if($mailExist == 0){
                                if($hashedpass == $hashedpass2){
    
                                    $sql = $debate->prepare("INSERT INTO redactor(username, mail, password) VALUES(?, ?, ?)");
                                    $sql->execute(array($identifiant,$mail,$hashedpass));
    
                                    $userId = $debate->lastInsertId();
    
                                    $role = 0;
                                    $setUserRole = $debate->prepare("INSERT INTO role_user(role_user_state, redactor_id) VALUES(?, ?)");
                                    $setUserRole->execute(array($role,$userId));
    
    
                                    $success = "Votre compte à bien été créé.";
                                    $loggedAuth = 1;
                                    // ob_start();
                                    // $view = include(__DIR__ . '/../views/sign-in.view.php');
                                    // ob_get_contents();
                                    // return $view;
                                    // ob_end_clean(); 
                                    
                                }else{
                                    $err = "Vos mots de passes ne correspondent pas.";
                                    
                                }
                            }else{
                                $err = "Cette adresse mail est déjà prise.";
                                
                            }
                   
                        }else{
                            $err = "Votre adresse mail n'est pas valide.";
                            
                        }
    
                    }else{
                        $err = "Ce identifiant est déjà pris.";
                        
                    }
    
                    }else{
                        $err ="Votre pseudo ne doit pas dépasser 30 caractères.";
                        
                    }
    
                }else{
                    $err = "Tous les champs doivent être remplis";
                    
                }if(isset($success)){
                    $successContainer = 
                    '<div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <p class="mb-0">' . $success . '</p>
                    </div>';
                    array_push($arrayUserDatas, $successContainer);
                }else{
                    $errContainer = 
                    '<div class="alert alert-dismissible alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <p class="mb-0">' . $err . '</p>
                    </div>';  
                    array_push($arrayUserDatas, $errContainer);
                }


            array_push($arrayUserDatas, $loggedAuth);  
            //echo $loggedAuth; 
            return $arrayUserDatas; 
    }
}