<?php

require_once('conexionOracle.php');

$conn = new Conexion();
$llamarMetodo = $conn->Conectar();

$id_proyecto = $_POST['id_proyecto'];


$sql = "    SELECT    	    r.nombre_proveedor,
                            c.nombre_codede,
                            p.id_proyecto,
                            p.nombre_proyecto,
                            p.cuenta_banco,
                            m.fecha_documento,
                            m.tipo_transaccion,
                            m.numero_documento,
                            nvl(m.valor_ingreso,0) valor_ingreso,
                            to_number(nvl(m.total_egreso,0)) total_egreso
            FROM        tb_proveedor r 
            INNER JOIN  tb_proy p
            ON          p.id_proveedor = r.id
            INNER JOIN  tb_codede c 
            ON          p.id_codede=c.id_codede
            INNER JOIN  tb_movimiento m
            ON          m.id_proyecto=p.id_proyecto
            WHERE		p.id_proyecto= :id_proyecto";

$query = $llamarMetodo->prepare($sql);

$query->bindParam(':id_proyecto', $id_proyecto, PDO::PARAM_STR);

$query->execute();

$tabla = "";
$tabla2 = "";
$tabla3 = "";
$num_rows = $query->rowCount();

if($num_rows >= 0){
    $row = null;
    $suma = 0;
    $resta =0;
    $total = 0;

    while ($datos = $query->fetch(PDO::FETCH_ASSOC)) {

        $row = $datos;
        $suma += number_format((float) str_replace(',','.',$datos['VALOR_INGRESO']),2,'.','');
        $resta += number_format((float) str_replace(',','.',$datos['TOTAL_EGRESO']),2,'.','');

        $total = $suma - $resta;
        
        $tabla2 = $tabla2 . ' <tr class="text-right">
                                <td class="text-center">' . $datos['FECHA_DOCUMENTO'] . '</td>'.
                                ($datos['TIPO_TRANSACCION'] == 'Cheque Propio' ? '<td style="color:red" class="text-center">' : '<td class="text-center">' )
                                 . $datos['TIPO_TRANSACCION'] . '</td>
                                <td class="text-center">' . $datos['NUMERO_DOCUMENTO'] . '</td>
                                <td>Q.' . $datos['VALOR_INGRESO'] . '</td>
                                <td style="color:red">Q.' . $datos['TOTAL_EGRESO'] . '</td>
                                <td>Q.' . $total . '</td>
                            </tr>';
    }

    $tabla = $tabla . '     <tr>
                                <th class="text-center" colspan="6"><h4 class="font-weight-bold text-uppercase">' . $row['NOMBRE_PROYECTO'] . '</h4></th>
                            </tr>
                            <tr>
                                <th colspan="2" class="text-center text-uppercase">' . $row['NOMBRE_PROVEEDOR'] . '</th>
                                <th colspan="3" class="text-center text-uppercase">' . $row['NOMBRE_CODEDE'] . '</th>
                                <th colspan="1" class="text-center text-uppercase">' . $row['CUENTA_BANCO'] . '</th>
                            </tr>';

    $tabla3 = $tabla3 . '   <th  colspan="3" class="text-center text-uppercase">Total</th>
                            <th  colspan="1" class="text-uppercase text-right">Q.' . $suma . '</th>
                            <th  colspan="1" class="text-uppercase text-right" style="color:red">Q.' . $resta . '</th>
                            <th  colspan="1" class="text-uppercase text-right">Q.' . $total . '</th>
                        ';
}

echo '<table class="table table-bordered table-hover">
                    <thead>
                    <tr class="bg-success">
                        <th class="text-center" colspan="6"><h4 class="font-weight-bold">ESTADO DE CUENTA</h4></th>
                    </tr>
                    <tr>
                    ' . $tabla . '
                    </tr>
                    <tr class="thead-light text-center">
                        <th>Fecha</th>
                        <th>Tipo Transaccion</th>
                        <th>No. Docto.</th>
                        <th>Créditos</th>
                        <th>Débitos</th>
                        <th>Saldo Disponible</th>
                    </tr>
                    </thead>
                    <tbody>
                    ' . $tabla2 . '
                    </tbody>
                    <tr class="thead-light">
                    ' . $tabla3 . '
                    </tr>';

