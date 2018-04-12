
<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/UsuarioDao.php");
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

$estado=1;
if(isset($_GET['estado'])){
  $estado=$_GET['estado'];
}
if($estado > 1){
  $estado=1;
}

$misRegistros = UsuarioDao::sqlEstado($estado);

?>
<!DOCTYPE html>

<html lang="es">

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title>Usuarios - Softdirex</title>
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
  <!--[if !IE]><!-->
  <style>

  /*
  Max width before this PARTICULAR table gets nasty
  This query will take effect for any screen smaller than 760px
  and also iPads specifically.
  */
  @media
  only screen and (max-width: 760px),
  (min-device-width: 768px) and (max-device-width: 1024px)  {

    /* Force table to not be like tables anymore */
    table, thead, tbody, th, td, tr {
      display: block;
    }

    /* Hide table headers (but not display: none;, for accessibility) */
    thead tr {
      position: absolute;
      top: -9999px;
      left: -9999px;
    }

    tr { border: 1px solid #ccc; }

    td {
      /* Behave  like a "row" */
      border: none;
      border-bottom: 1px solid #eee;
      position: relative;
      padding-left: 50%;
    }

    td:before {
      /* Now like a table header */
      position: absolute;
      /* Top/left values mimic padding */
      top: 6px;
      left: 6px;
      width: 45%;
      padding-right: 10px;
      white-space: nowrap;
    }

    /*
    Label the data
    */
    td:nth-of-type(1):before { content: "Rut"; }
    td:nth-of-type(2):before { content: "Nombre"; }
    td:nth-of-type(3):before { content: "Email"; }
    td:nth-of-type(4):before { content: "Telefono"; }
    td:nth-of-type(5):before { content: "Dirección"; }
    td:nth-of-type(6):before { content: "Tipo"; }
    td:nth-of-type(7):before { content: ""; }
    td:nth-of-type(10):before { content: ""; }
  }

  /* Smartphones (portrait and landscape) ----------- */
  @media only screen
  and (min-device-width : 320px)
  and (max-device-width : 480px) {
    body {
      padding: 0;
      margin: 0;
      width: 320px;
      text-align: left;  }
    }

  /* iPads (portrait and landscape) ----------- */
  @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
    body {
      width: 495px;
    }
  }

  </style>
  <!--<![endif]-->
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

            <li class="dropdown active">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Usuarios 
                
              </a>
                
              <ul class="dropdown-menu">
                <li class="active"><a href="admClientes-mostrar.php">Mostrar</a></li>
                <li><a href="admClientes-registrar.php">Registrar</a></li>
                <li><a href="admClientes-morosos.php">Pagos pendientes</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Proyectos 
                
              </a>
                
              <ul class="dropdown-menu">
                <li><a href="admProyectos-mostrar.php">Mostrar</a></li>
                <li><a href="admProyectos-registrar.php">Registrar</a></li>
                <li><a href="admProyectos-pendientes.php">Pendientes</a></li>
                <li><a href="admProyectos-facturar.php">Sin facturar</a></li>
              </ul>
            </li>
            
            
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Cuenta 
                
              </a>
                
              <ul class="dropdown-menu">
                <li class="active"><a href="admin.php">Reportes</a></li>
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
            <li class="active">Usuarios</li>
        </ul>
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT <div class="col-md-3 col-sm-3"> -->
          <div class="col-md-12 col-sm-12">
            <h1>Mostrar Usuarios</h1>
            <?php 
            if($estado == 1){
            ?>
            <form action="admClientes-mostrar.php">
              <input type="hidden" name="estado" value="0">
              <button class="btn btn-primary">Eliminados</button>
            </form>
            <?php 
            }else{
            ?>
            <form action="admClientes-mostrar.php">
              <input type="hidden" name="estado" value="1">
              <button class="btn btn-primary">Activos</button>
            </form>
            <?php  
            }
            ?>
            <hr>
          </div>

          <div class="col-md-12 col-sm-12">
              <table>
                <thead>
                <tr>
                  <th>&nbsp;&nbsp;&nbsp;Rut</th>
                  <th>&nbsp;&nbsp;&nbsp;Nombre</th>
                  <th>&nbsp;&nbsp;&nbsp;Email</th>
                  <th>&nbsp;&nbsp;&nbsp;Telefono</th>
                  <th>&nbsp;&nbsp;&nbsp;Dirección</th>
                  <th>&nbsp;&nbsp;&nbsp;Comuna</th>
                  <th>&nbsp;&nbsp;&nbsp;Tipo</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($misRegistros as $fila) {
                ?>
                <tr>
                  <form action="int/fn/admCliente-modificar.php" method="post">
                  <td><input type="text" name="rut" value="<?php echo $fila['cli_rut']; ?>" readonly="readonly"></td>
                  <td><input type="text" name="nombre" value="<?php echo $fila['cli_nombre']; ?>" readonly="readonly"></td>
                  <td><input type="email" name="mail" value="<?php echo $fila['cli_mail']; ?>" required=""></td>
                  <td><input type="text" name="telefono" value="<?php echo $fila['cli_telefono']; ?>"></td>
                  <td><input type="text" name="direccion" value="<?php echo $fila['cli_direccion']; ?>"></td>
                  <td><input type="text" name="comuna" value="<?php echo $fila['cli_comuna']; ?>"></td>
                  <td>
                    <select name="tipo" onChange="javascript:alert('Tipo de usuario modificado');">
                      <?php
                      if($fila['cli_tipo']==1){
                      ?>
                      <option selected value="1">Cliente</option>
                      <?php
                      }else{
                      ?>
                      <option value="1">Cliente</option>
                      <?php
                      }if($fila['cli_tipo']==4){
                      ?>
                      <option selected value="4">Afiliado</option>
                      <?php
                      }else{
                      ?>
                      <option value="4">Afiliado</option>
                      <?php
                      }if($fila['cli_tipo']==2){
                      ?>
                      <option selected value="2">Administrador</option>
                      <?php
                      }else{
                      ?>
                      <option value="2">Administrador</option>
                      <?php
                      }if($fila['cli_tipo']==3){
                      ?>
                      <option selected value="3">Super Administrador </option>
                      <?php
                      }else{
                      ?>
                      <option value="3">Super Administrador</option>
                      <?php
                      }
                      ?>
                    </select>
                  </td>
                  <td>
                    <?php
                    if($estado==1){
                    ?>
                    <button type="submit" class="btn-info">Modificar</button>
                    <?php
                    }else{
                    ?>
                    <a href="" class="btn-default" onclick="javascript:alert('No se puede modificar un dato eliminado');">Modificar</a>
                    <?php
                    }
                    ?>
                  </td>
                  </form>
                  <td>
                    <?php
                    if($estado==1){
                    ?>
                    <form action="int/fn/admCliente-anular.php" method="post">
                      <input type="hidden" name="rut" value="<?php echo $fila['cli_rut']; ?>">
                      <button type="submit" class="btn-danger">Anular</button>
                    </form>
                    <?php
                    }else{
                    ?>
                    <form action="int/fn/admCliente-restaurar.php" method="post">
                      <input type="hidden" name="rut" value="<?php echo $fila['cli_rut']; ?>">
                      <button type="submit" class="btn-success">Restaurar</button>
                    </form>
                    <?php
                    }
                    ?>
                  </td>
                </tr>
                <?php
                }
                ?>
                </tbody>
              </table>
            </div>
          <!-- END CONTENT -->
        </div>
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