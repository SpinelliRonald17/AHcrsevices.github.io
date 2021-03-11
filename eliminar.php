<?php

session_start();

if(!isset($_SESSION['usuario'])){
	echo'<script> 
	alert("Por favor debes iniciar sesión...");
	window.location = "index";
	</script>
';
session_destroy();
die();

}
	
	/* Connect To Database*/
	require_once ("assets/config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("assets/config/conexion.php");//Contiene funcion que conecta a la base de datos

	$id = $_GET['id'];
	
	$sql = "DELETE FROM usuarios WHERE id = '$id'";
	$resultado = $con->query($sql);
	
?>

<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css-web/bootstrap.min.css" rel="stylesheet">
		<link href="css-web/bootstrap-theme.css" rel="stylesheet">
		<script src="assets/js/jquery-3.5.1.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>	
		<script src="sweetalert2.all.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	</head>
	
	<body>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
				
					<?php if($resultado) { ?>

							<?php echo'<script> 
							swal.fire({
							position: "center",
							icon: "success",
							title: "!Usuario modificado correctamente..!!",
							showConfirmButton: true,
							confirmButtonText: "Aceptar"
							}).then(function(result){
								if(result.value){
								window.location = "editar_usuarios";
								}
							})
							</script>';?>
							<?php } else { ?>

							<?php  echo'<script> 
							swal.fire({
							position: "center",
							icon: "error",
							title: "!Error usuario no modificado.!!",
							showConfirmButton: true,
							confirmButtonText: "Aceptar"
							}).then(function(result){
								if(result.value){
								window.location = "editar_usuarios";
								}
							})
							</script>';?>
					<?php } ?>

				</div>
			</div>
		</div>
	</body>
</html>
