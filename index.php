<?php
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/layout/header.php';


function showError(){
    $error = new ErrorController();
    $error->index();
}

if(isset($_GET['controller'])) {
    $nombreControlador = $_GET['controller'].'Controller';    
    
}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $nombreControlador = controller_default;
}else{
    showError();
    exit();
}

if(class_exists($nombreControlador)){
    $controlador = new $nombreControlador;
    /*$controlador->mostrarTodos();
    $controlador->crear();*/
    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        $action = $_GET['action'];
        $controlador->$action();
    }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
        $actionDefault = action_default;
        $controlador->$actionDefault();
    }else{
        $error = new ErrorController();
        $error->index();
    }
}else{
    $error = new ErrorController();
    $error->index();
}

require_once 'views/layout/footer.php'
?>

