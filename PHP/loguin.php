<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/estilos-loguin.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Bookmania:inicio de sesion</title>
</head>
<body>

<?php
    require 'conexion.php';

    if(!empty($_POST['loguin'])){
        session_start();
        $correo= $_POST['correo'];
        $password= $_POST['password'];
        $pass_sha1=sha1($password);
        $query= "SELECT COUNT(*) AS contar FROM usuarios WHERE correo='$correo' and password='$pass_sha1'";
        $consulta= mysqli_query($con,$query);
        // echo "el usuario es: ". $usuario;
        $array = mysqli_fetch_array($consulta);
    
        if($array['contar']>0){
            //crear una variable de sesion
            $_SESSION['username']=$usuario;
            header("location: empleados.php");
        }else{?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops... algo salio mal',
                text: 'verifica tu usario y contraseña'
            })
        </script>
        <?php }
    }

?>
    <form action="loguin.php" method="post" role="form">
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
                <div class="col-md-6 right">
                     <div class="input-box">
                        <header>Iniciar sesion</header>
                        <div class="input-field">
                            <input type="text" name="correo" class="input" id="correo" required autocomplete="off">
                            <label for="correo">Correo</label>
                        </div>
                        <div class="input-field">
                            <input type="password" name="password" class="input" id="password" required>
                            <label for="password">Contraseña</label>
                        </div>
                        <div class="input-field">
                            <input type="submit" name="loguin" class="submit" value="iniciar sesion">
                            
                        </div>
                        <div class="signin">
                            <span>¿Ya tienes una cuenta? <a href="#">crea una ahora</a></span>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
    </form>


    <script src="../JS/bootstrap.min.js"></script>   
</body>
</html>