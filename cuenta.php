
<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/UsuarioDao.php");
require_once($rootDir . "/int/dao/ProyectoDao.php");
session_start();//carga la sesion
if(!$_SESSION){
?>
<script>
  alert('Acceso denegado: Debes iniciar sesión primero.');
window.location.href='entrar.php';
</script>
<?php
}

$usuario1 = UsuarioDao::sqlCargar($_SESSION['usuario']->getRut());

$pagados=0;
$pendientes=0;
$deudas=0;
                    
$misRegistros1=ProyectoDao::sqlPagados($usuario1->getRut());
$misRegistros2=ProyectoDao::sqlPendientes($usuario1->getRut());
$misRegistros3=ProyectoDao::sqlCobrados($usuario1->getRut());






?>
<!DOCTYPE html>
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title>Mis cuentas - Softdirex</title>
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
  <meta name="description" content="Softdirex puede ayudar a los empresarios a administrar las redes sociales, crear contenidos en sus sitios web (incluye redes sociales, blogs, foros, marcadores, geolocalización, etc.).">
  <meta content="medios sociales, administracion de redes sociales, redes sociales para empresas, crear un blog para sitio web, contenidos sociales, conocer la opinion de mis clientes" name="keywords">
  <meta content="softdirex" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="favicon.ico">

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <!-- Fonts END -->

  <!-- Global styles START -->          
  <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  <link href="assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="assets/pages/css/components.css" rel="stylesheet">
  <link href="assets/corporate/css/style.css" rel="stylesheet">
  <link href="assets/pages/css/portfolio.css" rel="stylesheet">
  <link href="assets/corporate/css/style-responsive.css" rel="stylesheet">
  <link href="assets/corporate/css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="assets/corporate/css/custom.css" rel="stylesheet">
  <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="corporate">

    <!-- BEGIN TOP BAR -->
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
                        <li ><a href=""><?php echo $usuario1->getNombre() ?></a></li>
                        <li><form action="int/fn/cerrar.php">
                     <button type="submit" class="btn btn-primary">Cerrar sesión</button>
                    </form></li>
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
        <a class="site-logo" href="index.php"><img src="assets/corporate/img/logos/logo-softdirex.png" alt="Metronic FrontEnd"></a>

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
            <li class="dropdown active dropdown-megamenu">
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
                          <li class="active"><a href="cuenta.php">Cuenta</a></li>
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
            <li class="dropdown">
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
        <!-- END NAVIGATION -->
      </div>
    </div>
    <!-- Header END -->

    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Inicio</a></li>
            <li class="active">Mis cuentas</li>
        </ul>
        <!-- BEGIN CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Mis cuentas</h1>
            <div class="content-page">
              <div class="row margin-bottom-40">
                <!-- Pricing -->
                <div class="col-md-4">
                  <div class="pricing hover-effect">
                    <div class="pricing-head">
                      <h3>Servicios pagados
                      <span>
                         Detalle de servicios cancelados
                      </span>
                      </h3>
                    </div>
                    <ul class="pricing-content list-unstyled">
                    <?php
                      foreach ($misRegistros1 as $fila) {
                        $pagados = $pagados + $fila['proy_monto'];
                        if(strcmp($fila['proy_factura'], "null") === 0){
                    ?>
                      <li>
                        <form action="int/fn/solicitarFactura.php" method="post">
                          <input type="hidden" name="link" id="link" value="<?php echo $fila['proy_link'] ?>">
                          <button class="btn btn-default" type="submit" title="Solicitar factura"><i class="fa fa-mail-forward"></i></button>&nbsp;&nbsp;&nbsp;<?php echo $fila['proy_nombre']." | $".number_format($fila['proy_monto']);?>
                        </form>
                      </li>
                    <?php
                        }else{
                    ?>
                        
                      <li>
                        <form action="int/fn/enviarFactura.php" method="post">
                          <input type="hidden" name="link" id="link" value="<?php echo $fila['proy_link'] ?>">
                          <input type="hidden" name="mail" id="mail" value="<?php echo $usuario1->getMail() ?>">
                          <button class="btn btn-default" type="submit" title="Enviar factura a mi correo electrónico"><i class="fa fa-envelope"></i></button><a class="btn btn-default" href="<?php echo $fila['proy_factura'] ?>" title="Descargar factura"><i class="fa fa-download"></i></a>&nbsp;&nbsp;&nbsp;<?php echo $fila['proy_nombre']." | $".number_format($fila['proy_monto']);?>
                        </form>

                        
                      </li>
                    <?php
                        }
                      }
                    ?>
                    </ul>
                    <div class="pricing-head">
                      <h4><i>Total $</i><i><?php echo number_format($pagados); ?></i>
                      </h4>
                    </div>
                    <div class="pricing-footer">
                      <p>
                         Recuerde que tiene soporte técnico remoto gratuito, te atenderemos de inmediato.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="pricing hover-effect">
                    <div class="pricing-head">
                      <h3>Servicios pendientes
                      <span>
                         Trabajos en desarrollo, sin cobrar
                      </span>
                      </h3>
                    </div>
                    <ul class="pricing-content list-unstyled">
                    <?php
                      foreach ($misRegistros2 as $fila) {
                        $pendientes = $pendientes + $fila['proy_saldo'];
                    ?>
                      <li>
                        <i class="fa fa-spinner"></i><?php echo $fila['proy_nombre']." | $".number_format($fila['proy_saldo']);?>
                      </li>
                    <?php
                      }
                    ?>
                    </ul>
                    <div class="pricing-head">
                      <h4><i>Total $</i><i><?php echo number_format($pendientes); ?></i>
                      </h4>
                    </div>
                    <div class="pricing-footer">
                      <p>
                         Revise nuestro portafolio para ver los avances de tus proyectos.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="pricing pricing-active hover-effect">
                    <div class="pricing-head pricing-head-active">
                      <h3>Monto a cancelar
                      <span>
                         Servicios finalizados
                      </span>
                      </h3>
                    </div>
                    <ul class="pricing-content list-unstyled">
                    <?php
                      foreach ($misRegistros3 as $fila) {
                        $deudas = $deudas + $fila['proy_saldo'];
                    ?>
                      <li>
                        <i class="fa fa-shopping-cart"></i><?php echo $fila['proy_nombre']." | $".number_format($fila['proy_saldo']);?>
                      </li>
                    <?php
                      }
                    ?>
                    </ul>
                    <div class="pricing-head pricing-head-active">
                      <h4><i>Total $</i><i><?php echo number_format($deudas); ?></i>
                      <span>
                      </span>
                      </h4>
                    </div>
                    <div class="pricing-footer">
                      <p>
                         <strong>Identificación del pago:</strong> Nombre de los servicios por pagar que aparecen en esta lista.
                      </p>
                      <?php if($deudas > 0){ ?>
                      <a href="https://www.webpay.cl/portalpagodirecto/pages/institucion.jsf?idEstablecimiento=29425293" onclick="alert('Importante: Presione el botón PAGAR y rellene el formulario que aparecerá a continuación, en Identificación del pago ingrese el NOMBRE DEL SERVICIO que desea pagar y complete el resto de datos con su información personal.')" class="btn btn-primary" target="_blank">
                         Realizar pago online <i class="m-icon-swapright m-icon-white"></i>
                      </a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <!--//End Pricing -->
              </div>
            </div>
          </div>
        </div>
        <!-- END CONTENT -->
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
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>