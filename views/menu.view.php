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
    <title>Inicio</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="mt-5">
                <div class="text-center">
                    <img src="img/logo.png" alt="Escudo Municipalidad de Guatemala" class="img-responsive" />
                    <h1>Gestión de Proyectos</h1>
                    <h3>-DAFIM-</h3>
                </div>
                <div class="border-top border-bottom">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown active mx-5">
                                    <a class="nav-link dropdown-toggle font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        PROYECTOS
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="newp.php">Nuevo Proyecto</a>
                                        <a class="dropdown-item" href="lista.php">Tratar Proyecto</a>
                                    </div>
                                </li>
                                <li class="nav-item active mx-5 font-weight-bold">
                                    <a class="nav-link" href="newcod.php">CODEDES</a>
                                </li>
                                <li class="nav-item active mx-5 font-weight-bold">
                                    <a class="nav-link" href="newprov.php">EJECUTORES</a>
                                </li>
                                <li class="nav-item active mx-5 font-weight-bold">
                                    <a class="nav-link" href="cuenta.php">CUENTA CORRIENTE</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>

                <div class="container text-center mt-5 pt-5 my-5">
                    <h5>
                        ¡Bienvenido!
                    </h5>
                </div>
                <hr>
                <div class="container">
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
                            <a class="btn btn-danger" href="cerrar.php">salir</a>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="js/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="js/32f14b1fbf.js" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/32f14b1fbf.js" crossorigin="anonymous"></script> -->
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
-->
</body>

</html>