<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/BlogDao.php");
require_once($rootDir . "/int/dao/ComentarioDao.php");
require_once($rootDir . "/int/dao/UsuarioDao.php");
require_once($rootDir . "/int/dao/ProyectoDao.php");

$contenido = "null";
$cat2=0;

if(isset($_GET['contenido'])){
  $contenido = $_GET['contenido'];
  $blog = BlogDao::sqlCargar($contenido);
  if($blog != null){
    $titulo=$blog->getTitulo();
    $cat2=$blog->getCategoria();
  }
}

//INICIO Paginación

$TAMANO_PAGINA = 4;
//examino la página a mostrar y el inicio del registro a mostrar
$pagina = 1;
if (isset($_GET["pagina"])) {
   $inicio = 0;
   $pagina = $_GET["pagina"];
   $inicio = ($pagina - 1) * $TAMANO_PAGINA;
}
else {
   $inicio = ($pagina - 1) * $TAMANO_PAGINA;
}




//FIN Paginación
$ultimas = BlogDao::sqlTodoLimit(0,4);
$misRegistros = BlogDao::sqlTodoLimit($inicio,$TAMANO_PAGINA);
$num_total_registros = BlogDao::sqlContarTodo();
$cat = 0;
if(isset($_GET['cat'])){
  $cat = $_GET['cat'];
  
  if(BlogDao::sqlContar($cat) > 0){
    $misRegistros = BlogDao::sqlCategoria($cat,$inicio,$TAMANO_PAGINA);
    $num_total_registros = BlogDao::sqlContar($cat);
  }else{
  ?>
          <script>
            alert('No existen contenidos en esta categoría,\nvuelva a revisar nuevas publicaciones mas adelante.');
            window.location.href='noticias.php';
          </script>
        <?php
  }
}

//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
$url="noticias.php";

$proy = ProyectoDao::sqlTodoLimit(0,8);

?>

<!DOCTYPE html>

<html lang="es">

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title>Noticias - Softdirex</title>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-104472737-1', 'auto');
    ga('send', 'pageview');

  </script>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta name="description" content="Somos una empresa dedicada a ofrecer servicios informáticos: Sitios web, Aplicaciones web, Servicio técnico, Desarrollo de software etc. Revise nuestros servicios aquí.">
  <meta content="sitios web, aplicaciones web, desarrollo de software, programas para empresas, sistemas informaticos, programadores, desarrollo de aplicaciones, desarrollo de sitios web, paginas web, crear pagina web, comprar pagina web, crear un sitio web, crear sitio web, diseño de sitios web, diseño de aplicaciones, aplicaciones moviles, crear un programa, programa para empresas" name="keywords">
  <meta content="softdirex" name="author">

  <meta property="og:site_name" content="Softdirex">
  <meta property="og:title" content="Noticias">
  <meta property="og:description" content="Suscríbete para ser el primero en recibir nuevos contenidos.">
  <meta property="og:type" content="website">
  <meta property="og:image" content="https://www.softdirex.cl/imgMail/iphone_sdx.png"><!-- link to image for socio -->
  <meta property="og:url" content="https://softdirex.cl/noticias.php">

  <link rel="shortcut icon" href="favicon.ico">

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <!-- Fonts END -->

  <!-- Global styles START -->          
  <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  <link href="assets/pages/css/animate.css" rel="stylesheet">
  <link href="assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <link href="assets/plugins/owl.carousel/assets/owl.carousel.css" rel="stylesheet">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="assets/pages/css/components.css" rel="stylesheet">
  <link href="assets/pages/css/slider.css" rel="stylesheet">
  <link href="assets/corporate/css/style.css" rel="stylesheet">
  <link href="assets/corporate/css/style-responsive.css" rel="stylesheet">
  <link href="assets/corporate/css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="assets/corporate/css/custom.css" rel="stylesheet">
  <!-- Theme styles END -->
  <!-- JS Ventana -->
  <script src="/int/js/Ventana.js"></script>
  <!-- JS Ventana -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="corporate">
    <!-- BEGIN STYLE CUSTOMIZER -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-phone"></i><span>+569 9867 2957</span></li>
                        <li><i class="fa fa-envelope-o"></i><span>contacto@softdirex.cl</span></li>
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
                        <li><a href="entrar.php">Ingresar</a></li>
                        <li><a href="registro.php">Registrarse</a></li>
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>        
    </div>
    <!-- END TOP BAR -->
    <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <a class="site-logo" href="index.php"><img src="assets/corporate/img/logos/logo-softdirex.png" alt="Softdirex"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation pull-right font-transform-inherit">
          <ul>
            <li class="dropdown">
              <a href="index.php">
                Inicio 
                
              </a>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Servicios 
                
              </a>
                
              <ul class="dropdown-menu">
                <li><a href="sitios-web.html">Sitios web</a></li>
                <li><a href="servicio-tecnico.html">Servicio técnico</a></li>
                <li><a href="desarrollo-software.html">Desarrollo de software</a></li>
                <li><a href="aplicaciones-web.html">Aplicaciones web</a></li>
                <li><a href="certificado-digital.html">Certificado digital</a></li>
                <li><a href="social-media.html">Social media</a></li>
                <li><a href="asesoria.html">Asesoría</a></li>               
              </ul>
            </li>
            <li class="dropdown">
              <a href="portafolio.php">
                Portafolio 
                
              </a>
            </li>
            <li class="dropdown dropdown-megamenu">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Cliente
                
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="header-navigation-content">
                    <div class="row">
                      <div class="col-md-4 header-navigation-col">
                        <h4>Perfil</h4>
                        <ul>
                          <li><a href="misdatos.php">Datos personales</a></li>
                        </ul>
                      </div>
                      <div class="col-md-4 header-navigation-col">
                        <h4>Proyectos</h4>
                        <ul>
                          <li><a href="proyectos.php">Mis proyectos</a></li>
                          <li><a href="cuenta.php">Cuenta</a></li>
                        </ul>
                      </div>
                      <div class="col-md-4 header-navigation-col">
                        <h4>Acceso</h4>
                        <ul>
                          <li><a href="sesion.php">Mi sesión</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="compras.html">
                Compras 
                
              </a>
            </li>
            <li class="dropdown">
              <a href="faq.html">
                Preguntas frecuentes 
                
              </a>
            </li>
            <li class="dropdown active">
              <a href="noticias.php">
                Noticias 
                
              </a>
            </li>
            <li class="dropdown">
              <a href="page-about.html">
                Nosotros 
                
              </a>
            </li>
            <li class="dropdown">
              <a href="page-contacts.html">
                Contacto 
                
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Header END -->

    <!-- Inicio Contenido 1 ------------------------------------------------------------------------>
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Inicio</a></li>
            <?php 
            if(isset($titulo)){
            ?>
            <li><a href="noticias.php">Noticias</a></li>
            <li class="active"><?php echo $titulo; ?></li>
            <?php 
            }else{
            ?>
            <li class="active">Noticias</li>
            <?php 
            }
            ?>
        </ul>


      <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
        <div class="col-md-12 col-sm-12">
          <!-- Inicio Contenido principal   ------------------------------------------------>
          <div id="containerRight">
          <div class="col-md-9 col-sm-9 blog-posts">
            <div class="row">
                <!-- BEGIN LEFT SIDEBAR -->            
                <div class="col-md-11 col-sm-11 blog-posts">
                  <!-- Inicio noticia -->
                  <?php
                  foreach ($misRegistros as $fila) {
                  ?>
                  <div class="row">
                    <div class="col-md-4 col-sm-4">
                      <img class="img-responsive" alt="" src="<?php echo "../../../".$fila['blo_imagen']; ?>">
                    </div>
                    <div class="col-md-8 col-sm-8">
                      <h2><a href="noticias.php?contenido=<?php echo $fila['blo_link']; ?>"><?php echo $fila['blo_titulo'];?></a></h2>
                      <ul class="blog-info">
                        <li><i class="fa fa-calendar"></i> <?php echo $fila['blo_fecha'];?></li>
                        <li><i class="fa fa-comments"></i> <?php echo ComentarioDao::sqlContar($fila['blo_link']);?></li>
                        <li><i class="fa fa-comment"></i> <?php echo $fila['blo_autor'];?></li>
                      </ul>
                      <p><?php echo $fila['blo_cita'];?></p>
                      <a href="noticias.php?contenido=<?php echo $fila['blo_link']; ?>" class="more">Seguir leyendo... <i class="icon-angle-right"></i></a>
                    </div>
                  </div>
                  <hr class="blog-post-sep">
                  <?php
                  }
                  ?>
                  <!-- Fin noticia -->
                  <ul class="pagination">
                  <?php
                  if ($total_paginas > 1) {
                     if ($pagina != 1)
                        if($cat==0){
                          echo '<li><a href="'.$url.'?pagina='.($pagina-1).'">Anterior</a></li>';
                        }else{
                          echo '<li><a href="'.$url.'?pagina='.($pagina-1).'&cat='.$cat.'">Anterior</a></li>';
                        }
                        for ($i=1;$i<=$total_paginas;$i++) {
                           if ($pagina == $i)
                              //si muestro el índice de la página actual, no coloco enlace
                            if($cat==0){
                              echo '<li class="active"><a href="'.$url.'?pagina='.$pagina.'">'.$pagina.'</a></li>';
                            }else{
                              echo '<li class="active"><a href="'.$url.'?pagina='.$pagina.'&cat='.$cat.'">'.$pagina.'</a></li>';
                            }
                           else{
                              if($cat==0){
                              //si el índice no corresponde con la página mostrada actualmente,
                              //coloco el enlace para ir a esa página
                                echo '<li><a href="'.$url.'?pagina='.$i.'">'.$i.'</a></li>';
                              }else{
                                echo '<li><a href="'.$url.'?pagina='.$i.'&cat='.$cat.'">'.$i.'</a></li>';
                              }
                            }
                        }
                        if ($pagina != $total_paginas){
                          if($cat==0){
                            echo '<li><a href="'.$url.'?pagina='.($pagina+1).'">Siguiente</a></li>';
                          }else{
                            echo '<li><a href="'.$url.'?pagina='.($pagina+1).'&cat='.$cat.'">Siguiente</a></li>';
                          }
                         }
                  }
                  ?>
                  </ul>               
                </div>
                <!-- END LEFT SIDEBAR -->
              
                <!-- BEGIN RIGHT SIDEBAR -->            
                <div class="col-md-3 col-sm-3 blog-sidebar">
                  

                  
                  <!-- END BLOG TAGS -->
                </div>
                <!-- END RIGHT SIDEBAR -->            
              </div>
          </div>
        </div>
          <!-- Fin Contenido principal   ------------------------------------------------>
          <div class="col-md-3 col-sm-3 blog-sidebar">
            <div class="row">
              <!-- CATEGORIES START -->
                  <h2 class="no-top-space">Categorias</h2>
                  <ul class="nav sidebar-categories margin-bottom-40">
                    <?php if($cat==0 && $cat2==0){?>
                    <li class="active"><a href="noticias.php">Todas (<?php echo BlogDao::sqlContarTodo(); ?>)</a></li>
                    <?php }else{?>
                    <li><a href="noticias.php">Todas (<?php echo BlogDao::sqlContarTodo(); ?>)</a></li>
                    <?php }?>


                    <?php if($cat==1 || $cat2==1){?>
                    <li class="active"><a href="noticias.php?cat=1">Sitios web (<?php echo BlogDao::sqlContar(1); ?>)</a></li>
                    <?php }else{?>
                    <li><a href="noticias.php?cat=1">Sitios web (<?php echo BlogDao::sqlContar(1); ?>)</a></li>
                    <?php }?>


                    <?php if($cat==2 || $cat2==2){?>
                    <li class="active"><a href="noticias.php?cat=2">Sistemas (<?php echo BlogDao::sqlContar(2); ?>)</a></li>
                    <?php }else{?>
                    <li><a href="noticias.php?cat=2">Sistemas (<?php echo BlogDao::sqlContar(2); ?>)</a></li>
                    <?php }?>


                    <?php if($cat==3 || $cat2==3){?>
                    <li class="active"><a href="noticias.php?cat=3">Tecnología (<?php echo BlogDao::sqlContar(3); ?>)</a></li>
                    <?php }else{?>
                    <li><a href="noticias.php?cat=3">Tecnología (<?php echo BlogDao::sqlContar(3); ?>)</a></li>
                    <?php }?>
                    

                    <?php if($cat==4 || $cat2==4){?>
                    <li class="active"><a href="noticias.php?cat=4">Proyectos (<?php echo BlogDao::sqlContar(4); ?>)</a></li>
                    <?php }else{?>
                    <li><a href="noticias.php?cat=4">Proyectos (<?php echo BlogDao::sqlContar(4); ?>)</a></li>
                    <?php }?>
                    

                    <?php if($cat==5 || $cat2==5){?>
                    <li class="active"><a href="noticias.php?cat=5">Móviles (<?php echo BlogDao::sqlContar(5); ?>)</a></li>
                    <?php }else{?>
                    <li><a href="noticias.php?cat=5">Móviles (<?php echo BlogDao::sqlContar(5); ?>)</a></li>
                    <?php }?>
                    
                  </ul>
                  <!-- CATEGORIES END -->

                  <!-- BEGIN RECENT NEWS -->                            
                  <h2>Ultimas publicaciones</h2>
                  <div class="recent-news margin-bottom-10">
                    <?php
                    foreach ($ultimas as $temp) {
                    ?>
                    <div class="row margin-bottom-10">
                      <div class="col-md-3">
                        <img class="img-responsive" alt="" src="<?php echo "../../../".$temp['blo_imagen'] ?>">                        
                      </div>
                      <div class="col-md-9 recent-news-inner">
                        <h3><a href="noticias.php?contenido=<?php echo $temp['blo_link']; ?>"><?php echo $temp['blo_titulo'] ?></a></h3>
                        <p>Autor: <?php echo $temp['blo_autor'] ?></p>
                      </div>                        
                    </div>
                    <?php
                    }
                    ?>
                  </div>
                  <!-- END RECENT NEWS -->    
                  <!-- BEGIN BLOG TALKS -->
                  <div class="blog-talks margin-bottom-30">
                    <hr>
                    <h2><a href="servicios.html">Servicios Softdirex</a></h2>
                  </div>                            
                  <!-- END BLOG TALKS -->                        

                  <!-- BEGIN BLOG TALKS -->
                  <div class="blog-talks margin-bottom-30">
                    <h2>Características de nuestros servicios</h2>
                    <div class="tab-style-1">
                      <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1">Soporte</a></li>
                        <li><a data-toggle="tab" href="#tab-2">Chequeo</a></li>
                        <li><a data-toggle="tab" href="#tab-3">Control</a></li>
                      </ul>
                      <div class="tab-content">
                        <div id="tab-1" class="tab-pane row-fluid fade in active">
                          <p class="margin-bottom-10">Ayuda, capacitación y soporte inmediato para la mantención, supervisión y usabilidad de nuestros sistemas.</p>
                          <!--<p><a class="more" href="javascript:;">Read more</a></p>-->
                        </div>
                        <div id="tab-2" class="tab-pane fade">
                          <p>Nuestros clientes tienen toda la facultad de revisar y aprobar el avance de nuestros proyectos a través de nuestro sitio web.</p>
                        </div>
                        <div id="tab-3" class="tab-pane fade">
                          <p>Como proveedores resguardamos la seguridad de los datos y su correcto funcionamiento ofreciendo un manejo y control completo del sistema.</p>
                        </div>
                      </div>
                    </div>
                  </div>                            
                  <!-- END BLOG TALKS -->

                  <!-- BEGIN BLOG PHOTOS STREAM -->
                  <div class="blog-photo-stream margin-bottom-20">
                    <h2><a href="portafolio.php">Nuestro portafolio</a></h2>
                    <ul class="list-unstyled">
                      <?php
                      foreach ($proy as $value) {
                      ?>
                      <li><a href="<?php echo $value['proy_link'] ?>"><img alt="" src="<?php echo $value['proy_imagen'] ?>"></a></li>
                      <?php
                      }
                      ?>
                    </ul>                    
                  </div>
                  <!-- END BLOG PHOTOS STREAM -->

                  <!-- BEGIN BLOG TAGS 
                  <div class="blog-tags margin-bottom-20">
                    <h2>Tags</h2>
                    <ul>
                      <li><a href="javascript:;"><i class="fa fa-tags"></i>OS</a></li>
                      <li><a href="javascript:;"><i class="fa fa-tags"></i>Metronic</a></li>
                      <li><a href="javascript:;"><i class="fa fa-tags"></i>Dell</a></li>
                      <li><a href="javascript:;"><i class="fa fa-tags"></i>Conquer</a></li>
                      <li><a href="javascript:;"><i class="fa fa-tags"></i>MS</a></li>
                      <li><a href="javascript:;"><i class="fa fa-tags"></i>Google</a></li>
                      <li><a href="javascript:;"><i class="fa fa-tags"></i>Keenthemes</a></li>
                      <li><a href="javascript:;"><i class="fa fa-tags"></i>Twitter</a></li>
                    </ul>
                  </div>
                   END BLOG TAGS -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

        
    <!-- Fin Contenido 1 ------------------------------------------------------------------------>
    <!-- BEGIN PRE-FOOTER -->
    <div class="pre-footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN BOTTOM ABOUT BLOCK -->
          <div class="col-md-4 col-sm-6 pre-footer-col">
            <h2>Nosotros</h2>
            <p>Somos una empresa dedicada a ofrecer servicios informáticos para un mejor desarrollo de sus proyectos o negocios, ofrecemos recursos que aseguran una optimización tecnológica y acorde a sus necesidades.</p>

          </div>
          <!-- END BOTTOM ABOUT BLOCK -->

          <!-- BEGIN BOTTOM CONTACTS -->
          <div class="col-md-4 col-sm-6 pre-footer-col">
            <h2>Datos de contacto</h2>
            <address class="margin-bottom-40">
              Camino Uno Norte #130 - D Colonia Kennedy<br>
              Santiago, Chile<br>
              Celular: 9 9867 2957<br>
              Email: <a href="mailto:contacto@softdirex.cl">contacto@softdirex.cl</a><br>
              Skype: <a href="https://join.skype.com/BzouJnZA7VBn">Consultas Softdirex</a>
            </address>

            <div class="pre-footer-subscribe-box pre-footer-subscribe-box-vertical">
              <h2>Boletín</h2>
              <p>Subscribete a nuestro boletin y recibe noticias de nuestros servicios</p>
              <form action="subscribir.php" method="post">
                <div class="input-group">
                  <input type="text" placeholder="tuemail@mail.com" class="form-control" name="mail" id="mail" required="">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Subscribirse</button>
                  </span>
                </div>
              </form>
            </div>
          </div>
          <!-- END BOTTOM CONTACTS -->

          <!-- BEGIN TWITTER BLOCK --> 
          <div class="col-md-4 col-sm-6 pre-footer-col">
            <h2 class="margin-bottom-0">Ultimos Tweets</h2>
            <a class="twitter-timeline" data-lang="es" data-dnt="true" data-tweet-limit="2" data-theme="dark" data-link-color="#57C8EB" href="https://twitter.com/softdirex?ref_src=twsrc%5Etfw">Tweets by softdirex</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
          </div>
          <!-- END TWITTER BLOCK -->
        </div>
      </div>
    </div>
    <!-- END PRE-FOOTER -->

    <!-- BEGIN FOOTER -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN COPYRIGHT -->
          <div class="col-md-4 col-sm-4 padding-top-10">
            2017 © Softdirex. Todos los derechos reservados. <!--<a href="javascript:;">Privacy Policy</a> | <a href="javascript:;">Terms of Service</a>-->
          </div>
          <!-- END COPYRIGHT -->
          <!-- BEGIN PAYMENTS -->
          <div class="col-md-4 col-sm-4">
            <ul class="social-footer list-unstyled list-inline pull-right">
              <li><a href="http://fb.me/Softdirex" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://www.linkedin.com/company-beta/25005966/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="https://twitter.com/softdirex" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://join.skype.com/BzouJnZA7VBn" target="_blank"><i class="fa fa-skype"></i></a></li>
              <li><a href="https://www.youtube.com/channel/UC-yzBUF_mKFUgQCEp5wmadg" target="_blank"><i class="fa fa-youtube"></i></a></li>
            </ul> 
          </div>
          <!-- END PAYMENTS -->
          <!-- BEGIN POWERED -->
          <!-- END POWERED -->
        </div>
      </div>
    </div>
    <!-- END FOOTER -->

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>
    <![endif]--> 
    <script src="assets/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <script src="assets/corporate/scripts/back-to-top.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="assets/plugins/owl.carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->

    <script src="assets/corporate/scripts/layout.js" type="text/javascript"></script>
    <script src="assets/pages/scripts/bs-carousel.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            Layout.initTwitter();
            //Layout.initFixHeaderWithPreHeader(); /* Switch On Header Fixing (only if you have pre-header) */
            //Layout.initNavScrolling(); 
        });
    </script>
<?php
  if($contenido != "null" && $contenido != ""){
?>
    <script>
        ventana.showHTML('containerRight','<?php echo $contenido; ?>');
    </script>
<?php
 }
?>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>