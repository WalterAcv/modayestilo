<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="login-style.css">
    <title>Intranet</title>
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



    <section>
        <div id="inicio-sesion">
            <div class="controles">
                <h2>Iniciar Sesión</h2>
                <form id="login" method="post" action="validar.php">
                    <input style="margin: 1% 0;" type="text" name="usuario" placeholder="Usuario" required>
                    <input style="margin: 1% 0;" type="password" name="pass" placeholder="Contraseña" required>
                    <input type="submit" value="Continuar">
                </form>
                <div>
                    <a onclick="changedata(0)">Registrarse</a>
                </div>
            </div>
        </div>

        <div id="registrar">
            <div class="controles">
                <h2>Registrar usuario</h2>
                <form id="signup">
                    <input style="margin: 1% 0;" type="text" id="usuario" placeholder="Usuario" required>
                    <input style="margin: 1% 0;" type="password" id="pass" placeholder="Contraseña" required>
                    <input style="margin: 1% 0;" type="text" id="nombre" placeholder="Nombres" required>
                    <input style="margin: 1% 0;" type="text" id="apellido" placeholder="Apellidos" required>
                    <input type="submit" id="btnRegistrar" value="Continuar">
                </form>
                <div>
                    <a onclick="changedata(0)">Iniciar Sesión</a>
                </div>
            </div>
        </div>
    </section>

     <footer>
        <center>
            <p>Sistema Walter A</p>
        </center>
    </footer>
    <script src="config.js"></script>
    <script src="login-script.js"></script>
</body>

</html>