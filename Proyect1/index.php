<?php
include_once('conexion.php');
session_start();



$sql_mirar = "SELECT * FROM usuarios WHERE correo = :correo ";
$stmt_mirar = $conexion->prepare($sql_mirar);
$stmt_mirar->bindParam(':correo', $correo, PDO::PARAM_STR);
$stmt_mirar->execute();

if($stmt_mirar->rowCount() > 0) {
  echo "<script>alert('Ya existe un usuario con este correo electrónico o contraseña incorrecta, Intente de nuevo.')</script>";
}
else {
    $sql = "INSERT INTO usuarios (correo, contrasena) VALUES (:correo, :contrasena)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
    $stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
</head>
<body>
    <h1>Iniciar</h1>
    
    <!-- Formulario para agregar un nuevo contacto -->
    <h2>Iniciar Sesion</h2>
    <form action="listar_contactos.php" method="POST">
    
        <input type="text" name="correo" placeholder="correo" required>
        <br/>
        <input type="password" name="contrasena" placeholder="contraseña" required>
        <input type="submit" value="Iniciar Session"></input>
        <a href="guardar_usuario.php">Crear usuario</a>  
       <!-- <a href="Crear_usuario.php">Si usted no tiene usuario..</a><br>--->
    </form>
</body>
</html>
