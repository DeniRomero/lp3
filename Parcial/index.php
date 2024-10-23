<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Principal</title>
    <style>
        .menu {
            display: flex;
            justify-content: flex-start;
            list-style-type: none;
            padding: 0;
        }

        .menu li {
            margin: 0 10px;
        }


        .menu li:last-child {
            margin-left: auto;
        }

        .menu a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            font-size: 16px;
        }

        .menu a:hover {
            background-color: #0056b3;
        }

        .responsive{
            width: 100%;
            height: auto;
            max-width: 100%;
            
        }
    </style>

<body>
    <h1>Menu</h1>
    <ul class="menu">
        <li><a href="galeria.html">Galería de imágenes</a></li>
        <li><a href="index1.php">Formulario</a></li>
    </ul>
    <img src="img/imagen.jpg" alt="" class="responsive">
</body>

</html>