<?php

require '../dal/usuarioDAL.php';

$action = $_POST['action'];

switch ($action) {
    case 'valUser':
        session_start();
        $id = $_SESSION['userID'];
        $ps = $_POST['pass'];
        $fila = getUsuario($id);
        if (md5($ps) == $fila[4]) {
            $estado = "si";
        } else {
            $estado = "no";
        }
        print $estado;
        break;
    case 'getuser':
        $us = $_POST['user'];
        $fila = GetUser($us);
        $id = $fila[0];
        print $id;
        break;
    case 'getusuario':
        $idUsuario = $_POST['id'];
        $fila = getUsuario($idUsuario);
        if ($fila != "") {
            $fila = array_map('utf8_encode', $fila);
            print(json_encode($fila));
        } else {
            print "no";
        }
        break;
    case 'logout':
        session_start();
        $id = $_SESSION['userID'];
        $_SESSION['isLogin'] = "no";
        unset($_SESSION['isLogin']);
        unset($_SESSION['userID']);
        unset($_SESSION['minNom']);
        unset($_SESSION['minApe']);
        unset($_SESSION['cargo']);
        unset($_SESSION['IDrol']);
        unset($_SESSION['rol']);
        //unset($_SESSION['tienda']);
        break;
    case 'login':
        session_start();
        $estado = "no";
        $us = $_POST['user'];
        $ps = $_POST['pass'];
        $fila = GetUser($us);
        if ($us == $fila[1]) {
            if ($ps == $fila[4]) {
                $estado = "si";
                $_SESSION['isLogin'] = "si";
                $_SESSION['userID'] = $fila[0];
            } else {
                $estado = "no";
                $_SESSION['isLogin'] = "no";
            }
        } else {
            $estado = "no";
            $_SESSION['isLogin'] = "no";
        }
        print $estado;
        break;
    case 'listUsuarios':
        $lista = listUsuarios();
        $lista2 = [];
        foreach ($lista as $auxlista) {
            $auxlista = array_map('utf8_encode', $auxlista);
            array_push($lista2, $auxlista);
            //print $auxlista[0];
        }
        $lista = $lista2;
        print(json_encode($lista));
        break;
    case 'insertUsuario':
        $contrasena = $_POST['pass'];
        $confirmacion = $_POST['rpass'];
        if ($contrasena == $confirmacion) {
            $unom = $_POST['usuario'];
            $ape = $_POST['apellido'];
            $nom = $_POST['nombre'];
            $tipo = $_POST['tipo'];
            $codt = $_POST['tiend'];
            $exito = insertUsuario($unom, $ape, $nom, $contrasena, $tipo, $codt);
            if ($exito) {
                print('OK');
            } else {
                print('NO');
            }
        } else {
            print('DISTINTAS');
        }
        break;
    case 'updateUsuario':
        $idUsuario = $_POST['id'];
        $unom = $_POST['usuario'];
        $ape = $_POST['apellido'];
        $nom = $_POST['nombre'];
        $tipo = $_POST['tipo'];
        $codt = $_POST['tiend'];
        $usuario = getUsuario($idUsuario);
        $exito = updateUsuario($idUsuario, $unom, $ape, $nom, $usuario['password'], $tipo, $usuario['estado'], $codt);
        if ($exito) {
            print('OK');
        } else {
            print('NO');
        }
        break;
    case 'updateContrasena':
        $idUsuario = $_POST['id'];
        $contrasena = $_POST['pass'];
        $confirmacion = $_POST['rpass'];
        if ($contrasena !== $confirmacion) {
            print('DISTINTAS');
        } else {
            $unom = $_POST['usuario'];
            $ape = $_POST['apellido'];
            $nom = $_POST['nombre'];
            $tipo = $_POST['tipo'];
            $codt = $_POST['tiend'];
            $contrasena = md5($contrasena);
            $usuario = getUsuario($idUsuario);
            $exito = updateUsuario($idUsuario, $unom, $ape, $nom, $contrasena, $tipo, $usuario['estado'], $codt);
            if ($exito) {
                print('OK');
            } else {
                print('NO');
            }
        }
        break;
    case 'removeUsuario':
        $idUsuario = intval($_POST['idUsuario']);
        $exito = removeUsuario($idUsuario);
        if ($exito) {
            print('OK');
        } else {
            print('NO');
        }
        break;
    case 'getTipous':
        session_start();
        print($_SESSION['cargo']);
        break;
    case 'getMiCuenta':
        session_start();
        $id = $_SESSION['userID'];
        $cuenta = getMiCuenta($id);
        if ($cuenta != "") {
            //utf8_string_array_encode($cuenta);
            $cuenta = array_map('utf8_encode', $cuenta);
            print(json_encode($cuenta));
        } else {
            print "no";
        }
        break;
}
?>
