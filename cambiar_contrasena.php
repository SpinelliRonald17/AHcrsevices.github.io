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
        <link rel="stylesheet" href="assets/css/validar_contrasena.css">
        <link rel="stylesheet" href="assets/css/estilos_validar_datos.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">        
        <title>Cambiar Contraseña (Usuario)</title>
        <link rel="stylesheet" href="assets/css/estilos_cambiar_contrasena.css">
        <link rel="shortcut icon" type="image/png" href="assets/imagenes/logoPestana.jpg" />
    </head>
     <body>
            <div class="wrapper fadeInDown">
                <div id="formContent">
                    <!-- Tabs Titles -->
                    <img src="assets/imagenes/logoCajas.jpg" id="icon" alt="User Icon" /><br>
                    <h2 class="active"> Cambiar Contraseña (Usuario)</h2>
                    <!-- <h2 class="inactive underlineHover">Sign Up </h2> -->
                    <!-- Icon -->
                    <div class="fadeIn first"></div>
                    <!-- Login Form -->
                    <form method="POST" action="cambiar_contrasena">
                        <input type="text" class="fadeIn third" name="usuario" placeholder="usuario" required>
                        <span class="icon-left"><i class="zmdi zmdi-check"></i></span>
                        <span class="msj"></span>
                        <input minlength="8" type="password" class="fadeIn third" id="pass1" value=""  name="contrasena" placeholder="Nueva Contraseña" required="" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9.,-]).{8,}$">
                        <span class="icon-left"><i class="zmdi zmdi-check"></i></span>
                        <span class="msj"></span>
                        <input minlength="8" type="password" class="fadeIn third" id="pass2" value=""  name ="confirmar_contrasena" placeholder="Confirmar Nueva Contraseña" required>
                        <div id="errorletras2"></div> 
                        <div id="error2"></div>
                        <input type="submit" class="fadeIn fourth" value="Cambiar Contraseña" required>
                    </form>

                    <?php

                        use PHPMailer\PHPMailer\PHPMailer;
                        use PHPMailer\PHPMailer\SMTP;
                        use PHPMailer\PHPMailer\Exception;

                        require 'Mailer/Exception.php';
                        require 'Mailer/PHPMailer.php';
                        require 'Mailer/SMTP.php';
                
                    
                        try{
                            if(isset($_POST['usuario']) && !empty($_POST['usuario'])){
                                $pass = $_POST['contrasena'];
                                $emails = $_POST['usuario'];
                                $cdcambio = substr( md5(microtime()), 1, 10);

                                $confirmar_pass = $_POST['confirmar_contrasena'];

                                if($pass!= $confirmar_pass){
                                    echo'<script> 
                                    swal.fire({
                                        position: "center",
                                        icon: "error",
                                        title: "Las contraseñas son diferentes deben coincidir vuelve a intentarlo...",
                                        showConfirmButton: true,
                                        confirmButtonText: "Volver"
                                        }).then(function(result){
                                            if(result.value){
                                            window.location = "cambiar_contrasena";
                                            }
                                        })
                                    </script>';
                                    exit();
                                }else{}

                                // Encriptar las contraseñas
                                $pass = hash('sha512',$pass);

                                //Conexion con la base
                              
                                require_once ("assets/config/db.php");
                                require_once ("assets/config/conexion.php");

                                

                                // Check connection
                                if ($con->connect_error) {
                                    die("Connection failed: " . $con->connect_error);
                                } 

                                $sql = "Update usuarios Set contrasena='$pass' Where usuario='$emails'";
                            
                                $query = "UPDATE usuarios SET cambia_contrasena='$cdcambio' WHERE usuario='$emails'";
                                        
                            

                                if ($con->query($sql) === TRUE) {
                                //     echo'<script> 
                                //     swal.fire({
                                //         position: "center",
                                //         icon: "success",
                                //         title: "!Usted ha cambiado la contraseña correctamente se envio un email por segurida..!",
                                //         showConfirmButton: true,
                                //         confirmButtonText: "Aceptar"
                                //         })
                                //     </script>';
                                // } else {
                                //     echo "Error modificando: " . $conn->error;
                              }

                                if ($con->query($query) === TRUE) {
                                //  echo "";
                                // } else {
                                //     echo "Error modificando: " . $con->error;
                               }
                                

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
                                    $mail->Subject = 'Cambio de Clave'; 
                                    $mail->Body    = 'Usted ha cambiado la contraseña de su Cuenta de AHservices.
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

                                    $mail->AltBody = 'Usted ha cambiado la contraseña de su Cuenta de AHservices.
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
                                    title: "!Usted ha cambiado la contraseña correctamente se envio un email por segurida..!",
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
                      <a class="underlineHover" href="http://ahservices.epizy.com/index">Volver</a>
                    </div>

                </div>
            </div>
    </body>
</html>