<?php
session_start();

require_once('conexionOracle.php');

$conn = new Conexion();
$llamarMetodo = $conn->Conectar();

$user = $_SESSION['usuario'];



$proveedor = $_POST['nombre_proveedor'];
$nit = $_POST['nit_proveedor'];
$telefono = $_POST['telefono_proveedor'];

$sql = "INSERT INTO tb_proveedor (id, 
                                            nombre_proveedor,
                                            nit_proveedor,
                                            telefono_proveedor,
                                            usuario_graba,
                                            fecha_graba)
                                        VALUES (SEQ_TB_PROVEEDOR.NEXTVAL,UPPER(:nombre),:nit,:telefono,UPPER(:usuario),SYSDATE)";

$query = $llamarMetodo->prepare($sql);

$query->bindParam(':nombre', $proveedor, PDO::PARAM_STR);
$query->bindParam(':nit', $nit, PDO::PARAM_STR);
$query->bindParam(':telefono', $telefono, PDO::PARAM_STR);
$query->bindParam(':usuario', $user, PDO::PARAM_STR);


$e =  $query->execute();

if (!$e) {
    echo $query->errorInfo();
} else {
    echo $e;
}
