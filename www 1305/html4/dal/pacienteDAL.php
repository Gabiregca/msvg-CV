<?php

require 'conexion.php';

function GetPaciente($id) {
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

function listPacientes() {
    $gdb = getConnection();
    $data = $gdb->query('SELECT concat(PS.PS_NOMBRE,\' \',PS.PS_APELLIDO_P,\' \',PS.PS_APELLIDO_M) NOMBRE,PC.PC_EDAD EDAD,PC.PC_DIAGNOSTICO DIAGNOSTICO,CONCAT(PC.PC_HABITACION,\'-\',PC.PC_N_CAMA) CAMA,RP.RP_FECHA, RP.RP_ESTADO FROM msvg_pacientes pc left join msvg_registroestadopacientes rp on PC.RP_ID=RP.RP_ID left join msvg_personas PS on PC.PS_ID = PS.PS_ID where rp.RP_ESTADO=\'Hospitalizada\'');
    $data = $data->fetchAll();
    return $data;
    
}
//--------------------------------
function insertPaciente($unom, $ape, $nom, $pass, $tipo, $codt) {
    $gdb = getConnection();
    $sent = $gdb->prepare('insert into usuario(nombUser, apellidos, nombres, password, tipo, estado, codtienda) 
        values(:unom, :ape, :nom, md5(:pass), :tipo, \'1\',:codt)');
    $exito = $sent->execute(array(':unom' => $unom, ':ape' => $ape, ':nom' => $nom,
        ':pass' => $pass, ':tipo' => $tipo,':codt'=>$codt));
    return $exito;
}

function updatePaciente($id, $unom, $ape, $nom, $pass, $tipo, $estado,$codt) {
    $gdb = getConnection();
    $sent = $gdb->prepare('update usuario set nombUser = :unom, apellidos = :ape, nombres = :nom, password = :pass, tipo = :tipo ,estado = :estado,codtienda=:codt where idUsuario = :idu');
    $exito = $sent->execute(array(':unom' => $unom, ':ape' => $ape, ':nom' => $nom, ':pass' => $pass, ':tipo' => $tipo, ':estado' => $estado, ':idu' => $id,':codt'=>$codt));
    return $exito;
}

function removePaciente($id) {
    $gdb = getConnection();
    $sent = $gdb->prepare('update usuario set estado = 0 where  idUsuario= :id');
    $exito = $sent->execute(array(':id' => $id));
    return $exito;
}

?>
