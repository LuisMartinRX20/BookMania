<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/estilos-libros.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    include ("menu-administrador.php")?>
    <div class="container">
		<div class="content">
            <h2>Libros agregados</h2>

			<form class="form-inline" method="get">
				<div class="form-group">
					<select name="filter" class="form" onchange="form.submit()">
						<option value="0">Filtros de datos de empleados</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="1" <?php if($filter == 'Tetap'){ echo 'selected'; } ?>>Fijo</option>
						<option value="2" <?php if($filter == 'Kontrak'){ echo 'selected'; } ?>>Contratado</option>
                        <option value="3" <?php if($filter == 'Outsourcing'){ echo 'selected'; } ?>>Outsourcing</option>
					</select>
				</div>

                <div class="agregar">
                    <a href=""><img src="../ICONS/add.svg" alt=""> Registrar libro</a>
                </div>

			</form>
			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
                    <th>No</th>
					<th>Código</th>
					<th>Nombre</th>
                    <th>Lugar de nacimiento</th>
                    <th>Fecha de nacimiento</th>
					<th>Teléfono</th>
					<th>Cargo</th>
					<th>Estado</th>
                    <th>Acciones</th>
				</tr>
				<?php
				if($filter){
                    $miConsulta = "call mostrar_empleados_filtro('$filter')";   //crear una consulta que muestre a todos los empleados de la tabla empleados 
                                        //que coincidan con el contenido del campo estado y de la variable $filter
					$sql = mysqli_query($con, $miConsulta);
				}else{
                    $miConsulta = "call mostrar_empleados()"; //crear una consulta que muestre a todos los empleados de la tabla empleados ordenadas por el campo código
					$sql = mysqli_query($con, $miConsulta);
				}
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$row['codigo'].'</td>
							<td><a href="profile.php?nik='.$row['codigo'].'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$row['nombres'].'</a></td>
                            <td>'.$row['lugar_nacimiento'].'</td>
                            <td>'.$row['fecha_nacimiento'].'</td>
							<td>'.$row['telefono'].'</td>
                            <td>'.$row['puesto'].'</td>
							<td>';
							if($row['estado'] == '1'){
								echo '<span class="label label-success">Fijo</span>';
							}
                            else if ($row['estado'] == '2' ){
								echo '<span class="label label-info">Contratado</span>';
							}
                            else if ($row['estado'] == '3' ){
								echo '<span class="label label-warning">Outsourcing</span>';
							}
						echo '
							</td>
							<td>

								<a href="edit.php?nik='.$row['codigo'].'" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="empleados.php?aksi=delete&nik='.$row['codigo'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['nombres'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
						$no++;
					}
				}
				?>
			</table>
			</div>
		</div>
	</div><center>
    <p>&copy; Sistemas Web <?php echo date("Y");?></p>
		</center>
    <script src="../JS/bootstrap.min.js"></script> 
</body>
</html>