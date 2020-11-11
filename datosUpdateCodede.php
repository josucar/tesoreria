<?php
session_start();
require_once('conexionOracle.php');

$conn = new Conexion();
$llamarMetodo = $conn->Conectar();

$id_codede = $_POST['id_codede'];
$data = array();

$sql = "SELECT id_codede,
                    nombre_codede,
                    telefono_codede
            FROM tb_codede WHERE id_codede=:id_codede";
$query = $llamarMetodo->prepare($sql);
// $query->bind_param('i',$id_codede);
$query->bindParam(':id_codede', $id_codede, PDO::PARAM_STR);
$query->execute();

// $datos= $query->get_result()->fetch_assoc();

while ($datos = $query->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $datos;
}

echo json_encode($data);
