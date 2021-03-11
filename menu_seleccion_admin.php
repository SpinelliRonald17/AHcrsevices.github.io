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
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Ahservices</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="assets/css/estilos_menu_seleccion.css">
        <link rel="shortcut icon" type="image/png" href="assets/imagenes/logoPestana.jpg" />
        <script src="sweetalert2.all.min.js"></script>

        <!-- Alertas -->
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://kit.fontawesome.com/b10f1efc78.js" crossorigin="anonymous"></script>

        <!-- Carrucel de img -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    
   <body>
        <header>
            <div class="header-content">
                <div class ="logo">
                    <img src="assets/imagenes/logoCajas.jpg" class="logo_menu" alt="logo menu">
                    <h1>AH <b>services</b></h1> 
                </div>

                <div class="menu" id="show-menu">

                    <nav>
                        <ul>
                            <div id="load_img">
                            <img class="img-responsive" title="usuario" src="<?php echo $row['logo_url'];?>" alt="Logo">
                            </div>  
                            <li><a href="#"class ="menu-seleted" title=""><i class="fas fa-registered"></i> Aplicación</a></li>
                            <li><a href="#"class ="menu-seleted"><i class="fas fa-phone-square-alt"></i> Contacto</a></li>
                            <li><a href="opciones_admin?id=<?php echo $row['id'];?>" class ="menu-seleted"><i class="fas fa-cog"></i> Opciones</a></li>
                            <li><a href="#" id="cerrar" class ="menu-seleted"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
                        </ul>
                    </nav>  

                </div> 

            </div>
                <!-- menu responsive -->
                <div id="icon-menu">
                    <i class="fas fa-bars"></i>
                </div>

        </header>
                <!--container-redes-sociales-->
                <div class="container-redes">
                    <a href="https://api.whatsapp.com/send?phone=573223903945&text=¿Qué servicios ofrecen?" target="_blank">
                        <img src="assets/icon/icon-whatsapp.png" title="Enviar mensaje de WhatsApp" alt=""> 
                    </a>
                </div>

                     
            <!-- portada -->
            <div class="container-all" id= "move-content">

            <div class="container-cover">
                 <div class="container-cover"> 
                        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="assets/imagenes/fondo1.jpg" alt="First slide" width="100%" height="500">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="assets/imagenes/fondo2.jpg" alt="Second slide" width="100%" height="500">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="assets/imagenes/fondo3.jpg" alt="Third slide" width="100%" height="500">
                            </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                            </a>
                        </div>
                 </div>
             </div>

                        <div class="container-conter">

                            <article>
                                <h1>Titulo del articulo</h1>

                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis adipisci numquam id ducimus, voluptates repellendus officiis, quaerat, tenetur quia repudiandae iure tempore enim repellat deleniti dicta debitis magni quam. Est! Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo illum ipsam dolore magnam minus. Nostrum ut reprehenderit sint eum quasi non porro, temporibus quis rem nisi minima, illum et quam.</p>

                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita consectetur, eos magni quis consequatur eaque optio molestiae sed doloribus ipsam aspernatur at voluptatum neque est ab id reprehenderit suscipit impedit! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est error recusandae tempore tempora. Beatae et explicabo ea repellat soluta, quas praesentium quis, hic ipsa, sequi fugit modi consequatur nobis corporis?</p>

                                <h1>Segundo titulo</h1>

                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis voluptates debitis vero magnam provident, nihil animi voluptate veniam ipsum sint quae officiis vitae voluptas, minima soluta distinctio. Ea, unde quisquam.</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae obcaecati rerum ab ipsam fugit tempora commodi recusandae ut eius? Dolorum, autem deserunt consectetur exercitationem at quaerat optio alias ullam quasi.</p>
                                
                                <img src="assets/imagenes/articulos1.jpg" alt="">

                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error ad voluptas hic molestiae modi. Temporibus enim quia fugit commodi repellat beatae, delectus vitae! Sint, labore? Sunt dolores doloremque vitae temporibus.</p>

                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Hic quasi, vero rerum unde temporibus architecto? Possimus, rerum hic ducimus nobis vel numquam sequi tenetur voluptatum eligendi debitis, a quos vitae.</p>

                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae maiores odio dolorum facere id, deserunt eum ea nihil optio officiis possimus eius impedit. Dicta natus in beatae nemo deleniti voluptas?
                                </p>
                            </article>

                            <div class="container-aside">
                                <aside>
                                    <img src="assets/imagenes/articulo1.jpg" alt="">
                                    <h2>Titulo de articulo</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis possimus, .</p>
                                    <a href="#"><button>Leer más...</button><a>
                                </aside>

                                <aside>
                                    <img src="assets/imagenes/articulo2.jpg" alt="">
                                    <h2>Titulo de articulo</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis possimus, .</p>
                                    <a href="#"><button>Leer más...</button><a>
                                </aside>

                                <aside>
                                    <img src="assets/imagenes/articulo3.jpg" alt="">
                                    <h2>Titulo de articulo</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis possimus, .</p>
                                    <a href="#"><button>Leer más...</button><a>
                                </aside>
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

            </div>

        <script src="assets/js/script-btn-menu.js"></script>
        <script src="assets/js/jquery-3.5.1.min.js"></script>

        
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