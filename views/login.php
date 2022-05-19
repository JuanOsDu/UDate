<?php
define('VIEWS_PATH', '../views/');
define('CONTROLLER_PATH', '../Controller/');
define('JS_PATH', "../js/");
include(VIEWS_PATH . 'header.php')
?>

<body class="body-login">
    <div class="container-fluid">
        <div class="row" style="margin-top: 10%;">
            <div class="col-md-4">
            </div>
            <div class="col-md-4" style="background-color: rgb(202, 103, 248); border-radius: 5%;">

                <h3 class="text-center text-primary" style="color: purple !important">

                    Inicio sesión
                </h3>
                <?php
                if (isset($_GET["status"])) {
                    if ($_GET["status"] == 1) {
                ?>
                        <div class="alert alert-warning alert-dismissible fade show" style="background-color:white !important; color:blue !important;" role="alert">
                            <strong>Gracias por registrarte. </strong> Continua iniciando sesion
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <form role="form" action="<?php echo CONTROLLER_PATH; ?>valida_login.php" method="POST">
                    <div class="form-group">

                        <label for="exampleInputEmail1">

                        </label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Usuario" id="correo" name="correo" />
                    </div>
                    <div class="form-group">

                        <label for="exampleInputPassword1">

                        </label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña" id="contraseña" name="contraseña" />
                    </div>
                    <div class="form-group">


                    </div>
                    <div class="checkbox" style="text-align: center; position: relative;">

                        <label>
                            <input type="checkbox" /> Aceptar terminos <a href="#">Terminos y condiciones</a>
                        </label>
                    </div>
                    <button style="" type="submit" class="btn btn-primary">
                        Entrar
                    </button>
                </form>
                <div>
                    <p style="text-align: center;">No tienes cuenta? <a href="./register.php">Registrate!</a></p>

                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
<?php

include(VIEWS_PATH . 'footer.php')
?>