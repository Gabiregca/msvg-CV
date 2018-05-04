<?php

require 'conexion.php';

function getdispositivo($id) {
    $gdb = getConnection();
    $data = $gdb->query('SELECT GSV.GSV_ID,SV.SV_MATCH FROM msvg_pacientes pc left join msvg_registroestadopacientes rp on PC.RP_ID=RP.RP_ID left join msvg_registroestadogadget RG on RP.RG_ID=RG.RG_ID RIGHT JOIN msvg_gadgetxsv GSV ON PC.RP_ID=GSV.RP_ID LEFT JOIN msvg_signosvitales SV ON GSV.SV_ID=SV.SV_ID where rp.RP_ESTADO=\'Hospitalizada\' and RG.RG_ESTADO=\'En uso\' AND RG.GD_ID=\'' . $id . '\'');
    $data = $data->fetchAll();
    return $data;
}

function insertarSV($dispositivo, $sis, $dia, $pul, $temp, $spo2, $us) {
    $gdb = getConnection();
    
    $date = new DateTime();
    $date->modify('-5 hour');
    $fecha = $date->format('d/m/y');
    $fechal = $date->format('d/m/y H:i:s');
    $hora = $date->format('H:i:s');
    
    foreach ($dispositivo as $tmpdisp) {
        switch ($tmpdisp[1]) {
            case 'SIS':
                $sql = 'INSERT INTO msvg.msvg_valoressv (GSV_ID,VSV_FECHA,VSV_HORA,VSV_VALOR,AU_FECHA_CREADO,AU_FECHA_MODIFICADO,AU_USUARIO_CREADO,AU_USUARIO_MODIFICADO) VALUES (' . $tmpdisp[0] . ',\'' . $fecha . '\',\'' . $hora . '\',' . $sis . ',\'' . $us . '\',\'' . $fechal . '\',\'' . $us . '\',\'' . $fechal . '\')';
                break;
            case 'DIA':
                $sql = 'INSERT INTO msvg.msvg_valoressv (GSV_ID,VSV_FECHA,VSV_HORA,VSV_VALOR,AU_FECHA_CREADO,AU_FECHA_MODIFICADO,AU_USUARIO_CREADO,AU_USUARIO_MODIFICADO) VALUES (' . $tmpdisp[0] . ',\'' . $fecha . '\',\'' . $hora . '\',' . $dia . ',\'' . $us . '\',\'' . $fechal . '\',\'' . $us . '\',\'' . $fechal . '\')';
                break;
            case 'PUL':
                $sql = 'INSERT INTO msvg.msvg_valoressv (GSV_ID,VSV_FECHA,VSV_HORA,VSV_VALOR,AU_FECHA_CREADO,AU_FECHA_MODIFICADO,AU_USUARIO_CREADO,AU_USUARIO_MODIFICADO) VALUES (' . $tmpdisp[0] . ',\'' . $fecha . '\',\'' . $hora . '\',' . $pul . ',\'' . $us . '\',\'' . $fechal . '\',\'' . $us . '\',\'' . $fechal . '\')';
                break;
            case 'TEMP':
                $sql = 'INSERT INTO msvg.msvg_valoressv (GSV_ID,VSV_FECHA,VSV_HORA,VSV_VALOR,AU_FECHA_CREADO,AU_FECHA_MODIFICADO,AU_USUARIO_CREADO,AU_USUARIO_MODIFICADO) VALUES (' . $tmpdisp[0] . ',\'' . $fecha . '\',\'' . $hora . '\',' . $temp . ',\'' . $us . '\',\'' . $fechal . '\',\'' . $us . '\',\'' . $fechal . '\')';
                break;
            case 'SPO2':
                $sql = 'INSERT INTO msvg.msvg_valoressv (GSV_ID,VSV_FECHA,VSV_HORA,VSV_VALOR,AU_FECHA_CREADO,AU_FECHA_MODIFICADO,AU_USUARIO_CREADO,AU_USUARIO_MODIFICADO) VALUES (' . $tmpdisp[0] . ',\'' . $fecha . '\',\'' . $hora . '\',' . $spo2 . ',\'' . $us . '\',\'' . $fechal . '\',\'' . $us . '\',\'' . $fechal . '\')';
                break;
        }
        $sent = $gdb->prepare($sql);
        $exito = $sent->execute();
    }
    return $exito;
}

function insertarSV2($dispositivo, $sis, $dia, $pul, $temp, $spo2, $us, $f, $h) {
    $gdb = getConnection();
    $fecha = $f;
    $fechal = $f . " " . $h;
    $hora = $h;
    foreach ($dispositivo as $tmpdisp) {
        switch ($tmpdisp[1]) {
            case 'SIS':
                $sql = 'INSERT INTO msvg.msvg_valoressv (GSV_ID,VSV_FECHA,VSV_HORA,VSV_VALOR,AU_FECHA_CREADO,AU_FECHA_MODIFICADO,AU_USUARIO_CREADO,AU_USUARIO_MODIFICADO) VALUES (' . $tmpdisp[0] . ',\'' . $fecha . '\',\'' . $hora . '\',' . $sis . ',\'' . $us . '\',\'' . $fechal . '\',\'' . $us . '\',\'' . $fechal . '\')';
                break;
            case 'DIA':
                $sql = 'INSERT INTO msvg.msvg_valoressv (GSV_ID,VSV_FECHA,VSV_HORA,VSV_VALOR,AU_FECHA_CREADO,AU_FECHA_MODIFICADO,AU_USUARIO_CREADO,AU_USUARIO_MODIFICADO) VALUES (' . $tmpdisp[0] . ',\'' . $fecha . '\',\'' . $hora . '\',' . $dia . ',\'' . $us . '\',\'' . $fechal . '\',\'' . $us . '\',\'' . $fechal . '\')';
                break;
            case 'PUL':
                $sql = 'INSERT INTO msvg.msvg_valoressv (GSV_ID,VSV_FECHA,VSV_HORA,VSV_VALOR,AU_FECHA_CREADO,AU_FECHA_MODIFICADO,AU_USUARIO_CREADO,AU_USUARIO_MODIFICADO) VALUES (' . $tmpdisp[0] . ',\'' . $fecha . '\',\'' . $hora . '\',' . $pul . ',\'' . $us . '\',\'' . $fechal . '\',\'' . $us . '\',\'' . $fechal . '\')';
                break;
            case 'TEMP':
                $sql = 'INSERT INTO msvg.msvg_valoressv (GSV_ID,VSV_FECHA,VSV_HORA,VSV_VALOR,AU_FECHA_CREADO,AU_FECHA_MODIFICADO,AU_USUARIO_CREADO,AU_USUARIO_MODIFICADO) VALUES (' . $tmpdisp[0] . ',\'' . $fecha . '\',\'' . $hora . '\',' . $temp . ',\'' . $us . '\',\'' . $fechal . '\',\'' . $us . '\',\'' . $fechal . '\')';
                break;
            case 'SPO2':
                $sql = 'INSERT INTO msvg.msvg_valoressv (GSV_ID,VSV_FECHA,VSV_HORA,VSV_VALOR,AU_FECHA_CREADO,AU_FECHA_MODIFICADO,AU_USUARIO_CREADO,AU_USUARIO_MODIFICADO) VALUES (' . $tmpdisp[0] . ',\'' . $fecha . '\',\'' . $hora . '\',' . $spo2 . ',\'' . $us . '\',\'' . $fechal . '\',\'' . $us . '\',\'' . $fechal . '\')';
                break;
        }
        $sent = $gdb->prepare($sql);
        $exito = $sent->execute();
    }
    return $exito;
}

?>
