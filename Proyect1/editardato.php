<?php

include_once("conexion.php");
session_start();

# Recibir datos del formulario
//Verificar si el usuario inicio sesión 
if(isset($_SESSION['id_usario'])){
    header('location:index.php');
    exit;
}

$id_usuario = $_SESSION['id_usuario'];
if(isset($_GET['id'])){
    $id = $_GET['id'];
    
}else{
    header('location:listar_contactos.php');
}

$sql = "SELECT * FROM contactos WHERE id_usuario = :id_usuario AND id = :id";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':id_usuario', $id_usuario);
$stmt->bindParam(':id', $id);
$stmt->execute();
$contacto = $stmt->fetch(PDO::FETCH_ASSOC);


if (!$contacto){
    header('location:listar_contactos.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"]=="POST"){

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];

# Actualizar contacto en la base de datos
$sql = "UPDATE contactos SET nombre=:nombre,telefono=:telefono,correo=:correo where id=:id";
$stmt = $conexion->prepare($sql);

$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':correo', $correo);
$stmt->bindParam(':telefono', $telefono);
$stmt->bindParam(':id',$id);
$stmt->execute();
header('location:listar_contactos.php');
    
}
$conexion = null;

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <h1>Editar Contactos</h1>
    <form method ="POST">
     <label for ="nombre">Nombre:</label><br>   
     <input type="text" id="nombre" name="nombre" value="<?php echo $contacto['nombre'];?>"><br>
     <label for ="telefono">Telefono:</label><br>  
    <input type ="text" id="telefono" name="telefono" value="<?php echo $contacto['telefono'];?>"><br>
    <label for ="correo">Correo:</label><br>  
    <input type ="email" id="correo" name="correo" value="<?php echo $contacto['correo'];?>"><br>
    <input type ="submit" value="Guardar Cambios">
    <br/>
    <input type ="submit" value="Cancelar">

    </form>
    
</body>
</html>