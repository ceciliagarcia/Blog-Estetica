<?php
//Inisiar sesion y conexion bd
require_once 'includes/conexion.php';

// recoger datos formularios
if(isset($_POST)){

    if(isset($_SESSION['error_login'])){
        session_unset($_SESSION['error_login']); }

    $email = trim($_POST['email']);
    $password = $_POST['password'];

     // consulta comprobar credenciales
     $sql = "SELECT * FROM usuarios WHERE email = '$email' ";
     $login = mysqli_query($db, $sql);

    if($login &&  mysqli_num_rows($login) == 1){
        $usuario = mysqli_fetch_assoc($login);
        
        // comprobar contraseña / cifrar
         $verify = password_verify($password, $usuario['password']);

         if($verify){
            // Utilizar la sesion para guardar los datos del usuario logueado
            $_SESSION['usuario'] = $usuario;

         }else{
            $_SESSION['error_login']= "Login incorrecto!!";
         }
    }else {
        $_SESSION['error_login']= "Login incorrecto!!";
    }

}

//redirigir al index
header('Location: index.php');


?>