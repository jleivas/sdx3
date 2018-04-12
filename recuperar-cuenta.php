<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/UsuarioDao.php");

$rut="";
$nombre="";
$mail="";
if(isset($_POST['rut'])){
$rut=$_POST['rut'];
$nombre=$_POST['nombre'];
$mail=$_POST['mail'];

$usuario1 = UsuarioDao::sqlCargar($rut);
if($usuario1 == null){
  ?>
            <script>
              alert('Ha ocurrido un error al enviar la solicitud, porfavor intente mas tarde...');
              window.location.href='entrar.php';
            </script>
  <?php
}

if (strcmp($usuario1->getNombre(), $nombre) === 0 && strcmp($usuario1->getMail(), $mail) === 0){
  ?>
            <script>
              alert('<?php echo $usuario1->getNombre(); ?>,para finalizar la recuperación de su cuenta\ndeberá crear una nueva contraseña.');
            </script>
  <?php

}else{
  ?>
            <script>
              alert('Ha ocurrido un error al enviar la solicitud, porfavor intente mas tarde...');
              window.location.href='entrar.php';
            </script>
  <?php
}

?>
<!DOCTYPE html>

<html lang="es">

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title>Recuperar cuenta - Softdirex</title>
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

  <meta name="description" content="Softdirex ofrece sitios web profesionales para tu empresa u organización al mejor precio y con la mejor atención.">
  <meta content="certificado digital, facturacion electronica, comprar certificado digital, servicio de impuestos internos, facturación gratuita, como facturar, crear facturas online" name="keywords">
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
                        <li ><a href="entrar.php">Ingresar</a></li>
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
      </div>
    </div>
    <!-- Header END -->

    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Inicio</a></li>
            <li class="active">Ingresar</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-3">
            <ul class="list-group margin-bottom-25 sidebar-menu">
              <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Actualiza tus datos</a></li>
              <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Revisa tus proyectos</a></li>
              <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Realiza pagos online</a></li>
            </ul>
          </div>
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-9">
            <h1>Cambiar contraseña</h1>
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-7 col-sm-7">
                  <form action="int/fn/recuperar-cuenta.php" class="form-horizontal form-without-legend" role="form" method="post">
                    <div class="form-group">
                      <label for="password" class="col-lg-4 control-label">Nueva contraseña <span class="require">*</span></label>
                      <div class="col-lg-8">
                        <input type="password" class="form-control" id="pass1" name="pass1" required="">
                        <input type="hidden" class="form-control" id="rut" name="rut" required="" value="<?php echo $rut; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password" class="col-lg-4 control-label">Repita contraseña <span class="require">*</span></label>
                      <div class="col-lg-8">
                        <input type="password" class="form-control" id="pass2" name="pass2" required="">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                        <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-10 padding-right-30">
                        <hr>
                        <div class="login-socio">
                            <p class="text-muted">Síguenos:</p>
                            <ul class="social-icons">
                                <li><a href="http://fb.me/Softdirex" target="_blank" data-original-title="facebook" class="facebook" title="facebook"></a></li>
                                <li><a href="https://twitter.com/softdirex" target="_blank" data-original-title="Twitter" class="twitter" title="Twitter"></a></li>
                                <li><a href="https://www.youtube.com/channel/UC-yzBUF_mKFUgQCEp5wmadg" target="_blank" data-original-title="Youtube" class="youtube" title="Youtube"></a></li>
                                <li><a href="https://www.linkedin.com/company-beta/25005966/" target="_blank" data-original-title="Linkedin" class="linkedin" title="LinkedIn"></a></li>
                            </ul>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-4 col-sm-4 pull-right">
                  <div class="form-info">
                    <h2>Solicite <em>Información</em></h2>
                    <p>Si usted tiene alguna duda o sugerencia, no dude en ponerse en contacto con nosotros.</p>

                    <a href="page-contacts.html" class="btn btn-default">Contacto</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
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
<?php
}else{
  ?>
            <script>
              alert('Ha ocurrido un error al enviar la solicitud, porfavor intente mas tarde...');
              window.location.href='entrar.php';
            </script>
  <?php
}
?>