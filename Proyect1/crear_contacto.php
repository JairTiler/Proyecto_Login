<?php
# Conexión a la base de datos utilizando PDO

session_start();

include_once("conexion.php");
$id_usuario=$_SESSION['id_usuario'];
# Recibir datos del formulario

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

# Insertar nuevo contacto en la base de datos
$sql = "INSERT INTO contactos (nombre, telefono, correo,id_usuario) VALUES (:nombre, :telefono, :correo,:id_usuario)";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
$stmt->bindParam(':telefono',$telefono);
$stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
$stmt->bindParam(':id_usuario',$id_usuario);

try {
    $stmt->execute();
   
    # Redireccionar a la página listar contactos para ver los contactos después de agregarlo
    header('Location:listar_contactos.php');

} catch (PDOException $e) {
    echo "Error al agregar contacto: " . $e->getMessage();
}