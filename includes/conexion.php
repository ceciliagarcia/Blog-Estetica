<?php
$servidor = 'localhost';
$usuario = 'root';
$password = 'root';
$basededatos = 'blog_master';
$db = mysqli_connect($servidor, $usuario,$password,$basededatos);

mysqli_query($db, "SET NAMES 'utf8'");

//INICIAR SESION

if(!isset($_SESSION)){
    session_start();
}



?>