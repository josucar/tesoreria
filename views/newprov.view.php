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
    <title>Ejecutores</title>
</head>

<body>
    <div class="container">
        <div class="text-center">
            <img src="img/logo.png" alt="Escudo Municipalidad de Guatemala" class="img-responsive" />
            <h1>Lista de Ejecutores</h1>
            <h4><strong>-DAFIM-</strong></h4>
            <hr>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card bg-light mb-3">
                    <div class="card-header">
                        <li class="fas fa-pencil-alt"></li> <strong>Administrador de Ejecutores</strong>
                        <a class="btn btn-success rounded float-right" href="menu.php">
                            <i class="fas fa-arrow-circle-left"></i> Volver
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <section class="text-right">
                                    <span class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#modalInsertar">
                                        <i class="fas fa-plus-circle"></i> Agregar nuevo
                                    </span>
                                </section>
                                <div id="tablaDatos"></div>
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
    <!-- modal de insercion -->
    <!-- Modal -->
    <div class="modal fade" id="modalInsertar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear un Ejecutor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmAgregarDatos">
                        <label>Nombre del ejecutor</label>
                        <input type="text" style="text-transform:uppercase;" id="nombre_proveedor" name="nombre_proveedor" class="form-control form-control-sm">
                        <label>Número de Nit</label>
                        <input type="text" id="nit_proveedor" name="nit_proveedor" class="form-control form-control-sm">
                        <label>Número de telefono</label>
                        <input type="number" id="telefono_proveedor" name="telefono_proveedor" class="form-control form-control-sm">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarDatos" onclick="agregarDatos()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal de insercion -->
    <!-- modal actualizacion -->
    <!-- Modal -->
    <div class="modal fade" id="modalActualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Ejecutor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmAgregarDatosu">
                        <input type="text" id="idu" name="idu" hidden="">
                        <label>Nombre del ejecutor</label>
                        <input type="text" style="text-transform:uppercase;" id="nombre_proveedoru" name="nombre_proveedoru" class="form-control form-control-sm">
                        <label>Número de Nit</label>
                        <input type="text" id="nit_proveedoru" name="nit_proveedoru" class="form-control form-control-sm">
                        <label>Número de telefono</label>
                        <input type="number" id="telefono_proveedoru" name="telefono_proveedoru" class="form-control form-control-sm">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="actualizarDatos()">Actualizar</button>
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
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    <!-- <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <!-- <script src="https://kit.fontawesome.com/32f14b1fbf.js" crossorigin="anonymous"></script> -->
    <script src="js/funciones.js"></script>
    <script>
        $(document).ready(function() {
            mostrarDatos();
        });
    </script>


    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>