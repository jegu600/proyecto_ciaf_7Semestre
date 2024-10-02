<?php
    
    session_start();
    
    if(!isset($_SESSION['id_usu'])){
        header("Location: ../../index.php");
    }
    
    $nombre = $_SESSION['nombre'];
    $tipo_usu = $_SESSION['tipo_usu'];

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>VISION | SOFT</title>
        <script src="js/64d58efce2.js" ></script>
		<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../../css/estilos.css">
		<link rel="stylesheet" type="text/css" href="../../css/estilos2024.css">
		<link href="../../fontawesome/css/all.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<script src="https://kit.fontawesome.com/fed2435e21.js" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	</head>
    <body>
    	
    	<center>
	    	<img src='../../img/logo.png' width="300" height="212" class="responsive">
		</center>

		<h1 style="color: #412fd1; text-shadow: #FFFFFF 0.1em 0.1em 0.2em; font-size: 40px; text-align: center;"><b><i class="fa-solid fa-people-roof"></i> ASESORES REGISTRADOS </b>
		</h1>

		<div class="flex">
			<div class="box">
				<form action="showitem.php" method="get" class="form">
					<input name="cod_pro" type="text" placeholder="Número CC">
					<input name="nom_pro" type="text" placeholder="Nombre(s).">
					<input value="Realizar Busqueda" type="submit">
				</form>
			</div>
		</div>

		<br/><a href="../../access.php"><img src='../../img/atras.png' width="72" height="72" title="Regresar" /></a><br>

<?php

	date_default_timezone_set("America/Bogota");
	include("../../conexion.php");
	require_once("../../zebra.php");

	@$cod_pro 	= ($_GET['cod_pro']);
	@$nom_pro 	= ($_GET['nom_pro']);
	
	$query = " SELECT * FROM productos WHERE (estado_prod = 1) AND (cod_pro LIKE '%".$cod_pro."%') AND (nom_pro LIKE '%".$nom_pro."%') ORDER BY nom_pro ASC";
	$res = $mysqli->query($query);
	$num_registros = mysqli_num_rows($res);
	$resul_x_pagina = 10;

	echo "<div class='flex'>
			<div class='box'>
	        	<table class='table'>
	            	<thead>
						<tr>
							<th>N°</th>
							<th>CODIGO</th>
							<th>NOMBRE</th>
							<th>PRECIO</th>
							<th>CATEGORIA</th>
			        		<th>FECHA</th>
			        		<th>EDIT</th>
			        		<th>DELETE</th>
			    		</tr>
			  		</thead>
	            	<tbody>";

	$paginacion = new Zebra_Pagination();
	$paginacion->records($num_registros);
	$paginacion->records_per_page($resul_x_pagina);

	$consulta = "SELECT * FROM productos WHERE (estado_prod = 1) AND (cod_pro LIKE '%".$cod_pro."%') AND (nom_pro LIKE '%".$nom_pro."%') ORDER BY nom_pro ASC LIMIT " .(($paginacion->get_page() - 1) * $resul_x_pagina). "," .$resul_x_pagina;
	$result = $mysqli->query($consulta);

	$i = 1;
	while($row = mysqli_fetch_array($result))
	{
	 
		echo '
					<tr>
						<td data-label="No.">'.($i + (($paginacion->get_page() - 1) * $resul_x_pagina)).'</td>
						<td id="codigoProducto" data-label="CODIGO">'.$row['cod_pro'].'</td>
						<td data-label="NOMBRES ">'.$row['nom_pro'].'</td>
						<td data-label="PRECIO">'.$row['precio_prod'].'</td>
						<td data-label="TELEFONO">'.$row['catg_pro'].'</td>
						<td data-label="FECHA">'.$row['fecha_pro'].'</td>
						<td data-label="EDIT"><a href="editem.php?cod_pro='.$row['cod_pro'].'"><img src="../../img/editar.png" width=20 heigth=20></td>
						<td data-label="DELETE"> 
							<button id="btnDelete" onclick="obtenerCod('.$row['cod_pro'].')" type="button" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteModal" >
								Deltete
							</button> 
						</td>
					</tr>';
		$i++;
	}
 
	echo '		</table>
			</div>		';

	$paginacion->render();

?>
		
		</div>
		<center>
			<br/><a href="../../access.php"><img src='../../img/atras.png' width="72" height="72" title="Regresar" /></a>
		</center>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action='delete.php' method="POST">	
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">¿ Desea eliminar el registro ?</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				
				<input id="codigoInput" type="hidden" value="" name="codigoB">
		
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary" onClick="validar(true)">Aceptar</button>
				</div>
			</form>
		</div>
	</div>
</div>


<script>
function obtenerCod(codigo) {
  document.getElementById("codigoInput").value = codigo;
}

function validar (valor){
if (valor) alert('Se ha eliminado el registo');

}
</script>	


</body>
</html>