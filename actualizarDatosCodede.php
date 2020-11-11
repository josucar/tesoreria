<?php
session_start();
require_once('conexionOracle.php');
$conn = new Conexion();
$llamarMetodo = $conn->Conectar();

$codedeu = $_POST['nombre_codedeu'];
$telefonou = $_POST['telefono_codedeu'];
$idu = $_POST['id_codedeu'];

$sql = "UPDATE tb_codede SET nombre_codede=UPPER(:codede),
                                  telefono_codede=:telefono
            WHERE id_codede=:id";

$query = $llamarMetodo->prepare($sql);

$query->bindParam(':codede', $codedeu, PDO::PARAM_STR);
$query->bindParam(':telefono', $telefonou, PDO::PARAM_STR);
$query->bindParam(':id', $idu, PDO::PARAM_STR);

$e = $query->execute();

if (!$e) {
    echo $query->errorInfo();
} else {
    echo $e;
}
