<?php

require 'conexion.php';

function getdispositivo($id) {

		//echo 'SELECT GSV.GSV_ID,SV.SV_MATCH FROM msvg_pacientes PC left join msvg_registroestadopacientes RP on PC.RP_ID=RP.RP_ID left join msvg_registroestadogadget RG on RP.RG_ID=RG.RG_ID RIGHT JOIN msvg_gadgetxsv GSV ON PC.RP_ID=GSV.RP_ID LEFT JOIN msvg_signosvitales SV ON GSV.SV_ID=SV.SV_ID where RP.RP_ESTADO=\'Hospitalizada\' and RG.RG_ESTADO=\'En uso\' AND RG.GD_ID=\'' . $id . '\'';
		$gdb = getConnection();
		$data = $gdb->query('SELECT GSV.GSV_ID,SV.SV_MATCH FROM msvg_pacientes PC left join msvg_registroestadopacientes RP on PC.RP_ID=RP.RP_ID left join msvg_registroestadogadget RG on RP.RG_ID=RG.RG_ID RIGHT JOIN msvg_gadgetxsv GSV ON PC.RP_ID=GSV.RP_ID LEFT JOIN msvg_signosvitales SV ON GSV.SV_ID=SV.SV_ID where RP.RP_ESTADO=\'Hospitalizada\' and RG.RG_ESTADO=\'En uso\' AND RG.GD_ID=\'' . $id . '\'');
		$data = $data->fetchAll();
		return $data;
	
}

function insertarSV($dispositivo, $sis, $dia, $pul, $temp, $spo2, $us) {
	try {
		$gdb = getConnection();
		
		$date = new DateTime();
		$date->modify('-5 hour');
		$fecha = $date->format('d/m/y');
		$fechal = $date->format('d/m/y H:i:s');
		$hora = $date->format('H:i:s');
		
		$sisU=160;
		$sisD=88;
		$diaU=110;
		$diaD=58;
		$pulU=90;
		$tempU=38;
		$tempD=36;
		$spo2U=93;
		
		foreach ($dispositivo as $tmpdisp) {
			$insAlarma=false;
			switch ($tmpdisp[1]) {
				case 'SIS':
					$sql = 'INSERT INTO msvg.msvg_valoressv (GSV_ID,VSV_FECHA,VSV_HORA,VSV_VALOR,AU_FECHA_CREADO,AU_FECHA_MODIFICADO,AU_USUARIO_CREADO,AU_USUARIO_MODIFICADO) VALUES (' . $tmpdisp[0] . ',\'' . $fecha . '\',\'' . $hora . '\',' . $sis . ',\'' . $fechal . '\',\'' . $fechal . '\',\'' . $us . '\',\'' . $us . '\')';
					if($sis<=$sisD || $sis>=$sisU){
						$insAlarma=true;
						$sql2='INSERT INTO msvg.msvg_alarmas(GSV_ID,AL_FECHA,AL_HORA,AL_VALOR,AL_SONIDO,AL_MENSAJE,AU_FECHA_CREADO,AU_FECHA_MODIFICADO,AU_USUARIO_CREADO,AU_USUARIO_MODIFICADO) VALUES ('. $tmpdisp[0] . ',\'' . $fecha . '\',\'' . $hora . '\',' . $sis .',\'0\',\'0\',\'' . $fechal .'\',\'' . $fechal .'\',\'' . $us . '\',\'' . $us. '\')';
					}
					break;
				case 'DIA':
					$sql = 'INSERT INTO msvg.msvg_valoressv (GSV_ID,VSV_FECHA,VSV_HORA,VSV_VALOR,AU_FECHA_CREADO,AU_FECHA_MODIFICADO,AU_USUARIO_CREADO,AU_USUARIO_MODIFICADO) VALUES (' . $tmpdisp[0] . ',\'' . $fecha . '\',\'' . $hora . '\',' . $dia . ',\'' . $fechal . '\',\'' . $fechal . '\',\'' . $us . '\',\'' . $us . '\')';
					if($dia<=$diaD || $dia>=$diaU){
						$insAlarma=true;
						$sql2='INSERT INTO msvg.msvg_alarmas(GSV_ID,AL_FECHA,AL_HORA,AL_VALOR,AL_SONIDO,AL_MENSAJE,AU_FECHA_CREADO,AU_FECHA_MODIFICADO,AU_USUARIO_CREADO,AU_USUARIO_MODIFICADO) VALUES ('. $tmpdisp[0] . ',\'' . $fecha . '\',\'' . $hora . '\',' . $dia .',\'0\',\'0\',\'' . $fechal .'\',\'' . $fechal .'\',\'' . $us . '\',\'' . $us. '\')';
					}
					break;
				case 'PUL':
					$sql = 'INSERT INTO msvg.msvg_valoressv (GSV_ID,VSV_FECHA,VSV_HORA,VSV_VALOR,AU_FECHA_CREADO,AU_FECHA_MODIFICADO,AU_USUARIO_CREADO,AU_USUARIO_MODIFICADO) VALUES (' . $tmpdisp[0] . ',\'' . $fecha . '\',\'' . $hora . '\',' . $pul . ',\'' . $fechal . '\',\'' . $fechal . '\',\'' . $us . '\',\'' . $us . '\')';
					if($pul>=$pulU){
						$insAlarma=true;
						$sql2='INSERT INTO msvg.msvg_alarmas(GSV_ID,AL_FECHA,AL_HORA,AL_VALOR,AL_SONIDO,AL_MENSAJE,AU_FECHA_CREADO,AU_FECHA_MODIFICADO,AU_USUARIO_CREADO,AU_USUARIO_MODIFICADO) VALUES ('. $tmpdisp[0] . ',\'' . $fecha . '\',\'' . $hora . '\',' . $pul .',\'0\',\'0\',\'' . $fechal .'\',\'' . $fechal .'\',\'' . $us . '\',\'' . $us. '\')';
					}
					break;
				case 'TEMP':
					$sql = 'INSERT INTO msvg.msvg_valoressv (GSV_ID,VSV_FECHA,VSV_HORA,VSV_VALOR,AU_FECHA_CREADO,AU_FECHA_MODIFICADO,AU_USUARIO_CREADO,AU_USUARIO_MODIFICADO) VALUES (' . $tmpdisp[0] . ',\'' . $fecha . '\',\'' . $hora . '\',' . $temp . ',\'' . $fechal . '\',\'' . $fechal . '\',\'' . $us . '\',\'' . $us . '\')';
					if($temp<=$tempD || $temp>=$tempU){
						$insAlarma=true;
						$sql2='INSERT INTO msvg.msvg_alarmas(GSV_ID,AL_FECHA,AL_HORA,AL_VALOR,AL_SONIDO,AL_MENSAJE,AU_FECHA_CREADO,AU_FECHA_MODIFICADO,AU_USUARIO_CREADO,AU_USUARIO_MODIFICADO) VALUES ('. $tmpdisp[0] . ',\'' . $fecha . '\',\'' . $hora . '\',' . $temp .',\'0\',\'0\',\'' . $fechal .'\',\'' . $fechal .'\',\'' . $us . '\',\'' . $us. '\')';
					}
					break;
				case 'SPO2':
					$sql = 'INSERT INTO msvg.msvg_valoressv (GSV_ID,VSV_FECHA,VSV_HORA,VSV_VALOR,AU_FECHA_CREADO,AU_FECHA_MODIFICADO,AU_USUARIO_CREADO,AU_USUARIO_MODIFICADO) VALUES (' . $tmpdisp[0] . ',\'' . $fecha . '\',\'' . $hora . '\',' . $spo2 . ',\'' . $fechal . '\',\'' . $fechal . '\',\'' . $us . '\',\'' . $us . '\')';
					if($spo2=$spo2U){
						$insAlarma=true;
						$sql2='INSERT INTO msvg.msvg_alarmas(GSV_ID,AL_FECHA,AL_HORA,AL_VALOR,AL_SONIDO,AL_MENSAJE,AU_FECHA_CREADO,AU_FECHA_MODIFICADO,AU_USUARIO_CREADO,AU_USUARIO_MODIFICADO) VALUES ('. $tmpdisp[0] . ',\'' . $fecha . '\',\'' . $hora . '\',' . $spo2 .',\'0\',\'0\',\'' . $fechal .'\',\'' . $fechal .'\',\'' . $us . '\',\'' . $us. '\')';
					}
					break;
			}
			
			$sent = $gdb->prepare($sql);
			$exito = $sent->execute();
			if($insAlarma){
				$sent2 = $gdb->prepare($sql2);
				$exito2 = $sent2->execute();
			}
		}
		return $exito;
	} catch (Exception $e) {
		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
	}
}

?>
