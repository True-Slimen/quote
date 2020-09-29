<?php

function processRequest(){
    require_once(__DIR__ . ('/../../src/database/database.php'));

    $loggedAuth = 0;

    if(isset($_POST['registration'])){
        $prefixe = 'solide96*';
        $identifiant = htmlspecialchars($_POST['name']);
        $mail = htmlspecialchars($_POST['email']);
        $pass = $_POST['password'] . $prefixe;
        $pass2 = $_POST['password2']. $prefixe;
        $hashedpass = hash('sha512', $pass);
        $hashedpass2 = hash('sha512', $pass2);
        

        if(!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['password2'])){
            
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
                                    $successContainer = 
                                    '<div class="alert alert-dismissible alert-success">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <p class="mb-0">' . $success . '</p>
                                    </div>';
                                    $loggedAuth = true;
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
                    
                }if(isset($err)){
                    $errContainer = 
                    '<div class="alert alert-dismissible alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <p class="mb-0">' . $err . '</p>
                    </div>';  
                }
                   
                 
    }

    // if(isset($successContainer)){
        
    // }else{
    //     $successContainer = "";
    // }

    // if(isset($errContainer)){
       
    // }else{
    //     $errContainer = "";
    // }

    $viewDatas = [
        'title' => 'S\'inscrire',
        'datas' => 'nothing',
    ];

    

        if($loggedAuth == true){
            ob_start();
            $view = include(__DIR__ . '/../views/sign-in.view.php');
            ob_get_contents();
            return $view;
            ob_end_clean();
        }else if($loggedAuth == 0){
            ob_start();
            $view = include(__DIR__ . '/../views/sign-up.view.php');
            ob_get_contents();
            return $view;
            ob_end_clean();
        }
    
        
    
}