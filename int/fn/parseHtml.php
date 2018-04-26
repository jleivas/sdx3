<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
</head> 
<!-- Esta clase es la primera etapa en la construccion del sitio, recibe todos los parametros del formilario
Se encargará de guardar el registro en la BD y posteriormente enviará por url los datos a la función que 
construye el php
-->
<body> 
<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/UsuarioDao.php");
require_once($rootDir . "/int/dao/BlogDao.php");
require_once($rootDir . "/int/dao/class.phpmailer.php");
require_once($rootDir . "/int/dao/CorreosDao.php");
session_start();
if(!$_SESSION){
?>
<script>
  alert('Acceso denegado: Debes iniciar sesión primero.');
window.location.href='../../entrar.php';
</script>
<?php
}
$usuario1 = UsuarioDao::sqlCargar($_SESSION['usuario']->getRut());

if($usuario1->getTipo() != 3 && $usuario1->getTipo() != 2){
session_destroy();
?>
<script>
  alert('Acceso denegado: Debes iniciar sesión primero.');
window.location.href='../../entrar.php';
</script>
<?php
}

// ---------------------------- IMAGENES 1, 2 Y 3 ---------------------------------------------
$msgOut = "";

$img1="null";
$img2="null";
$img3="null";
$msOut = "";
try{
    
    if(!is_null($_FILES['img1']['size'])){
        $img1= $_FILES['img1']['name'];
        
        $target_path = "../../assets/pages/img/posts/";
        
        $target_path = $target_path .$img1;

        $tamano=$_FILES['img1']['size'];
                
        if($tamano==0){//si no se subio imagen, esto puede ser porque subio archivos de mas de 2MB de peso
            ?>
                <script>
                alert('Ocurrió un error al subir la imagen\nDebe seleccionar una imagen válida.');
                //window.location.href='javascript:history.go(-1);';
                </script>
            <?php
        }else{
            if(!move_uploaded_file($_FILES['img1']['tmp_name'], $target_path)){ //si logra mover la imagen a la carpeta,
            ?>
                <script>
                    alert('Ocurrió un error al subir la imagen\nDebe seleccionar una imagen válida.');
                    //window.location.href='javascript:history.go(-1);';
                </script>
            <?php
            }
        }
    }
    
    if(!is_null($_FILES['img2']['size'])){
        $img2= $_FILES['img2']['name'];
        
        $target_path = "../../assets/pages/img/posts/";
        
        $target_path = $target_path .$img2;

        $tamano=$_FILES['img2']['size'];
                
        if($tamano==0){//si no se subio imagen, esto puede ser porque subio archivos de mas de 2MB de peso
            $img2="null";
            $msOut = $msOut . "No se adjuntó la imagen 2.\n";
        }else{
            if(!move_uploaded_file($_FILES['img2']['tmp_name'], $target_path)){ //si logra mover la imagen a la carpeta,
                $img2="null";
                $msOut = $msOut . "No se pudo subir la imagen 2.\n";
            }
        }
    }
    
    if(!is_null($_FILES['img3']['size'])){
        $img3= $_FILES['img3']['name'];
        
        $target_path = "../../assets/pages/img/posts/";
        
        $target_path = $target_path .$img3;

        $tamano=$_FILES['img3']['size'];
                
        if($tamano==0){//si no se subio imagen, esto puede ser porque subio archivos de mas de 2MB de peso
            $img3="null";
            $msOut = $msOut . "No se adjuntó la imagen 3\n";
        }else{
            if(!move_uploaded_file($_FILES['img3']['tmp_name'], $target_path)){ //si logra mover la imagen a la carpeta,
                $img3="null";
                $msOut = $msOut . "No se puso subir la imagen 3.\n";
            }
        }
    }
}catch(Exception $e){
    $msOut = $msOut . "ERROR: ".$e.gettext."\n";
}finally  {
    $msOut = $msOut . "No se subieron algunas imágenes.\n";
}

// ---------------------------- IMAGENES 1, 2 Y 3 ---------------------------------------------


$contentHtml = "";
$contentImg = "";

if(isset($_POST['fecha'])){//será el path de la noticia
    $fecha=$_POST['fecha'];

    
    $dia = substr($fecha,8,2);
    $mes = substr($fecha,5,2);
    $anio = substr($fecha,0,4);

    ?>
                <script>
                    alert('LARGO: <?php echo "".$largo;?> DIA:<?php echo $dia;?> MES: <?php echo $mes;?> AÑO: <?php echo $anio;?>');
                    //window.location.href='javascript:history.go(-1);';
                </script>
            <?php

    $indexUrl = "http://www.softdirex.cl/";

	if(isset($_POST['categoria'])){
        $categoria=$_POST['categoria'];//BD
        if(isset($_POST['autor'])){
            $autor=$_POST['autor'];
            if(isset($_POST['titulo'])){
                $titulo=$_POST['titulo'];
                
                
                $fileName = str_replace(" ", "-", $titulo, $cont);
                $fileName = eliminar_tildes($fileName);
                $fileName = strtolower($fileName);
                $fileName = $fileName.".php";
                if(strcmp($img1, "null") === 0){
                    $img1 = "default.jpg";
                    //no img1 CARRUSEL
                }
                if(strcmp($img2, "null") != 0){
                    $contentImg = $contentImg.'
                            <div class="item">
                                <img src=<?php echo $rootUri."/assets/pages/img/posts/'.$img2.'"; ?> alt="">
                            </div>
                    ';
                }else{
                    //no img2 CARRUSEL
                }
                if(strcmp($img3, "null") != 0){
                    $contentImg = $contentImg.'
                            <div class="item">
                                <img src=<?php echo $rootUri."/assets/pages/img/posts/'.$img3.'"; ?> alt="">
                            </div>
                    ';
                }else{
                    //no img3 CARRUSEL
                }
                /*if(isset($_POST['video'])){
                    $video=$_POST['video'];
                    $contentImg = $contentImg.'
                    <div class="item">
                    <iframe width="640" height="360" src='.$video.' frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    
                    </div>
                    ';
                }else{
                    //no VIDEO CARRUSEL
                }*/
                if(isset($_POST['longTitle'])){
                    $longTitle=$_POST['longTitle'];
                    $contentHtml = $contentHtml.'
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
    if(isset($_GET[\'cat\'])){
      $cat = $_GET[\'cat\'];
      
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
                alert(\'Esta publicación ha sido eliminada. <?php echo $url;?>\');
                window.location.href=\'../../../noticias.php\';
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
      <title>'.$titulo.'</title>
      <script>
    
      </script>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
      <meta name="description" content="Somos una empresa dedicada a ofrecer servicios informáticos: Sitios web, Aplicaciones web, Servicio técnico, Desarrollo de software etc. Revise nuestros servicios aquí.">
      <meta content="sitios web, aplicaciones web, desarrollo de software, programas para empresas, sistemas informaticos, programadores, desarrollo de aplicaciones, desarrollo de sitios web, paginas web, crear pagina web, comprar pagina web, crear un sitio web, crear sitio web, diseño de sitios web, diseño de aplicaciones, aplicaciones moviles, crear un programa, programa para empresas." name="keywords">
      <meta content="softdirex" name="author">
    
      <meta property="og:site_name" content="Softdirex">
      <meta property="og:title" content="'.$titulo.'">
      <meta property="og:description" content="'.$longTitle.'">
      <meta property="og:type" content="website">
      <meta property="og:image" content="https://www.softdirex.cl/assets/pages/img/posts/'.$img1.'"><!-- link to image for socio -->
      <meta property="og:url" content="https://www.softdirex.cl/'.$anio.'/'.$mes.'/'.$dia.'/'.$fileName.'">
    
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
      js.src = \'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.12&appId=598270976878270&autoLogAppEvents=1\';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, \'script\', \'facebook-jssdk\'));</script>
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
                                <img src=<?php echo $rootUri."/assets/pages/img/posts/'.$img1.'"; ?> alt="">
                            </div>
                    '.$contentImg .'
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
                    <h2><a href="">'.$longTitle.'</a></h2>
                    ';
                }else{
                    //no Long Title <h2><a href="">
                }
                if(isset($_POST['introText'])){
                    $introText=nl2br($_POST['introText']);
                    $contentHtml = $contentHtml.'
                    <p>'.$introText.'</p>
                    ';
                }else{
                    //no introText <p>
                }
                if(isset($_POST['commit'])){//commit <blockquote><p>
                    $commit=nl2br($_POST['commit']);
                    $contentHtml = $contentHtml.'
                    <blockquote>
                        <p>“'.$commit.'”.</p>
                    ';
                    if(isset($_POST['autorCommit'])){//autorCommit <small><p>
                        $autorCommit=$_POST['autorCommit'];
                        $contentHtml = $contentHtml.'
                    <small>'.$autorCommit;
                    }else{
                        $contentHtml = $contentHtml.'
                    <small>';//no autorCommit <small><p>
                    }
                    if(isset($_POST['cargoAutorCommit'])){//cargoAutorCommit <small><p> excluyente
                        $cargoAutorCommit=$_POST['cargoAutorCommit'];//e.g <cite title="cargoAutorCommit">
                        $contentHtml = $contentHtml.'
                        <cite title="'.$cargoAutorCommit.'">';
                    }else{
                        $contentHtml = $contentHtml.'
                        <cite>';
                        //no cargoAutorCommit <small><p>
                    }
                    if(isset($_POST['lugarAutorCommit'])){//lugarAutorCommit <cite><small> excluyente
                        $lugarAutorCommit=$_POST['lugarAutorCommit'];
                        $contentHtml = $contentHtml.'
                        <a href="" >'.$lugarAutorCommit.'</a></cite></small></blockquote>
                        ';
                    }else{
                        $contentHtml = $contentHtml.'
                        </cite></small>
                        </blockquote> 
                        ';//no lugarAutorCommit <cite><small> 
                    }
                    if(isset($_POST['parraf1'])){//parraf1 <p> excluyente
                        $parraf1=nl2br($_POST['parraf1']);
                        $contentHtml = $contentHtml.'
                        <p>'.$parraf1.'</p>
                        ';
                    }else{
                        //no parraf1 <p>
                    }
                    if(isset($_POST['fuente'])){//fuente <p> excluyente
                        $fuente=$_POST['fuente'];
                        if(strlen($fuente) > 5){
                            if(isset($_POST['linkFuente'])){//linkFuente <a> excluyente
                                $linkFuente=$_POST['linkFuente'];
                                $contentHtml = $contentHtml.'
                                <br><br><p> <a href="'.$linkFuente.'" target="_blank">Fuente:'.$fuente.'</a></p>
                                ';
                            }else{
                                $contentHtml = $contentHtml.'
                                <br><br><p> Fuente:<a href="">'.$fuente.'</a></p>
                                '; //no linkFuente <a>
                            }
                        }
                    }else{
                        $contentHtml = $contentHtml.'
                            <br><br>
                            ';//no fuente <p>
                    }
                    $contentHtml = $contentHtml . '<div>
                        <a class="twitter-follow-button"
                        href="https://twitter.com/softdirex">
                        Follow @Softdirex</a>
                        

                        <a class="twitter-share-button"
                        href="https://twitter.com/intent/tweet?text='.$longTitle.' @softdirex">
                        Tweet</a>

                        <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: es_ES</script>
                        <script type="IN/Share" data-url="https://www.softdirex.cl/'.$anio.'/'.$mes.'/'.$dia.'/'.$fileName.'"></script>
                        
                        <div class="fb-like" data-href="https://www.softdirex.cl/'.$anio.'/'.$mes.'/'.$dia.'/'.$fileName.'" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                        
                        <a href="https://api.whatsapp.com/send?text=Me%20gustaría%20compartirte%20esta%20info%20https://www.softdirex.cl/'.$anio.'/'.$mes.'/'.$dia.'/'.$fileName.'" style="border-radius: 7px; -moz-border-radius: 7px; -webkit-border-radius: 7px; display: inline-block; text-decoration: none; text-align: center; font-size: x-small; padding: 4px; color: white; background-color: green;" target="_blank"><i class="fa fa-whatsapp"></i>Compartir</a>

                        </div>
                    <ul class="blog-info">
                    <li><i class="fa fa-user"></i> '.$autor.'</li>
                    <li><i class="fa fa-calendar"></i>'.$fecha.'</li>
                    </ul>
                    <h2>Comentarios</h2>
                  <div class="comments">
                    <?php
                    foreach ($misRegistros2 as $fila) {
                    ?>
                    <div class="media">                    
                      <a href="" class="pull-left">
                      <img src=<?php echo $rootUri."/int/imgPerfil/".strtolower(substr($fila[\'com_autor\'], 0, 1)).".jpg"; ?> alt="" class="media-object">
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
                    <form role="form" action="../../../int/fn/comentar.php" method="post">
                      <div class="form-group">
                        <label>Nombre</label>
                        <input class="form-control" type="text" name="nombre" id="nombre" required="">
                        <input type="hidden" name="link" id="link" value="https://www.softdirex.cl/'.$anio.'/'.$mes.'/'.$dia.'/'.$fileName.'">
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
                    ';
                        //formato de fecha DD-MM-AAAA

                        $folder1 = "../../".$anio; 
                        if(!is_dir($folder1)){ 
                        @mkdir($folder1, 0755); 
                        }

                        $folder2 = $folder1."/".$mes; 
                        if(!is_dir($folder2)){ 
                        @mkdir($folder2, 0755); 
                        }
                        
                        $folder3 = $folder2."/".$dia; 
                        if(!is_dir($folder3)){ 
                        @mkdir($folder3, 0755); 
                        }
                        
                        $nombre_archivo = $folder3."/".$fileName; 
 
                        $contenido = $contentHtml;

                        if($archivo = fopen($nombre_archivo, "a"))
                        {
                            if(fwrite($archivo,  $contenido. "\n"))
                            {
                                ?>
                                <script>
                                alert('Archivo creado con exito.<?php echo $msOut;?>');
                                </script>
                                <?php
                            }
                            else
                            {
                                ?>
                                <script>
                                alert('Ha habido un problema al crear el archivo.<?php echo $msOut;?>');
                                </script>
                                <?php
                            }
                    
                            fclose($archivo);
                        }
                        
                        
                    
                        $nombre_archivo2 = $folder3."/index.html";
                        $redir = "<script>\ndocument.location.href='".$indexUrl."';\n</script>";
                        if($archivo2 = fopen($nombre_archivo2, "a"))
                        {
                            if(fwrite($archivo2, $redir))
                            {
                                
                                $enviar=1;
                                if(isset($_POST['enviar'])){
                                    $enviar=$_POST['enviar'];
                                }
                                saveBd($nombre_archivo, $titulo, $commit, $autor, $fecha, $categoria, $img1, $enviar)
                                ?>
                                <script>
                                alert('Archivo creado con exito.');
                                window.location.href='javascript:history.go(-2);';
                                </script>
                                <?php
                                exit(0);
                            }
                            else
                            {
                                ?>
                                <script>
                                alert('Ocurrió un problema al crear el archivo de redireccionamiento.');
                                </script>
                                <?php
                            }
                    
                            fclose($archivo2);
                            
                        }
                    
                }else{
                    //no commit <blockquote><p>
                }
                
            }else{
                //no title
            }
        }else{
            //no autor
        }
    }else{
        //no category
    }
}else{
    //no fecha
}
?>
<script>
  alert('Error, no se pudo publicar la noticia.');
  window.location.href='javascript:history.go(-1);';
</script>
</body> 
</html>

<?php
function saveBd($link, $titulo, $cita, $autor, $fecha, $categoria, $imagen, $enviar){
    $id = BlogDao::sqladdId();
    $link = str_replace("../../", "https://www.softdirex.cl/", $link, $cont);
    $largo = strlen($cita);
    if($largo > 410){
        $cita = substr($cita,0,400);
        $cita = $cita."...";
    }
    $cita = str_replace("'", "\"", $cita, $cont);
    $imagen = "assets/pages/img/posts/".$imagen;

	try{
		if(BlogDao::sqlExiste($link) == 0){
			$blog=new Blog($id,$link, $titulo, $cita, $autor,$fecha,$imagen,$categoria,1);
            if(BlogDao::sqlInsert($blog) > 0){
				if($enviar == 2){
					$misRegistros = CorreosDao::sqlTodo();
					$cont =0;
					foreach ($misRegistros as $fila) {
						$cont = $cont+enviarBoletin($link,$titulo,$fila['corr_correo']);
					}
					?>
						<script>
							alert('Se enviaron <?php echo $cont; ?> correos.');
							return;
						</script>
					<?php
					
				}
			}else{
			?>
				<script>
					alert('Ha ocurrido un error, los datos no se registraron correctamente.');
					return;
				</script>
			<?php
			}
			
		}else{
			?>
				<script>
					alert('Ha ocurrido un error, La publicación ya existe.');
					return;
				</script>
			<?php
				
		}
			
	}catch(Exception $e){
		?>
			<script>
				alert('Ocurrió un error al intentar modificar los datos: <?php echo $e->getMessage(); ?>.');
				//window.location.href='javascript:history.go(-1);';
                return;
			</script>
		<?php
	}
}

function enviarBoletin($link,$nombre,$mail2)
{
	
	$mail = new PHPMailer();
	$mail->CharSet = 'UTF-8';
	$mail->Host = "mx1.hostinger.es";
	$mail->From = "no-reply@softdirex.cl";
	$mail->FromName = "Softdirex";
	$mail->Subject = "Newsletter Softdirex";
	$mail->IsHTML(true);
	$cont=0;
	// HTML body

	$mensaje = "<html>".
		"<head>".
		"<style type='text/css'>".
		  ".boton_personalizado{".
		    "text-decoration: none;".
		    "padding: 10px;".
		    "font-weight: 600;".
		    "font-size: 20px;".
		    "color: #ffffff;".
		    "background-color: #ff8000;".
		    "border-radius: 10px;".
		    "border: 2px #0016b0;".
		  "}".
		   ".boton_personalizado:hover{".
		    "color: #ff8000;".
		    "background-color: #ffffff;".
		  "}".
		  ".bloque {".
		  "background-color: #fafafa;".
		  "margin: 1rem;".
		  "padding: 1rem;".
		  "text-align: center;".
		"}".
		"</style>".
		"</head>".
		"<body>".
		"<div class='bloque' style='width:100%; height:auto;'>".
		"<font color='Orange' face='verdana'>".
		"<h1>Boletín informativo</h1>".
		"<img align='center' src='https://www.softdirex.cl/assets/img/softdirex_logo.png'><br>".
		"<br>".
		"</font>".
		"<font face='verdana'>".
		  "Se encuentra disponible un nuevo contenido en nuestro sitio web:<br><br>".
		  "<img align='center' src='https://www.softdirex.cl/imgMail/iphone_sdx.png'><br>".
		  " <h3><a href='".$link."'>".$nombre."</a></h3>".
		"</font>".
		"<font color='Orange' face='verdana'>".
		"<h3>Entérate de más:</h3>".
		"</font>".
		  "<a href='https://www.softdirex.cl/noticias.php' class='boton_personalizado'>Noticias</a><br><br><br>".
		"<font color='Orange' face='verdana'>".
		"<h3>Revise nuestros proyectos:</h3>".
		"</font>".
		  "<a href='https://www.softdirex.cl/portafolio.php' class='boton_personalizado'>Portafolio</a><br><br><br>".
		  "<hr>".
      		"Si no puedes acceder directamente al enlace,<br>copia el siguiente link y pégalo en la barra de direcciones de tu navegador para finalizar tu registro:<br>".
      		"copiar: <b><a href='".$link."'>".$link."</a></b><br>".
      		"<img align='center' src='https://www.softdirex.cl/imgMail/pegar.jpg'><br>".
		  "<hr><h6>Copyright 2017 por Softdirex&nbsp;&nbsp;&nbsp;&nbsp;
		        <img align='center' src='https://www.softdirex.cl/assets/img/footer-logo.png'>      ".
		  "&nbsp;&nbsp;&nbsp;&nbsp;<a href='www.softdirex.cl' target='_blank' color='Orange'><b>Softdirex</b></a>".
		" Un nuevo concepto para tu empresa</h6>".
		"<hr>".
		"<a href='https://www.softdirex.cl/mailDown.php?m=".$mail2."'>Darme de baja<a>".
		"</div>".
		"</body>".
		  "</html>";
	// Configurar Email
	$mail->Body = $mensaje;
	//$mail->AltBody = $text;
	$mail->AddAddress($mail2, $mail2);
	// Enviar el email
	if(!$mail->Send()) {
	?>
			<script>
				alert('Error al enviar a: <?php echo $mail; ?>.');
			</script>
	<?php
	}else{
		$cont++;
	}
	$mail->ClearAddresses();
	return $cont;
	//------------------------------------------------------------------------------------------------
	
	
}

function eliminar_tildes($cadena){
 
    //Codificamos la cadena en formato utf8 en caso de que nos de errores
    $cadena = utf8_encode($cadena);
 
    //Ahora reemplazamos las letras
    $cadena = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $cadena
    );
 
    $cadena = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $cadena );
 
    $cadena = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $cadena );
 
    $cadena = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $cadena );
 
    $cadena = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $cadena );
 
        $cadena = preg_replace("/[^a-zA-Z0-9\_\-]+/", "", $cadena);

 
    return $cadena;
}

?>