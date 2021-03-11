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

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="sweetalert2.all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="assets/js/script-validar-contrasena.js"></script>
        <script src="assets/js/script-validar-caracteres.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="assets/css/estilos_recuperar.css">
        <link rel="stylesheet" href="assets/css/validar_contrasena.css">
        <link rel="stylesheet" href="assets/css/estilos_validar_datos.css">
        <title>Registar usuarios</title>
        <link rel="shortcut icon" type="image/png" href="assets/imagenes/logoPestana.jpg" />
    </head>
        <body>

           <?php

                if(isset($_POST['registro'])){

                 require_once ("assets/config/db.php");
                 require_once ("assets/config/conexion.php");

                 $nombre_completo = $_POST ['nombre_completo'];
                 $correo = $_POST ['correo'];
                 $usuario = $_POST['usuario'];
                 $contrasena = $_POST['contrasena'];

                 $confirmar_contrasena = $_POST['confirmar_contrasena'];

                    if($contrasena != $confirmar_contrasena){
                        echo'<script> 
                        swal.fire({
                        position: "center",
                        icon: "warning",
                        title: "!Las contraseñas son diferentes inteta de nuevo..!!",
                        showConfirmButton: true,
                        confirmButtonText: "Aceptar"
                        })
                        </script>';
                        exit();
                    }
                    else{

                    // Encriptar las contraseñas
                    $contrasena = hash('sha512',$contrasena);

                    $query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena) 
                                VALUES('$nombre_completo', '$correo', '$usuario','$contrasena')";

                    // verificar que el correo no se repita en la base de datos

                    $verificar_correo = mysqli_query($con,"SELECT * FROM usuarios WHERE correo = '$correo' ");

                    if(mysqli_num_rows($verificar_correo)> 0){
                        echo'<script> 
                        swal.fire({
                        position: "center",
                        icon: "warning",
                        title: "!Este correo ya esta registrado intenta con otro diferente..!!",
                        showConfirmButton: true,
                        confirmButtonText: "Aceptar"
                        })
                        </script>';
                     exit();

                    }

                        // verificar que el usuario no se repita en la base de datos

                        $verificar_usuario = mysqli_query($con,"SELECT * FROM usuarios WHERE usuario = '$usuario' ");

                        if(mysqli_num_rows($verificar_usuario)> 0){
                            echo'<script> 
                            swal.fire({
                            position: "center",
                            icon: "warning",
                            title: "!Este usuario ya esta registrado intenta con otro diferente..!!",
                            showConfirmButton: true,
                            confirmButtonText: "Aceptar"
                            })
                            </script>';
                        exit();
                        
                        mysqli_close($con);
                        }

                        $ejecutar = mysqli_query($con, $query);
                        
                        if($ejecutar){
                            echo'<script> 
                            swal.fire({
                            position: "center",
                            icon: "success",
                            title: "!Nuevo usuario registrado correctamente..!!",
                            showConfirmButton: true,
                            confirmButtonText: "Aceptar"
                            })
                            </script>';
                        }else{
                            echo'<script> 
                            swal.fire({
                            position: "center",
                            icon: "error",
                            title: "!Usuario no registrado intenta de nuevo..!!",
                            showConfirmButton: true,
                            confirmButtonText: "Aceptar"
                            })
                            </script>';
                        }
                    }

                }

            ?>

                    <div class="wrapper fadeInDown">
                        <div id="formContent">
                            <!-- Tabs Titles -->
                            <img src="assets/imagenes/logoCajas.jpg" id="icon" alt="User Icon" /><br>
                            <h2 class="active"> Registrar Usuarios </h2>
                            <!-- <h2 class="inactive underlineHover">Sign Up </h2> -->
                            <!-- Icon -->
                            <div class="fadeIn first"></div>
                            <!-- Login Form -->
                            <form action="" method = "POST" class="formulario__register">
                                <input type="text" class="fadeIn third" placeholder="Nombre completo" name ="nombre_completo" required="" pattern="^[A-Za-z ]*$">
                                <span class="icon-left"><i class="zmdi zmdi-check"></i></span>
                                <span class="msj"></span>
                                <input type="email" class="fadeIn third" placeholder="Correo Electronico" name ="correo" required="" >
                                <span class="icon-left"><i class="zmdi zmdi-check"></i></span>
                                <span class="msj"></span>
                                <input minlength="6" type="text2" class="fadeIn third" placeholder="Usuario" name ="usuario" required="" pattern="[A-Za-z0-9]+">
                                <span class="icon-left"><i class="zmdi zmdi-check"></i></span>
                                <span class="msj"></span>
                                <input minlength="8" type="password" class="fadeIn third" placeholder="Contraseña" id="pass1" value="" name ="contrasena" required="" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9.,-]).{8,}$"/>
                                <span class="icon-left"><i class="zmdi zmdi-check"></i></span>
                                <span class="msj"></span>
                                <div id="error1"></div>
                                <div id="errorletras1"></div>
                                <input minlength="4" type="password" class="fadeIn third" placeholder="Confirmar Contraseña" id="pass2" value="" name ="confirmar_contrasena" required="">
                                <div id="errorletras2"></div>
                                <div id="error2"></div>
                                <input type="submit" class="fadeIn fourth" name="registro" value="Registar" required="">
                            </form>

                            <!-- Remind Passowrd -->
                            <div id="formFooter">
                               <a class="underlineHover" href="opciones_admin">Volver</a>
                            </div>

                        </div>
                    </div>

          <script src ="assets/js/script-login.js"></script>


        </body>
</html>
