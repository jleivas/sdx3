<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/BlogDao.php");
require_once($rootDir . "/int/dao/ComentarioDao.php");
require_once($rootDir . "/int/dao/UsuarioDao.php");
require_once($rootDir . "/int/dao/ProyectoDao.php");

$contenido = "null";
$cat2=0;

if(isset($_GET['contenido'])){
  $contenido = $_GET['contenido'];
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
$ultimas = BlogDao::sqlTodoLimit(0,4);
$misRegistros = BlogDao::sqlTodoLimit($inicio,$TAMANO_PAGINA);
$num_total_registros = BlogDao::sqlContarTodo();
$cat = 0;
if(isset($_GET['cat'])){
  $cat = $_GET['cat'];
  
  if(BlogDao::sqlContar($cat) > 0){
    $misRegistros = BlogDao::sqlCategoria($cat,$inicio,$TAMANO_PAGINA);
    $num_total_registros = BlogDao::sqlContar($cat);
  }else{
  ?>
          <script>
            alert('No existen contenidos en esta categoría,\nvuelva a revisar nuevas publicaciones mas adelante.');
            window.location.href='noticias.php';
          </script>
        <?php
  }
}

//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
$url7="noticias.php";

$proy = ProyectoDao::sqlTodoLimit(0,8);

?>

<!DOCTYPE html>

<html lang="es">

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title>Noticias - Softdirex</title>
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
  <meta property="og:title" content="Noticias">
  <meta property="og:description" content="Suscríbete para ser el primero en recibir nuevos contenidos.">
  <meta property="og:type" content="website">
  <meta property="og:image" content="https://www.softdirex.cl/imgMail/iphone_sdx.png"><!-- link to image for socio -->
  <meta property="og:url" content="https://softdirex.cl/noticias.php">

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
  <!-- JS Ventana -->
  <script src="/int/js/Ventana.js"></script>
  <!-- JS Ventana -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="corporate">
    <!-- BEGIN header content -->
    <?php include("complements/header.php") ?>
    <!-- Header END -->

    <!-- Inicio Contenido 1 ------------------------------------------------------------------------>
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Inicio</a></li>
            <?php 
            if(isset($titulo)){
            ?>
            <li><a href="noticias.php">Noticias</a></li>
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
          <div class="col-md-9 col-sm-9 blog-posts">
            <div class="row">
                <!-- BEGIN LEFT SIDEBAR -->            
                <div class="col-md-11 col-sm-11 blog-posts">
                  <!-- Inicio noticia -->
                  <?php
                  foreach ($misRegistros as $fila) {
                  ?>
                  <div class="row">
                    <div class="col-md-4 col-sm-4">
                      <img class="img-responsive" alt="" src="<?php echo "../../../".$fila['blo_imagen']; ?>">
                    </div>
                    <div class="col-md-8 col-sm-8">
                      <h2><a href="<?php echo $fila['blo_link']; ?>"><?php echo $fila['blo_titulo'];?></a></h2>
                      <ul class="blog-info">
                        <li><i class="fa fa-calendar"></i> <?php echo $fila['blo_fecha'];?></li>
                        <li><i class="fa fa-comments"></i> <?php echo ComentarioDao::sqlContar($fila['blo_link']);?></li>
                        <li><i class="fa fa-comment"></i> <?php echo $fila['blo_autor'];?></li>
                      </ul>
                      <p><?php echo $fila['blo_cita'];?></p>
                      <a href="<?php echo $fila['blo_link']; ?>" class="more">Seguir leyendo... <i class="icon-angle-right"></i></a>
                    </div>
                  </div>
                  <hr class="blog-post-sep">
                  <?php
                  }
                  ?>
                  <!-- Fin noticia -->
                  <ul class="pagination">
                  <?php
                  if ($total_paginas > 1) {
                     if ($pagina != 1)
                        if($cat==0){
                          echo '<li><a href="'.$url7.'?pagina='.($pagina-1).'">Anterior</a></li>';
                        }else{
                          echo '<li><a href="'.$url7.'?pagina='.($pagina-1).'&cat='.$cat.'">Anterior</a></li>';
                        }
                        for ($i=1;$i<=$total_paginas;$i++) {
                           if ($pagina == $i)
                              //si muestro el índice de la página actual, no coloco enlace
                            if($cat==0){
                              echo '<li class="active"><a href="'.$url7.'?pagina='.$pagina.'">'.$pagina.'</a></li>';
                            }else{
                              echo '<li class="active"><a href="'.$url7.'?pagina='.$pagina.'&cat='.$cat.'">'.$pagina.'</a></li>';
                            }
                           else{
                              if($cat==0){
                              //si el índice no corresponde con la página mostrada actualmente,
                              //coloco el enlace para ir a esa página
                                echo '<li><a href="'.$url7.'?pagina='.$i.'">'.$i.'</a></li>';
                              }else{
                                echo '<li><a href="'.$url7.'?pagina='.$i.'&cat='.$cat.'">'.$i.'</a></li>';
                              }
                            }
                        }
                        if ($pagina != $total_paginas){
                          if($cat==0){
                            echo '<li><a href="'.$url7.'?pagina='.($pagina+1).'">Siguiente</a></li>';
                          }else{
                            echo '<li><a href="'.$url7.'?pagina='.($pagina+1).'&cat='.$cat.'">Siguiente</a></li>';
                          }
                         }
                  }
                  ?>
                  </ul>               
                </div>
                <!-- END LEFT SIDEBAR -->
                <!-- BEGIN RIGHT SIDEBAR -->            
                <div class="col-md-3 col-sm-3 blog-sidebar">
                  

                  
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
              <?php include("complements/navbarNoticias.php") ?>
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
<?php
  if($contenido != "null" && $contenido != ""){
?>
    <script>
        ventana.showHTML('containerRight','<?php echo $contenido; ?>');
    </script>
<?php
 }
?>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>