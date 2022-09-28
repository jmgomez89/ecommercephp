<?php
session_start();
require_once 'autoload.php';
require_once 'views/layout/header.php';
require_once 'config/parameters.php';
require_once 'config/db.php';
require_once 'helpers/utilities.php';


function show_error(){
    $error = new wrong();
    $error->index();
}

if(isset($_GET['controller'])){

    $controller_name = $_GET['controller'];

}elseif(!isset($_GET['controller']) && !isset($_GET['action']) ){

    $controller_name = CONTROLLER_DEFAULT;
    $_GET['action'] = ACTION_DEFAULT;

}else{
    show_error();
}

if(class_exists(ucfirst($controller_name))){

    $class = ucfirst($controller_name);
    $controller = new $class();

    if(isset($_GET['action']) && method_exists($controller, $_GET['action'])){

        $action = $_GET['action'];
        $controller->$action();

    }else{

        show_error();

    }
}else{

    show_error();

}

require_once 'views/layout/footer.php';
