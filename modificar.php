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

<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="sweetalert2.all.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		<script src="assets/js/jquery-3.5.1.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>	
		<script src="https://kit.fontawesome.com/b10f1efc78.js" crossorigin="anonymous"></script>
		<script src="assets/js/script-validar-contrasena.js"></script>
        <script src="assets/js/script-validar-caracteres.js"></script>
		<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
		<link href="css-web/bootstrap.min.css" rel="stylesheet">
		<link href="css-web/bootstrap-theme.css" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link rel="stylesheet" href="assets/css/estilos_modificar_usuario.css">
		<link rel="shortcut icon" type="image/png" href="assets/imagenes/logoPestana.jpg" />
		<link rel="stylesheet" href="assets/css/validar_contrasena.css">
        <link rel="stylesheet" href="assets/css/estilos_validar_datos.css">
	</head>
	
    <body>

		<main>
			<header>

				<div class="header-content">
							<div class ="logo">
								<img src="assets/imagenes/logoCajas.jpg" class="logo_menu" alt="logo menu">
								<h1>Modificar <b>Usuario</b></h1> 
							</div>

							<div class="menu" id="show-menu">

							<nav>
									<ul>
										<div id="load_img">
											<img class="img-responsive" title="usuario" src="<?php echo $row['logo_url'];?>" alt="Logo">
										</div>  
										<li><a href="editar_usuarios" class ="menu-seleted"><i class="fas fa-undo-alt" title ="Volver"></i></a></li>
										<!-- <li><a href="php/cerrar_sesion" class ="menu-seleted"><i class="fas fa-sign-out-alt" title ="Cerrar Sesión"></i></a></li> -->
									</ul>
								</nav>  

							</div> 
								<!-- <div id="ctn-icon-search">
									<i title ="Buscar" class="fas fa-search" id="icon-search"></i>
								</div> -->
				</div>

				<!-- menu responsive -->
				<div id="icon-menu">
					<i class="fas fa-bars"></i>
				</div>

			</header>
				<br>
				<br>
				<br>
				<br>
				<br>
			<div class="container">
				<div class="row">
					<h3 style="text-align:center"></h3>
				</div>
				
				<form class="form-horizontal" method="POST" action="update" autocomplete="off">
					<div class="form-group">
						<label for="nombre" class="col-sm-2 control-label">Nombres:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="nombre" name="nombre_completo" placeholder="Nombre" value="<?php echo $rowData['nombre_completo']; ?>" required="" pattern="^[A-Za-z ]*$">
							<span class="icon-left"><i class="zmdi zmdi-check"></i></span>
							<span class="msj"></span>
						</div>
					</div>
					
					<input type="hidden" id="id" name="id" value="<?php echo $rowData['id']; ?>" />
					
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email:</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="correo" placeholder="Email" value="<?php echo $rowData['correo']; ?>"  required="">
							<span class="icon-left"><i class="zmdi zmdi-check"></i></span>
							<span class="msj"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="telefono" class="col-sm-2 control-label">Usuario:</label>
						<div class="col-sm-10">
							<input minlength="6" type="text2" class="form-control" id="telefono" name="usuario" placeholder="Usuario" value="<?php echo $rowData['usuario']; ?>" required="" pattern="[A-Za-z0-9]+">
							<span class="icon-left"><i class="zmdi zmdi-check"></i></span>
							<span class="msj"></span>
						</div>
					</div>

					<div class="form-group">
						<label for="telefono" class="col-sm-2 control-label">Contraseña:</label>
						<div class="col-sm-10">
							<input minlength="6" type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña" value="<?php echo $rowData['contrasena']; ?>" required="" pattern="[A-Za-z0-9]+">
							<span class="icon-left"><i class="zmdi zmdi-check"></i></span>
							<span class="msj"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="id" class="col-sm-2 control-label">Foto:</label>
						<div class="col-sm-10">
							<input type="text2" class="form-control" id="logo_url" name="logo_url" placeholder="Foto" value="<?php echo $rowData['logo_url']; ?>" >
								<br>
								<div id="load_img">
									<input class='filestyle' data-buttonText="Add" type="file" name="imagefile" id="imagefile" onchange="upload_image();">
								</div>
						</div>
					</div>
						<br>    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<a href="editar_usuarios" class="btn btn-default"><--Volver</a>
							<button type="submit" class="btn btn-primary">Guardar</button>
						</div>
					</div>
				</form>

			</div>    

				 <!-- btn subir -->
				 <div class="cm-up" id="cm-up">
                            <input type="button" class="cm-text-up" value="Subir al Inicio">
                                <span class="cm-icon">
                                    <i class="fas fa-chevron-up"></i>
                                </span>
                        </div>

                        <!-- footer -->
                    <div class="container-footer">

                        <footer>
                            <div class="logo-footer">
                                <img src="assets/imagenes/logoCajas.jpg" alt="">
                            </div>

                            <div class="redes-footer">
                                    <a href="https://www.facebook.com/ronald.spinelli.17/"><i class="fab fa-facebook-f icon-redes-footer" title="Ir a la pagina de Facebook"></i></a>
                                    <a href="http://m.me/ronald.spinelli.17" target="_blank"><i class="fab fa-facebook-messenger icon-redes-footer" title="Enviar mensaje por Messenger"></i></a>
                                    <a href="#"><i class="fas fa-envelope icon-redes-footer" title="Enviar correo al desarrollador"></i></a>
                                    <a href="#"><i class="fab fa-instagram icon-redes-footer"></i></a>
                            </div>
                            <hr>
                            <h4 class ="">Ronald J. Contreras S. 2020 - Todos los derechos Reservados<h4>
                                
                        </footer>

                    </div>


		</main>  

			<script src ="assets/js/script-usuarios.js"></script>
			<script src="assets/js/jquery-3.5.1.min.js"></script>

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
								url: "php/imagen_ajax_modificar",        // Url to which the request is send
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

			<!-- btn subir -->
			<script>
			$(document).ready(function(){
				$(window).scroll(function(){
				if($(this).scrollTop() > 0) {
					$('#cm-up').slideDown(300);
				} else {
					$('#cm-up').slideUp(300);
				}
				});
				$('#cm-up').on('click', function(){
					$('body, html').animate({
						scrollTop: 0
					}, 700);
					return false;
				});
				}); 
			</script>

	</body>
</html>