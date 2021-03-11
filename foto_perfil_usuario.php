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

		$sql = "SELECT * FROM usuarios WHERE id = '$id'";
		$resultado = $con->query($sql);
		$rowData = mysqli_fetch_array($resultado);
			
		 
		$query_empresa=mysqli_query($con,"SELECT * from usuarios where id = '$id'");
		$row=mysqli_fetch_array($query_empresa);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="assets/js/script-validar-contrasena.js"></script>
	<script src="assets/js/script-validar-caracteres.js"></script>
	<!-- alertas -->
	<script src="sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/estilos_perfil_usuario.css">
    <link rel="stylesheet" href="assets/css/validar_contrasena.css">
    <link rel="stylesheet" href="assets/css/estilos_validar_datos.css">
    <title>Foto de perfil</title>
    <link rel="shortcut icon" type="image/png" href="assets/imagenes/logoPestana.jpg" />
  </head>

    <body>

		<div class="wrapper fadeInDown">
			<div id="formContent">
					<!-- Tabs Titles -->
					<!-- <img src="assets/imagenes/logoCajas.jpg" id="icon" alt="User Icon" /><br> -->
					<h2 class="active"> Perfil del Usuario </h2>
					<!-- <h2 class="inactive underlineHover">Sign Up </h2> -->
						<div id="load_img">
							<img class="img-responsive" src="<?php echo $row['logo_url'];?>" alt="Logo">
						</div>
						<div class="form-group">
							<input class='filestyle' data-buttonText="Add" type="file" name="imagefile" id="imagefile" onchange="upload_image();">
						</div>
					<!-- Icon -->
					<div class="fadeIn first"></div>
					<!-- Remind Passowrd -->
					<div id="formFooter">
						<a class="underlineHover" href="index">Volver</a>
					</div>
			</div>
		</div>          

    </body>

</html>

<script type="text/javascript" src="assets/js/bootstrap-filestyle.js"> </script>

<script>
	$( "#perfil" ).submit(function( event ) {
	$('.guardar_datos').attr("disabled", true);
	
	var parametros = $(this).serialize();
		$.ajax({
				type: "POST",
				url: "php/editar_perfil",
				data: parametros,
				beforeSend: function(objeto){
					$("#resultados_ajax").html("Mensaje: Cargando...");
				},
				success: function(datos){
				$("#resultados_ajax").html(datos);
				$('.guardar_datos').attr("disabled", false);

			}
		});
	event.preventDefault();
	})
</script>

<script>
	function upload_image(){
				
		var inputFileImage = document.getElementById("imagefile");
		var file = inputFileImage.files[0];
		if( (typeof file === "object") && (file !== null) )
		   {
				$("#load_img").text('Cargando...');	
				var data = new FormData();
				data.append('imagefile',file);
					$.ajax({
					url: "php/imagen_ajax_usuario",        // Url to which the request is send
					type: "POST",             // Type of request to be send, called as method
					data: data, 			  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
					contentType: false,       // The content type used when sending data to the server.
					cache: false,             // To unable request pages to be cached
					processData:false,        // To send DOMDocument or non processed data file it is set to false
					success: function(data)   // A function to be called if request succeeds
					{
						$("#load_img").html(data);
						Swal.fire({
						position: 'center',
						icon: 'success',
						title: '¡Imagen de perfil guardada con exito...!!',
						showConfirmButton: false,
						timer: 3000
						});
					}
				  });	
				}
			}
</script>

<script>
	const { value: file } = await Swal.fire({
	title: 'Select image',
	input: 'file',
	inputAttributes: {
		'accept': 'image/*',
		'aria-label': 'Upload your profile picture'
	}
	})

	if (file) {
	const reader = new FileReader()
	reader.onload = (e) => {
		Swal.fire({
		title: 'Your uploaded picture',
		imageUrl: e.target.result,
		imageAlt: 'The uploaded picture'
		})
	}
	reader.readAsDataURL(file)
	}

</script>
