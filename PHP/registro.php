<?php 

    include ('conexion.php');

    if(isset($_POST['btn-enviar'])){
		    
            $correo = mysqli_real_escape_string($con,(strip_tags($_POST["correo"],ENT_QUOTES)));//Escanpando caracteres 
            $nombre	= mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 
            $apellido = mysqli_real_escape_string($con,(strip_tags($_POST["apellido"],ENT_QUOTES)));//Escanpando caracteres 
            $telefono = mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
            $password = mysqli_real_escape_string($con,(strip_tags($_POST["password"],ENT_QUOTES)));
            $passwordDos = mysqli_real_escape_string($con,(strip_tags($_POST["passwordDos"],ENT_QUOTES)));

            /*Cracion de la variabble rol */
            $rol = 0;

            /*Variables de verificacion*/ 
            $longitudp1 = strlen($password);
            $longitudp2 = strlen($password);
            $longitudp3 = strlen($telefono);

            /*Validacion del campo telefono*/

            if($longitudp3 >10 || $longitudp3<10){?>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Telefono no valido',
                    text: 'El numero de telefono debe de ser ingresado en formato de 10 digitos'
                  });
                });
                </script>
            <?php }

            /*Validacion de los campos contraseña*/

            else if($longitudp1< 8 || $longitudp2 < 8){?>
                <script>

                document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Contraseña no valida',
                    text: 'La contraseña debe de de tener como minimo 8 caracteres'
                  })
                })
                </script>

            <?php 
            }else if($password != $passwordDos){?>
                <script>

                document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Contraseña no valida',
                    text: 'La contraseña no coincide'
                  });
                });
                </script>

            <?php 
            }else{

                echo 'Se han introducido los datos correctamente';

                /* preparo la contraseña para ser encrytada*/

                $pass_sha1=sha1($password);

                /* realizo una consulta a la base de datos para saber si existe un usurio con ese correo*/
                $miConsulta = "SELECT * FROM usuarios WHERE correo='$correo'";

                /* ejecuto la consulta */
                $cek = mysqli_query($con, $miConsulta);

                   
                if(mysqli_num_rows($cek) == 0){

                    $miConsulta = "INSERT INTO usuarios (correo,nombre,apellido,telefono,password,rol) VALUES('$correo','$nombre','$apellido','$telefono','$password','$rol')"; //crear la consulta del INSERT INTO 
                    $insert = mysqli_query($con,$miConsulta) or die(mysqli_error($con));

                    if($insert){?>
                        <script>
                        document.addEventListener("DOMContentLoaded", function() {
                        // Tu código SweetAlert aquí
                        Swal.fire({
                                title: "Usuario registrado",
                                text: "El usuario se ha guardado correctamente",
                                icon: "success",
                                confirmButtonText: "Ok"
                            }).then(function() {
                                window.location.href = "loguin.php";
                            });
                        });
                        </script>
                    <?php 
                    
                    }else{
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
                    }
             
                }else{?>
                    <script>
                    document.addEventListener("DOMContentLoaded", function() {
                    // Tu código SweetAlert aquí
                    Swal.fire({
                            title:"Usuario no registrado",
                            text: "El correo ya se encuentra asociado a una cuenta",
                            icon: "error",
                            confirmButtonText: "Ok"
                        });
                    });
                    
                    </script>
              <?php }
            }       
        }
?>
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
    <form action="registro.php" method="post" role="form">
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
                            <input type="text" name="correo" class="input" id="correo" required autocomplete="off">
                            <label for="correo">Correo</label>
                        </div>
                        <div class="input-field">
                            <input type="button" class="submit" id="btn-siguiente" value="Siguiente">
                        </div>
                        <div class="signin">
                            <span>¿Ya tienes una cuenta? <a href="#">inicia sesion</a></span>
                            <br>
                            <p>Paso 1 de 4</p>
                            
                        </div>
                     </div>
                </div>

                <div id="parte2" class="col-md-6 right desactivar">
                     <div class="input-box">
                        <header>Ingresa tu nombre</header>
                        <div class="input-field">
                            <input type="text" name="nombre" class="input" id="nombre" required autocomplete="off">
                            <label for="nombre">Nombre</label>
                        </div>
                        <div class="input-field">
                            <input type="text" name="apellido" class="input" id="apellido" required>
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
                            <input type="text" name="telefono" class="input" id="telefono" required autocomplete="off">
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
                            <input type="text" name="password" class="input" id="password" required autocomplete="off">
                            <label for="password">Contraseña</label>
                        </div>
                        <div class="input-field">
                            <input type="text" name="passwordDos" class="input" id="veri_password" required>
                            <label for="veri_password">Confirmar contraseña</label>
                        </div>
                        <div class="input-field">
                            <input type="submit" name="btn-enviar" class="submit" value="Registrar">
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