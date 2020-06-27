<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>


<?php
    $entrada_actual = conseguirEntrada($db, $_GET['id']);
   
    if(!isset($entrada_actual['id'])){
        header("Location : index.php");
    }
?>

<?php
require_once 'includes/cabecera.php';
?>

<body>

<?php require_once 'includes/lateral.php'; ?>


<!--Caja principal-->
<div id="principal">

<h1><?=$entrada_actual['titulo']?></h1>

<a href="categoria.php?id=<?=$entrada_actual['categoria_id']?>">
		<h2><?=$entrada_actual['categoria']?></h2>
</a>

<h4><?=$entrada_actual['fecha']?> | <?=$entrada_actual['usuario'] ?></h4>

<p><?=$entrada_actual['descripcion']?></p>



<?php if(isset($_SESSION["usuario"]) && $_SESSION['usuario']['id'] == $entrada_actual['usuario_id']): ?>
		<br/>	
		<a href="editar-entrada.php?id=<?=$entrada_actual['id']?>" class="boton boton-morado">Editar entrada</a>
		<a href="borrar-entrada.php?id=<?=$entrada_actual['id']?>" class="boton">Eliminar entrada</a>
<?php endif; ?>

</div>




<?php
require_once 'includes/pie.php';
?>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>