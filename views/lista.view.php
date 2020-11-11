<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
    <link rel="icon" href="img/favicon.png">
    <style type="text/css">
        .container {
            margin-top: 3em;
        }
    </style>
    <title>Proyectos</title>
</head>

<body>
    <div class="container">
        <div class="text-center">
            <img src="img/logo.png" alt="Escudo Municipalidad de Guatemala" class="img-responsive" />
            <h1>Lista de Proyectos</h1>
            <h4><strong>-DAFIM-</strong></h4>
            <hr>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card bg-light mb-3">
                    <div class="card-header">
                        <li class="fas fa-pencil-alt"></li> <strong>Administrador de Proyectos</strong>
                        <a class="btn btn-success rounded float-right" href="menu.php">
                            <i class="fas fa-arrow-circle-left"></i> Volver
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <section class="text-right">
                                </section>
                                <div id="tablaProyectos"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <span class="text-uppercase">
                            <?php
                            echo $_SESSION['usuario'];
                            ?>
                        </span>
                        <span class="rounded float-right">
                            <p>Powered by I<sup>2</sup>+Desarrollo, Municipalidad de Guatemala</p>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal actualizacion -->
    <!-- Modal -->
    <div class="modal fade" id="modalActualizarProyecto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Proyecto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmAgregarProyectou">
                        <input type="text" id="id_proyectou" name="id_proyectou" hidden="">
                        <label>Nombre del proyecto</label>
                        <input type="text" style="text-transform:uppercase;" id="nombre_proyectou" name="nombre_proyectou" class="form-control form-control-sm">
                        <label>Proveedor</label>
                        <select class="form-control" id="proveedores" name="proveedores"></select>
                        <label>Codede</label>
                        <select class="form-control" id="codedes" name="codedes"></select>
                        <label>Fecha del rpyecto</label>
                        <input type="date" id="fecha_proyectou" name="fecha_proyectou" class="form-control form-control-sm">
                        <label>Numero de cuenta</label>
                        <input type="number" id="cuenta_bancou" name="cuenta_bancou" class="form-control form-control-sm">
                        <label>Aporte Codede</label>
                        <input type="text" id="aporte_codedeu" name="aporte_codedeu" value="0" class="form-control form-control-sm">
                        <label>Aporte Muni</label>
                        <input type="text" id="aporte_muniu" name="aporte_muniu" value="0" class="form-control form-control-sm">
                        <label>Total Costo Proyecto</label>
                        <input type="text" id="total_costo_proyectou" name="total_costo_proyectou" value="0" class="form-control">
                        <label>Comentario</label>
                        <input type="text" style="text-transform:uppercase;" id="comentariou" name="comentariou" class="form-control form-control-sm">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="actualizarDatosProyecto()">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal actualizacion -->
    <!-- modal ingreso -->
    <!-- Modal -->
    <div class="modal fade" id="modalIngreso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingresos Financieros del Proyecto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmIngreso">
                        <input type="text" id="id_proyecto" name="id_proyecto" hidden="">
                        <!-- <label>Tipo movimiento</label> -->
                        <input type="text" id="tipo_movimiento" name="tipo_movimiento" value="INGRESOS" hidden="">
                        <label>Tipo de transaccion</label>
                        <select class="form-control" id="tipo_transaccion" name="tipo_transaccion">
                            <option value="Recibo Tesoreria">Recibo Tesoreria</option>
                            <option value="Traslado contra partida">Traslado contra partida</option>
                        </select>
                        <label>Numero de documento</label>
                        <input type="number" id="numero_documento" name="numero_documento" class="form-control form-control-sm">
                        <label>Fecha de documento</label>
                        <input type="date" id="fecha_documento" name="fecha_documento" class="form-control form-control-sm">
                        <!-- <label>Tipo de Aporte</label> -->
                        <select class="form-control" id="tipo_aporte" name="tipo_aporte" hidden="">
                            <option value="Aporte Muni">Aporte Muni</option>
                            <option value="Aporte Codede">Aporte Codede</option>
                        </select>
                        <label>Valor del Ingreso</label>
                        <input type="text" id="valor_ingreso" name="valor_ingreso" class="form-control form-control-sm">
                        <label>Comentario</label>
                        <input type="text" id="comentario" name="comentario" class="form-control form-control-sm">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal" onclick="agregarDatosIngreso()">Grabar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal ingreso -->
    <!-- modal egreso -->
    <!-- Modal -->
    <div class="modal fade" id="modalEgreso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Egresos Financieros del Proyecto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmEgreso">
                        <input type="text" id="id_proyectoe" name="id_proyectoe" hidden="">
                        <label>Tipo movimiento</label>
                        <input type="text" id="tipo_movimientoe" name="tipo_movimientoe" value="Egresos" hidden="">
                        <label>tipo_transaccion</label>
                        <select class="form-control" id="tipo_transaccione" name="tipo_transaccione">
                            <option value="Cheque Propio">Cheque propio</option>
                        </select>
                        <label>Numero de documento</label>
                        <input type="number" id="numero_documentoe" name="numero_documentoe" class="form-control form-control-sm">
                        <label>Fecha de documento</label>
                        <input type="date" id="fecha_documentoe" name="fecha_documentoe" class="form-control form-control-sm">
                        <label>Valor del egreso</label>
                        <input type="text" id="valor_egreso" name="valor_egreso" class="form-control form-control-sm">
                        <label>ISR del valor del egreso</label>
                        <input type="text" id="isr_egreso" name="isr_egreso" class="form-control form-control-sm" value="0" readonly>
                        <label>Total del egreso</label>
                        <input type="text" id="total_egreso" name="total_egreso" class="form-control form-control-sm" value="0" readonly>
                        <label>Comentario</label>
                        <input type="text" id="comentarioe" name="comentarioe" class="form-control form-control-sm">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal" onclick="agregarDatosEgreso()">Grabar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal egreso -->
    <script src="js/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="js/32f14b1fbf.js" crossorigin="anonymous"></script>
    <script src="https://bossanova.uk/jsuites/v3/jsuites.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://kit.fontawesome.com/32f14b1fbf.js" crossorigin="anonymous"></script> -->
    <script src="js/funciones.js"></script>
    <script>
        $(document).ready(function() {
            mostrarProyectos();
            listProveedores();
            listCodedes();

            $('#aporte_codedeu').blur(function() {
                var aporteMuni = $("#aporte_muniu").val();
                var aporteCodede = $("#aporte_codedeu").val();
                var total = $("#total_costo_proyectou").val();
                aporteCodede = aporteCodede.replace(',', '');
                aporteMuni = aporteMuni.replace(',', '');
                total = total.replace(',', '');

                total = Number(aporteCodede) + Number(aporteMuni);
                console.log(total);
                $("#total_costo_proyectou").val(total);
            });

            $('#aporte_muniu').blur(function() {
                var aporteMuni = $("#aporte_muniu").val();
                var aporteCodede = $("#aporte_codedeu").val();
                var total = $("#total_costo_proyectou").val();
                aporteCodede = aporteCodede.replace(',', '');
                aporteMuni = aporteMuni.replace(',', '');
                total = total.replace(',', '');

                total = Number(aporteMuni) + Number(aporteCodede);
                console.log(total);
                $("#total_costo_proyectou").val(total);
            });

            $('#valor_ingreso').blur(function() {
                var ingreso = $("#valor_ingreso").val();
                ingreso = ingreso.replace(',', '');
            });

            $('#valor_egreso').blur(function() {
                var egreso = $("#valor_egreso").val();
                var isr = 0.05;
                var total_isr = $("#isr_egreso").val();
                var totale = $("#total_egreso").val();
                egreso = egreso.replace(',', '');
                total_isr = total_isr.replace(',', '');
                totale = totale.replace(',', '');

                total_isr = Number(egreso) * Number(isr);
                $("#isr_egreso").val(total_isr);

                totale = Number(egreso) + Number(total_isr);
                $("#total_egreso").val(totale);

            });

            var currencyMask = IMask(
                document.getElementById('aporte_muniu'), {
                    mask: 'num',
                    blocks: {
                        num: {
                            mask: Number,
                            thousandsSeparator: ',',
                            radix: '.'
                        }
                    }
                });

            var currencyMask = IMask(
                document.getElementById('aporte_codedeu'), {
                    mask: 'num',
                    blocks: {
                        num: {
                            mask: Number,
                            thousandsSeparator: ',',
                            radix: '.'
                        }
                    }
                });

            var currencyMask = IMask(
                document.getElementById('total_costo_proyectou'), {
                    mask: 'num',
                    blocks: {
                        num: {
                            mask: Number,
                            thousandsSeparator: ',',
                            radix: '.'
                        }
                    }
                });

            var currencyMask = IMask(
                document.getElementById('valor_ingreso'), {
                    mask: 'num',
                    blocks: {
                        num: {
                            mask: Number,
                            thousandsSeparator: ',',
                            radix: '.'
                        }
                    }
                });

            var currencyMask = IMask(
                document.getElementById('valor_egreso'), {
                    mask: 'num',
                    blocks: {
                        num: {
                            mask: Number,
                            thousandsSeparator: ',',
                            radix: '.'
                        }
                    }
                });

            var currencyMask = IMask(
                document.getElementById('isr_egreso'), {
                    mask: 'num',
                    blocks: {
                        num: {
                            mask: Number,
                            thousandsSeparator: ',',
                            radix: '.'
                        }
                    }
                });

            var currencyMask = IMask(
                document.getElementById('total_egreso'), {
                    mask: 'num',
                    blocks: {
                        num: {
                            mask: Number,
                            thousandsSeparator: ',',
                            radix: '.'
                        }
                    }
                });

            $('#tipo_transaccion').blur(function() {
                console.log($(this).val());
                if ($(this).val() === "Recibo Tesoreria") {
                    ($("#tipo_aporte").val("Aporte Muni"));
                } else {
                    ($("#tipo_aporte").val("Aporte Codede"));
                }
            });


        });
    </script>
</body>

</html>