<?php

session_start();
$_SESSION['usuario'] = $_POST["usuario"];

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "modaestilo";

$cn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

$usr = $_POST["usuario"];
$pass = $_POST["pass"];

$query = mysqli_query($cn, "select * from usuarios where user = '" . $usr . "'and pass='" . $pass . "' ");
$nr = mysqli_num_rows($query);

if ($nr == 1) {
    if($usr=='admin'){
        header('Refresh: 0; URL=tabla-usuarios.php');
    }else{
        header('Refresh: 0; URL=tienda.php#tienda');
    }
} else if ($nr == 0) {
    echo '<script>alert("Datos incorrectos")</script>';
    header('Refresh: 0; URL=login.php');
}
