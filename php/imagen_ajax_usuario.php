<?php

session_start();

if(!isset($_SESSION['usuario'])){
	echo'<script> 
	alert("Por favor debes iniciar sesión...");
	window.location = "index.php";
	</script>
';
session_destroy();
die();

}

				/* Connect To Database*/
				require_once ("../assets/config/db.php");
				require_once ("../assets/config/conexion.php");

				$query_empresa=mysqli_query($con,"select * from usuarios where usuario='".$_SESSION['usuario']."'");
				$row=mysqli_fetch_array($query_empresa);

				if (isset($_FILES["imagefile"])){
	
				$target_dir="../img-perfil-usuarios/";
				$image_name = time()."_".basename($_FILES["imagefile"]["name"]);
				$target_file = $target_dir . $image_name;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				$imageFileZise=$_FILES["imagefile"]["size"];
				
					
				/* Inicio Validacion*/
				// Allow certain file formats
				if(($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) and $imageFileZise>0) {
				$errors[]= "<p>Lo sentimos, sólo se permiten archivos JPG , JPEG, PNG y GIF.</p>";
			    } else if ($imageFileZise > 1048576) {//1048576 byte=1MB
				$errors[]= "<p>Lo sentimos, pero el archivo es demasiado grande. Selecciona logo de menos de 1MB</p>";
				}  else
			{
				
				/* Fin Validacion*/
				if ($imageFileZise>0){
					move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_file);
					$logo_update="logo_url='img-perfil-usuarios/$image_name' ";
				
				}	else { $logo_update="";}
					
					
					$sql ="UPDATE usuarios SET $logo_update WHERE usuario ='".$_SESSION['usuario']."'";
                    $query_new_insert = mysqli_query($con,$sql);

                   
                    if ($query_new_insert) {
                        ?>
						<img class="img-responsive" src="img-perfil-usuarios/<?php echo $image_name;?>" alt="Logo">
						<?php
                    } else {
                        $errors[] = "Lo sentimos, actualización falló. Intente nuevamente. ".mysqli_error($con);
                    }
			}
		}				
		
	?> 

	<?php 
		if (isset($errors)){
    ?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Error! </strong>
		<?php
			foreach ($errors as $error){
				echo $error;
			}
		?>
		</div>	
	<?php
			}
	?>
