<?php
require_once 'includes/redireccion.php';
require_once 'includes/cabecera.php';
require_once 'includes/lateral.php'; 
?>


<div id="principal">
<h1>Crear Categorias</h1>
<p> Añade nuevas categorias al blog para que los usuarios puedan usarlar al crear sus entradas. </p>
<form action="guardar-categoria.php" method="POST">
<label for="nombre">Nombre</label>
<input type="text" name="nombre">

<input type="submit" value="Guardar">
</form>
</div>




<?php
require_once 'includes/pie.php';
?>