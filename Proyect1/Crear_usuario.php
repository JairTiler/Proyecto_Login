<?php
# Conexión a la base de datos utilizando PDO
include_once("conexion.php");
session_start();

# Recibir datos del formulario
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

# Verificar si el correo electrónico ya existe en la base de datos
$sql_verificar = "SELECT correo FROM usuarios WHERE correo = :correo";
$stmt_verificar = $conexion->prepare($sql_verificar);
$stmt_verificar->bindParam(':correo', $correo, PDO::PARAM_STR);
$stmt_verificar->execute();

if($stmt_verificar->rowCount() > 0) {
    echo "<script>alert('Ya existe un usuario con este correo electrónico, Intente de nuevo.')</script>";
    echo "<script>window.location='guardar_usuario.php';</script>";

} else {
    # Insertar nuevo contacto en la base de datos
    $sql = "INSERT INTO usuarios (correo, contrasena) VALUES (:correo, :contrasena)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
    $stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);

try {
    $stmt->execute();
    echo "<script>alert('Usuario agregado exitosamente.')</script>"; 
    header('Location:index.php');
} catch (PDOException $e) {
    echo "Error al agregar usuario: " . $e->getMessage();
}
}
?>
