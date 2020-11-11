<?php
session_start();
require_once('conexionOracle.php');

$conn = new Conexion();
$llamarMetodo = $conn->Conectar();

$user = $_SESSION['usuario'];

$proyecto = $_POST['nombre_proyecto'];
$proveedor = $_POST['proveedores'];
$fecha = $_POST['fecha_proyecto'];
$cuenta = $_POST['cuenta_banco'];
$total = $_POST['valor_total'];
$codede = $_POST['codedes'];
$aportec = $_POST['aporte_codede'];
$aportem = $_POST['aporte_muni'];
$comentario = $_POST['comentario'];

$sql = "INSERT INTO tb_proy (id_proyecto,
                                nombre_proyecto,
                                id_proveedor,
                                fecha_proyecto,
                                cuenta_banco,
                                total_costo_proyecto,
                                id_codede,
                                aporte_codede,
                                aporte_muni,
                                comentario,
                                usuario_graba,
                                fecha_graba)
                                VALUES (SEQ_TB_PROY.NEXTVAL,UPPER(:nombre),:proveedor,TO_DATE(:fecha,'YYYY-MM-DD'),:cuenta,TO_NUMBER(:total
                                ,'99999999999999999999D99999999999999999999'
                                ,'NLS_NUMERIC_CHARACTERS=''.,'''),:codede,TO_NUMBER(:aportec
                                ,'99999999999999999999D99999999999999999999'
                                ,'NLS_NUMERIC_CHARACTERS=''.,'''),TO_NUMBER(:aportem
                                ,'99999999999999999999D99999999999999999999'
                                ,'NLS_NUMERIC_CHARACTERS=''.,'''),UPPER(:comentario),UPPER(:usuario),SYSDATE)";

$query = $llamarMetodo->prepare($sql);

$query->bindParam(':nombre', $proyecto, PDO::PARAM_STR);
$query->bindParam(':proveedor', $proveedor, PDO::PARAM_STR);
$query->bindParam(':fecha', $fecha, PDO::PARAM_STR);
$query->bindParam(':cuenta', $cuenta, PDO::PARAM_STR);
$query->bindParam(':total', $total, PDO::PARAM_STR);
$query->bindParam(':codede', $codede, PDO::PARAM_STR);
$query->bindParam(':aportec', $aportec, PDO::PARAM_STR);
$query->bindParam(':aportem', $aportem, PDO::PARAM_STR);
$query->bindParam(':comentario', $comentario, PDO::PARAM_STR);
$query->bindParam(':usuario', $user, PDO::PARAM_STR);

$e =  $query->execute();

if(!$e){
    print_r($query->errorInfo());
    
}else{
    echo $e;
}

?>
