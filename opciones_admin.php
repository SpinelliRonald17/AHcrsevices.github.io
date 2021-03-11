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
        <title>Opciones del Usuario</title>
        <script src="sweetalert2.all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://kit.fontawesome.com/b10f1efc78.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="assets/css/estilos_opciones_usuarios.css">
        <link rel="shortcut icon" type="image/png" href="assets/imagenes/logoPestana.jpg" />
    </head>
  <body>

       <main>
                    <header>

                        <div class="header-content">
                                <div class ="logo">
                                    <img src="assets/imagenes/logoCajas.jpg" class="logo_menu" alt="logo menu">
                                    <h1>Opciones <b>Usuario</b></h1> 
                                </div>
                        <div class="menu" id="show-menu">
                                    <nav>
                                        <ul>
                                            <div id="load_img">
                                                    <img class="img-responsive" title="usuario" src="<?php echo $row['logo_url'];?>" alt="Logo">
                                            </div>  
                                                <li><a href="menu_seleccion_admin" class ="menu-seleted"><i class="fas fa-undo-alt" title ="Volver"></i></a></li>
                                                <!-- <li><a href="php/cerrar_sesion" class ="menu-seleted"><i class="fas fa-sign-out-alt" title ="Cerrar Sesión"></i></a></li> -->
                                        </ul>
                                    </nav>  
                            </div> 
                                <div id="ctn-icon-search">
                                        <i title ="Buscar" class="fas fa-search" id="icon-search"></i>
                                    </div>
                        </div>
                        <!-- menu responsive -->
                        <div id="icon-menu">
                            <i class="fas fa-bars"></i>
                        </div>

                    </header>

                    <div id="ctn-bars-search">
                        <input type="text" id="inputSearch" placeholder="¿Qué deseas buscar?">
                    </div>

                        <ul id="box-search">
                            <li><a href="recuperar"><i class="fas fa-search"></i>Recuperar contraseña (Sistema)</a></li>
                            <li><a href="cambiar_contrasena"><i class="fas fa-search"></i>Cambiar contraseña (Usuario)</a></li>
                            <li><a href="registar_usuarios"><i class="fas fa-search"></i>Registrar nuevos usuarios</a></li>
                            <li><a href="foto_perfil_usuario?id=<?php echo $row['id'];?>"><i class="fas fa-search"></i>Seleccionar imagen de perfil (Usuario)</a></li>
                            <li><a href="editar_usuarios?id=<?php echo $row['id'];?>"><i class="fas fa-search"></i>Editar Usuarios (Administrador)</a></li>
                            <!-- <li><a href=""><i class="fas fa-search"></i></a></li> -->
                            <li><a href="#" id ="cerrarb"><i class="fas fa-search"></i>Cerrar Sesión</a></li>
                        </ul>

                     <div id="cover-ctn-search"></div>

                    <div class="container-box">

                        <div class="box box1">
                            <img src="assets/imagenes/opciones-usuario/recuperar-sistema.svg" alt ="" title="Selecione el check para ir">
                                <h2>Recuperar Contraseña (Sistema)</h2>
                                
                                <div class="container-p">
                                <p>El sistema AHservices enviara una contraseña provicional a su email luego debera cambiarla por seguridad..</p>
                                </div>

                                <div class="check">
                                    <a href="recuperar" class="fas fa-check"></a>
                                </div>
                            
                        </div>
                    

                        <div class="box box2">
                            <img src="assets/imagenes/opciones-usuario/cambiar_contrasena.svg" alt="" title="Selecione el check para ir">
                                <h2>Cambiar Contraseña</h2>

                                <div class="container-p">
                                <p>Se realizar un cambio personalizado de clave.. </p>
                                </div>

                                <div class="check">
                                    <a href="envio_cambio_contrasena?id=<?php echo $row['id'];?>" class="fas fa-check"></a>
                                </div>
                        </div>

                        <div class="box box5">
                            <img src="assets/imagenes/opciones-usuario/perfil-usuario.svg" alt="" title="Selecione el check para ir">
                            <h2>Seleccionar imagen de perfil</h2>
                                    
                                <div class="container-p">
                                    <p>Se elegira una imagen personalizada para el perfil..</p>
                                </div>

                                <div class="check">
                                    <a href="foto_perfil_usuario?id=<?php echo $row['id'];?>" class="fas fa-check"></a>
                                </div>
                        </div>

                        <div class="box box4">
                            <img src="assets/imagenes/opciones-usuario/agregar-usuario.svg" alt="" title="Selecione el check para ir">
                                <h2>Registrar nuevos usuarios (Administrador)</h2>

                                <div class="container-p">
                                 <p>Crear nuevos usuarios para que puedan ingresar al sistema..</p>
                                </div>

                                <div class="check">
                                 <a href="registrar_usuarios" class="fas fa-check"></a>
                                </div>
                        </div>
                  
                        <div class="box box6">
                                <img src="assets/imagenes/opciones-usuario/editar-usuarios.svg" alt="" title="Selecione el check para ir">
                                    <h2>Editar Usuarios (Administrador)</h2>
                                    
                                    <div class="container-p">
                                     <p>Verificar, modificar y eliminar usuarios registrados..</p>
                                    </div>

                                    <div class="check">
                                     <a href="editar_usuarios?id=<?php echo $row['id'];?>" class="fas fa-check"></a>
                                    </div>
                        </div>
                   
                        <div class="box box3">
                            <img src="assets/imagenes/opciones-usuario/cerrar-sesion.svg" alt="" title="Selecione el check para ir">
                                <h2>Cerrar Sesión</h2>
                                
                                <div class="container-p">
                                 <p>Salir completamente del sistema...</p>
                                </div>

                                <div class="check">
                                 <a href="#" id="cerrar" class="fas fa-check"></a>
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
                                <img src="img/logoCajas.jpg" alt="">
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
        <script src ="assets/js/script-admin.js"></script>
        <script src="assets/js/jquery-3.5.1.min.js"></script>

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


        <!-- alertas -->
        <script> 
            $("#cerrar").click(function(){
                swal.fire({
                title: 'Estas seguro?',
                text: "Se cerrar la sesión completa!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si'
                }).then((result) => {
                    if(result.value){
                     window.location = "php/cerrar_sesion";
                    }
                })
                
                });
            </script>

          <script>  
            $("#cerrarb").click(function(){
                swal.fire({
                title: 'Estas seguro?',
                text: "Se cerrar la sesión completa!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si'
                }).then((result) => {
                    if(result.value){
                     window.location = "php/cerrar_sesion";
                    }
                })
                
                });
            </script>

  </body>
</html>