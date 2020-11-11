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
    <title>Cuneta Corriente</title>
</head>

<body>
    <div class="container">
        <div class="text-center">
            <img src="img/logo.png" alt="Escudo Municipalidad de Guatemala" class="img-responsive" />
            <h1>Cuenta Corriente de Proyectos</h1>
            <h4><strong>-DAFIM-</strong></h4>
            <hr>
            <h3>Tabla de Cuenta Corriente</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card bg-light mb-3">
                    <div class="card-header">
                        <li class="fas fa-pencil-alt"></li> <strong>Reporte Cuenta Corriente</strong>
                        <a class="btn btn-success rounded float-right" href="cuenta.php">
                            <i class="fas fa-arrow-circle-left"></i> Volver
                        </a>
                        <a class="btn btn-primary rounded float-right mx-3" onclick="descargarReporte()">
                            <i class="fas fa-file-download"></i> Descargar
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <section class="text-right">
                                </section>
                                <div id="reporteCuenta"></div>
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

    <script src="js/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="js/32f14b1fbf.js" crossorigin="anonymous"></script>
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
            mostrarCuenta();
        });
    </script>
</body>

</html>