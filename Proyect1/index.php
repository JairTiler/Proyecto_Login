<?php
include('conexion.php');
session_start();
//validar que los datos se envien atravez del metodo Post

if($_SERVER['REQUEST_METHOD']=="POST"){
    $correo=$_POST['correo'];
    $contrasena=$_POST['contrasena'];

    $sql= "SELECT  id FROM usuarios where correo=:correo and contrasena = :contrasena";
    $result = $conexion -> prepare($sql);
    $result->bindParam(':correo',$correo);
    $result->bindParam(':contrasena',$contrasena);
    $result->execute();

    $usuario=$result->fetch(PDO::FETCH_ASSOC);
    if($usuario){
        $_SESSION['id_usuario']=$usuario['id'];
        header('Location:listar_contactos.php');
        exit;
    }
    else{
        echo("usuario o contraseña incorrectos");
    }

}






?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
</head>
<center>
<body>
    <h1>Iniciar</h1>
    
    <!-- Formulario para agregar un nuevo contacto -->
    <h2>Iniciar Sesion</h2>
   
    <form  method="POST">
    
        <input type="email" name="correo" placeholder="correo" required>
        <br/>
        <input type="password" name="contrasena" placeholder="contraseña" required>
        <br/>
        <input type="submit" value="Iniciar Session"></input>
        <br/>
        <a href="guardar_usuario.php">Crear usuario</a>  
       <!-- <a href="Crear_usuario.php">Si usted no tiene usuario..</a><br>--->
    </form>
    <center>

</body>
</html>



