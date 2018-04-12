<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/ProyectoDao.php");

$link= $_SERVER["REQUEST_URI"];

$proy=ProyectoDao::sqlCargar($link);
$proyectos=ProyectoDao::sqlTodo();
?>
<!DOCTYPE html>

<html lang="es">

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title><?php echo $proy->getNombre();?> - Softdirex</title>
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

  <meta name="description" content="OptiData es una aplicación de escritorio utilizado para registrar recetas de lentes y datos de clientes en las ópticas, tiene la capacidad tanto de imprimir el comprobante para el cliente como de enviarlo por correo, envía reporte de recetas efectuadas y obtiene reportes de clientes." name="keywords">
  <meta content="softdirex" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="OptiData 3">
  <meta property="og:description" content="OptiData es una aplicación de escritorio utilizado para registrar recetas de lentes y datos de clientes en las ópticas, tiene la capacidad tanto de imprimir el comprobante para el cliente como de enviarlo por correo, envía reporte de recetas efectuadas y obtiene reportes de clientes.">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="https://softdirex.cl/portafolio/optidata3.php">

  <link rel="shortcut icon" href="../favicon.ico">

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <!-- Fonts END -->

  <!-- Global styles START -->          
  <link href="../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  <link href="../assets/pages/css/animate.css" rel="stylesheet">
  <link href="../assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <link href="../assets/plugins/owl.carousel/assets/owl.carousel.css" rel="stylesheet">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="../assets/pages/css/components.css" rel="stylesheet">
  <link href="../assets/pages/css/slider.css" rel="stylesheet">
  <link href="../assets/corporate/css/style.css" rel="stylesheet">
  <link href="../assets/corporate/css/style-responsive.css" rel="stylesheet">
  <link href="../assets/corporate/css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="../assets/corporate/css/custom.css" rel="stylesheet">
  <!-- Theme styles END -->
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
                        <li><a href="../entrar.php">Ingresar</a></li>
                        <li><a href="../registro.php">Registrarse</a></li>
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
        <a class="site-logo" href="../index.php"><img src="../assets/corporate/img/logos/logo-softdirex.png" alt="Softdirex"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation pull-right font-transform-inherit">
          <ul>
            <li class="dropdown">
              <a href="../index.php">
                Inicio 
                
              </a>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Servicios 
                
              </a>
                
              <ul class="dropdown-menu">
                <li><a href="../sitios-web.html">Sitios web</a></li>
                <li><a href="../servicio-tecnico.html">Servicio técnico</a></li>
                <li><a href="../desarrollo-software.html">Desarrollo de software</a></li>
                <li><a href="../aplicaciones-web.html">Aplicaciones web</a></li>
                <li><a href="../certificado-digital.html">Certificado digital</a></li>
                <li><a href="../social-media.html">Social media</a></li>
                <li><a href="../asesoria.html">Asesoría</a></li>               
              </ul>
            </li>
            <li class="dropdown active">
              <a href="../portafolio.php">
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
                          <li><a href="../misdatos.php">Datos personales</a></li>
                        </ul>
                      </div>
                      <div class="col-md-4 header-navigation-col">
                        <h4>Proyectos</h4>
                        <ul>
                          <li><a href="../proyectos.php">Mis proyectos</a></li>
                          <li><a href="../cuenta.php">Cuenta</a></li>
                        </ul>
                      </div>
                      <div class="col-md-4 header-navigation-col">
                        <h4>Acceso</h4>
                        <ul>
                          <li><a href="../sesion.php">Mi sesión</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="../compras.html">
                Compras 
                
              </a>
            </li>
            <li class="dropdown">
              <a href="../faq.html">
                Preguntas frecuentes 
                
              </a>
            </li>
            <li class="dropdown">
              <a href="../noticias.php">
                Noticias 
                
              </a>
            </li>
            <li class="dropdown">
              <a href="../page-about.html">
                Nosotros 
                
              </a>
            </li>
            <li class="dropdown">
              <a href="../page-contacts.html">
                Contacto 
                
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Header END -->

    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="../portafolio.php">Portafolio</a></li>
            <li class="active">Proyecto</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1><?php echo $proy->getNombre();?></h1>
            <div class="content-page">
              <div class="row margin-bottom-30">
                <!-- BEGIN CAROUSEL -->            
                <div class="col-md-5 front-carousel">

                  <div class="carousel slide" id="myCarousel">
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                      <div class="item">
                        <img alt="" src="<?php echo "../".$proy->getImagen();?>">
                        <div class="carousel-caption">
                          <p>Pantalla principal de acceso.</p>
                        </div>
                      </div>
                      <div class="item">
                        <img alt="" src="../assets/pages/img/works/img10.jpg">
                        <div class="carousel-caption">
                          <p>Reporte de ventas por usuario.</p>
                        </div>
                      </div>
                      <div class="item">
                        <img alt="" src="../assets/pages/img/works/img11.jpg">
                        <div class="carousel-caption">
                          <p>Gestión de acceso a usuarios.</p>
                        </div>
                      </div>
                      <div class="item">
                        <img alt="" src="../assets/pages/img/works/img5.jpg">
                        <div class="carousel-caption">
                          <p>En esta ventana se listan las recetas registradas en el sistema.</p>
                        </div>
                      </div>
                      <div class="item">
                        <img alt="" src="../assets/pages/img/works/img6.jpg">
                        <div class="carousel-caption">
                          <p>Sólo el administrador de inventario tiene acceso con una clave de seguridad.</p>
                        </div>
                      </div>
                      <div class="item active">
                        <img alt="" src="../assets/pages/img/works/img7.jpg">
                        <div class="carousel-caption">
                          <p>Sistema centralizado en un solo computador al cual se pueden conectar los equipos que sean necesarios.</p>
                        </div>
                      </div>
                      <div class="item">
                        <img alt="" src="../assets/pages/img/works/img8.jpg">
                        <div class="carousel-caption">
                          <p>Optidata es el sistema para tu óptica.</p>
                        </div>
                      </div>
                    </div>
                    <!-- Carousel nav -->
                    <a data-slide="prev" href="#myCarousel" class="carousel-control left">
                      <i class="fa fa-angle-left"></i>
                    </a>
                    <a data-slide="next" href="#myCarousel" class="carousel-control right">
                      <i class="fa fa-angle-right"></i>
                    </a>
                  </div> 
                  <hr>
                  <div align="center"><iframe width="450" height="350" src="https://www.youtube.com/embed/iQMCxvHbnTw" frameborder="0" allowfullscreen></iframe></div>              
                </div>
                <!-- END CAROUSEL -->                             

                <!-- BEGIN PORTFOLIO DESCRIPTION -->            
                <div class="col-md-7">
                  <h2>Control de acceso</h2>

                  <p>Esta nueva versión ofrece la posibilidad de registrar nuevos usuarios para llevar un control de ventas por cada miembro de tu óptica registrado en el sistema.</p>

                  <h2>Sistema para opticas</h2>

                  <p>OptiData es una aplicación de escritorio utilizado para registrar recetas de lentes y datos de clientes en las ópticas, tiene la capacidad tanto de imprimir el comprobante para el cliente como de enviarlo por correo, envía reporte de recetas efectuadas y obtiene reportes de ventas por periodo, actualmente se encuentra disponible la tercera versión del sistema.</p>

                  <h2>Adaptable</h2>
                  <p>El sistema admite más de un equipo conectado a la misma base de datos, admite sistemas operativos como Windows, Linux y Mac, no requiere internet y es de fácil adaptabilidad por parte del usuario final, genera reportes en Excel de datos de clientes morosos, ordenes de compras e inventario general, entre otras características.</p>

                  <h2>Dinámico</h2>
                  <p>El software se encarga de contener toda la información en una base de datos que además puede ser respaldada por el usuario, en él se almacena la información de los clientes, las recetas, y los abonos efectuados, todo esto de forma dinámica y de fácil acceso para generar reportes y enviar correos a los clientes con mucha facilidad.</p>


                  
                  <br>
                  <div class="row front-lists-v2 margin-bottom-15">
                    <div class="col-md-6">
                      <ul class="list-unstyled">
                        <li><i class="fa fa-check"></i> Registro de clientes</li>
                        <li><i class="fa fa-check"></i> Registro de usuarios</li>
                        <li><i class="fa fa-check"></i> Registro de recetas</li>
                        <li><i class="fa fa-check"></i> Impresión de recetas y comprobantes</li>
                        <li><i class="fa fa-check"></i> Reportes de ventas por usuarios</li>
                      </ul>
                    </div>
                    <div class="col-md-6">
                      <ul class="list-unstyled">
                        <li><i class="fa fa-check"></i> Registro de abonos</li>
                        <li><i class="fa fa-check"></i> Registro de inventario</li>
                        <li><i class="fa fa-check"></i> Genera orden de compras en Excel</li>
                        <li><i class="fa fa-check"></i> Envío de comprobantes por correo</li>
                        <li><i class="fa fa-check"></i> Reportes por correo</li>
                      </ul>
                    </div>
                  </div>
                  <h2>Desglose del proyecto</h2>
                    <div id="accordion1" class="panel-group">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_1">
                                    Situación actual 
                                    </a>
                                </h4>
                            </div>
                            <div style="height: 0px;" id="accordion1_1" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p class="lead">Actualmente existen ópticas que realizan eventos a instituciones, comunidades o empresas sin tener un manejo claro de los datos registrados ya que los talonarios utilizados son difíciles de manipular para obtener su información contenida. 
                                    </p>
                                    <p class="lead">Los talonarios contienen la receta del oftalmólogo, el comprobante que se entrega al cliente y el registro de algún abono por el servicio según la óptica que los utiliza.</p>


                                </div>
                            </div>
                        </div>   
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_3">
                                    Solución
                                    </a>
                                </h4>
                            </div>
                            <div style="height: 0px;" id="accordion1_3" class="panel-collapse collapse">
                                 <div class="panel-body">
                                    <p class="lead">Optidata es una aplicación de escritorio diseñada para las ópticas en donde se podrá llevar un registro exacto de las recetas, clientes armazones etc.</p>
                                    <p class="lead">Esta aplicación se conecta a una base de datos local en donde los distintos equipos podrán conectarse sin la necesidad de una conexión a internet trabajando simultáneamente evitando el duplicado de la información.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_4">
                                    Comprobantes
                                    </a>
                                </h4>
                            </div>
                            <div style="height: 0px;" id="accordion1_4" class="panel-collapse collapse">
                                 <div class="panel-body">
                                    <p class="lead">Las recetas se imprimen una vez generada por el sistema junto con el comprobante del cliente, además, se envía una copia del comprobante al email registrado de cada cliente.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_5">
                                    Reportes
                                    </a>
                                </h4>
                            </div>
                            <div style="height: 0px;" id="accordion1_5" class="panel-collapse collapse">
                                 <div class="panel-body">
                                    <p class="lead">El sistema envía reportes por fecha al email del administrador en donde se contiene la información de la cantidad de lentes comprados junto con el total de ventas por vendedor y abonos registrados.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_6">
                                    Registros
                                    </a>
                                </h4>
                            </div>
                            <div style="height: 0px;" id="accordion1_6" class="panel-collapse collapse">
                                 <div class="panel-body">
                                    <p class="lead">Se pueden registrar usuarios, clientes, recetas, instituciones, descuentos, etc., se administran los abonos de cada cliente y se registran los despachos junto con los datos del responsable. La información es validada por el sistema para que cada registro ingresado sea correcto y real.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_7">
                                    Versión actual y requisitos mínimos
                                    </a>
                                </h4>
                            </div>
                            <div style="height: 0px;" id="accordion1_7" class="panel-collapse collapse">
                                 <div class="panel-body">
                                    <p class="lead">Versión 3.1.7</p>
                                </div>
                                <div class="panel-body">
                                    <p class="lead">Requisitos mínimos del sistema</p>
                                    <ul>
                                      <li>Sistema operativo: Windows 7 o superior, Linux o Mac OS</li>
                                      <li>Procesador: 1 Ghz o más</li>
                                      <li>RAM: 1 GB</li>
                                      <li>Almacenamiento en disco duro: 1 GB</li>
                                      <li>Resolución de pantalla: 1024x768</li>
                                      <li>Conexión a internet: Necesaria solo para enviar reportes</li>
                                      <li>Conexión local: Puerto LAN para más de un equipo conectado al sistema</li>
                                      <li>Componentes adicionales: Wamp Server solo en el servidor, Java instalado</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_8">
                                    Progreso
                                    </a>
                                </h4>
                            </div>
                            <div style="height: 0px;" id="accordion1_8" class="panel-collapse collapse">
                                 <div class="panel-body">
                                    
                                    <span>Porcentaje de progreso: 100%</span>
                                    <div class="progress">
                                      <div role="progressbar" class="progress-bar" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
                <!-- END PORTFOLIO DESCRIPTION -->            
              </div>

              <div class="row quote-v1 margin-bottom-30">
                <div class="col-md-5 quote-v1-inner">
                  <span>Me interesa y quiero cotizar  </span>
                </div>
                <div class="col-md-7 quote-v1-inner text-right">
                  <a href="../page-contacts.html" class="btn-transparent"><i class="fa fa-rocket margin-right-10"></i>Contactar</a>
                </div>
              </div>

        <!-- BEGIN RECENT WORKS -->
        <div class="row recent-work margin-bottom-40">
          <div class="col-md-3">
            <h2><a href="portafolio.html">Trabajos recientes</a></h2>
            <p>Aquí encontrarán detalle de nuestros ultimos trabajos en desarrollo, además, nuestros clientes podrán verificar los avances de sus proyectos.</p>
          </div>
          <div class="col-md-9">
            <div class="owl-carousel owl-carousel3">
              <?php
              foreach ($proyectos as $fila) {
              ?>
              <div class="recent-work-item">
                <em>
                  <img src="<?php echo "../".$fila['proy_imagen'] ?>" alt="Amazing Project" class="img-responsive">
                  <a href="<?php echo $fila['proy_link'] ?>"><i class="fa fa-link"></i></a>
                  <a href="<?php echo "../".$fila['proy_imagen'] ?>" class="fancybox-button" title="<?php echo $fila['proy_nombre'] ?>" data-rel="fancybox-button"><i class="fa fa-search"></i></a>
                </em>
                <a class="recent-work-description" href="javascript:;">
                  <strong><?php echo $fila['proy_nombre'] ?></strong>
                  <?php
                  if($fila['proy_categoria']==1){
                  ?>
                  <b>Sitios web</b>
                  <?php 
                  }else if($fila['proy_categoria']==2){
                  ?>
                  <b>Aplicaciones web</b>
                  <?php 
                  }else if($fila['proy_categoria']==3){
                  ?>
                  <b>Aplicaciones de escritorio</b>
                  <?php 
                  }else if($fila['proy_categoria']==4){
                  ?>
                  <b>Diseño gráfico</b>
                  <?php 
                  }else{
                  ?>
                  <b>Revise nuestro portafolio</b>
                  <?php 
                  }
                  ?>
                </a>
              </div>
              <?php
              }
              ?>
            </div>       
          </div>
        </div>   
        <!-- END RECENT WORKS -->

            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- BEGIN SIDEBAR & CONTENT -->
      </div>
    </div>

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
              <p>Subscribete a nuestro boletin y recibe noticias de nuestros servicios,</p>
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
    <script src="../assets/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="../assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="../assets/plugins/owl.carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->

    <script src="../assets/corporate/scripts/layout.js" type="text/javascript"></script>
    <script src="../assets/pages/scripts/bs-carousel.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            Layout.initTwitter();
            //Layout.initFixHeaderWithPreHeader(); /* Switch On Header Fixing (only if you have pre-header) */
            //Layout.initNavScrolling(); 
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>