<?php

require 'conexion.php';

function GetUser($nombUser) {
    $gdb = getConnection();
    $data = $gdb->prepare('SELECT u.us_id,u.us_nombre,concat(PS_APELLIDO_P,\' \',PS_APELLIDO_M), PS_NOMBRE, US_PASS, US_TIPO,r.RL_ID,r.rl_rol FROM msvg.msvg_usuarios u inner join msvg.msvg_personas p on u.PS_ID=p.PS_ID left join msvg.msvg_roles r on u.RL_ID= r.RL_ID where u.us_nombre=:nombUser');
    $data->execute(array(':nombUser' => $nombUser));
    $filas = $data->fetchAll();
    if (count($filas) > 0) {
        return $filas[0];
    } else {
        return;
    }
}
function getMsg() {
   $gdb = getConnection();
    $data = $gdb->query('SELECT "Bienbenido al sistema." as descripcion');
    $data = $data->fetchAll();
    return $data;
}
function getUsuario($id) {
    $gdb = getConnection();
    $data = $gdb->prepare('SELECT u.us_id,u.us_nombre,concat(PS_APELLIDO_P,\' \',PS_APELLIDO_M), PS_NOMBRE, US_PASS, US_TIPO,r.RL_ID,r.rl_rol FROM msvg.msvg_usuarios u inner join msvg.msvg_personas p on u.PS_ID=p.PS_ID left join msvg.msvg_roles r on u.RL_ID= r.RL_ID where u.us_id=:idU');
    $data->execute(array(':idU' => $id));
    $filas = $data->fetchAll();
    if (count($filas) > 0) {
        return $filas[0];
    } else {
        return;
    }
}
function getMiCuenta($id) {
    $gdb = getConnection();
    $data = $gdb->prepare('SELECT u.us_id,u.us_nombre,p.PS_ID,p.PS_NOMBRE,p.PS_APELLIDO_P,p.PS_APELLIDO_M,u.US_celular,u.us_mail,US_PASS, US_TIPO,r.RL_ID,r.rl_rol FROM msvg.msvg_usuarios u inner join msvg.msvg_personas p on u.PS_ID=p.PS_ID left join msvg.msvg_roles r on u.RL_ID= r.RL_ID where u.us_id=:idU');
    //$data = $gdb->prepare('SELECT u.us_id,u.us_nombre,p.PS_ID,p.PS_NOMBRE,p.PS_APELLIDO_P,p.PS_APELLIDO_M,u.US_celular,u.us_mail,US_PASS, US_TIPO FROM msvg.msvg_usuarios u inner join msvg.msvg_personas p on u.PS_ID=p.PS_ID left join msvg.msvg_roles r on u.RL_ID= r.RL_ID where u.us_id=:idU');
    $data->execute(array(':idU' => $id));
    $filas = $data->fetchAll();
    if (count($filas) > 0) {
        return $filas[0];
    } else {
        return;
    }
}

function listUsuarios() {
    $gdb = getConnection();
    $data = $gdb->query('SELECT u.us_id,u.us_nombre,concat(PS_APELLIDO_P,\' \',PS_APELLIDO_M), PS_NOMBRE, US_PASS, US_TIPO,r.RL_ID,r.rl_rol FROM msvg.msvg_usuarios u inner join msvg.msvg_personas p on u.PS_ID=p.PS_ID left join msvg.msvg_roles r on u.RL_ID= r.RL_ID ');
    $data = $data->fetchAll();
    return $data;
}
//--------------------------------
function insertUsuario($unom, $ape, $nom, $pass, $tipo, $codt) {
    $gdb = getConnection();
    $sent = $gdb->prepare('insert into usuario(nombUser, apellidos, nombres, password, tipo, estado, codtienda) 
        values(:unom, :ape, :nom, md5(:pass), :tipo, \'1\',:codt)');
    $exito = $sent->execute(array(':unom' => $unom, ':ape' => $ape, ':nom' => $nom,
        ':pass' => $pass, ':tipo' => $tipo,':codt'=>$codt));
    return $exito;
}

function updateUsuario($id, $unom, $ape, $nom, $pass, $tipo, $estado,$codt) {
    $gdb = getConnection();
    $sent = $gdb->prepare('update usuario set nombUser = :unom, apellidos = :ape, nombres = :nom, password = :pass, tipo = :tipo ,estado = :estado,codtienda=:codt where idUsuario = :idu');
    $exito = $sent->execute(array(':unom' => $unom, ':ape' => $ape, ':nom' => $nom, ':pass' => $pass, ':tipo' => $tipo, ':estado' => $estado, ':idu' => $id,':codt'=>$codt));
    return $exito;
}

function removeUsuario($id) {
    $gdb = getConnection();
    $sent = $gdb->prepare('update usuario set estado = 0 where  idUsuario= :id');
    $exito = $sent->execute(array(':id' => $id));
    return $exito;
}

?>
