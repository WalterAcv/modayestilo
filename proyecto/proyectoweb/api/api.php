<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers:*');
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

include_once 'servicios.php';


$servicios = new Servicios();
$var = explode("/", $_GET['url']);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($var[0] == 'vista') {
        $servicios->getVista();
    } else if ($var[0] == 'buscar') {
        if (isset($var[1])) {
            $cod = $var[1];
            $servicios->getBuscar($var[1]);
        }
    } else if ($var[0] == 'usrvista') {
        $servicios->getUsrVista();
    } else if ($var[0] == 'usrbuscar') {
        if (isset($var[1])) {
            $id = $var[1];
            $servicios->getUsrBuscar($var[1]);
        }
    } else {
        echo ('Método de solicitud no permitido');
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($var[0] == 'nuevo') {
        $body = file_get_contents('php://input');
        $array = json_decode($body, true);
        $servicios->getNuevo($array);
    } else if ($var[0] == 'usrnuevo') {
        $body = file_get_contents('php://input');
        $usr_array = json_decode($body, true);
        $servicios->getUsrNuevo($usr_array);
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    if ($var[0] == 'editar') {
        $body = file_get_contents('php://input');
        $array = json_decode($body, true);
        $servicios->getActualizar($array);
    } else if ($var[0] == 'usreditar') {
        $body = file_get_contents('php://input');
        $usr_array = json_decode($body, true);
        $servicios->getUsrActualizar($usr_array);
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    if ($var[0] == 'eliminar') {
        if (isset($var[1])) {
            $cod = $var[1];
            $servicios->getEliminar($var[1]);
        }
    } else if ($var[0] == 'usreliminar') {
        if (isset($var[1])) {
            $id = $var[1];
            $servicios->getUsrEliminar($var[1]);
        }
    }
}
