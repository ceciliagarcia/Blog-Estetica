<?php


if(isset($_POST)){


    require_once 'includes/conexion.php';
   
    // recoger los datos del formulario
    $nombre = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db,$_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
   
    //array de errores
    $errores = array();

    // validar los datos antes de guardar en la base de datos
    //validar campo nombre
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_validado = true;
    }else {
        $nombre_validado = false;
       $errores['nombre'] = "Campo nombre no es  valido";
    }
    //validar apellidos
    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
        $apellidos_validado = true;
    }else {
        $apellidos_validado = false;
       $errores['apellidos'] = "Campo apellido no es  valido";
    }
    //validar email
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validado = true;
    }else {
        $email_validado = false;
       $errores['email'] = "Campo email no es  valido";
    }
    

    $guardarUsuario = false;

    if(count($errores) == 0){
        $usuario = $_SESSION['usuario']['id'];
        $guardarUsuario = true;

        //comprobar si el email ya exite
        $sql = "SELECT id, email FROM usuarios WHERE email = '$email';";
        $isset_email = mysqli_query($db,$sql);
        $isset_user =  mysqli_fetch_assoc($isset_email);

    if($isset_user['id'] ==  $usuario['id'] || empty($isset_user)){
        //ACTUALIZAR EL USUARIO EN LA BASE DE DATOS
       
        $sql = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos', email = '$email' WHERE id = '$usuario';";
        $guardar = mysqli_query($db, $sql);


        if($guardar){
        $_SESSION['usuario']['nombre'] = $nombre;  
        $_SESSION['usuario']['apellidos'] = $apellidos; 
        $_SESSION['usuario']['email'] = $email; 

        $_SESSION['completado'] = "Tus datos se han actulizado con exito ";

        }else{
        $_SESSION['errores']['general'] = "Fallo al actulizar el usuario!!";
        }
    } else {
        $_SESSION['errores']['general'] = "EL usuario ya existe!!";
        }

      
    
}else{
    $_SESSION['errores'] = $errores;
}

}

header('location: mis-datos.php');
