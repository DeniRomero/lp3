<?php
include 'conexion1.php';
if (isset($_POST['Insertar'])) {
    if (isset($_POST['nombre']) && isset($_POST['mensaje'])) {
        $existe = true;
        $nombre = $_POST['nombre'];
        $mensaje = $_POST['mensaje'];
    } else {
        $existe = false;
        echo "No existe el contacto o mensaje";
    }
    if ($existe) {
        $query = mysqli_query($conexion, "INSERT INTO contacto (id_contacto, nombre, mensaje)
        VALUES (null, '$nombre', '$mensaje')")
            or die('error' . mysqli_error($conexion));



        if ($query) {
            echo "La insercion de datos fue exitosa";
?>
            <meta http-equiv="refresh" content="3, url=http://localhost/lp3/Parcial/index.php">
        <?php
        } else {
            echo "Problemas para insertar";
        }
    }
} else if (isset($_POST['EnviarEditar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $mensaje = $_POST['mensaje'];

    $query = mysqli_query($conexion, "UPDATE contacto SET nombre= '$nombre',
    mensaje = '$mensaje' WHERE id_contacto=$id")
        or die('error' . mysqli_connect_error($conexion));
    if ($query) {
        echo "La modificacion fue exitosa"; ?>
        <meta http-equiv="refresh" content="3, url=http://localhost/lp3/Parcial/index.php">
    <?php } else {
        echo "No se pudo realizar la modificacion";
    }
} elseif (isset($_POST['EnviarBorrar'])) {
    $id = $_POST['id'];
    $query = mysqli_query($conexion, "DELETE FROM contacto WHERE id_contacto=$id")
        or die('error' . mysqli_error($conexion));
    if ($query) {
        echo "Se elimino correctamente"; ?>
        <meta http-equiv="refresh" content="3, url=http://localhost/lp3/Parcial/index.php">
<?php } else {
        echo "Hubo problemas para eliminar";
    }
}
?>