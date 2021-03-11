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

	// $id = $_GET['id'];

	//  $sql = "SELECT * FROM usuarios WHERE id = '$id'";
	//  $resultado = $con->query($sql);
	//  $rowData = mysqli_fetch_array($resultado);
		
	$query_empresa=mysqli_query($con,"select * from usuarios where usuario='".$_SESSION['usuario']."'");
	$row=mysqli_fetch_array($query_empresa);
   
	$where = "";
	
	if(isset($_POST['campo']))
	{
		$valor = $_POST['campo'];
		
			$sql = "SELECT * FROM usuarios WHERE nombre_completo LIKE '$valor%'";

	}else{
		$sql = "SELECT * FROM usuarios";
	}
	$resultado = $con->query($sql);

?>
<html lang="es">
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> 
		<link href="css-web/bootstrap.min.css" rel="stylesheet">
		<link href="css-web/bootstrap-theme.css" rel="stylesheet">
		<link href="assets/css/estilos_editar_usuarios.css" rel="stylesheet">
		<link rel="shortcut icon" type="image/png" href="assets/imagenes/logoPestana.jpg" />
		<script src="assets/js/jquery-3.5.1.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>	
		<script src="https://kit.fontawesome.com/b10f1efc78.js" crossorigin="anonymous"></script>
		<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script src="sweetalert2.all.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	</head>
	
	<body>

	
		<main>

			<header>

				<div class="header-content">
							<div class ="logo">
								<img src="assets/imagenes/logoCajas.jpg" class="logo_menu" alt="logo menu">
								<h1>Editar<b> Usuarios</b></h1> 
							</div>

							<div class="menu" id="show-menu">

							<nav>
									<ul>
										<div id="load_img">
											<img class="img-responsive" title="usuario" src="<?php echo $row['logo_url'];?>" alt="Logo">
										</div> 
										<li><a href="opciones_admin" class ="menu-seleted"><i class="fas fa-undo-alt" title ="Volver"></i></a></li>
										<!-- <li><a href="php/cerrar_sesion" class ="menu-seleted"><i class="fas fa-sign-out-alt" title ="Cerrar Sesión"></i></a></li> -->
									</ul>
							</nav>  

							</div> 
				</div>
					
			</header>
			<br>
			<br>
			<br>
			<br>
			<br>
		
				<div class="container">
					<div class="row">
						<!-- <h2 style="text-align:center">Usuarios Registrados</h2> -->
					</div>
					
					<div class="row">
						<!-- <a href="nuevo.php" class="btn btn-primary">Nuevo Registro</a> -->
						<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
							<b>Nombres: </b><input type="text" class="fadeIn third"  id="campo" name="campo" />
							<!-- <a id="enviar" name="enviar" href=""><i title ="Buscar" class="fas fa-search" id="icon-search"></i></a> -->
							<input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-info" />
							<a href="editar_usuarios?id=<?php echo $row['id'];?>" id="actualizar" title="Recargar"class="btn btn-info"><i class="fas fa-sync-alt"></i></a>
						</form>
					</div>
					<br>
					<div class="row table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Nombres</th>
									<th>Emails</th>
									<th>Usuarios</th>
									<th>Foto</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							
							<tbody>
							
								<?php while($rowData = mysqli_fetch_array($resultado)) { 
									?>
									<tr>
										<td><?php echo $rowData['id']; ?></td>
										<td><?php echo $rowData['nombre_completo']; ?></td>
										<td><?php echo $rowData['correo']; ?></td>
										<td><?php echo $rowData['usuario']; ?></td>
										<td><?php echo $rowData['logo_url']; ?></td>
										<td><a title="Modificar" id="hoverM" href="modificar?id=<?php echo $rowData['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
										<td><a id="hoverE" href="#" title="Eliminar" data-href="eliminar?id=<?php echo $rowData['id']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>
									</tr>
								<?php 
							} ?>
							</tbody>
						</table>
					</div>
				</div>
			
			<!-- Modal -->
				<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
							</div>
							
							<div class="modal-body">
								¿Desea eliminar este registro?
							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<a class="btn btn-danger btn-ok">Delete</a>
							</div>
						</div>
					</div>
				</div>
					

						 <!-- btn subir -->
						 <div class="cm-up" id="cm-up">
                            <input type="button" class="cm-text-up" value="Subir al Inicio">
                                <span class="cm-icon">
                                    <i class="fas fa-chevron-up"></i>
                                </span>
                        </div>

                         <!-- Footer--pide de pagina -->
					<div id="redessociales" class="container-footer">
						
						<footer>

							<div class="logo-footer">
								<img src="assets/imagenes/logoCajas.jpg" alt="">
							</div>

							<div class="redes-footer" >
								<a href="#" target="_blank"><i title="Pagina Facebook" class="fab fa-facebook-f icon-redes-footer"></i></a>
								<a href="#"><i title="Chat Messenger" class="fab fa-facebook-messenger icon-redes-footer"></i></a>
								<a href="#"><i title="Pagina Instagram" class="fab fa-instagram icon-redes-footer"></i></a>
								<a href="#"><i title="Pagina Youtube" class="fab fa-youtube icon-redes-footer"></i></a>
								<a href="#"><i title="Telegram" class="fab fa-telegram-plane icon-redes-footer"></i></a>
							</div>

							<hr>

							<h4>Developer-Ronald Contreras- Todos los derechos reservados © 2021</h4>
							

						</footer>

					</div>

		</main>  

	 <script src="assets/js/script-btn-menu.js"></script>
	 <script src="assets/js/jquery-3.5.1.min.js"></script>
	
	 <!-- btn eliminar -->
		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
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