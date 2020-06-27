<?php

require_once 'conexion.php';
require_once 'includes/helpers.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ohana nail bar</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>


<header id="cabecera">
<div id="logo">
<a href="index.php">

Ohana Nail Bar 

</a>
</div>

<nav  id="menu"  class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Inicio</a>
      </li>
      <?php 
        $categorias = conseguirCategorias($db);
        if(!empty($categorias)):
        while($categoria = mysqli_fetch_assoc($categorias)): 
        ?>
      <li class="nav-item">
      <a  class="nav-link"   href="categoria.php?id=<?=$categoria['id']?>"><?=$categoria['nombre']?></a>
      </li>
        <?php   endwhile;
                endif;
         ?>
      <li class="nav-item">
        <a class="nav-link" href="">Sobre mi</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="">Contacto</a>
      </li>
     
    </ul>
   
  </div>
</nav>

</header>
<div id="contenedor">