<?php
/*
Esta clase es la primera etapa en la construccion del sitio, recibe todos los parametros del formilario
Se encargará de guardar el registro en la BD y posteriormente enviará por url los datos a la función que 
construye el php
*/
//guarda una nueva noticia
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/UsuarioDao.php");
require_once($rootDir . "/int/dao/BlogDao.php");
require_once($rootDir . "/int/dao/class.phpmailer.php");
session_start();//carga la sesion
if(!$_SESSION){
?>
<script>
  alert('Acceso denegado: Debes iniciar sesión primero.');
window.location.href='../../entrar.php';
</script>
<?php
exit(0);
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
exit(0);
}

// ---------------------------- IMAGENES 1, 2 Y 3 ---------------------------------------------
$img1="null";
if(!is_null($_FILES['img1']['size'])){
    $img1= $_FILES['img1']['name'];
    
    $target_path = "../../assets/pages/img/posts/";
    
    $target_path = $target_path .$img1;

    $tamano=$_FILES['img1']['size'];
            
    if($tamano==0){//si no se subio imagen, esto puede ser porque subio archivos de mas de 2MB de peso
        ?>
            <script>
            alert('Ocurrió un error al subir la imagen\nDebe seleccionar una imagen válida.');
            window.location.href='javascript:history.go(-1);';
            </script>
        <?php
    }else{
        if(!move_uploaded_file($_FILES['img1']['tmp_name'], $target_path)){ //si logra mover la imagen a la carpeta,
          ?>
              <script>
                  alert('Ocurrió un error al subir la imagen\nDebe seleccionar una imagen válida.');
                  window.location.href='javascript:history.go(-1);';
              </script>
          <?php
        }
    }
}
$img2="null";
if(!is_null($_FILES['img2']['size'])){
    $img2= $_FILES['img2']['name'];
    
    $target_path = "../../assets/pages/img/posts/";
    
    $target_path = $target_path .$img2;

    $tamano=$_FILES['img2']['size'];
            
    if($tamano==0){//si no se subio imagen, esto puede ser porque subio archivos de mas de 2MB de peso
        ?>
            <script>
            alert('Ocurrió un error al subir la imagen\nDebe seleccionar una imagen válida.');
            window.location.href='javascript:history.go(-1);';
            </script>
        <?php
    }else{
        if(!move_uploaded_file($_FILES['img2']['tmp_name'], $target_path)){ //si logra mover la imagen a la carpeta,
          ?>
              <script>
                  alert('Ocurrió un error al subir la imagen\nDebe seleccionar una imagen válida.');
                  window.location.href='javascript:history.go(-1);';
              </script>
          <?php
        }
    }
}
$img3="null";
if(!is_null($_FILES['img3']['size'])){
    $img3= $_FILES['img3']['name'];
    
    $target_path = "../../assets/pages/img/posts/";
    
    $target_path = $target_path .$img3;

    $tamano=$_FILES['img3']['size'];
            
    if($tamano==0){//si no se subio imagen, esto puede ser porque subio archivos de mas de 2MB de peso
        ?>
            <script>
            alert('Ocurrió un error al subir la imagen\nDebe seleccionar una imagen válida.');
            window.location.href='javascript:history.go(-1);';
            </script>
        <?php
    }else{
        if(!move_uploaded_file($_FILES['img3']['tmp_name'], $target_path)){ //si logra mover la imagen a la carpeta,
          ?>
              <script>
                  alert('Ocurrió un error al subir la imagen\nDebe seleccionar una imagen válida.');
                  window.location.href='javascript:history.go(-1);';
              </script>
          <?php
        }
    }
}
// ---------------------------- IMAGENES 1, 2 Y 3 ---------------------------------------------


$contentHtml = "";

if(isset($_POST['fecha'])){//será el path de la noticia
    $fecha=$_POST['fecha'];
    $dia = substr($fecha,0,2);
    $mes = substr($fecha,3,2);
    $anio = substr($fecha,6,4);
    $indexUrl = "http://www.softdirex.cl/";

    $contentHtml = $contentHtml . '
    <?php $dominio = $_SERVER["HTTP_HOST"];
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
    ';
	if(isset($_POST['categoria'])){
        $categoria=$_POST['categoria'];//BD
        if(isset($_POST['autor'])){
            $autor=$_POST['autor'];
            if(isset($_POST['titulo'])){
                $contentHtml = $contentHtml.'
                <div id="containerRight">            
                    <div class="col-md-9 col-sm-9 blog-item">
                      <div class="blog-item-img">
                        <!-- BEGIN CAROUSEL -->            
                        <div class="front-carousel">
                          <div id="myCarousel" class="carousel slide">
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                ';
                $titulo=$_POST['titulo'];
                $fileName = str_replace(" ", "-", $titulo, $cont);
                $fileName = $fileName.".php";
                if(strcmp($img1, "null") === 0){
                    $img1 = "default.jpg";
                    $contentHtml = $contentHtml.'
                            <div class="item active">
                                <img src=<?php echo $rootUri."/assets/pages/img/posts/default.jpg"; ?> alt="">
                            </div>
                    ';//no img1 CARRUSEL
                }else{
                    $contentHtml = $contentHtml.'
                            <div class="item active">
                                <img src=<?php echo $rootUri."/assets/pages/img/posts/'.$img1.'"; ?> alt="">
                            </div>
                    ';
                }
                if(strcmp($img2, "null") != 0){
                    $contentHtml = $contentHtml.'
                            <div class="item active">
                                <img src=<?php echo $rootUri."/assets/pages/img/posts/'.$img2.'"; ?> alt="">
                            </div>
                    ';
                }else{
                    //no img2 CARRUSEL
                }
                if(strcmp($img3, "null") != 0){
                    $contentHtml = $contentHtml.'
                            <div class="item active">
                                <img src=<?php echo $rootUri."/assets/pages/img/posts/'.$img3.'"; ?> alt="">
                            </div>
                    ';
                }else{
                    //no img3 CARRUSEL
                }
                if(isset($_POST['video'])){
                    $video=$_POST['video'];
                    $contentHtml = $contentHtml.'
                    <div class="item">
                                   
                    <iframe src="'.$video.'" style="width:100%; border:0" allowfullscreen="" height="259"></iframe>
                    
                  </div>
                    ';
                }else{
                    //no VIDEO CARRUSEL
                }
                $contentHtml = $contentHtml .'
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
                ';
                if(isset($_POST['longTitle'])){
                    $longTitle=$_POST['longTitle'];
                    $contentHtml = $contentHtml.'
                    <h2><a href="">'.$longTitle.'</a></h2>
                    ';
                }else{
                    //no Long Title <h2><a href="">
                }
                if(isset($_POST['introText'])){
                    $introText=$_POST['introText'];
                    $contentHtml = $contentHtml.'
                    <p>'.$introText.'</p>
                    ';
                }else{
                    //no introText <p>
                }
                if(isset($_POST['commit'])){//commit <blockquote><p>
                    $commit=$_POST['commit'];
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
                        <a href="" >'.$lugarAutorCommit.'</a></cite></small>
                        ';
                    }else{
                        $contentHtml = $contentHtml.'
                        </cite></small>
                        </blockquote> 
                        ';//no lugarAutorCommit <cite><small> 
                    }
                    if(isset($_POST['parraf1'])){//parraf1 <p> excluyente
                        $parraf1=$_POST['parraf1'];
                        $contentHtml = $contentHtml.'
                        <p>'.$parraf1.'</p>
                        ';
                    }else{
                        //no parraf1 <p>
                    }
                    if(isset($_POST['fuente'])){//fuente <p> excluyente
                        $fuente=$_POST['fuente'];
                        if(isset($_POST['linkFuente'])){//linkFuente <a> excluyente
                            $linkFuente=$_POST['linkFuente'];
                            $contentHtml = $contentHtml.'
                            <br><br><p> <a href="'.$linkFuente.'" target="_blank">Fuente:'.$fuente.'</a></p>
                            ';
                        }else{
                            $contentHtml = $contentHtml.'
                            <br><br><p> <a href="">Fuente:'.$fuente.'</a></p>
                            '; //no linkFuente <a>
                        }
                    }else{
                        //no fuente <p>
                    }
                    $contentHtml = $contentHtml.'
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
                                alert('Archivo creado con exito.');
                                </script>
                                <?php
                            }
                            else
                            {
                                ?>
                                <script>
                                alert('Ha habido un problema al crear el archivo.');
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
                                ?>
                                <script>
                                alert('Archivo de redireccionamiento creado con exito.');
                                </script>
                                <?php
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
                            $enviar=1;
                            if(isset($_POST['enviar'])){
                                $enviar=$_POST['enviar'];
                            }
                            ?>
                            <script>
                            alert('Se generará un registro en la base de datos.');
                            window.location.href='admPublicacion-registrar.php?link='.$nombre_archivo.'&titulo='.$titulo.'&cita='.$commit.'&autor='.$autor.'&fecha='.$fecha.'&categoria='.$categoria.'&imagen='.img1.'&enviar='.$enviar;
                            </script>
                            <?php
                            exit(0);
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
<?php

exit(0);

?>