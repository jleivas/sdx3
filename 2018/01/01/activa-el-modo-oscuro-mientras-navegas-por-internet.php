
                <?php $dominio = $_SERVER["HTTP_HOST"];
    $rootUri= "https://".$dominio;
    if (!isset($rootDir)) $rootDir = $_SERVER["DOCUMENT_ROOT"];
    require_once($rootDir . "/int/dao/BlogDao.php");
    require_once($rootDir . "/int/dao/ComentarioDao.php");
    require_once($rootDir . "/int/dao/UsuarioDao.php");
    require_once($rootDir . "/int/dao/ProyectoDao.php");
    
    $dominio= $_SERVER["HTTP_HOST"];
    $url= "https://".$dominio .$_SERVER["REQUEST_URI"];
    $contenido = "null";
    $cat2=0;
    $blog = BlogDao::sqlCargar($url);
    if($blog != null){
        $titulo=$blog->getTitulo();
        $cat2=$blog->getCategoria();
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
    $misRegistros = BlogDao::sqlTodoLimit($inicio,$TAMANO_PAGINA);
    $num_total_registros = BlogDao::sqlContarTodo();
    $cat = 0;
    if(isset($_GET['cat'])){
      $cat = $_GET['cat'];
      
      if(BlogDao::sqlContar($cat) > 0){
        $misRegistros = BlogDao::sqlCategoria($cat,$inicio,$TAMANO_PAGINA);
        $num_total_registros = BlogDao::sqlContar($cat);
      }
    }
    
    
    $dominio= $_SERVER["HTTP_HOST"];
    $url= "https://".$dominio .$_SERVER["REQUEST_URI"];

    if(BlogDao::sqlExiste($url) == 0){
    ?>
                <script>
                alert('Esta publicación ha sido eliminada. <?php echo $url;?>');
                window.location.href='../../../noticias.php';
                </script>
    <?php
    }
    $misRegistros2 = ComentarioDao::sqlListar($url);
    
    //calculo el total de páginas
    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
    
    $proy = ProyectoDao::sqlTodoLimit(0,8);
    
    ?>
    
    <!DOCTYPE html>
    
    <html lang="es">
    
    <!-- Head BEGIN -->
    <head>
      <meta charset="utf-8">
      <title>Activa el modo oscuro mientras navegas por internet</title>
      <script>
    
      </script>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
      <meta name="description" content="Somos una empresa dedicada a ofrecer servicios informáticos: Sitios web, Aplicaciones web, Servicio técnico, Desarrollo de software etc. Revise nuestros servicios aquí.">
      <meta content="sitios web, aplicaciones web, desarrollo de software, programas para empresas, sistemas informaticos, programadores, desarrollo de aplicaciones, desarrollo de sitios web, paginas web, crear pagina web, comprar pagina web, crear un sitio web, crear sitio web, diseño de sitios web, diseño de aplicaciones, aplicaciones moviles, crear un programa, programa para empresas." name="keywords">
      <meta content="softdirex" name="author">
    
      <meta property="og:site_name" content="Softdirex">
      <meta property="og:title" content="Activa el modo oscuro mientras navegas por internet">
      <meta property="og:description" content="Activa el modo oscuro mientras navegas por internet">
      <meta property="og:type" content="website">
      <meta property="og:image" content="https://www.softdirex.cl/assets/pages/img/posts/modo-nocturno-640x400.jpg"><!-- link to image for socio -->
      <meta property="og:url" content="https://www.softdirex.cl/2018/01/01/activa-el-modo-oscuro-mientras-navegas-por-internet.php">
    
      <link rel="shortcut icon" href=<?php $rootUri."favicon.ico"; ?>>
    
      <!-- Fonts START -->
      <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
      <!-- Fonts END -->
    
      <!-- Global styles START -->          
      <link href=<?php echo $rootUri."/assets/plugins/font-awesome/css/font-awesome.min.css"; ?> rel="stylesheet">
      <link href=<?php echo $rootUri."/assets/plugins/bootstrap/css/bootstrap.min.css"; ?> rel="stylesheet">
      <!-- Global styles END --> 
       
      <!-- Page level plugin styles START -->
      <link href="/assets/pages/css/animate.css" rel="stylesheet">
      <link href="/assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
      <link href="/assets/plugins/owl.carousel/assets/owl.carousel.css" rel="stylesheet">
      <!-- Page level plugin styles END -->
    
      <!-- Theme styles START -->
      <link href=<?php echo $rootUri."/assets/pages/css/components.css"; ?> rel="stylesheet">
      <link href=<?php echo $rootUri."/assets/pages/css/slider.css"; ?> rel="stylesheet">
      <link href=<?php echo $rootUri."/assets/corporate/css/style.css"; ?> rel="stylesheet">
      <link href=<?php echo $rootUri."/assets/corporate/css/style-responsive.css"; ?> rel="stylesheet">
      <link href=<?php echo $rootUri."/assets/corporate/css/themes/red.css"; ?> rel="stylesheet" id="style-color">
      <link href=<?php echo $rootUri."/assets/corporate/css/custom.css"; ?> rel="stylesheet">
      <!-- Theme styles END -->
      <!-- JS Ventana -->
      <script src=<?php echo $rootUri."/int/js/Ventana.js"; ?>></script>
      <!-- JS Ventana -->
    </head>
    <!-- Head END -->
    
    <!-- Body BEGIN -->
    <body class="corporate">
    <!-- API FACEBOOK BEGIN -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.12&appId=598270976878270&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <!-- API FACEBOOK END -->
        <!-- BEGIN header content -->
        <?php include("../../../complements/header.php") ?>
         <!--END header-->
    
        <!-- Inicio Contenido 1 ------------------------------------------------------------------------>
        <div class="main">
          <div class="container">
            <ul class="breadcrumb">
                <li><a href=<?php echo $rootUri."/index.php"; ?>>Inicio</a></li>
                <?php 
                if(isset($titulo)){
                ?>
                <li><a href=<?php echo $rootUri."/noticias.php"; ?>>Noticias</a></li>
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
                    <div class="col-md-9 col-sm-9 blog-item">
                      <div class="blog-item-img">
                        <!-- BEGIN CAROUSEL -->            
                        <div class="front-carousel">
                          <div id="myCarousel" class="carousel slide">
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                            <div class="item active">
                                <img src=<?php echo $rootUri."/assets/pages/img/posts/modo-nocturno-640x400.jpg"; ?> alt="">
                            </div>
                    
                            <div class="item">
                                <img src=<?php echo $rootUri."/assets/pages/img/posts/unnamed.jpg"; ?> alt="">
                            </div>
                    
                            </div>
                            <!-- Carousel nav -->
                            <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                              <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="carousel-control right" href="#myCarousel" data-slide="next">
                              <i class="fa fa-angle-right"></i>
                            </a>
                          </div>                
                        </div>
                        <!-- END CAROUSEL -->             
                      </div>
                    <h2><a href="">Activa el modo oscuro mientras navegas por internet</a></h2>
                    
                    <p>Ahora puedes oscurecer todo internet gracias a la extencion Midnight Lizard disponible para los navegadores Chrome y Firefox, de esta forma estarás ahorrando la luz emitidas por las pantallas a las que estamos expuestos.</p>
                    
                    <blockquote>
                        <p>“¿Se ahorra energía si el fondo de pantalla es oscuro o si el color de fondo de una página web es negro?<br />
<br />
Pero esto es cierto sólo en algunos casos. Es cierto para las pantallas tipo LED o OLED o SUPERAMOLED, en las que cada pixel es una diminuta lámpara que está encendida o apagada, y el color negro se crea apagando los pixels.<br />
<br />
Pero en las pantallas LCD o TFT estándar esto no es correcto. Estas pantallas están retroiluminadas, es decir, tienen una o unas lámparas tras los pixels que está permanentemente iluminada, y la regulación de la intensidad de luz se regula haciendo más opacos o más transparentes los pixels.”.</p>
                    
                    <small>Relatividad.org
                        <cite>
                        <a href="" ></a></cite></small></blockquote>
                        
                        <p>Por otra parte, sus creadores aseguran que ayuda a que leamos mejor el contenido de cada web, y uno de sus puntos fuertes es que puedes establecer a qué horas quieres que se active / desactive automáticamente.<br />
<br />
Una vez que la hayamos instalado, la extensión adaptará todas las webs para que se vean correctamente en este modo oscuro. De todos modos, en las opciones podemos ajustar el contraste, saturación o brillo del fondo, botones, texto, enlaces, etc.</p>
                        <div>
                        <a class="twitter-follow-button"
                        href="https://twitter.com/softdirex">
                        Follow @Softdirex</a>
                        

                        <a class="twitter-share-button"
                        href="https://twitter.com/intent/tweet?text=Activa el modo oscuro mientras navegas por internet @softdirex">
                        Tweet</a>

                        <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: es_ES</script>
                        <script type="IN/Share" data-url="https://www.softdirex.cl/2018/01/01/activa-el-modo-oscuro-mientras-navegas-por-internet.php"></script>
                        
                        <div class="fb-like" data-href="https://www.softdirex.cl/2018/01/01/activa-el-modo-oscuro-mientras-navegas-por-internet.php" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                        
                        <a href="https://api.whatsapp.com/send?text=Me%20gustaría%20compartirte%20esta%20info%20https://www.softdirex.cl/2018/01/01/activa-el-modo-oscuro-mientras-navegas-por-internet.php" style="border-radius: 7px; -moz-border-radius: 7px; -webkit-border-radius: 7px; display: inline-block; text-decoration: none; text-align: center; font-size: x-small; padding: 4px; color: white; background-color: green;" target="_blank"><i class="fa fa-whatsapp"></i>Compartir</a>

                        </div>
                    <ul class="blog-info">
                    <li><i class="fa fa-user"></i> Jorge Leiva - CEO Softdirex</li>
                    <li><i class="fa fa-calendar"></i>2018-01-01</li>
                    </ul>
                    <h2>Comentarios</h2>
                  <div class="comments">
                    <?php
                    foreach ($misRegistros2 as $fila) {
                    ?>
                    <div class="media">                    
                      <a href="" class="pull-left">
                      <img src=<?php echo $rootUri."/int/imgPerfil/".strtolower(substr($fila['com_autor'], 0, 1)).".jpg"; ?> alt="" class="media-object">
                      </a>
                      <div class="media-body">
                        <h4 class="media-heading"><?php echo $fila['com_autor'] ?> <span><?php echo $fila['com_fecha'] ?></span></h4>
                        <p><?php echo $fila['com_mensaje'] ?></p>  
                      </div>
                    </div>
                    <?php
                    }
                    ?>
                    <!--end media-->
                  </div>

                  <!--inicio formulario-->
                  <div class="post-comment padding-top-40">
                    <h3>Comenta</h3>
                    <form role="form" action="../../../int/fn/comentar.php" method="post">
                      <div class="form-group">
                        <label>Nombre</label>
                        <input class="form-control" type="text" name="nombre" id="nombre" required="">
                        <input type="hidden" name="link" id="link" value="https://www.softdirex.cl/2018/01/01/activa-el-modo-oscuro-mientras-navegas-por-internet.php">
                      </div>

                      <div class="form-group">
                        <label>Email <span class="color-red">*</span></label>
                        <input class="form-control" type="email" name="mail" id="mail" required="">
                      </div>

                      <div class="form-group">
                        <label>Mensaje</label>
                        <textarea class="form-control" rows="8" name="mensaje" id="mensaje" required></textarea>
                      </div>
                      <p><button class="btn btn-primary" type="submit">Comentar</button></p>
                    </form>
                  </div> 
                  <!--fin formulario-->

                </div>
                <!-- END LEFT SIDEBAR -->
                <!-- BEGIN RIGHT SIDEBAR -->            
                <div class="col-md-3 col-sm-3 blog-sidebar">
                  
                <?php include("../../../complements/navbarNoticias.php") ?>
                  
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
    

    <!-- BEGIN FOOTER -->
    <?php include("../../../complements/footer.php") ?>
    <!-- END FOOTER -->

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>
    <![endif]--> 
    <script src="../../../assets/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="../../../assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="../../../assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <!-- <script src="../../../assets/corporate/scripts/back-to-top.js" type="text/javascript"></script>-->
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="../../../assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="../../../assets/plugins/owl.carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->

    <script src="../../../assets/corporate/scripts/layout.js" type="text/javascript"></script>
    <script src="../../../assets/pages/scripts/bs-carousel.js" type="text/javascript"></script>
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
                    
