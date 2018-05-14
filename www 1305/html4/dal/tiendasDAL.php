<?php
require 'conexion.php';


function listTiendas() {
    $gdb = getConnection();
    $data = $gdb->query('SELECT* FROM tienda');
    $data = $data->fetchAll();
    return $data;
}
function getTiendas($id) {
    $gdb = getConnection();
    $data = $gdb->prepare('select * FROM tienda where idtienda=:idU');
    $data->execute(array(':idU' => $id));
    $filas = $data->fetchAll();
    if (count($filas) > 0) {
        return $filas[0];
    } else {
        return;
    }
}
function insertTiendas($nomb, $desc,$estado) {
    $gdb = getConnection();
    $sent = $gdb->prepare('INSERT INTO tienda(tienda,direccion,estado) values(:tienda,:direccion,:estado)');																									
    $exito = $sent->execute(array(':tienda' => $nomb, ':direccion' => $desc, ':estado' => $estado));
    return $exito;
}
function updateTiendas($id, $nomb, $desc) {
    $gdb = getConnection();
    $sent = $gdb->prepare('update tienda set tienda = :nomb, direccion = :desc where idtienda = :id');
    $exito = $sent->execute(array(':nomb' => $nomb, ':desc' => $desc, ':id' => $id));
    return $exito;
}
?>