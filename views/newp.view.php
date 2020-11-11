<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://bossanova.uk/jsuites/v3/jsuites.css" type="text/css" />
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
            <h1>Formulario para registrar un nuevo proyecto</h1>
            <h4><strong>-DAFIM-</strong></h4>
            <hr>
        </div>
        <!-- inicia formulario -->
        <form id="frmAgregarProyecto">
            <h5>Información general del proyecto</h5>
            <br>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-3">
                        <label>Nombre completo del proyecto</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" style="text-transform:uppercase;" class="form-control" id="nombre_proyecto" name="nombre_proyecto" placeholder="nombre del proyecto">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-3">
                        <label>Proveedor</label>
                    </div>
                    <div class="col-sm-4">
                        <select class="form-control" id="proveedores" name="proveedores">
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-3">
                        <label>Codede</label>
                    </div>
                    <div class="col-sm-4">
                        <select class="form-control" id="codedes" name="codedes">
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-3">
                        <label>Fecha del proyecto</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" id="fecha_proyecto" name="fecha_proyecto">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-3">
                        <label>Número de cuenta bancaria</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="cuenta_banco" name="cuenta_banco" placeholder="NUMERO DE CUENTA BANCARIA">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-3">
                        <label>Aporte Codede</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="aporte_codede" name="aporte_codede" value="0" placeholder="aporte codede">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-3">
                        <label>Aporte Muni</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="aporte_muni" name="aporte_muni" value="0" placeholder="aporte muni">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-3">
                        <label>Valor total del proyecto</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="valor_total" name="valor_total" value="0" placeholder="valor total del proyecto" readonly>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-3">
                        <label>Comentario</label>
                    </div>
                    <div class="col-sm-4">
                        <textarea class="form-control" style="text-transform:uppercase;" id="comentario" name="comentario" rows="3"></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-4 text-center">
                        <button type="button" class="btn btn-success" onclick="agregarProyecto()">Grabar</button>
                    </div>
                </div>
                <br>
            </div>
        </form>
        <!-- termina formulario -->
        <div class="card-footer text-muted">
            <div class="row">
                <div class="col">
                    <span class="w-marca-id">Powered by I<sup>2</sup>+Desarrollo, Municipalidad de Guatemala</span>
                </div>
                <div class="col text-center">
                    <span>
                        Usuario:
                    </span>
                    <br>
                    <span class="text-uppercase">
                        <?php
                        echo $_SESSION['usuario'];
                        ?>
                    </span>
                </div>
                <div class="col text-right">
                    <a class="btn btn-primary" href="menu.php">Volver</a>
                </div>
            </div>
        </div>
    </div>
    <!-- modal actualizacion -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
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
            listProveedores();
            listCodedes();

            $('#aporte_muni').blur(function() {
                var aporteMuni = $("#aporte_muni").val();
                var aporteCodede = $("#aporte_codede").val();
                var total = $("#valor_total").val();
                aporteCodede = aporteCodede.replace(',', '');
                aporteMuni = aporteMuni.replace(',', '');
                total = total.replace(',', '');
                total = Number(aporteCodede) + Number(aporteMuni);
                $("#valor_total").val(total);
            });

            $('#aporte_codede').blur(function() {
                var aporteMuni = $("#aporte_muni").val();
                var aporteCodede = $("#aporte_codede").val();
                var total = $("#valor_total").val();
                
                aporteCodede = aporteCodede.replace(',', '');
                aporteMuni = aporteMuni.replace(',', '');
                total = total.replace(',', '');
                console.log(aporteCodede);
                total = Number(aporteMuni) + Number(aporteCodede);
                $("#valor_total").val(total);
            });

            var currencyMask = IMask(
                document.getElementById('aporte_codede'), {
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
                document.getElementById('aporte_muni'), {
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
                document.getElementById('valor_total'), {
                    mask: 'num',
                    blocks: {
                        num: {
                            mask: Number,
                            thousandsSeparator: ',',
                            radix: '.'
                        }
                    }
                });


        });
    </script>


    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>