<?php
session_start();

$urlValue = 'home';


$controller = array_key_exists('action', $_GET) ? $_GET['action'] : $urlValue;
$controllerFile = '../controllers/' . $controller . '/' . $controller . 'Controller.php';
if(file_exists($controllerFile)){
  require_once($controllerFile);
  $view = processRequest();
}else{
  $view = '“Nous trouverons un chemin... ou nous en créerons un.” Hannibal. <br> Malgré ça la route demandé n\'existe pas...';
}

echo $view;