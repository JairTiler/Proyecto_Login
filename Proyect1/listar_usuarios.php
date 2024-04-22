<?php

include_once("conexion.php");



# Consultar la lista de contactos desde la base de datos
$sql = "SELECT * FROM usuarios";
$stmt = $conexion->query($sql);
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

# Cerrar conexión
$conexion = null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA de Usuarios</title>
</head>
<body>
    <!-- Lista de contactos -->
    <h1>Usuarios Registrados</h1>
    <table>
        <tr>
            <th>Correo</th>
            <th>Contraseña</th>
        </tr>
        <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?php echo $usuario['correo']; ?></td>
            <td><?php echo $usuario['contrasena']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br/>
   <!-- <a href="index.php">Agregar nuevo Usuario</a>-->  
    <br/>
    <a href="guardar_contacto.php">Agregar un Contacto</a>

</body>
</html>