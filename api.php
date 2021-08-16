<?php
    header("Content-Type: application/json");
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");

    require 'class.php';
    require 'exist.php';

    $prueba = new DB(
        $_GET['controller'],
        $categoria,
        $id,
        $_SERVER['REQUEST_METHOD'],
        file_get_contents('php://input')
    );

?>