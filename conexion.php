<?php

function getConnection() {

    $conn = null;
    $server='localhost';
    $db = 'msvg';
    $user = 'root';
    $pwd = '123456';
    try {
        $conn = new PDO('mysql:host=' . $server . ';dbname=' . $db, $user, $pwd);
    } catch (PDOException $e) {
        exit;
    }
    return $conn;
}
function utf8_string_array_encode($array){
    $func = function($value,$key){
        if(is_string($value)){
            $value = utf8_encode($value);
        } 
        if(is_string($key)){
            $key = utf8_encode($key);
        }
        if(is_array($value)){
            utf8_string_array_encode($value);
        }
    };
    array_walk($array,$func);
    return $array;
}

?>