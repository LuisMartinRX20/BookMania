<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilos-inicioAdmin.css">
    <title>Document</title>
</head>
<body>

    <?php
    session_start();
    include ("menu-administrador.php")?>

    <?php

        require 'conexion.php';

        $correo=$_SESSION['cuentaUsuario'][0];
        var_dump($correo);

        $query ="SELECT nombre,apellido,rol FROM usuarios WHERE correo='$correo'";
        $consulta = mysqli_query($con,$query);
        $array = mysqli_fetch_array($consulta);

        if($array['rol']==1){
            $rol = 'administrador';
        }else{
            $rol = 'Comprador';
        }


    ?>

    <div class="container">
        <div class="bienvenida">
            <p>Bienvenido <?php echo $rol.' '.$array['nombre'].' '.$array['apellido']?> </p>
        </div>
        <div class="contenido-importante">
            <p>More content</p>
        </div>
    </div>

    
</body>
</html>