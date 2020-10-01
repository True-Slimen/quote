<!-- Le principle c'est de séparer la vue (ce qui est présenté à l'utilisateur), du modèle (les données qui doivent être transmises à la vue). Le contrôleur choisit en fonction d'une requête : le modèle à charger, et la vue à qui les transmettre... La vue se charge de la mise en forme, enfin, le contrôleur transmets la vue "traitée" en tant que réponse HTTP (le seul et unique echo) qu'il devrait y avoir -->

<!-- index reçoit la requête : ?controller=home
index requiert le contrôleur (require_once('homeController.php')
  homeController charge les données, (database et query)
  homeController charge la vue et récupère le résultat dans une variable
index récupère cette variable
index echo la variable -->
<?php
session_start();

$urlValue = $_GET['action'];


$controller = array_key_exists('action', $_GET) ? $_GET['action'] : $urlValue;
$controllerFile = '../controllers/' . $controller . '/' . $controller . 'Controller.php';
require_once($controllerFile);
$view = processRequest();

//echo $view;