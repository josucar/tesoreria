<?php
session_start();
require_once('conexionOracle.php');
$conn = new Conexion();
$llamarMetodo = $conn->Conectar();

$nombreu = $_POST['nombre_proyectou'];
$proveedoru = $_POST['proveedores'];
$fechau = $_POST['fecha_proyectou'];
$cuentau = $_POST['cuenta_bancou'];
$costou = $_POST['total_costo_proyectou'];
$codedeu = $_POST['codedes'];
$aportecu = $_POST['aporte_codedeu'];
$aportemu = $_POST['aporte_muniu'];
$comentariou = $_POST['comentariou'];
$proyectou = $_POST['id_proyectou'];

$sql = "UPDATE tb_proy SET nombre_proyecto=UPPER(:nombreu),
                                  id_proveedor=:proveedoru,
                                  fecha_proyecto=TO_DATE(:fechau,'YYYY-MM-DD'),
                                  cuenta_banco=:cuentau,
                                  total_costo_proyecto=TO_NUMBER(:costou
                                  ,'99999999999999999999D99999999999999999999'
                                  ,'NLS_NUMERIC_CHARACTERS=''.,'''),
                                  id_codede=:codedeu,
                                  aporte_codede=TO_NUMBER(:aportecu
                                  ,'99999999999999999999D99999999999999999999'
                                  ,'NLS_NUMERIC_CHARACTERS=''.,'''),
                                  aporte_muni=TO_NUMBER(:aportemu
                                  ,'99999999999999999999D99999999999999999999'
                                  ,'NLS_NUMERIC_CHARACTERS=''.,'''),
                                  comentario=UPPER(:comentariou)
            WHERE id_proyecto=:proyectou";

$query = $llamarMetodo->prepare($sql);

$query->bindParam(':nombreu', $nombreu, PDO::PARAM_STR);
$query->bindParam(':proveedoru', $proveedoru, PDO::PARAM_STR);
$query->bindParam(':fechau', $fechau, PDO::PARAM_STR);
$query->bindParam(':cuentau', $cuentau, PDO::PARAM_STR);
$query->bindParam(':costou', $costou, PDO::PARAM_STR);
$query->bindParam(':codedeu', $codedeu, PDO::PARAM_STR);
$query->bindParam(':aportecu', $aportecu, PDO::PARAM_STR);
$query->bindParam(':aportemu', $aportemu, PDO::PARAM_STR);
$query->bindParam(':comentariou', $comentariou, PDO::PARAM_STR);
$query->bindParam(':proyectou', $proyectou, PDO::PARAM_STR);

$e =  $query->execute();

if (!$e) {
    print_r($query->errorInfo());
} else {
    echo $e;
}
