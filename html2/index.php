<?php

require './dal/usuarioDAL.php';

session_start();
$pindex = "main.php";

if (isset($_SESSION['isLogin'])) {
    if ($_SESSION['isLogin'] === "si") {
	$fila2 = getUsuario($_SESSION['userID']);
	$nombres = explode(" ", $fila2[3]);
        $apellidos=explode(" ", $fila2[2]);
	$_SESSION['minNom'] = $nombres[0];
	$_SESSION['minApe'] = $apellidos[0];
	$_SESSION['cargo'] = $fila2[5];
        $_SESSION['IDrol']=$fila2[6];
        $_SESSION['rol']=$fila2[7];
        //$_SESSION['tienda'] = $fila2[7];
        $msg=getMsg();
        $_SESSION['msg']=$msg[0][0];
        header("Location: " . $pindex);
    } else {
	header("Location: login.php");
    }
} else {
    header("Location: login.php");
}
?>