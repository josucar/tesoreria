<?php

session_start();
require_once('conexionOracle.php');

$conn = new Conexion();
$llamarMetodo = $conn->Conectar();

$sql = "  SELECT    id_proyecto,
                    nombre_proyecto,
                    aporte_muni,
                    aporte_codede,
                    total_costo_proyecto,
                    aportado_muni,
                    aportado_codede,
                    abono_ejecucion_proyecto,
                    isr_abono_proyecto,
                    saldo_cuenta_banco
            FROM    tb_cuenta_corriente ORDER BY id_proyecto ASC";

$result = $llamarMetodo->prepare($sql);
$result->execute();

$tabla = "";

    while ($datos = $result->fetch(PDO::FETCH_ASSOC)) {
    $tabla = $tabla . ' <tr>
                            <th class="align-middle">' . $datos['ID_PROYECTO'] . '</td>
                            <td class="align-middle">' . $datos['NOMBRE_PROYECTO'] . '</td>
                            <td class="align-middle">Q.' . $datos['APORTE_MUNI'] . '</td>
                            <td class="align-middle">Q.' . $datos['APORTE_CODEDE'] . '</td>
                            <td class="align-middle">Q.' . $datos['TOTAL_COSTO_PROYECTO'] . '</td>
                            <td></td>
                            <td class="align-middle">Q.' . $datos['APORTADO_MUNI'] . '</td>
                            <td class="align-middle">Q.' . $datos['APORTADO_CODEDE'] . '</td>
                            <td></td>
                            <td class="align-middle" style="color:red">Q.' . $datos['ABONO_EJECUCION_PROYECTO'] . '</td>
                            <td class="align-middle" style="color:red">Q.' . $datos['ISR_ABONO_PROYECTO'] . '</td>
                            <td></td>
                            <th class="align-middle">Q.' . $datos['SALDO_CUENTA_BANCO'] . '</th>
                            <td class="align-middle">
                            <a class="btn btn-light text-primary"  href="reporte.php?id='.$datos['ID_PROYECTO'].'" onclick="mostrarCuenta(' . $datos['ID_PROYECTO'] . ')"> 
                            <i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="Ver"></i>
                            </a>
                        </td>
                        </tr>';
}

echo '<table class="table table-bordered table-sm text-center">
                    <thead class="text-center thead-light">
                    <tr>
                        <th class="align-middle">ID Proyecto</th>
                        <th class="align-middle">Nombre del Proyecto</th>
                        <th class="align-middle">Aporte Muni</th>
                        <th class="align-middle">Aporte Codede</th>
                        <th class="align-middle">Valor Total del Proyecto</th>
                        <th></th>
                        <th class="align-middle">Aportado Muni</th>
                        <th class="align-middle">Aportado Codede</th>
                        <th></th>
                        <th class="align-middle">Abono Ejecucion Proyecto</th>
                        <th class="align-middle">ISR 5% Abono Proyecto</th>
                        <th></th>
                        <th class="align-middle">Saldo Actual Cuenta Banco</th>
                        <th class="align-middle">Detalle</th>
                    </tr>
                    </thead>
                    <tbody>' . $tabla . '
                    </tbody>';
