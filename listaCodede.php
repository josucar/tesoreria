<?php
session_start();
require_once('conexionOracle.php');

$conn = new Conexion();
$llamarMetodo = $conn->Conectar();

$sql = "SELECT id_codede,nombre_codede FROM tb_codede ORDER BY id_codede ASC";

$result = $llamarMetodo->prepare($sql);
$result->execute();

$select = "";
$data = array();

    while ($datos = $result->fetch(PDO::FETCH_ASSOC)) {

    $data[] = $datos;
}

print json_encode($data);
