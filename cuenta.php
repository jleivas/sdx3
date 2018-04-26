
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

    <!-- BEGIN header content -->
    <?php include("complements/header.php") ?>
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

    <!-- BEGIN FOOTER -->
    <?php include("complements/footer.php") ?>
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