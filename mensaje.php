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

    $query_empresa=mysqli_query($con,"select * from usuarios where usuario='".$_SESSION['usuario']."'");
	$row=mysqli_fetch_array($query_empresa);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    
<a href="cambiar_contrasena?id=1%45#4%353%4&53%11?#&"><button>Cambiar Contraseña</button></a>

</body>
</html>