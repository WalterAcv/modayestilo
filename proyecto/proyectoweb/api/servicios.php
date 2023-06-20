<?php

class bdmodaestilo
{
    public function __construct()
    {
    }

    function Conexion()
    {
        $cn = new PDO('mysql:host=localhost; dbname=modaestilo', 'root', '');
        return $cn;
    }
}

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers:*');
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

class Datos extends bdmodaestilo
{

    function Usr_Vista()
    {
        $cn = $this->Conexion();
        $stm = $cn->prepare('call sp_usr_vista()');
        $stm->execute();
        return $stm;
    }

    function Usr_Buscar($id)
    {
        $cn = $this->Conexion();
        $stm = $cn->prepare("call sp_usr_buscar(:d1)");
        $stm->bindParam(':d1', $id);
        $stm->execute();
        return $stm;
    }

    function Usr_Nuevo($usr_array)
    {
        // $id = $usr_array['id'];
        if (
            $usr_array['user'] == '' ||
            $usr_array['pass'] == '' ||
            $usr_array['nombre'] == '' ||
            $usr_array['apellido'] == ''
        ) {
            die(json_encode(array('data' => 'error', 'msg' => 'Los campos no pueden estar vacíos')));
        }
        $user = $usr_array['user'];
        $pass = $usr_array['pass'];
        $usr_nom = $usr_array['nombre'];
        $usr_ape = $usr_array['apellido'];
        $cn = $this->Conexion();
        $stm = $cn->prepare("call sp_usr_insertar(:d1, :d2,:d3, :d4)");
        // $stm->bindParam(':d1', $id);
        $stm->bindParam(':d1', $user);
        $stm->bindParam(':d2', $pass);
        $stm->bindParam(':d3', $usr_nom);
        $stm->bindParam(':d4', $usr_ape);
        $stm->execute();
        return $stm;
    }

    function Usr_Actualizar($usr_array)
    {
        $id = $usr_array['id'];
        $user = $usr_array['user'];
        $pass = $usr_array['pass'];
        $usr_nom = $usr_array['nombre'];
        $usr_ape = $usr_array['apellido'];
        $cn = $this->Conexion();
        $stm = $cn->prepare("call sp_usr_actualizar(:d1, :d2,:d3, :d4, :d5)");
        $stm->bindParam(':d1', $id);
        $stm->bindParam(':d2', $user);
        $stm->bindParam(':d3', $pass);
        $stm->bindParam(':d4', $usr_nom);
        $stm->bindParam(':d5', $usr_ape);
        return $stm;
    }

    function Usr_Eliminar($id)
    {
        $cn = $this->Conexion();
        $stm = $cn->prepare("call sp_usr_eliminar(:d1)");
        $stm->bindParam(':d1', $id);
        $stm->execute();
        return $stm;
    }



    function Vista()
    {
        $cn = $this->Conexion();
        $stm = $cn->prepare('call sp_vista()');
        $stm->execute();
        return $stm;
    }

    function Buscar($cod)
    {
        $cn = $this->Conexion();
        $stm = $cn->prepare("call sp_buscar(:d1)");
        $stm->bindParam(':d1', $cod);
        $stm->execute();
        return $stm;
    }

    function Nuevo($array)
    {
        $cod = $array['codigo'];
        $nom = $array['nombre'];
        $prec = $array['precio'];
        $desc = $array['descripcion'];
        $img = $array['imagen'];
        $cn = $this->Conexion();
        $stm = $cn->prepare("call sp_insertar(:d1, :d2,:d3, :d4, :d5)");
        $stm->bindParam(':d1', $cod);
        $stm->bindParam(':d2', $nom);
        $stm->bindParam(':d3', $prec);
        $stm->bindParam(':d4', $desc);
        $stm->bindParam(':d5', $img);
        $stm->execute();
        return $stm;
    }

    function Actualizar($array)
    {
        $cod = $array['codigo'];
        $nom = $array['nombre'];
        $prec = $array['precio'];
        $desc = $array['descripcion'];
        $img = $array['imagen'];
        $cn = $this->Conexion();
        $stm = $cn->prepare("call sp_actualizar(:d1, :d2,:d3, :d4, :d5)");
        $stm->bindParam(':d1', $cod);
        $stm->bindParam(':d2', $nom);
        $stm->bindParam(':d3', $prec);
        $stm->bindParam(':d4', $desc);
        $stm->bindParam(':d5', $img);
        $stm->execute();
        return $stm;
    }

    function Eliminar($cod)
    {
        $cn = $this->Conexion();
        $stm = $cn->prepare("call sp_eliminar(:d1)");
        $stm->bindParam(':d1', $cod);
        $stm->execute();
        return $stm;
    }
}
// ----------------------------------------------------
class Servicios
{

    function getUsrVista()
    {
        $datos = new Datos();
        $lista = array();
        $res = $datos->Usr_Vista()->fetchAll();
        foreach ($res as $row) {
            $r["id"] = $row["id"];
            $r["user"] = $row["user"];
            $r['pass'] = $row['pass'];
            $r['nombre'] = $row['nombre'];
            $r['apellido'] = $row['apellido'];
            array_push($lista, $r);
        }
        echo json_encode($lista);
    }
    function getUsrBuscar($id)
    {
        $datos = new Datos();
        $lista = array();
        $res = $datos->Usr_Buscar($id);
        if ($res->rowCount() == 1) {
            $row = $res->fetch();
            $r["id"] = $row["id"];
            $r["user"] = $row["user"];
            $r['pass'] = $row['pass'];
            $r['nombre'] = $row['nombre'];
            $r['apellido'] = $row['apellido'];
            array_push($lista, $r);
        } else {
            $r["id"] = "";
            $r["user"] = "";
            $r['pass'] = "";
            $r['nombre'] = "";
            $r['apellido'] = "";
            array_push($lista, $r);
        }
        echo json_encode(...$lista);
    }

    function getUsrNuevo($usr_array)
    {
        $datos = new Datos();
        try {
            $datos->Usr_Nuevo($usr_array);
            die(json_encode(array(
                'data' => 'done',
                'msg' => "El registro se guardó correctamente"
            )));
        } catch (Exception $e) {
            echo "El registro no se guardo";
        }
    }

    function getUsrActualizar($usr_array)
    {
        $datos = new Datos();
        try {
            $datos->Usr_Actualizar($usr_array);
            echo "El producto se actualizo satisfactoriamente";
        } catch (Exception $e) {
            echo "El producto no se actualizo";
        }
    }

    function getUsrEliminar($id)
    {
        $datos = new Datos();
        try {
            $datos->Usr_Eliminar($id);
            die(json_encode(array(
                'data' => 'done',
                'msg' => "El registro se eliminó correctamente"
            )));
        } catch (Exception $e) {
            echo "El producto no se elimino";
        }
    }



















    function getVista()
    {
        $datos = new Datos();
        $lista = array();
        $res = $datos->Vista()->fetchAll();
        foreach ($res as $row) {
            $r["codigo"] = $row["codigo"];
            $r["nombre"] = $row["nombre"];
            $r['precio'] = $row['precio'];
            $r['descripcion'] = $row['descripcion'];
            $r['imagen'] = $row['imagen'];
            array_push($lista, $r);
        }
        echo json_encode($lista);
    }
    function getBuscar($cod)
    {
        $datos = new Datos();
        $lista = array();
        $res = $datos->Buscar($cod);
        if ($res->rowCount() == 1) {
            $row = $res->fetch();
            $r["codigo"] = $row["codigo"];
            $r["nombre"] = $row["nombre"];
            $r['precio'] = $row['precio'];
            $r['descripcion'] = $row['descripcion'];
            $r['imagen'] = $row['imagen'];
            array_push($lista, $r);
        } else {
            $r["codigo"] = "";
            $r["nombre"] = "";
            $r['precio'] = "";
            $r['descripcion'] = "";
            $r['imagen'] = "";
            array_push($lista, $r);
        }
        echo json_encode(...$lista);
    }

    function getNuevo($array)
    {
        $datos = new Datos();
        try {
            $datos->Nuevo($array);
            echo "El registro se guardo satisfactoriamente";
        } catch (Exception $e) {
            echo "El registro no se guardo";
        }
    }

    function getActualizar($array)
    {
        $datos = new Datos();
        try {
            $datos->Actualizar($array);
            echo "El producto se actualizo satisfactoriamente";
        } catch (Exception $e) {
            echo "El producto no se actualizo";
        }
    }

    function getEliminar($cod)
    {
        $datos = new Datos();
        try {
            $datos->Eliminar($cod);
            echo "El producto se elimino satisfactoriamente";
        } catch (Exception $e) {
            echo "El producto no se elimino";
        }
    }
}
