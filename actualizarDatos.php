<?php
session_start();
require_once('conexionOracle.php');
$conn = new Conexion();
$llamarMetodo = $conn->Conectar();

$proveedoru = $_POST['nombre_proveedoru'];
$nitu = $_POST['nit_proveedoru'];
$telefonou = $_POST['telefono_proveedoru'];
$idu = $_POST['idu'];
$sql = "UPDATE tb_proveedor SET nombre_proveedor=UPPER(:nombre),
                                  nit_proveedor=:nit,
                                  telefono_proveedor=:telefono
            WHERE id=:id";
$query = $llamarMetodo->prepare($sql);

$query->bindParam(':nombre', $proveedoru, PDO::PARAM_STR);
$query->bindParam(':nit', $nitu, PDO::PARAM_STR);
$query->bindParam(':telefono', $telefonou, PDO::PARAM_STR);
$query->bindParam(':id', $idu, PDO::PARAM_STR);

$e =  $query->execute();

if (!$e) {
    echo $query->errorInfo();
} else {
    echo $e;
}
