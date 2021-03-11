<?php
 session_start();

    if(isset($_SESSION['usuario'])) {
        header("location: menu_seleccion_admin");

    }

?>

<!DOCTYPE html>
 <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login CRservices</title>
        <link rel="shortcut icon" type="image/png" href="assets/imagenes/logoPestana.jpg" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="assets/css/estilos_login.css">
        <link rel="stylesheet" href="assets/css/estilos_validar_datos.css">
        <script src="sweetalert2.all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    </head>
  <body>

        <?php

            if(isset($_POST['login'])){


                require_once ("assets/config/db.php");
                require_once ("assets/config/conexion.php");

                $usuario = $_POST['usuario'];
                $contrasena = $_POST['contrasena'];
                $contrasena = hash('sha512', $contrasena);

                $validar_login = $con->query("SELECT * FROM usuarios WHERE usuario = '$usuario' and contrasena = '$contrasena'");
                $contar = $validar_login->num_rows;
                $dato = $validar_login->fetch_assoc();

                if($contar == 1){
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['id'] =$dato['id'];
                    header ("location: menu_seleccion_admin");
                    exit;
                }else{
                    echo'<script> 
                    swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Usuario o contraseña incorrecta intenta de nuevo por favor...",
                        showConfirmButton: true,
                        confirmButtonText: "volver"
                        }).then(function(result){
                            if(result.value){
                            window.location = "index";
                            }
                        })
                    </script>';
                    exit;
                }          
            }

        ?>

        <div class="wrapper fadeInDown">
                <div id="formContent">
                    <!-- Tabs Titles -->
                    <img src="assets/imagenes/logoCajas.jpg" id="icon" alt="User Icon" /><br>
                    <h2 class="active"> Login </h2>
                    <!-- <h2 class="inactive underlineHover">Sign Up </h2> -->
                    <!-- Icon -->
                    <div class="fadeIn first"></div>
                    <!-- Login Form -->
                    <form action="" method = "POST" class="formulario__login">
                        <input type="text2" class="fadeIn third" placeholder="Usuario" name = "usuario" required>
                        <span class="icon-left"><i class="zmdi zmdi-check"></i></span>
                        <span class="msj"></span>
                        <input minlength="4" type="password" class="fadeIn third" placeholder="Contraseña" name = "contrasena" >
                        <input type="submit" name="login" class="fadeIn fourth" value="Entrar">
                    </form>
                    <!-- Remind Passowrd -->
                    <div id="formFooter">
                        <a class="underlineHover" href="recuperar">¿Ovidaste la contraseña?</a>
                    </div>
                </div>
        </div>

       <script src ="assets/js/script-login.js"></script>

   </body>
</html>