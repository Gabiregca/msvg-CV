<?php

require '../dal/tiendasDAL.php';

$action = $_POST['action'];

switch ($action) {

    case 'list':
        $lista = listTiendas();
        print(json_encode($lista));
        break;
    case 'get':
        $id = $_POST['id'];
        $fila = getTiendas($id);
        if ($fila != "") {
            print(json_encode($fila));
        } else {
            print "no";
        }
        break;
    case 'upd':
        $id = $_POST['id'];
        $nomb = $_POST['nomb'];
        $desc = $_POST['desc'];
        $exito = updateTiendas($id, $nomb, $desc);
        if ($exito) {
            print('OK');
        } else {
            print('NO');
        }
        break;
    case 'ins':
        $nomb = $_POST['nomb'];
        $desc = $_POST['desc'];
        $exito = insertTiendas($nomb, $desc);
        if ($exito) {
            print('OK');
        } else {
            print('NO');
        }
        break;
}
?>