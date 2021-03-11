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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recuperar Contraseña (Sistema)</title>
        <script src="sweetalert2.all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="assets/css/estilos_recuperar.css">
        <link rel="stylesheet" href="assets/css/estilos_validar_datos.css">
        <link rel="shortcut icon" type="image/png" href="assets/imagenes/logoPestana.jpg" />
    </head>
    <body>
            <div class="wrapper fadeInDown">
                <div id="formContent">
                    <!-- Tabs Titles -->
                    <img src="assets/imagenes/logoCajas.jpg" id="icon" alt="User Icon" /><br>
                    <h2 class="active"> (Solicitud) Cambio de Contraseña</h2>
                    <!-- <h2 class="inactive underlineHover">Sign Up </h2> -->
                    <!-- Icon -->
                    <div class="fadeIn first"></div>
                    <!-- Login Form -->
                    <form method="POST" action="">
                        <!-- <input type="text" id="login" class="fadeIn second" name="usuario" placeholder="Usuario"> -->
                        <input type="email" class="fadeIn third" name="email" placeholder="Correo" required>
                        <span class="icon-left"><i class="zmdi zmdi-check"></i></span>
                        <span class="msj"></span>
                        <!-- <input type="text" id="correo" class="fadeIn third" name="contrasena" placeholder="Nueva Contraseña"> -->
                        <input type="submit" id="mensaje" class="fadeIn fourth" value="Enviar">
                    </form>

                    <?php
            
                            require_once ("assets/config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
                            require_once ("assets/config/conexion.php");//Contiene funcion que conecta a la base de datos

                            $query_empresa=mysqli_query($con,"select * from usuarios where usuario='".$_SESSION['usuario']."'");
	                        $row=mysqli_fetch_array($query_empresa);

                            use PHPMailer\PHPMailer\PHPMailer;
                            use PHPMailer\PHPMailer\SMTP;
                            use PHPMailer\PHPMailer\Exception;

                            require 'Mailer/Exception.php';
                            require 'Mailer/PHPMailer.php';
                            require 'Mailer/SMTP.php';

                          try{
                                if(isset($_POST['email']) && !empty($_POST['email'])){
                                    // $pass = hash('sha512',"AH11069326081213032020");
                                     $emails = $_POST['email'];
                                    // $cdcambio = substr( md5(microtime()), 1, 10);

                                    // // Encriptar las contraseñas
                                    // $pass = hash('sha512',$pass);
                                    
                                    //Conexion con la base
                                    // $conn = new mysqli("localhost", "root", "", "login_register_db");
                                    // Check connection
                                    if ($con->connect_error) {
                                        die("Connection failed: " . $con->connect_error);
                                    } 

                                    // $sql = "Update usuarios Set contrasena='$pass' Where correo='$emails'";
                                
                                    // $query = "UPDATE usuarios SET recupera_contrasena='$cdcambio' WHERE correo='$emails'";
                                            
                                

                                    // if ($con->query($sql) === TRUE) {
                                    // //     echo'<script> 
                                    // //     swal.fire({
                                    // //         position: "center",
                                    // //         icon: "success",
                                    // //         title: "!El sistema CRs ha enviado una contraseña provicional a su email para que pueda acceder..!!",
                                    // //         showConfirmButton: true,
                                    // //         confirmButtonText: "Aceptar"
                                    // //         })
                                    // //     </script>';
                                    // // } else {
                                    // //     echo "Error modificando: " . $con->error;
                                    // }

                                    // if ($con->query($query) === TRUE) {
                                    // //     echo "";
                                    // // } else {
                                    // //     echo "Error modificando: " . $con->error;
                                    // }


                                    // Load Composer's autoloader
                                    // require 'vendor/autoload.php';

                                    // $correo = $_POST ['correo'];
                                    // $asunto = $_POST['asunto'];
                                    // $mensaje = $_POST['mensaje'];

                                    // Instantiation and passing `true` enables exceptions
                                    $mail = new PHPMailer(true);

                                    try {
                                        //Server settings
                                        $mail->SMTPDebug = 0;                      // Enable verbose debug output
                                        $mail->isSMTP();                                            // Send using SMTP
                                        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                        $mail->Username   = 'crservices.soporte@gmail.com';                     // SMTP username
                                        $mail->Password   = 'AdrianHansel2020..';                               // SMTP password
                                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                                        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                                        //Recipients
                                        $mail->setFrom( 'crservices.soporte@gmail.com','Contacto');
                                        $mail->addAddress( $emails , 'Crservices');     // Add a recipient
                                        

                                        // Attachments
                                        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                                        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                                        // Content
                                        $mail->isHTML(true);                                  // Set email format to HTML
                                        $mail->Subject = 'Solicitud Cambio de clave'; 
                                        $mail->Body    = 'Usted esta solicitando cambiar su contraseña de su cuenta de AHservices.
                                        <br>
                                        <br> 
                                        Precione el botón si es correcto:
                                        <br> 
                                        <a href="http://ahservices.epizy.com/index"><button>Cambiar Contraseña</button></a>
                                        <br>
                                        <br>
                                        Si no ha actualizado su cuenta, comuníquese inmediatamente, Envíando una solicitud de ayuda al correo electrónico a <b>crservices.soporte@gmail.com</b>
                                        <br>
                                        <br>
                                        Si tiene problemas para acceder a su cuenta, restablezca la contraseña nuevamente.
                                        <br>
                                        <br>                                       
                                        Gracias,
                                        <br>
                                        <br>  
                                        El Equipo de Ahservices. ';   

                                        $mail->AltBody = 'Usted esta solicitando cambiar su contraseña de su cuenta de AHservices.
                                        <br>
                                        <br> 
                                        Precione el botón si es correcto:
                                        <br> 
                                        <a href="http://ahservices.epizy.com/index"><button>Cambiar Contraseña</button></a>
                                        <br>
                                        <br>
                                        Si no ha actualizado su cuenta, comuníquese inmediatamente, Envíando una solicitud de ayuda al correo electrónico a <b>crservices.soporte@gmail.com</b>
                                        <br>
                                        <br>
                                        Si tiene problemas para acceder a su cuenta, restablezca la contraseña nuevamente.
                                        <br>
                                        <br>                                       
                                        Gracias,
                                        <br>
                                        <br>  
                                        El Equipo de Ahservices. ';     

                                        $mail->send();
                                        echo'<script> 
                                        swal.fire({
                                        position: "center",
                                        icon: "success",
                                        title: "!Usted ha solicitado cambio de clave, se envio un email por segurida..!",
                                        showConfirmButton: true,
                                        confirmButtonText: "Aceptar"
                                        }).then(function(result){
                                            if(result.value){
                                            window.location = "index";
                                            }
                                        })
                                        </script>';
                                    

                                    } catch (Exception $e) {
                                        echo'<script> 
                                        swal.fire({
                                            position: "center",
                                            icon: "error",
                                            title: "Email no fue Enviado.!!",
                                            showConfirmButton: true,
                                            confirmButtonText: "Aceptar"
                                            }).then(function(result){
                                                if(result.value){
                                                window.location = "index";
                                                }
                                            })
                                            </script>';
                                    }
                                    
                                }
                                else 
                                    echo '';
                            }
                            catch (Exception $e) {
                                echo 'Excepción capturada: ',  $e->getMessage(), "\n";
                            }
                    ?>

                    <!-- Remind Passowrd -->
                    <div id="formFooter">
                      <a class="underlineHover" href="index">Volver</a>
                    </div>

                </div>
            </div>

    </body>
</html>