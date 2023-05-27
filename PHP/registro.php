<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/estilos-registro.css">
    <title>Bookmania:inicio de sesion</title>
</head>
<body>
    <form action="">
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                    <!-------Image-------->
                    <img src="" alt="">
                    <div class="text">
                        <p>"La lectura abre puertas hacia mundos infinitos"<i></i></p>
                    </div>
                </div>
                <div id="parte1" class="col-md-6 right">
                     <div class="input-box">
                        <header>Ingresa tu correo</header>
                        <div class="input-field">
                            <input type="text" class="input" id="correo" required autocomplete="off">
                            <label for="correo">Correo</label>
                        </div>
                        <div class="input-field">
                            <input type="button" class="submit" id="btn-siguiente" value="Siguiente">
                        </div>
                        <div class="signin">
                            <span>¿Ya tienes una cuenta? <a href="loguin.php">inicia sesion</a></span>
                            <br>
                            <p>Paso 1 de 4</p>
                            
                        </div>
                     </div>
                </div>

                <div id="parte2" class="col-md-6 right desactivar">
                     <div class="input-box">
                        <header>Ingresa tu nombre</header>
                        <div class="input-field">
                            <input type="text" class="input" id="nombre" required autocomplete="off">
                            <label for="nombre">Nombre</label>
                        </div>
                        <div class="input-field">
                            <input type="text" class="input" id="apellido" required>
                            <label for="apellido">Apellido</label>
                        </div>
                        <div class="input-field">
                            <input type="button" id="btn-siguiente1"class="submit" value="Siguiente">
                            <input type="button" id="btn-anterior1" class="submit" value="Anterior">
                            
                        </div>
                        <div class="signin">
                            <p>Paso 2 de 4</p>
                        </div>
                     </div>
                </div>

                <div id="parte3" class="col-md-6 right desactivar">
                     <div class="input-box">
                        <header>Ingresa tu telefono</header>
                        <div class="input-field">
                            <input type="text" class="input" id="telefono" required autocomplete="off">
                            <label for="telefono">Telefono</label>
                        </div>
            
                        <div class="input-field">
                            <input type="button" id="btn-siguiente2" class="submit" value="Siguiente">
                            <input type="button" id="btn-anterior2" class="submit" value="Anterior">
                            
                        </div>
                        <div class="signin">
                            <p>Paso 3 de 4</p>
                        </div>
                     </div>
                </div>

                <div id="parte4" class="col-md-6 desactivar">
                     <div class="input-box">
                        <header>Ingresa una contraseña</header>
                        <div class="input-field">
                            <input type="text" class="input" id="password" required autocomplete="off">
                            <label for="password">Contraseña</label>
                        </div>
                        <div class="input-field">
                            <input type="text" class="input" id="veri_password" required>
                            <label for="veri_password">Confirmar contraseña</label>
                        </div>
                        <div class="input-field">
                            <input type="submit" class="submit" value="Registrar">
                            <input type="button" id="btn-anterior3" class="submit" value="Anterior">
                            
                        </div>
                        <div class="signin">
                            <p>Paso 4 de 4</p>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
    </form>


    <script src="../JS/bootstrap.min.js"></script>
    <script src="../JS/paginacion.js"></script>   
</body>
</html>