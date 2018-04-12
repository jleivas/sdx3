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
  <title><?php echo $proy->getNombre(); ?> - Softdirex</title>
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

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

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
                          <p>Reportes en la página principal del sistema.</p>
                        </div>
                      </div>
                      <div class="item active">
                        <img alt="" src="../assets/pages/img/works/vpa2.jpg">
                        <div class="carousel-caption">
                          <p>Registro de equipas junto con sus mantenciones efectuadas.</p>
                        </div>
                      </div>
                      <div class="item">
                        <img alt="" src="../assets/pages/img/works/vpa3.jpg">
                        <div class="carousel-caption">
                          <p>Editar, modificar o crear protocolos de mantención de equipos.</p>
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
                  <div align="center"><iframe src="http://visionperforaciones.com/cl/index.html" width=450 height=350 frameborder=1 scrolling=auto></iframe></div>              
                </div>
                <!-- END CAROUSEL -->                             

                <!-- BEGIN PORTFOLIO DESCRIPTION -->            
                <div class="col-md-7">
                  <h2>Sitio web de Visión Perforaciones</h2>

                  <p>Visión Perforaciones es una empresa de perforaciones enfocada en entregar servicios a la industria minera.
                  </p>
                  <p>Se construyó una aplicación web para llevar un registro ordenado de reportes por cada turno hecho en terreno.</p>
                  <p>Los registros de cada informe deben ir siendo actualizados manualmente por el personal registrado, por lo tanto se mantiene con información al día para entregar el detalle de los reportes de cada miembro de forma dinámica.</p>
                  
                  <br>
                  <div class="row front-lists-v2 margin-bottom-15">
                    <div class="col-md-6">
                      <ul class="list-unstyled">
                        <li><i class="fa fa-check"></i> Información 100% respaldada</li>
                        <li><i class="fa fa-check"></i> Diseño de logo e imágenes</li>
                        <li><i class="fa fa-check"></i> Actualizaciones de datos todos los meses</li>
                      </ul>
                    </div>
                    <div class="col-md-6">
                      <ul class="list-unstyled">
                        <li><i class="fa fa-check"></i> Administración completa</li>
                        <li><i class="fa fa-check"></i> Soporte remoto gratis por un año</li>
                        <li><i class="fa fa-check"></i> No requiere visitas técnicas</li>
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
                                    <p class="lead">Visión Perforaciones, actualmente está en un crecimiento progresivo en el que los documentos Excel ya no son suficientes para almacenar toda la información. En estos documentos Excel se almacenan grandes listas de materiales o productos, listas de clientes y empleado, generalmente se traspapelan y ya son imposibles de administrar, no existe algún sistema que realice los recordatorios de actividades a realizar, ya sean: mantenciones, bajo stock o pagos pendientes, además, hay documentos privados de la empresa que quedan expuestos al ser enviados a terreno de forma física sin poder contralar a las personas que hacen uso de estos. Los dueños de esta empresa han visto la necesidad de implementar un sistema informático que solucione sus problemas de administración y privacidad de la empresa, éste sistema debe cumplir distintas funcionalidades en distintas áreas de la empresa, pero toda la información debe estar conectada a un solo servidor, debe además, ser accesible desde cualquier lugar, y en cuanto a la seguridad, se deben crear distintas sesiones para cada usuario, cada una de ellas limitadas según el tipo de usuario.</p>


                                </div>
                            </div>
                        </div>         
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_2">
                                    Problema y necesidad
                                    </a>
                                </h4>
                            </div>
                            <div id="accordion1_2" class="panel-collapse collapse">
                                 <div class="panel-body">
                                    <p class="lead">Al trabajar con la herramienta de Microsoft, si bien, se registra toda la información necesaria, no es un software personalizado para satisfacer todas las necesidades de gestión que una empresa necesita, esta información generalmente se duplica, en ocasiones se pierde y al tener un exceso de información no existe un orden, esto provoca que la información no sea muy accesible, al implementar un servidor web la información estará segura en un lugar de la nube, si se pierde un equipo la información no se perderá. Por otra parte, surgió la necesidad de limitar el acceso a la información o documentación de la empresa y llevar un control de los empleados de esta. En una empresa que ha crecido y es importante llevar un registro de todos los movimientos, no es eficiente utilizar una herramienta que no sea personalizada según la necesidad de la empresa, sino que se ha visto la necesidad de crear un software a la medida que mantenga un soporte periódico para mantenerlo funcional.</p>
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
                                    <p class="lead">En esta solución, se explica a grandes rasgos el sistema a implementar. El sistema informático de acuerdo a las necesidades antes mencionadas, debe restringir el acceso con un nombre de usuario y una contraseña, una vez dentro, el usuario tendrá limitaciones según el tipo de usuario que éste sea, puede ser supervisor, mecánico, administrador o súper administrador, cada uno de ellos podrá realizar distintas funciones dentro del sistema, pero no todos entraran a la parte administrativa de éste. El supervisor, podrá conectarse al sistema y realizar reportes digitales en terreno, los que quedaran almacenados en un servidor web al que tendrán acceso los administradores para corroborar su correcta ejecución. Por otra parte, el mecánico, al acceder al sistema tendrá una lista ordenada de operaciones a realizar, en las que él podrá seleccionar las actividades realizadas, se llevara un control de sus horas trabajadas, equipos a los que se les ha hecho mantención, notificaciones de los que faltan y toda la información necesaria de este empleado. En el sistema se podrá llevar un control de inventario, en el que se agregaran productos, modificaran y bloquearan según sea necesario, el sistema se encargara de descontar y avisar cuando un producto se encuentra bajo stock. Es importante destacar que en esta primera etapa del proyecto se está abarcando la supervisión, mantención e inventario, que son distintas áreas de la empresa.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_4">
                                    Progreso
                                    </a>
                                </h4>
                            </div>
                            <div style="height: 0px;" id="accordion1_4" class="panel-collapse collapse">
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
                  <a href="http://visionperforaciones.com/cl/index.html" target="_blank" class="btn-transparent"><i class="fa fa-desktop margin-right-10"></i>Ver Página</a><a href="../aplicaciones-web.html" class="btn-transparent"><i class="fa fa-desktop margin-right-10"></i>Aplicaciones web</a><a href="../page-contacts.html" class="btn-transparent"><i class="fa fa-rocket margin-right-10"></i>Contactar</a>
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