<?php
session_start();
require_once('conexionOracle.php');

$conn = new Conexion();
$llamarMetodo = $conn->Conectar();

$id_proyecto = $_POST['id_proyecto'];
$data = array();

$sql = "SELECT    id_proyecto,
                    id_proveedor,
                    id_codede,
                    nombre_proyecto,
                    fecha_proyecto,
                    cuenta_banco,
                    total_costo_proyecto,
                    aporte_codede,
                    aporte_muni,
                    comentario
            FROM tb_proy WHERE id_proyecto=:id_proyecto";

$query = $llamarMetodo->prepare($sql);

$query->bindParam(':id_proyecto',$id_proyecto, PDO::PARAM_STR);
$query->execute();

while ($datos = $query->fetch(PDO::FETCH_ASSOC)){
    $data[] = $datos;
}

echo json_encode($data);
