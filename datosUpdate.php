<?php
session_start();

require_once('conexionOracle.php');

$conn = new Conexion();
$llamarMetodo = $conn->Conectar();

$idProveedor = $_POST['id_proveedor'];
$data = array();

$sql = "SELECT id,
                    nombre_proveedor,
                    nit_proveedor,
                    telefono_proveedor
            FROM tb_proveedor WHERE id = :idProveedor";
$query = $llamarMetodo->prepare($sql);
$query->bindParam(':idProveedor', $idProveedor, PDO::PARAM_STR);
$query->execute();

while ($datos = $query->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $datos;
}

echo json_encode($data);
