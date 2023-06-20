<?php
// Start the PHP session
session_start();
echo '<p id="sesion">Sesión iniciada como <b>'.$_SESSION["usuario"].'</b></p>'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tabla-usuarios.css">
    <title>Document</title>
</head>

<body>
    <a href="index.php"><img src="img/logo.png" style="width: 15%;display: block; margin-left: auto; margin-right: auto;" alt="logo"></a>

    <header>
        <nav>
            <a href="index.php#inicio">Inicio</a>
            <a href="index.php#nosotros">Nosotros</a>
            <a href="tienda.php#tienda">Tienda</a>
            <a href="index.php#blog">Blog</a>
            <a href="index.php#contacto">Contacto</a>
        </nav>
    </header>

    <div class="productos">

        <h1>Tabla de Usuarios</h1>
        <br>
        <input type="text" id="buscador" onkeyup="buscar()" placeholder="Buscar por usuario...">
        <table id="tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
            <tbody id="contenedorDatos">
            </tbody>
        </table>
    </div>

    <footer>
        <center>
            <p>Sistema Walter A</p>
        </center>
    </footer>
    <script src="config.js"></script>
    <script src="tabla-usuarios.js"></script>
</body>

</html>