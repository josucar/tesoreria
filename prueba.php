<?php
require_once('mpdf3/mpdf.php');

require_once('conexionOracle.php');

$conn = new Conexion();
$llamarMetodo = $conn->Conectar();

$id_proyecto = $_GET['id_proyecto'];


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

        $tabla2 = $tabla2 . ' <tr>
                                <td class="td">' . $datos['FECHA_DOCUMENTO'] . '</td>'.
                                ($datos['TIPO_TRANSACCION'] == 'Cheque Propio' ? '<td style="color:red" class="td">' : '<td class="td">' )
                                 . $datos['TIPO_TRANSACCION'] . '</td>
                                <td class="td">' . $datos['NUMERO_DOCUMENTO'] . '</td>
                                <td class="td">Q.' . $datos['VALOR_INGRESO'] . '</td>
                                <td class="td" style="color:red">Q.' . $datos['TOTAL_EGRESO'] . '</td>
                                <td class="td">Q.' . $total . '</td>
                            </tr>';
    }

    $tabla = $tabla . '     <tr>
                                <th class="th" colspan="6"><h4 class="font-weight-bold">' . $row['NOMBRE_PROYECTO'] . '</h4></th>
                            </tr>
                            <tr>
                                <th colspan="2" class="th">' . $row['NOMBRE_PROVEEDOR'] . '</th>
                                <th colspan="3" class="th">' . $row['NOMBRE_CODEDE'] . '</th>
                                <th colspan="1" class="th">' . $row['CUENTA_BANCO'] . '</th>
                            </tr>';

    $tabla3 = $tabla3 . '   <th  colspan="3" class="th">Total</th>
                            <th  colspan="1" class="th">Q.' . $suma . '</th>
                            <th  colspan="1" class="th" style="color:red">Q.' . $resta . '</th>
                            <th  colspan="1" class="th">Q.' . $total . '</th>
                        ';
}

$html = '<img src="img/logo2.png">
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th class="th2" colspan="6"><h4>ESTADO DE CUENTA</h4></th>
                    </tr>
                    <tr>
                    ' . $tabla . '
                    </tr>
                    <tr>
                        <th class="th">Fecha</th>
                        <th class="th">Tipo Transaccion</th>
                        <th class="th">No. Docto.</th>
                        <th class="th">Créditos</th>
                        <th class="th">Débitos</th>
                        <th class="th">Saldo Disponible</th>
                    </tr>
                </thead>
                    <tbody>
                    ' . $tabla2 . '
                    </tbody>
                    <tr class="thead-light">
                    ' . $tabla3 . '
                    </tr>
            </table>';




$mpdf = new mPDF('c', 'A4');
$css = file_get_contents('css/style.css');
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html);
$mpdf->Output('ESTADO_CUENTA.pdf', 'D');

?>
