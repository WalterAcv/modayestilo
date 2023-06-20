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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="tienda-style.css">
    <title>Document</title>
</head>

<body>
    <a href="index.php"><img src="img/logo.png" style="width: 15%;display: block; margin-left: auto; margin-right: auto;" alt="logo"></a>

    <header>
        <nav>
            <a href="index.php#inicio">Inicio</a>
            <a href="index.php#nosotros">Nosotros</a>
            <a href="tienda.php#tienda" class="active">Tienda</a>
            <a href="index.php#blog">Blog</a>
            <a href="index.php#contacto">Contacto</a>

            <a href=""><i class="material-icons" style="font-size: 2.5rem;">search</i></a>
            <a href="login.php"><i class="material-icons" style="font-size: 2.5rem;">face</i></a>
        </nav>
    </header>

    <section id="tienda">
        <h2 style="font-size: 2rem; padding: 5% 0% 3% 0%; text-align: center;">Nuestro Catálogo</h2>
        <div id="contenedorDatos">
        </div>
    </section>

    <footer>
        <div class="mapa">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3902.6442726084824!2d-77.06254153518795!3d-11.999098241499048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105ceff36fdcc35%3A0x36abf8fe4c8a7594!2sAv.%20Alfredo%20Mendiola%203540%2C%20Independencia%2015311!5e0!3m2!1ses!2spe!4v1686546433340!5m2!1ses!2spe" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="comercio">
            <center>
                <h3>COMERCIO</h3>
            </center>
            <br>
            <ul>
                <li>Hombres</li>
                <br>
                <li>Mujeres</li>
                <br>
                <li>Niños</li>
            </ul>
        </div>
        <div class="ayuda">
            <center>
                <h3>AYUDA</h3>
            </center>
            <br>
            <ul>
                <li>Mi cuenta</li>
                <br>
                <li>Encuentra una sucursal</li>
                <br>
                <li>Servicio al cliente</li>
            </ul>
        </div>
        <center><img src="img/logo.png" alt="" width="50%"></center>

    </footer>

    <script src="tienda-script.js"></script>
</body>

</html>

    <!--
        <div class="productos">
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio (S/.)</th>
                        <th>Descripcion</th>
                        <th>Imagen</th>
                    </tr>
                </thead>
                <tbody id="contenedorDatos">
                </tbody>
            </table>
        </div>
    -->