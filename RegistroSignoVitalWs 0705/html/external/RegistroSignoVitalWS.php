<?php
	require '../../dal/wsDAL.php';

	$id = $_GET['id'];

	if ($id != "") {
		$dispositivo = getdispositivo($id);

		if (count($dispositivo) > 0) {
			$sis = $_GET['sis'];
			$dia = $_GET['dia'];
			$pul = $_GET['pul'];
			$temp = $_GET['temp'];
			$spo2 = $_GET['spo2'];
			$f = $_GET["f"];
			$h = $_GET["h"];
			$us = "WS";

			if ($f != "") {
			  $respuesta = insertarSV2($dispositivo, $sis, $dia, $pul, $temp, $spo2, $us, $f, $h);
			} else {
			  $respuesta = insertarSV($dispositivo, $sis, $dia, $pul, $temp, $spo2, $us);
			}
			if ($respuesta != "1") {
			  $respuesta = "ERROR: Error al insertar los Signos Vitales.";
			} else {
			  $respuesta = "Se insertaron correctamente los SV.";
			}
			print $respuesta;
		} else {
			print "ERROR: Disposiivo no registrado.";
		}
	} else {
		print "ERROR: Identificador de dispositivo no enviado.";
	}
?>
