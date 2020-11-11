<?php
session_start();
require_once('conexionOracle.php');

$conn = new Conexion();
$llamarMetodo = $conn->Conectar();

$user = $_SESSION['usuario'];

$movimiento = $_POST['tipo_movimiento'];
$proyecto = $_POST['id_proyecto'];
$transaccion = $_POST['tipo_transaccion'];
$documento = $_POST['numero_documento'];
$fecha = $_POST['fecha_documento'];
$aporte = $_POST['tipo_aporte'];
$valor = $_POST['valor_ingreso'];
$comentario = $_POST['comentario'];

$sql = "INSERT INTO tb_movimiento (id_movimiento,
                                        tipo_movimiento,
                                        id_proyecto,
                                        tipo_transaccion,
                                        numero_documento,
                                        fecha_documento,
                                        tipo_aporte,
                                        valor_ingreso,
                                        comentario,
                                        usuario_graba,
                                        fecha_graba)
                                        VALUES (SEQ_TB_MOVIMIENTO.NEXTVAL,:movimiento,:proyecto,:transaccion,:documento,TO_DATE(:fecha,'YYYY-MM-DD'),:aporte,TO_NUMBER(:valor
        ,'99999999999999999999D99999999999999999999'
        ,'NLS_NUMERIC_CHARACTERS=''.,'''),:comentario,UPPER(:usuario),SYSDATE)";
$query = $llamarMetodo->prepare($sql);

$query->bindParam(':movimiento',$movimiento,PDO::PARAM_STR);
$query->bindParam(':proyecto',$proyecto,PDO::PARAM_STR);
$query->bindParam(':transaccion',$transaccion,PDO::PARAM_STR);
$query->bindParam(':documento',$documento,PDO::PARAM_STR);
$query->bindParam(':fecha',$fecha,PDO::PARAM_STR);
$query->bindParam(':aporte',$aporte,PDO::PARAM_STR);
$query->bindParam(':valor',$valor,PDO::PARAM_STR);
$query->bindParam(':comentario',$comentario,PDO::PARAM_STR);
$query->bindParam(':usuario',$user,PDO::PARAM_STR);

$e =  $query->execute();

if(!$e){
    print_r($query->errorInfo());
    
}else{
    echo $e;
}

?>

