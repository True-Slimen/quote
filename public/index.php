<?php
session_start();

$urlValue = 'home';

$controller = array_key_exists('action', $_GET) ? $_GET['action'] : $urlValue;
$controllerFile = '../controllers/' . $controller . '/' . $controller . 'Controller.php';
if(file_exists($controllerFile)){
  require_once($controllerFile);
  $view = processRequest();
}else{
  $view = include('../controllers/views/page404.view.php');
  exit;
}

echo $view;
