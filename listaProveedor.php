<?php

session_start();

require_once('conexionOracle.php');

$conn = new Conexion();
$llamarMetodo = $conn->Conectar();

$sql = "SELECT id,nombre_proveedor FROM tb_proveedor ORDER BY id ASC";
$result = $llamarMetodo->prepare($sql);
$result->execute();

$select = "";
$data = array();

while ($datos = $result->fetch(PDO::FETCH_ASSOC)) {
    
    $data[] = $datos;
}

print json_encode($data);
