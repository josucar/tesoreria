<?php
require_once('conexionOracle.php');

$conn = new Conexion();
$llamarMetodo = $conn->Conectar();

$sql = "SELECT * FROM tb_codede ORDER BY id_codede ASC";
$result = $llamarMetodo->prepare($sql);
$result->execute();

$tablacodede = "";

while ($datos = $result->fetch(PDO::FETCH_ASSOC)) {
    $tablacodede = $tablacodede . '<tr>
                            <th>' . $datos['ID_CODEDE'] . '</td>
                            <td>' . $datos['NOMBRE_CODEDE'] . '</td>
                            <td>' . $datos['TELEFONO_CODEDE'] . '</td>
                            <td>' . $datos['USUARIO_GRABA'] . '</td>
                            <td>' . $datos['FECHA_GRABA'] . '</td>
                            <td>
                                <span class="btn btn-light text-primary" data-toggle="modal" data-target="#modalActualizarCodede" onclick="agregaDatosParaEdicionCodede(' . $datos['ID_CODEDE'] . ')">
                                <i class="far fa-edit" data-toggle="tooltip" data-placement="top" title="Editar"></i>
                                </span>
                            </td>
                        </tr>';
}

// $conexion->close();

echo '<table class="table table-stripped">
                    <thead>
                        <th>Id</th>
                        <th>Nombre Codede</th>
                        <th>Telefono Codede</th>
                        <th>Creado por</th>
                        <th>Fecha creacion</th>
                        <th>Editar</th>
                    </thead>
                    <tbody>' . $tablacodede . '
                    </tbody>';
