// Inicia gestion de Proveedores
function mostrarDatos() {
    $.ajax({
        url: "mostrarDatos.php",
        success: function (r) {
            $('#tablaDatos').html(r);
        }
    });
}

function agregaDatosParaEdicion(id_proveedor) {
    $.ajax({
        type: "POST",
        data: "id_proveedor=" + id_proveedor,
        url: "datosUpdate.php",
        success: function (r) {
            var result = jQuery.parseJSON(r);
            if (result.length > 0) {
                datos = result[0];
                // console.log(datos);
                $('#idu').val(datos['ID']);
                $('#nombre_proveedoru').val(datos['NOMBRE_PROVEEDOR']);
                $('#nit_proveedoru').val(datos['NIT_PROVEEDOR']);
                $('#telefono_proveedoru').val(datos['TELEFONO_PROVEEDOR']);
            } else {
                // console.log(result);
                swal("", "Fallo al cargar proveedor", "error");
            }

        }
    });

}

function agregarDatos() {
    if ($('#nombre_proveedor').val() == "") {
        swal("", "Ingrese el nombre del proveedor", "info");
        return false;
    } else if ($('#nit_proveedor').val() == "") {
        swal("", "Ingrese el número de NIT del proveedor", "info");
        return false;
    } else if ($('#telefono_proveedor').val() == "") {
        swal("", "Ingrese el número de telefono del proveedor", "info");
        return false;
    }

    $.ajax({
        type: "POST",
        data: $('#frmAgregarDatos').serialize(),
        url: "agregarDatos.php",
        success: function (r) {
            console.log(r);
            if (r == 1) {
                $('#frmAgregarDatos')[0].reset();
                mostrarDatos();
                swal("", "Agregado con exito", "success");
            } else {
                swal("", "Fallo al agregar", "error");
            }
        }
    });
}

function actualizarDatos() {
    if ($('#nombre_proveedoru').val() == "") {
        swal("", "Ingrese el nombre del proveedor", "info");
        return false;
    } else if ($('#nit_proveedoru').val() == "") {
        swal("", "Ingrese el número de NIT del proveedor", "info");
        return false;
    } else if ($('#telefono_proveedoru').val() == "") {
        swal("", "Ingrese el número de telefono del proveedor", "info");
        return false;
    }

    $.ajax({
        type: "POST",
        data: $('#frmAgregarDatosu').serialize(),
        url: "actualizarDatos.php",
        success: function (r) {
            if (r == 1) {
                console.log(r);
                mostrarDatos();
                swal("", "Actualizado con exito", "success");
            } else {
                console.log(r);
                swal("", "Fallo al actualizar", "error");
            }
        }
    });
}
// Fin gestion de Proveedores
// Inicia gestion de Codedes
function mostrarDatosCodede() {
    $.ajax({
        url: "mostrarDatosCodede.php",
        success: function (r) {
            $('#tablaDatosCodede').html(r);
        }
    });
}

function agregaDatosParaEdicionCodede(id_codede) {
    $.ajax({
        type: "POST",
        data: "id_codede=" + id_codede,
        url: "datosUpdateCodede.php",
        success: function (r) {
            // datos=jQuery.parseJSON(r);
            var result = jQuery.parseJSON(r);
            if (result.length > 0) {
                datos = result[0];
                $('#id_codedeu').val(datos['ID_CODEDE']);
                $('#nombre_codedeu').val(datos['NOMBRE_CODEDE']);
                $('#telefono_codedeu').val(datos['TELEFONO_CODEDE']);
            } else {
                swal("", "Fallo al cargar Codede", "error");
            }

        }
    });

}

function agregarDatosCodede() {
    if ($('#nombre_codede').val() == "") {
        swal("", "Ingrese el nombre del Codede", "info");
        return false;
    } else if ($('#telefono_codede').val() == "") {
        swal("", "Ingrese el número de telefono del Codede", "info");
        return false;
    }
    $.ajax({
        type: "POST",
        data: $('#frmAgregarDatosCodede').serialize(),
        url: "agregarDatosCodede.php",
        success: function (r) {
            if (r == 1) {
                $('#frmAgregarDatosCodede')[0].reset();
                mostrarDatosCodede();
                swal("", "Agregado con exito", "success");
            } else {
                swal("", "Fallo al agregar", "error");
            }
        }
    });
}

function actualizarDatosCodede() {
    if ($('#nombre_codedeu').val() == "") {
        swal("", "Ingrese el nombre del Codede", "info");
        return false;
    } else if ($('#telefono_codedeu').val() == "") {
        swal("", "Ingrese el número de telefono del Codede", "info");
        return false;
    }

    $.ajax({
        type: "POST",
        data: $('#frmAgregarDatosCodedeu').serialize(),
        url: "actualizarDatosCodede.php",
        success: function (r) {
            if (r == 1) {
                mostrarDatosCodede();
                swal("", "Actualizado con exito", "success");
            } else {
                swal("", "Fallo al actualizar", "error");
            }
        }
    });
}
// Fin gestion de Codedes
// Inicio gestion de Proyectos
function mostrarProyectos() {
    $.ajax({
        url: "mostrarProyectos.php",
        success: function (r) {
            $('#tablaProyectos').html(r);
        }
    });
}

function agregaDatosParaEdicionProyecto(id_proyecto) {
    $.ajax({
        type: "POST",
        data: "id_proyecto=" + id_proyecto,
        url: "datosUpdateProyecto.php",
        success: function (r) {
            // datos = jQuery.parseJSON(r);
            var result = jQuery.parseJSON(r);
            if (result.length > 0) {
                datos = result[0];
                $('#id_proyectou').val(datos['ID_PROYECTO']);
                $('#nombre_proyectou').val(datos['NOMBRE_PROYECTO']);
                $('#proveedores').val(datos['ID_PROVEEDOR']);
                $('#codedes').val(datos['ID_CODEDE']);
                $('#fecha_proyectou').val(datos['FECHA_PROYECTO']);
                $('#cuenta_bancou').val(datos['CUENTA_BANCO']);
                $('#aporte_codedeu').val(datos['APORTE_CODEDE']);
                $('#aporte_muniu').val(datos['APORTE_MUNI']);
                $('#total_costo_proyectou').val(datos['TOTAL_COSTO_PROYECTO']);
                $('#comentariou').val(datos['COMENTARIO']);
            }

        }
    });

}

function agregaDatoParaEdicionIngreso(id_proyecto) {
    $.ajax({
        type: "POST",
        data: "id_proyecto=" + id_proyecto,
        url: "datoUpdateIngreso.php",
        success: function (r) {
            // datos = jQuery.parseJSON(r);
            var result = jQuery.parseJSON(r);
            if (result.length > 0) {
                datos = result[0];
                $('#id_proyecto').val(datos['ID_PROYECTO']);
            }
        }
    });

}

function agregaDatoParaEdicionEgreso(id_proyecto) {
    $.ajax({
        type: "POST",
        data: "id_proyecto=" + id_proyecto,
        url: "datoUpdateEgreso.php",
        success: function (r) {
            console.log(id_proyecto);
            var result = jQuery.parseJSON(r);
            if (result.length > 0) {
                datos = result[0];
                $('#id_proyectoe').val(datos['ID_PROYECTO']);
            }
        }
    });

}

function agregarProyecto() {
    if ($('#nombre_proyecto').val() == "") {
        swal("", "Ingrese el nombre del proyecto", "info");
        return false;
    } else if ($('#fecha_proyecto').val() == "") {
        swal("", "Seleccione una fecha", "info");
        return false;
    } else if ($('#cuenta_banco').val() == "") {
        swal("", "Ingrese el número de cuenta", "info");
        return false;
    } else if ($('#aporte_codede').val() == "") {
        swal("", "Ingrese la cantidad del aporte del Codede", "info");
        return false;
    } else if ($('#aporte_muni').val() == "") {
        swal("", "Ingrese la cantidad del aporte Muni", "info");
        return false;
    } else if ($('#comentario').val() == "") {
        swal("", "Ingrese un comentario", "info");
        return false;
    }
    $.ajax({
        type: "POST",
        data: $('#frmAgregarProyecto').serialize(),
        url: "agregarProyecto.php",
        // dataType: 'json',
        success: function (r) {
            console.log(r);
            if (r == 1) {
            // if (r.code) {
                $('#frmAgregarProyecto')[0].reset();
                swal("", "Agregado con exito", "success");
            } else {
                swal("", "Fallo al agregar", "error");
            }
        },
    });
}

function agregarDatosIngreso() {
    if ($('#numero_documento').val() == "") {
        swal("", "Ingrese número de documento", "info");
        return false;
    } else if ($('#fecha_documento').val() == "") {
        swal("", "Seleccione la fecha del documento", "info");
        return false;
    } else if ($('#valor_ingreso').val() == "") {
        swal("", "Ingrese el valor total del documento", "info");
        return false;
    } else if ($('#comentario').val() == "") {
        swal("", "Ingrese un comentario", "info");
        return false;
    }

    $.ajax({
        type: "POST",
        data: $('#frmIngreso').serialize(),
        url: "agregarDatosIngreso.php",
        success: function (r) {
            console.log(r);
            if (r == 1) {
                $('#frmIngreso')[0].reset();
                swal("", "Agregado con exito", "success");
            } else {
                swal("", "Fallo al agregar", "error");
            }
        }
    });

}

function agregarDatosEgreso() {
    if ($('#numero_documentoe').val() == "") {
        swal("", "Ingrese el número del documento", "info");
        return false;
    } else if ($('#fecha_documentoe').val() == "") {
        swal("", "Seleccione la fecha del documento", "info");
        return false;
    } else if ($('#valor_egreso').val() == "") {
        swal("", "Ingrese el valor del egreso", "info");
        return false;
    } else if ($('#comentarioe').val() == "") {
        swal("", "Ingrese un comentario", "info");
        return false;
    }

    $.ajax({
        type: "POST",
        data: $('#frmEgreso').serialize(),
        url: "agregarDatosegreso.php",
        success: function (r) {
            console.log(r);
            if (r == 1) {
                $('#frmEgreso')[0].reset();
                swal("", "Agregado con exito", "success");
            } else {
                swal("", "Fallo al agregar", "error");
            }
        }
    });

}

function actualizarDatosProyecto() {
    if ($('#nombre_proyectou').val() == "") {
        swal("", "Debe agregar un nombre", "info");
        return false;
    } else if ($('#fecha_proyectou').val() == "") {
        swal("", "Seleccione una fecha", "info");
        return false;
    } else if ($('#cuenta_bancou').val() == "") {
        swal("", "Ingrese un número de cuenta", "info");
        return false;
    } else if ($('#aporte_codedeu').val() == "") {
        swal("", "Ingrese el aporte del Codede", "info");
        return false;
    } else if ($('#aporte_muniu').val() == "") {
        swal("", "Ingrese el aporte Muni", "info");
        return false;
    } else if ($('#comentariou').val() == "") {
        swal("", "Ingrese un comentario", "info");
        return false;
    }

    $.ajax({
        type: "POST",
        data: $('#frmAgregarProyectou').serialize(),
        url: "actualizarDatosProyecto.php",
        success: function (r) {
            console.log(r);
            if (r == 1) {
                mostrarProyectos();
                swal("", "Actualizado con exito", "success");
            } else {
                swal("", "Fallo al actualizar", "error");
            }
        }
    });
}

function listProveedores() {

    $.ajax({
        type: "GET",
        url: "listaProveedor.php",
        dataType: 'json',
        success: function (r) {
            // console.log(r);
            var proveedor = $('#proveedores');
            proveedor.empty();
            $.each(r, function (key, value) {
                proveedor.append($("<option></option>")
                    .attr("value", value.ID).text(value.NOMBRE_PROVEEDOR));
            });
        },
    });
}
function listCodedes() {

    $.ajax({
        type: "GET",
        url: "listaCodede.php",
        dataType: 'json',
        success: function (r) {

            var codede = $('#codedes');
            codede.empty();
            $.each(r, function (key, value) {
                codede.append($("<option></option>")
                    .attr("value", value.ID_CODEDE).text(value.NOMBRE_CODEDE));
            });
        },
    });
}
// Fin gestion de Proyectos
// inicia gestion de cuenta corriente
function mostrarCuentaCorriente() {
    $.ajax({
        url: "mostrarCuentaCorriente.php",
        success: function (r) {
            $('#tablaCuenta').html(r);
        }
    });
}

function mostrarCuenta(id_proyecto) {
    let url = window.location.search;
    let searchParams = new URLSearchParams(url);
    let param = searchParams.get('id');
    console.log(searchParams.get('id'))
    $.ajax({
        type: "POST",
        data: "id_proyecto=" + param,
        url: "mostrarCuenta.php",
        success: function (r) {
            console.log(r);
            // var result = jQuery.parseJSON(r);
            $('#reporteCuenta').html(r);
            // if (result.length > 0){
            //     datos = result[0];
            // }
        }
    });
}

function descargarReporte() {
    let url = window.location.search;
    let searchParams = new URLSearchParams(url);
    let param = searchParams.get('id');

    window.open("prueba.php?id_proyecto="+param);

}

// function numberToString(number) {
//     return number
//     .toLocaleString("es-US", {
//         style: "currency",
//         currency: "GTQ", 
//     })
//     .replace("GTQ", "Q");
// }