<?php include 'conexion1.php'; ?>
<!DOCTYPE html>
<html lang="en">
<style>
    body {
        max-width: 75%;
    }

    h1 {
        text-align: center;
    }

    form,
    table {
        width: 75%;
    }

    label,
    input,
    textarea {
        width: 75%;
        margin-bottom: 10px;
        padding: 10px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        width: auto;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }

    textarea.mensaje {
        width: 75%;
        height: 150px;
        text-align: left;
        vertical-align: top;
        overflow-wrap: break-word;
    }


    table {
        border-collapse: collapse;
        width: 75%;
    }

    th,
    td {
        border: 1px solid black;
        padding: 10px;
        text-align: left;
    }

    .inicio {
        text-decoration: none;
        padding: 10px 20px;
        background-color: #007BFF;
        color: white;
        border-radius: 5px;
        font-size: 16px;
    }

</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


</head>
<!--Librerías JQUERY-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="script.js"></script>

<body>
    <ul>
        <li><a href="index.php" class="inicio">Inicio</a></li>
    </ul>
    <h1>Cargar Datos</h1>

    <form action="procesar.php" method='post'>
        <label for="nombre">Nombre</label><br>
        <input type="text" id="nombre" name="nombre" required pattern=".*\S.*" title="El campo no puede estar vacío ni contener solo espacios"><br>
        <label for="mensaje">Mensaje</label><br>
        <textarea id="mensaje" name="mensaje" class="mensaje" wrap="soft" required
            title="El campo no puede estar vacío ni contener solo espacios"
            oninput="this.setCustomValidity(''); validarMensaje(this);"
            oninvalid="this.setCustomValidity('El campo no puede estar vacío ni contener solo espacios')"></textarea><br><br>

        <input type="submit" name="Insertar" value="Insertar">
    </form>
    <script>
        function validarMensaje(textarea) {

            if (textarea.value.trim() === "") {
                textarea.setCustomValidity('El campo no puede estar vacío ni contener solo espacios');
            } else {
                textarea.setCustomValidity('');
            }
        }
    </script>
    <hr>
    <h1>Datos Cargados</h1>
    <table border="2">
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Mensaje</th>
        </tr>
        <?php
        mysqli_query($conexion, "SET NAMES 'utf8'"); //Codificar a UTF8
        //CREAR CONSULTA
        $query = mysqli_query($conexion, "SELECT * FROM contacto");
        //Recorrer el resultador para capturar los valores
        while ($resultado = mysqli_fetch_assoc($query)) {
            //var_dump($resultado);
            $id = $resultado['id_contacto'];
            $nombre = $resultado['nombre'];
            $mensaje = $resultado['mensaje']; ?>

            <tr>
                <td> <?= $id; ?> </td>
                <td> <?= $nombre; ?> </td>
                <td> <?= $mensaje; ?> </td>
            </tr>
        <?php } ?>
    </table>
    <hr>
    <h1>Editar datos</h1>
    <form  method="GET">
        <label for="id">Ingrese el id a modificar</label>
        <input type="number" name="id" required title="Favor ingresar un ID" min="1">
        <input type="submit" value="Enviar"><br><br>
    </form>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = mysqli_query($conexion, "SELECT * FROM contacto WHERE id_contacto = $id");
        while ($resultado = mysqli_fetch_assoc($query)) {
            $id = $resultado['id_contacto'];
            $nombre = $resultado['nombre'];
            $mensaje = $resultado['mensaje'];
        }
    } else {
        $id = '';
        $nombre = '';
        $mensaje = '';
    }
    ?>
    <form action="procesar.php" method="POST">
        <label for="id">ID</label><br>
        <input type="text" id="id" name="id" value="<?= $id ?>"><br>
        <label for="nombre">Nombre</label><br>
        <input type="text" id="nombre" name="nombre" value="<?= $nombre ?>" required pattern=".*\S.*" title="El campo no puede estar vacío ni contener solo espacios"><br>
        <label for="mensaje">Mensaje</label><br>
        <textarea id="mensaje" name="mensaje" class="mensaje" wrap="soft"
            required
            title="El campo no puede estar vacío ni contener solo espacios"
            oninput="this.setCustomValidity(''); validarMensaje(this);"
            oninvalid="this.setCustomValidity('El campo no puede estar vacío ni contener solo espacios')"><?= $mensaje ?></textarea><br><br>
        <input type="submit" name="EnviarEditar" value="EnviarEditar">
    </form>
    <hr>
    <h1>Borrar datos</h1>
    <form action="procesar.php" method="POST">
        <label for="id">Ingrese el id a eliminar</label>
        <input type="text" name="id" autocomplete="off" required pattern="\d+">
        <input type="submit" name="EnviarBorrar" value="EnviarBorrar">
    </form>
</body>

</html>