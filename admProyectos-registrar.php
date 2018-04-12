
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

if($usuario1->getTipo() != 3 && $usuario1->getTipo() != 2){
session_destroy();
?>
<script>
  alert('Acceso denegado: Debes iniciar sesión primero.');
window.location.href='entrar.php';
</script>
<?php
}

$link="";
if(isset($_POST['link'])){
  $link=$_POST['link'];
}

$proy = ProyectoDao::sqlCargar($link);

?>
<!DOCTYPE html>

<html lang="es">

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title>Registrar proyecto - Softdirex</title>
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

  <link rel="shortcut icon" href="favicon.ico">
  <link rel="stylesheet" href="assets/tables/style.css">

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
    <div class="color-panel hidden-sm">
      <div class="color-mode-icons icon-color"></div>
      <div class="color-mode-icons icon-color-close"></div>
      <div class="color-mode">
        <p>CAMBIAR COLOR</p>
        <ul class="inline">
          <li class="color-red current color-default" data-style="red"></li>
          <li class="color-blue" data-style="blue"></li>
          <li class="color-green" data-style="green"></li>
          <li class="color-orange" data-style="orange"></li>
          <li class="color-gray" data-style="gray"></li>
          <li class="color-turquoise" data-style="turquoise"></li>
        </ul>
      </div>
    </div>
    <!-- END BEGIN STYLE CUSTOMIZER --> 

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
                        <li ><a href="misdatos.php" target="_blank"><?php echo $usuario1->getNombre() ?></a></li>
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
                Publicaciones 
                
              </a>
                
              <ul class="dropdown-menu">
                <li><a href="admPublicaciones-mostrar.php">Mostrar</a></li>
                <li><a href="admPublicaciones-registrar.php">Registrar</a></li>
                <li><a href="admPublicaciones-comentarios.php">Comentarios</a></li>
                <li><a href="admPublicaciones-suscriptores.php">Suscriptores</a></li>
                <li><a href="admPublicaciones-enviar.php">Enviar boletín</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Usuarios 
                
              </a>
                
              <ul class="dropdown-menu">
                <li><a href="admClientes-mostrar.php">Mostrar</a></li>
                <li><a href="admClientes-registrar.php">Registrar</a></li>
                <li><a href="admClientes-morosos.php">Pagos pendientes</a></li>
              </ul>
            </li>

            <li class="dropdown active">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Proyectos 
                
              </a>
                
              <ul class="dropdown-menu">
                <li><a href="admProyectos-mostrar.php">Mostrar</a></li>
                <li class="active"><a href="admProyectos-registrar.php">Registrar</a></li>
                <li><a href="admProyectos-pendientes.php">Pendientes</a></li>
                <li><a href="admProyectos-facturar.php">Sin facturar</a></li>
              </ul>
            </li>
            
            
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Cuenta 
                
              </a>
                
              <ul class="dropdown-menu">
                <li><a href="admin.php">Reportes</a></li>
              </ul>
            </li>

            <!-- BEGIN TOP SEARCH -->
            <li class="menu-search">
              <span class="sep"></span>
              <i class="fa fa-search search-btn"></i>
              <div class="search-box">
                <form action="#">
                  <div class="input-group">
                    <input type="text" placeholder="" class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Buscar</button>
                    </span>
                  </div>
                </form>
              </div> 
            </li>
            <!-- END TOP SEARCH -->
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
            <li><a href="admin.php">Administración</a></li>
            <li class="active">Registrar</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-3">
            <ul class="list-group margin-bottom-25 sidebar-menu">
              <li class="list-group-item clearfix"><a href="admProyectos-mostrar.php"><i class="fa fa-angle-right"></i> Mostrar</a></li>
              <li class="list-group-item clearfix"><a href="admProyectos-registrar.php"><i class="fa fa-angle-right"></i> Registrar</a></li>
              <li class="list-group-item clearfix"><a href="admProyectos-pendientes.php"><i class="fa fa-angle-right"></i> Pendientes</a></li>
              <li class="list-group-item clearfix"><a href="admProyectos-facturar.php"><i class="fa fa-angle-right"></i> Sin facturar</a></li>

            </ul>
          </div>
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-9">
            <h1>Registrar nuevo proyecto</h1>
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-7 col-sm-7">
                  <form action="int/fn/admProyectos-registrar.php" class="form-horizontal" role="form" method="post">
                    <fieldset>
                      <legend>Nuevo Proyecto</legend>
                      <div class="form-group">
                        <label for="link" class="col-lg-4 control-label">Link de acceso <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" id="link" name="link" value="/portafolio/"  minlength="10" maxlength="100" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="nombre" class="col-lg-4 control-label">Nombre <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" id="nombre" name="nombre" minlength="3" maxlength="60" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="imagen" class="col-lg-4 control-label">Nombre de imagen <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" id="imagen" name="imagen" minlength="4" maxlength="25" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="monto" class="col-lg-4 control-label">Monto</label>
                        <div class="col-lg-8">
                          <input type="number" class="form-control" id="monto" name="monto" minlength="8" maxlength="12" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="monto" class="col-lg-4 control-label">Categoria</label>
                        <div class="col-lg-8">
                          <select name="categoria" class="form-control">
                            <option value="1">Sitios web</option>
                            <option value="2">Aplicaciones web</option>
                            <option value="3">Aplicaciones de escritorio</option>
                            <option value="4">Diseño gráfico</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="cliente" class="col-lg-4 control-label">Rut del cliente</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" id="cliente" name="cliente" minlength="9" maxlength="10">
                        </div>
                      </div>
                    </fieldset>
                    
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                        <button type="submit" class="btn btn-primary">Registrar</button>&nbsp;&nbsp;&nbsp;<a href="javascript:history.back(-1)" class="btn btn-default">Cancelar</a>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-4 col-sm-4 pull-right">
                  <div class="form-info">
                    <h2><em>Condiciones</em> de uso</h2>
                    <p>El usuario deberá respetar en todo momento los términos y condiciones establecidos en las presentes condiciones generales de uso del portal. De forma expresa el usuario manifiesta que utilizará el portal de forma diligente y asumiendo cualquier responsabilidad que pudiera derivarse del incumplimiento de las normas.</p>

                    <p>Softdirex, todos los derechos reservados.</p>

                    <a href="terminos-y-condiciones.html" target="_blank" class="btn btn-default">Mas detalles</a>
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