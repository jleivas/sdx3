<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/BlogDao.php");
require_once($rootDir . "/int/dao/ProyectoDao.php");

$proyectos=ProyectoDao::sqlTodo();
$publicaciones =BlogDao::sqlTodoLimit(0,6);


?>

<!DOCTYPE html>

<html lang="es">

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title>Inicio - Softdirex</title>
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
  <meta property="og:title" content="Un nuevo concepto para tu empresa">
  <meta property="og:description" content="Somos una empresa dedicada a ofrecer servicios informáticos: Sitios web, Aplicaciones web, Servicio técnico, Desarrollo de software etc. Revise nuestros servicios aquí.">
  <meta property="og:type" content="website">
  <meta property="og:image" content="https://softdirex.cl/assets/pages/img/nosotros/softdirex.jpg"><!-- link to image for socio -->
  <meta property="og:url" content="https://softdirex.cl/">

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
    <!-- BEGIN header content -->
    <?php include("complements/header.php") ?>
    <!-- Header END -->
    <!-- BEGIN SLIDER -->
    <div class="page-slider margin-bottom-40">
        <div id="carousel-example-generic" class="carousel slide carousel-slider">
            <!-- Indicators -->
            <ol class="carousel-indicators carousel-indicators-frontend">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <!-- First slide -->
                <div class="item carousel-item-eight active">
                    <div class="container">
                        <div class="carousel-position-six text-uppercase text-center">
                            <h2 class="margin-bottom-20 animate-delay carousel-title-v5" data-animation="animated fadeInDown">
                                Sabes lo que puede hacer <br/>
                                <span class="carousel-title-normal">Softdirex</span> para tí?
                            </h2>
                            <p class="carousel-subtitle-v5 border-top-bottom margin-bottom-30" data-animation="animated fadeInDown">Un nuevo concepto para tu empresa</p>
                            <a class="carousel-btn-green" href="page-about.html" data-animation="animated fadeInUp">Conócenos</a>
                        </div>
                    </div>
                </div>
                
                <!-- Second slide -->
                <div class="item carousel-item-nine">
                    <div class="container">
                        <div class="carousel-position-six">
                            <h2 class="animate-delay carousel-title-v6 text-uppercase" data-animation="animated fadeInDown">
                                Consolida tu empresa
                            </h2>
                            <p class="carousel-subtitle-v6 text-uppercase" data-animation="animated fadeInDown">
                                y marca la diferencia con sitios web profesionales
                            </p>
                            <p class="carousel-subtitle-v7 margin-bottom-30" data-animation="animated fadeInDown">
                                Softdirex se encarga de que los sitios web de nuestros clientes sean rápidos,<br>
                                poco convencionales, atractivos y accesibles desde cualquier dispositivo<br>
                                que tenga acceso a internet.
                            </p>
                            <a class="carousel-btn-green" href="sitios-web.html" data-animation="animated fadeInUp">Sitios web</a>
                        </div>
                    </div>
                </div>

                <!-- Third slide -->
                <div class="item carousel-item-ten">
                    <div class="container">
                        <div class="carousel-position-six">
                            <h2 class="animate-delay carousel-title-v6 text-uppercase" data-animation="animated fadeInDown">
                                Orden &amp; Rapidez
                            </h2>
                            <p class="carousel-subtitle-v6 text-uppercase" data-animation="animated fadeInDown">
                                Un sistema informático a tu medida
                            </p>
                            <p class="carousel-subtitle-v7 margin-bottom-30" data-animation="animated fadeInDown">
                                Agiliza todos los procesos de tu oficina y trabaja<br/>
                                con mayor fluidez realizando todo el control con un software propio<br/>
                                de licencia perpetua o mensual.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control carousel-control-shop carousel-control-frontend" href="#carousel-example-generic" role="button" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </a>
            <a class="right carousel-control carousel-control-shop carousel-control-frontend" href="#carousel-example-generic" role="button" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <!-- END SLIDER -->

    <div class="main">
      <div class="container">
        <!-- BEGIN SERVICE BOX -->   
        <div class="row service-box margin-bottom-40">
          <div class="col-md-4 col-sm-4">
            <div class="service-box-heading">
              <em><i class="fa fa-life-saver blue"></i></em>
              <span>Soporte</span>
            </div>
            <p>Ayuda, capacitación y soporte inmediato para la mantención, supervisión y usabilidad de nuestros sistemas.</p>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="service-box-heading">
              <em><i class="fa fa-check red"></i></em>
              <span>Chequeo</span>
            </div>
            <p>Nuestros clientes tienen toda la facultad de revisar y aprobar el avance de nuestros proyectos.</p>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="service-box-heading">
              <em><i class="fa fa-sliders green"></i></em>
              <span>Control</span>
            </div>
            <p>Manejo y control completo del sistema, como proveedores resguardamos la seguridad de los datos y su correcto funcionamiento.</p>
          </div>
        </div>
        <!-- END SERVICE BOX -->

        <!-- BEGIN BLOCKQUOTE BLOCK -->   
        <div class="row quote-v1 margin-bottom-30">
          <div class="col-md-9">
            <span>Pretendemos ser una empresa líder en calidad de atención y servicio.</span>
          </div>
        </div>
        <!-- END BLOCKQUOTE BLOCK -->

        <!-- BEGIN RECENT WORKS -->
        <div class="row recent-work margin-bottom-40">
          <div class="col-md-3">
            <h2><a href="portafolio.php">Nuestros trabajos</a></h2>
            <p>Aquí encontrarán detalle de nuestros ultimos trabajos en desarrollo, además, nuestros clientes podrán verificar los avances de sus proyectos.</p>
          </div>
          <div class="col-md-9">
            <div class="owl-carousel owl-carousel3">
              <?php
              foreach ($proyectos as $fila) {
              ?>
              <div class="recent-work-item">
                <em>
                  <img src="<?php echo $fila['proy_imagen'] ?>" alt="Amazing Project" class="img-responsive">
                  <a href="<?php echo $fila['proy_link'] ?>"><i class="fa fa-link"></i></a>
                  <a href="<?php echo $fila['proy_imagen'] ?>" class="fancybox-button" title="<?php echo $fila['proy_nombre'] ?>" data-rel="fancybox-button"><i class="fa fa-search"></i></a>
                </em>
                <a class="recent-work-description" href="<?php echo $fila['proy_link'] ?>">
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

        <!-- BEGIN TABS AND TESTIMONIALS -->
        <div class="row mix-block margin-bottom-40">
          <!-- TABS -->
          <div class="col-md-7 tab-style-1">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab-1" data-toggle="tab">Nuestra empresa</a></li>
              <li><a href="#tab-2" data-toggle="tab">Misión</a></li>
              <li><a href="#tab-3" data-toggle="tab">Visión</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane row fade in active" id="tab-1">
                <div class="col-md-3 col-sm-3">
                  <a href="assets/pages/img/nosotros/softdirex.jpg" class="fancybox-button" title="Pretendemos ser una empresa líder en calidad de atención." data-rel="fancybox-button">
                    <img class="img-responsive" src="assets/pages/img/nosotros/softdirex.jpg " alt="">
                  </a>
                </div>
                <div class="col-md-9 col-sm-9">
                  <p class="margin-bottom-10">Somos una empresa dedicada a ofrecer servicios informáticos para un mejor desarrollo de sus proyectos o negocios, ofrecemos recursos que aseguran una optimización tecnológica y acorde a sus necesidades.</p>
                  <p><a class="more" href="page-about.html">Leer mas <i class="icon-angle-right"></i></a></p>
                </div>
              </div>
              <div class="tab-pane row fade" id="tab-2">
                <div class="col-md-9 col-sm-9">
                  <p>Nuestra misión es promover y proveer a las pequeñas y medianas empresas de mejores herramientas administrativas de software específicas que ayudarán a competir más eficazmente en el mercado.</p>
                </div>
                <div class="col-md-3 col-sm-3">
                  <a href="assets/pages/img/nosotros/img2.jpg" class="fancybox-button" title="Softdirex se adapta a ti, estés donde estés." data-rel="fancybox-button">
                    <img class="img-responsive" src="assets/pages/img/nosotros/img2.jpg" alt="">
                  </a>
                </div>
              </div>
              <div class="tab-pane fade" id="tab-3">
                <p>Todos debemos tener acceso a los modernos sistemas de información, sin importar la embergadura de nuestros proyectos, toda implementación eficaz de tecnología contribuirá en un mejor desarrollo y a la larga traerá consigo grandes ganancias.</p>
              </div>
            </div>
          </div>
          <!-- END TABS -->
        
          <!-- TESTIMONIALS -->
          <div class="col-md-5 testimonials-v1">
            <div id="myCarousel" class="carousel slide">
              <!-- Carousel items -->
              <div class="carousel-inner">
                <div class="active item">
                  <blockquote><p>Agradezco la prontitud, y ejecución de un sistema totalmente ajustado a la medida y necesidad operacional de nuestra empresa.
                  Además destacar la confianza y transparencia brindada por los profesionales.</p></blockquote>
                  <div class="carousel-info">
                    <img class="pull-left" src="assets/pages/img/people/img1-small.jpg" alt="">
                    <div class="pull-left">
                      <span class="testimonials-name">Alexis Wilhelm</span>
                      <span class="testimonials-post">Gerente General de <a href="http://opticasgrow.cl/" target="_blank">Empresa Oftalmologica GROW</a>.</span>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <blockquote><p>Muy satisfecho y muy interesante el trabajo  100% preocupado  por sus clientes,  soluciones y modificaciones al instante.</p></blockquote>
                  <div class="carousel-info">
                    <img class="pull-left" src="assets/pages/img/people/img5-small.jpg" alt="">
                    <div class="pull-left">
                      <span class="testimonials-name">Leonado Dachelet</span>
                      <span class="testimonials-post">Representante legal de <a href="http://www.magallanesrentacar.cl/" target="_blank">Magallanes Rent A Car</a>.</span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Carousel nav -->
              <a class="left-btn" href="#myCarousel" data-slide="prev"></a>
              <a class="right-btn" href="#myCarousel" data-slide="next"></a>
            </div>
          </div>
          <!-- END TESTIMONIALS -->
        </div>                
        <!-- END TABS AND TESTIMONIALS -->
        <!-- BEGIN BLOCKQUOTE BLOCK -->   
        <div class="row quote-v1 margin-bottom-30">
          <div class="col-md-9">
            <span>Metodología de trabajo para el diseño de un software</span>
          </div>
        </div>
        <!-- END BLOCKQUOTE BLOCK -->


        <!-- BEGIN STEPS -->
        <div class="row margin-bottom-40 front-steps-wrapper front-steps-count-3">
          <div class="col-md-4 col-sm-4 front-step-col">
            <div class="front-step front-step1">
              <h2>Reunión</h2>
              <p>Tomamos requierimientos con el cliente y usuarios para tener una comprensión precisa de los requierimientos.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 front-step-col">
            <div class="front-step front-step2">
              <h2>Análisis</h2>
              <p>Hacemos una ingeniería del software para obtener la arquitectura de la solución.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 front-step-col">
            <div class="front-step front-step3">
              <h2>Diseño</h2>
              <p>Realizamos bocetos preliminares para alinear las espectativas del cliente.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 front-step-col">
            <div class="front-step front-step4">
              <h2>Desarrollo</h2>
              <p>Se codifica el proyecto a desarrollar para dar vida al sistema.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 front-step-col">
            <div class="front-step front-step5">
              <h2>Testing</h2>
              <p>Se ejecutan pruebas al sistema para garantizar un producto de calidad.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 front-step-col">
            <div class="front-step front-step6">
              <h2>Implementación</h2>
              <p>Se deja habilitado el sistema y se capacitan a los usuarios para la utilización del software.</p>
            </div>
          </div>
        </div>
        <!-- END STEPS -->

        <!-- BEGIN CLIENTS -->
        <div class="row margin-bottom-40 our-clients">
          <div class="col-md-3">
            <h2><a href="noticias.php">Ultimas publicaciones</a></h2>
            <p>Suscríbete  para ser el primero en recibir nuevos contenidos.</p>
          </div>
          <div class="col-md-9">
            <div class="owl-carousel owl-carousel6-brands">
              <?php
              foreach ($publicaciones as $fila) {
                # code...
              
              ?>
              <div class="client-item">
                <a href="<?php echo $fila['blo_link']; ?>">
                  <img src="<?php echo $fila['blo_imagen']; ?>" class="img-responsive" alt="">
                  <img src="<?php echo $fila['blo_imagen']; ?>" class="color-img img-responsive" alt="">
                  <strong><?php echo $fila['blo_titulo']; ?></strong>
                </a>
              </div>
              <?php
              }
              ?>                  
            </div>
          </div>          
        </div>
        <!--END CLIENTS -->
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