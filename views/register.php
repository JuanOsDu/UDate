<?php
define('VIEWS_PATH', '../views/');
define('CONTROLLER_PATH', '../controller/');
include(VIEWS_PATH . 'header.php');
?>

<body class="body-register">



    <div class="container-fluid">
        <div class="row" style="margin-top: 5%;">
            <div class="col-md-6">
                <a href="../index.php">
                    <h1 id="titulo-register">UDate</h1>
                </a>
                <img alt="chica meditando" src="../media/girl.png" style="width: 500px; height:auto;">
            </div>
            <div class="col-md-6">
                <form role="form" action="<?php echo CONTROLLER_PATH; ?>register.php" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo</label>
                        <input id="correo" name="correo" type="email" class="form-control trans" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa tu email">
                        <small id="emailHelp" class="form-text text-muted">
                            <p style="color: white">No lo compartiremos con nadie mas.</p>
                        </small>
                        <label>Nombres</label>
                        <input type="text" id="nombres" name="nombres" class="form-control trans" aria-describedby="emailHelp" placeholder="Ingresa tus nombres y apellidos">
                        <label>Edad</label>
                        <input type="number" id="edad" name="edad" class="form-control trans" aria-describedby="emailHelp" placeholder="Ingresa tu edad">
                        <label>Descripcion</label>
                        <input style="height: 200px" id="descripcion" name="descripcion" type="text" class="form-control trans" aria-describedby="emailHelp" placeholder="Ingresa una descripcion de ti.">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña</label>
                        <input type="hidden" name="reg">
                        <input type="password" id="contraseña" name="contraseña" class="form-control trans" id="exampleInputPassword1" placeholder="Contraseña">
                    </div>

                    <button type="submit" class="btn btn-primary" style="margin-top: 30px;">Registrarse</button>
                </form>

            </div>
        </div>
    </div>


</body>



<?php
include(VIEWS_PATH . 'footer.php');


?>