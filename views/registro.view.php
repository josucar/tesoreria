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
    <title>Registro</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5 mt-5 pt-5 shadow-lg p-5 mb-5 bg-white rounded">
                <form class="formulario" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="text-center">
                        <img src="img/logo.png" alt="Escudo Municipalidad de Guatemala" class="img-responsive" />
                        <h1>Registro de usuarios</h1>
                    </div>
                    <hr>
                    <div class="text-center">
                        <h5>Seguimiento Financiero de Proyectos</h5>
                    </div>
                    <div class="form-group">
                        <div class="row mt-3 pt-3 justify-content-center">
                            <div class="col-1">
                                <i class="fas fa-user fa-2x" style="color:gray;"></i>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row mt-3 pt-3 justify-content-center">
                            <div class="col-1">
                                <i class="fas fa-key fa-2x" style="color:gray;"></i>
                            </div>
                            <div class="col-8">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row mt-3 pt-3 justify-content-center">
                            <div class="col-1">
                                <i class="fas fa-key fa-2x" style="color:gray;"></i>
                            </div>
                            <div class="col-8">
                                <input type="password" class="form-control" id="password2" name="password2" placeholder="Repite la contraseña">
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-3 pt-3">
                        <button type="submit" class="btn btn-success" onclick="login.submit()">Grabar</button>
                    </div>
                    <?php if (!empty($errores)) : ?>
                        <div class="error">
                            <ul>
                                <?php echo $errores; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </form>
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