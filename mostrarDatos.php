<?php
require_once('conexionOracle.php');

$conn = new Conexion();
$llamarMetodo = $conn->Conectar();

$sql = "SELECT * FROM tb_proveedor ORDER BY id ASC";
$result = $llamarMetodo->prepare($sql);
$result->execute();

$tabla = "";

while ($datos = $result->fetch(PDO::FETCH_ASSOC)) {
    $tabla = $tabla . '<tr>
                            <td>' . $datos['ID'] . '</td>
                            <td>' . $datos['NOMBRE_PROVEEDOR'] . '</td>
                            <td>' . $datos['NIT_PROVEEDOR'] . '</td>
                            <td>' . $datos['TELEFONO_PROVEEDOR'] . '</td>
                            <td>' . $datos['USUARIO_GRABA'] . '</td>
                            <td>' . $datos['FECHA_GRABA'] . '</td>
                            <td>
                                <span class="btn btn-light text-primary" data-toggle="modal" data-target="#modalActualizar" onclick="agregaDatosParaEdicion(' . $datos['ID'] . ')">
                                <i class="far fa-edit" data-toggle="tooltip" data-placement="top" title="Editar"></i>
                                </span>
                            </td>
                        </tr>';
}

// $conexion->close();

echo '<table class="table table-stripped">
                    <thead>
                        <th>Id</th>
                        <th>Nombre Ejecutor</th>
                        <th>Nit Ejecutor</th>
                        <th>Telefono Ejecutor</th>
                        <th>Creado por</th>
                        <th>Fecha creacion</th>
                        <th>Editar</th>
                    </thead>
                    <tbody>' . $tabla . '
                    </tbody>';
