<?php
session_start();
require_once('conexionOracle.php');
$conn = new Conexion();
$llamarMetodo = $conn->Conectar();
$user = $_SESSION['usuario'];
$codede = $_POST['nombre_codede'];
$telefono = $_POST['telefono_codede'];

$sql = "INSERT INTO tb_codede (id_codede,
                                nombre_codede,
                                telefono_codede,
                                usuario_graba,
                                fecha_graba)
                                VALUES (SEQ_TB_CODEDE.NEXTVAL,UPPER(:nombre),:telefono,UPPER(:usuario),SYSDATE)";

$query = $llamarMetodo->prepare($sql);
$query->bindParam(':nombre',$codede, PDO::PARAM_STR);
$query->bindParam(':telefono',$telefono, PDO::PARAM_STR);
$query->bindParam(':usuario',$user, PDO::PARAM_STR);

$e = $query->execute();

if(!$e){
    echo $query->errorInfo();
}else{
    echo $e;
}
