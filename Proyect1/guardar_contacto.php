<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA DE CONTACTOS</title>
</head>
<body>
    <h1>CONTACTOS</h1>
    
    <!-- Formulario para agregar un nuevo contacto -->
    <h2>Agregar Contacto</h2>
    <form action="crear_contacto.php" method="POST">
    
        <input type="text" name="nombre" placeholder="Nombre" required>
        <br/>
        <input type="text" name="telefono" placeholder="telefono" required>
        <br/>
        <input type="text" name="correo" placeholder="telefono" require>
        <input type="submit" value="Agregar Contactos"></input>
    </form>
</body>
</html>
