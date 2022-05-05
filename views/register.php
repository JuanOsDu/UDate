<?php
define('VIEWS_PATH', '../views/');
define('CONTROLLER_PATH', '../Controller/');
include(VIEWS_PATH . 'header.php')
?>

<body class="body-register">



    <div class="container-fluid">
        <div class="row" style="margin-top: 5%;">
            <div class="col-md-6">
                <a href="../index.php">
                    <h1 id="titulo-register">UDate</h1>
                </a>
            </div>
            <div class="col-md-6">
                <form role="form" method="POST" action="<?php echo CONTROLLER_PATH; ?>register.php">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo</label>
                        <input id="correo" name="correo" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa tu email">
                        <small id="emailHelp" class="form-text text-muted">
                            <p style="color: white">No lo compartiremos con nadie mas.</p>
                        </small>
                        <label>Nombres</label>
                        <input type="text" id="nombres" name="nombres" class="form-control" aria-describedby="emailHelp" placeholder="Ingresa tus nombres y apellidos">
                        <label>Edad</label>
                        <input type="number" id="edad" name="edad" class="form-control" aria-describedby="emailHelp" placeholder="Ingresa tu edad">
                        <label>Descripcion</label>
                        <input style="height: 200px" id="descripcion" name="descripcion" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Ingresa una descripcion de ti.">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña</label>
                        <input type="hidden" name="registrarUsuario">
                        <input type="password" id="contraseña" name="contraseña" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
                    </div>

                    <button type="submit" class="btn btn-primary">Registrarse</button>
                </form>

            </div>
        </div>
    </div>


</body>



<?php
include(VIEWS_PATH . 'footer.php');


?>