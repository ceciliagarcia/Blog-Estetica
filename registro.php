<?php


if(isset($_POST)){


    require_once 'includes/conexion.php';
    //Iniciamos sesion
    session_start();

    // recoger los datos del formulario
    $nombre = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db,$_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset( $_POST['password']) ? mysqli_real_escape_string($db,$_POST['password']) : false;

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
    //campo contraseña
    if(!empty($password)) {
        $password_validado = true;
    }else {
        $password_validado = false;
       $errores['password'] = "Contraseña vacia";
    }

    $guardarUsuario = false;
    if(count($errores) == 0){
        $guardarUsuario = true;

        //Cifrar la contraseña
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
        //INSERTAR USUARIO EN LA BASE DE DATOS
        $sql = "INSERT INTO usuarios VALUES(NULL, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE() );";
        $guardar = mysqli_query($db, $sql);

       var_dump( mysqli_error($db));
       die();
    
       if($guardar){
        $_SESSION['completado'] = "El registro se ha completado con éxito";
    }else{
        $_SESSION['errores']['general'] = "Fallo al guardar el usuario!!";
    }
    
}else{
    $_SESSION['errores'] = $errores;
}

}

header('location: index.php');
