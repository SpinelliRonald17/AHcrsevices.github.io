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

	$id = $_POST['id'];
	$nombre = $_POST['nombre_completo'];
	$email = $_POST['correo'];
	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];
	$logo = $_POST['logo_url'];

    // Encriptar las contraseñas
    $contrasena = hash('sha512',$contrasena);

	$arrayIntereses = null;
	
	$contador = 0;
	
	$sql = "UPDATE usuarios SET nombre_completo='$nombre',correo='$email',usuario='$usuario',contrasena='$contrasena', logo_url='$logo' WHERE id='$id'";
	$resultado = $con->query($sql);

?>

<html lang="es">
	<head>
	   <meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="sweetalert2.all.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		<link href="css-web/bootstrap.min.css" rel="stylesheet">
		<link href="css-web/bootstrap-theme.css" rel="stylesheet">
		<script src="assets/js/jquery-3.5.1.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>	
	</head>
	
	  <body>
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
	</body>

</html>

