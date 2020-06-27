<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>


<?php
    $categoria_actual = conseguirCategoria($db, $_GET['id']);
   
    if(!isset($categoria_actual['id'])){
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

<h1>Entradas de <?=$categoria_actual['nombre']?></h1>

<?php
    $entradas = conseguirEntradas($db, null, $_GET['id']);
    if(!empty($entradas) && mysqli_num_rows($entradas) >=1):
      while($entrada = mysqli_fetch_assoc($entradas)):

?>
      <article class="entrada">
          <a href="entrada.php?id=<?=$entrada['id']?>">
            <h2><?=$entrada['titulo']?></h2>
            <span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
        <p>
            <?=substr($entrada['descripcion'],0, 200)."..."?>
        </p>
        </a>
      </article>
<?php endwhile;
   else:
?>
<div class="alerta"> No hay entradas en esta categoria</div>
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