<?php

require '../dal/pacienteDAL.php';

$action = $_POST['action'];

switch ($action) {
    case 'listPacientes':
        $lista = listPacientes();
        $lista2=[];
        //
        if ($lista != "") {
            foreach ($lista as $auxlista) {
                $auxlista = array_map('utf8_encode', $auxlista);
                array_push($lista2,$auxlista);
                //print $auxlista[0];
            }
            //print $lista2[1][0];
            print(json_encode($lista2));
        } else {
            print "no";
        }
        break;
}
?>
