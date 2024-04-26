<?php
include_once("conexion.php");
session_start();
//verifcar que el usuario inicio sesion


$id_usuario=$_SESSION['id_usuario'];

if(isset($_GET['id'])){
    $id=$_GET['id'];
    
}
else{
    header('listar_contactos.php');
    exit;
}


#Eliminar Contacto
$sql = "DELETE FROM contactos where id_usuario = :id_usuario AND id=:id";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':id_usuario',$id_usuario);
$stmt->bindParam(':id', $id, PDO::PARAM_STR);
try {
    $stmt->execute();
    echo "<script>alert ('Contacto Eliminado exitosamente.')</script>";
    # Redireccionar a la página listar contactos para ver los contactos después de agregarlo
    header('Location:listar_contactos.php');
} catch (PDOException $e) {
    echo "Error al Eliminar contacto:" . $e->getMessage();
}



?>


