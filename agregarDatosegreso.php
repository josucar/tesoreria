<?php
session_start();

require_once('conexionOracle.php');

$conn = new Conexion();
$llamarMetodo = $conn->Conectar();

$user = $_SESSION['usuario'];

$movimientoe = $_POST['tipo_movimientoe'];
$proyectoe = $_POST['id_proyectoe'];
$transaccione = $_POST['tipo_transaccione'];
$documentoe = $_POST['numero_documentoe'];
$fechae = $_POST['fecha_documentoe'];
$egreso = $_POST['valor_egreso'];
$isr = $_POST['isr_egreso'];
$total = $_POST['total_egreso'];
$comentarioe = $_POST['comentarioe'];


$sql = "INSERT INTO tb_movimiento (id_movimiento,
                                            tipo_movimiento,
                                            id_proyecto,
                                            tipo_transaccion,
                                            numero_documento,
                                            fecha_documento,
                                            valor_egreso,
                                            isr_egreso,
                                            total_egreso,
                                            comentario,
                                            usuario_graba,
                                            fecha_graba)
                                        VALUES (SEQ_TB_MOVIMIENTO.NEXTVAL,:movimientoe,:proyectoe,:transaccione,:documentoe,TO_DATE(:fechae,'YYYY-MM-DD'),TO_NUMBER(:egreso,'99999999999999999999D99999999999999999999'
                                        ,'NLS_NUMERIC_CHARACTERS=''.,'''),TO_NUMBER(:isr,
                                        '99999999999999999999D99999999999999999999'
                                        ,'NLS_NUMERIC_CHARACTERS=''.,'''),TO_NUMBER(:total,
                                        '99999999999999999999D99999999999999999999'
                                        ,'NLS_NUMERIC_CHARACTERS=''.,'''),:comentarioe,UPPER(:usuario),SYSDATE)";

$query = $llamarMetodo->prepare($sql);

$query->bindParam(':movimientoe', $movimientoe, PDO::PARAM_STR);
$query->bindParam(':proyectoe', $proyectoe, PDO::PARAM_STR);
$query->bindParam(':transaccione', $transaccione, PDO::PARAM_STR);
$query->bindParam(':documentoe', $documentoe, PDO::PARAM_STR);
$query->bindParam(':fechae', $fechae, PDO::PARAM_STR);
$query->bindParam(':egreso', $egreso, PDO::PARAM_STR);
$query->bindParam(':isr', $isr, PDO::PARAM_STR);
$query->bindParam(':total', $total, PDO::PARAM_STR);
$query->bindParam(':comentarioe', $comentarioe, PDO::PARAM_STR);
$query->bindParam(':usuario', $user, PDO::PARAM_STR);

$e = $query->execute();

if(!$e){
    print_r($query->errorInfo());
}else{
    echo $e;
}
?>
