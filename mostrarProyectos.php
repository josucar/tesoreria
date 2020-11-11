<?php
require_once('conexionOracle.php');

$conn = new Conexion();
$llamarMetodo = $conn->Conectar();

$sql = "  SELECT  tb_proy.id_proyecto,
                    tb_proy.nombre_proyecto,
                    tb_proy.fecha_proyecto,
                    tb_proveedor.nombre_proveedor,
                    tb_proy.cuenta_banco 
            FROM    tb_proy INNER JOIN tb_proveedor 
            ON      tb_proy.id_proveedor=tb_proveedor.id 
            ORDER BY tb_proy.id_proyecto DESC";

$result = $llamarMetodo->prepare($sql);
$result->execute();

$tabla = "";

while ($datos = $result->fetch(PDO::FETCH_ASSOC)) {
    $tabla = $tabla . ' <tr>
                            <th>' . $datos['ID_PROYECTO'] . '</td>
                            <td>' . $datos['NOMBRE_PROYECTO'] . '</td>
                            <td>' . $datos['FECHA_PROYECTO'] . '</td>
                            <td>' . $datos['NOMBRE_PROVEEDOR'] . '</td>
                            <td>' . $datos['CUENTA_BANCO'] . '</td>
                            <td>
                                <a class="btn btn-light text-primary" data-toggle="modal" data-target="#modalActualizarProyecto" onclick="agregaDatosParaEdicionProyecto(' . $datos['ID_PROYECTO'] . ')">
                                <i class="far fa-edit" data-toggle="tooltip" data-placement="top" title="Editar"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-light text-primary" data-toggle="modal" data-target="#modalIngreso" onclick="agregaDatoParaEdicionIngreso('.$datos['ID_PROYECTO'].')">
                                <i class="fas fa-sign-in-alt" data-toggle="tooltip" data-placement="top" title="Ingresos"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-light text-primary" data-toggle="modal" data-target="#modalEgreso" onclick="agregaDatoParaEdicionEgreso('.$datos['ID_PROYECTO'].')">
                                <i class="fas fa-sign-out-alt" data-toggle="tooltip" data-placement="top" title="Egresos"></i>
                                </a>
                            </td>
                        </tr>';
}

// $conexion->close();

echo '<table class="table table-stripped text-center">
                    <thead >
                    <tr class="table-success">
                        <th>Id del Proyecto</th>
                        <th>Nombre del Proyecto</th>
                        <th>Fecha del Proyecto</th>
                        <th>Nombre del Proveedor</th>
                        <th>Cuenta Bancaria</th>
                        <th>Editar Proyecto</th>
                        <th>Ingresos Proyecto</th>
                        <th>Egresos Proyecto</th>
                    </tr>
                    </thead>
                    <tbody>' . $tabla . '
                    </tbody>';
