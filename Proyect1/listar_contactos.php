<?php
# Conexión a la base de datos utilizando PDO
session_start();
include_once("conexion.php");

//verificar que el usuario inici session

if(!isset($_SESSION['id_usuario'])){
    header('Location:index.php');
    exit;

}
$id_usuario=$_SESSION['id_usuario'];

# Consultar la lista de contactos desde la base de datos
$sql = "SELECT * FROM contactos where id_usuario = :id_usuario";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':id_usuario',$id_usuario);
$stmt->execute();

$contactos = $stmt->fetchAll(PDO::FETCH_ASSOC);

# Cerrar conexión
$conexion = null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA de Contactos</title>
</head>
<body>
    <!-- Lista de contactos -->
    <h1>Contactos Registrados</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>telefono</th>
            <th>Correo</th>
        </tr>
        <?php foreach ($contactos as $contacto): ?>
        <tr>
            <td><?php echo $contacto['id']; ?></td>
            <td><?php echo $contacto['nombre']; ?></td>
            <td><?php echo $contacto['telefono']; ?></td>
            <td><?php echo $contacto['correo']; ?></td>
            <td><a href ="eliminardato.php?id=<?php echo $contacto['id'] ;?>">Eliminar</a></td>
            <td> <a href ="editardato.php?id=<?php echo $contacto['id'] ;?>" >Editar</a></td>
        
        </tr>
        <?php endforeach; ?>
    </table>

    <br/>
    <a href="guardar_contacto.php">Agregar nuevo contacto</a>  
    <br/>
    <a href="cerrarsesion.php">Cerrar la sesión</a>
    

    

</body>
</html>
