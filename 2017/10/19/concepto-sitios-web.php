<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/ComentarioDao.php");
require_once($rootDir . "/int/dao/BlogDao.php");



$anterior = "out";
if(isset($_SERVER['HTTP_REFERER'])){
  $anterior = $_SERVER['HTTP_REFERER'];
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



$cadena = $url;
$subcadena = "?"; 
  // localicamos en que posici�n se haya la $subcadena, en nuestro caso la posicion es "7"
$posicionsubcadena = strpos ($cadena, $subcadena); 
  // eliminamos los caracteres desde $subcadena hacia la izq, y le sumamos 1 para borrar tambien el @ en este caso
  
$link = substr ($cadena, 0,($posicionsubcadena));
$misRegistros = ComentarioDao::sqlListar($link); 

if(strcmp($anterior, "https://".$dominio."/noticias.php") === 0){
  $cont=1;
}else{
  ?>
    <script>
      window.location.href='<?php echo "https://".$dominio."/noticias.php?contenido=".$url ?>';
    </script>
  <?php
}
?>

<!-- BEGIN LEFT SIDEBAR -->            
                <div class="col-md-9 col-sm-9 blog-item">
                  <div class="blog-item-img">
                    <!-- BEGIN CAROUSEL -->            
                    <div class="front-carousel">
                      <div id="myCarousel" class="carousel slide">
                        <!-- Carousel items -->
                        <div class="carousel-inner">
                          <div class="item">
                            <img src="assets/pages/img/posts/img8.jpg" alt="">
                          </div>
                          <!--<div class="item">
                               
                            <iframe src="http://player.vimeo.com/video/56974716?portrait=0" style="width:100%; border:0" allowfullscreen="" height="259"></iframe>
                            
                          </div>-->
                          <div class="item active">
                            <img src="assets/pages/img/posts/img9.jpg" alt="">
                          </div>
                          <div class="item">
                            <img src="assets/pages/img/posts/img10.jpg" alt="">
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
                  <h2><a href="">Un concepto de sitios web</a></h2>
                  <p>Con la experiencia adquirida en sitios web, como desarrollador y diseñador, “los sitios web con que repleto mis archivos con decenas de modelos y diseños diferentes” son una manera reflexiva en síntesis de construir la cara de las empresas, cada sitio con su información más destacada o más detallada es un mundo diferente; en ellos se puede sistemáticamente variar una idea y someterla a una intensidad de posibilidades para lograr la mejor imagen de una empresa, sin sobrevalorar o abusar de la envergadura de la entidad que se quiere presentar.</p>
                  <blockquote>
                    <p>Un sitio web es el sentido práctico y conceptual de entregar información, es una manera de pensar y demostrar tus conceptos, es una empresa digital, es la mejor manera de mostrar a los  clientes cuales son las bases del servicio que se ofrece, mientras más real es la información, será mejor recibida de parte del cliente.</p>
                    <small>Jorge Leiva 
                   <cite title="CEO Softdirex"><a href="">Softdirex</a></cite></small>
                  </blockquote>                
                  
                  <ul class="blog-info">
                    <li><i class="fa fa-user"></i> Jorge Leiva CEO Softdirex</li>
                    <li><i class="fa fa-calendar"></i>19-10-2017</li>
                  </ul>

                  <h2>Comentarios</h2>
                  <div class="comments">
                    <?php
                    foreach ($misRegistros as $fila) {
                    ?>
                    <div class="media">                    
                      <a href="" class="pull-left">
                      <img src="../../int/imgPerfil/<?php echo  strtolower(substr($fila['com_autor'], 0, 1));?>.jpg" alt="" class="media-object">
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
                    <form role="form" action="int/fn/comentar.php" method="post">
                      <div class="form-group">
                        <label>Nombre</label>
                        <input class="form-control" type="text" name="nombre" id="nombre" required="">
                        <input type="hidden" name="link" id="link" value="<?php echo $url ?>">
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