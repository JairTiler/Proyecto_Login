<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA DE USUARIOS</title>
</head>
<body>
    <h1>USUARIOS</h1>
    
    <!-- Formulario para agregar un nuevo contacto -->
    <h2>Agregar Usuario</h2>
    <form action="Crear_usuario.php" method="POST">
    
        <input type="text" name="correo" placeholder="correo" required>
        <br/>
        <input type="password" name="contrasena" placeholder="contrasena" required>
        <input type="submit" value="Agregar Usuarios"></input>
    </form>
</body>
</html>