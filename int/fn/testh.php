<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 
<?php 
    $indexUrl = "http://www.softdirex.cl/";
    $año ="2019";
    $mes = "4";
    $dia = "21";

    $folder1 = "../../".$año; 
	if(!is_dir($folder1)){ 
	@mkdir($folder1, 0755); 
	}else{ 
	echo "(1)Ya existe ese directorio\n"; 
	} 

    $folder2 = $folder1."/".$mes; 
	if(!is_dir($folder2)){ 
	@mkdir($folder2, 0755); 
	}else{ 
	echo "(2)Ya existe ese directorio\n"; 
    } 
    
    $folder3 = $folder2."/".$dia; 
	if(!is_dir($folder3)){ 
	@mkdir($folder3, 0755); 
	}else{ 
	echo "(3)Ya existe ese directorio\n"; 
	} 
     
    $nombre_archivo = $folder3."/logs.php"; 
 
    $contenido = contentHtml();//crea un nuevo sitio web
    
 
    if($archivo = fopen($nombre_archivo, "a"))
    {
        if(fwrite($archivo,  $contenido. "\n"))
        {
            echo "Se ha ejecutado correctamente";
        }
        else
        {
            echo "Ha habido un problema al crear el archivo";
        }
 
        fclose($archivo);
    }
    
    
  
    $nombre_archivo2 = $folder3."/index.html";
    $redir = "<script>\ndocument.location.href='".$indexUrl."';\n</script>";
    if($archivo2 = fopen($nombre_archivo2, "a"))
    {
        if(fwrite($archivo2, $redir))
        {
            echo "Se ha ejecutado correctamente";
        }
        else
        {
            echo "Ha habido un problema al crear el archivo";
        }
 
        fclose($archivo2);
    }
 


    function contentHtml(){
        $content = '<?php $dominio = $_SERVER["HTTP_HOST"];
    $rootUri= "https://".$dominio;
    if (!isset($rootDir)) $rootDir = $_SERVER["DOCUMENT_ROOT"];
    require_once($rootDir . "/int/dao/BlogDao.php");
    require_once($rootDir . "/int/dao/ComentarioDao.php");
    require_once($rootDir . "/int/dao/UsuarioDao.php");
    require_once($rootDir . "/int/dao/ProyectoDao.php");
    
    $contenido = "null";
    $cat2=0;
    
    if(isset($_GET[\'contenido\'])){
      $contenido = $_GET[\'contenido\'];
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
    $misRegistros = BlogDao::sqlTodoLimit($inicio,$TAMANO_PAGINA);
    $num_total_registros = BlogDao::sqlContarTodo();
    $cat = 0;
    if(isset($_GET[\'cat\'])){
      $cat = $_GET[\'cat\'];
      
      if(BlogDao::sqlContar($cat) > 0){
        $misRegistros = BlogDao::sqlCategoria($cat,$inicio,$TAMANO_PAGINA);
        $num_total_registros = BlogDao::sqlContar($cat);
      }else{
      ?>
              <script>
                alert(\'No existen contenidos en esta categoría,\\nvuelva a revisar nuevas publicaciones mas adelante.\');
                window.location.href=\'noticias.php\';
              </script>
            <?php
      }
    }
    
    $misRegistros2 = ComentarioDao::sqlListar("link");
    
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
    
      </script>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
      <meta name="description" content="Somos una empresa dedicada a ofrecer servicios informáticos: Sitios web, Aplicaciones web, Servicio técnico, Desarrollo de software etc. Revise nuestros servicios aquí.">
      <meta content="sitios web, aplicaciones web, desarrollo de software, programas para empresas, sistemas informaticos, programadores, desarrollo de aplicaciones, desarrollo de sitios web, paginas web, crear pagina web, comprar pagina web, crear un sitio web, crear sitio web, diseño de sitios web, diseño de aplicaciones, aplicaciones moviles, crear un programa, programa para empresas." name="keywords">
      <meta content="softdirex" name="author">
    
      <meta property="og:site_name" content="Softdirex">
      <meta property="og:title" content="Noticias">
      <meta property="og:description" content="Suscríbete para ser el primero en recibir nuevos contenidos.">
      <meta property="og:type" content="website">
      <meta property="og:image" content="https://www.softdirex.cl/imgMail/iphone_sdx.png"><!-- link to image for socio -->
      <meta property="og:url" content="https://softdirex.cl/noticias.php">
    
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
                              <div class="item">
                                <img src=<?php echo $rootUri."/assets/pages/img/posts/img11.png"; ?> alt="">
                              </div>
                              <!--<div class="item">
                                   
                                <iframe src="http://player.vimeo.com/video/56974716?portrait=0" style="width:100%; border:0" allowfullscreen="" height="259"></iframe>
                                
                              </div>-->
                              <div class="item active">
                                <img src=<?php echo $rootUri."/assets/pages/img/posts/img12.jpg"; ?> alt="">
                              </div>
                              <div class="item">
                                <img src=<?php echo $rootUri."/assets/pages/img/posts/img13.jpg"; ?> alt="">
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
                      <h2><a href="">Un software empresarial puede mejorar un negocio</a></h2>
                      <p>Existen muchos mitos con respecto a la implementación de sistemas de gestión empresarial por la que muchas PYMES no se atreven a adquirir algún software para sus compañías.</p>
                      <p>Según un informe presentado por una empresa colombiana Consensus, en muchos casos las empresas que implementen un software de gestión empresarial tienen hasta un 70% de probabilidad de incrementar sus ingresos.</p>
                      <blockquote>
                        <p>“Adaptarse a la tecnología y hacer uso de las nuevas herramientas que ofrece el mercado se ha convertido en una obligación y está al alcance de todas las empresas sin importar su tamaño o sector”, es uno de los argumentos de dicho informe, es “indispensable pensar creativamente a través del uso de la tecnología, pues aunque resulte un reto para muchas, resulta más eficiente a nivel económico y logra impactar en un mercado más amplio en el que cualquier empresa tiene como objetivo crecer”.</p>
                        <small>Consultor informático en Bogotá, Colombia 
                       <cite title="Consultor informático en Bogotá, Colombia"><a href="http://www.consensussa.com/index.php/es/" target="_blank">Concensus</a></cite></small>
                      </blockquote> 
                      <p>Las conclusiones de Consensus apuntan a que existen algunos mitos en la sociedad que impiden que muchas PyMEs se atrevan a adquirir un Software de Gestión Empresarial en sus compañías: muchos piensan que se trata de una herramienta compleja; otros creen que implica un alto costo implementarlo; algunos aseguran que es un proceso demorado y otra gran cantidad afirma que solo puede ser manejado por grandes empresas.</p>
                      <p>
                        Es fundamental que los empresarios conozcan a profundidad cuáles son los grandes beneficios que trae consigo la adquisición de herramientas para que pierdan el miedo y se animen a implementarla en sus negocios, según Consensus.</p>
    
    <p>Para que las PyMES comiencen su proceso de implementación,  se recomienda que inicialmente estudien su empresa y su entorno, es decir, que tengan “espíritu empresarial”, luego que comiencen con algo sencillo y dividan el proyecto en etapas o fases, una vez hecho esto es recomendable auditar el logro de los objetivos planeados, de acuerdo con Benjamín Archila, Gerente General de Consensus.</p>
    
    <p>Muchas compañías que deciden implementar un Software tipo ERP, “encuentran en ella la herramienta que estaban buscando, pues no solo les permite identificar la rentabilidad de sus centros de costos, sino que refleja, de manera inmediata, la trazabilidad de sus proyectos en ejecución y los que ha han desarrollado”. Algunos de los módulos que las empresas pueden implementar son: Módulo de Gestión, CRM, Recursos Humanos, Financiero, Compras y Ventas.
                      </p>               
                      
                      <ul class="blog-info">
                        <li><i class="fa fa-user"></i> Jorge Leiva CEO Softdirex</li>
                        <li><i class="fa fa-calendar"></i>27-10-2017</li>
                      </ul>
    
                      <h2>Comentarios</h2>
                      <div class="comments">
                        <?php
                        foreach ($misRegistros2 as $fila) {
                        ?>
                        <div class="media">                    
                          <a href="" class="pull-left">
                          <img src=<?php echo $rootUri."/int/imgPerfil/".strtolower(substr($fila[\'com_autor\'], 0, 1))."jpg"; ?> alt="" class="media-object">
                          </a>
                          <div class="media-body">
                            <h4 class="media-heading"><?php echo $fila[\'com_autor\'] ?> <span><?php echo $fila[\'com_fecha\'] ?></span></h4>
                            <p><?php echo $fila[\'com_mensaje\'] ?></p>  
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
                        <form role="form" action=<?php echo $rootUri."/int/fn/comentar.php" ?> method="post">
                          <div class="form-group">
                            <label>Nombre</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" required="">
                            <input type="hidden" name="link" id="link" value="<?php echo  $rootUri."/".$url ?>">
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
    </html>';
    
    return $content;
        }
 ?>