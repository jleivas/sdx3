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
                            <img src="assets/pages/img/posts/img14.png" alt="">
                          </div>
                          <!--<div class="item">
                               
                            <iframe src="http://player.vimeo.com/video/56974716?portrait=0" style="width:100%; border:0" allowfullscreen="" height="259"></iframe>
                            
                          </div>-->
                          <div class="item active">
                            <img src="assets/pages/img/posts/img15.jpg" alt="">
                          </div>
                          <div class="item">
                            <img src="assets/pages/img/posts/img16.jpg" alt="">
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
                  <h2><a href="">La importancia de las plataformas móviles en las empresas</a></h2>
                  <p>La tecnología móvil llego para quedarse por un largo periodo de tiempo, al menos así lo indican las estadísticas  hasta ahora, es esencial disponer de tecnologías compatibles con este medio tan utilizado y cuyo uso aumenta sin precedentes. Los Smartphone´s le facilitan la vida al usuario, pueden navegar por internet sin limitaciones, y las empresas más importantes lo evidencian actualizándose a los cambios, ¿Te imaginas quedar en el pasado?, es necesario disponer de sitios web actualizados y competentes con el mercado digital. </p>
                  <blockquote>
                    <p>En Chile al año 2013 las transacciones a través de móviles no alcanzaban el 1%. Escenario que ha evolucionado según las siguientes métricas: 56% de las visitas a sitios de ventas online, 15% de las transacciones electrónicas y un 16% de los montos vendidos se hacen a través de Smartphone´s.</p>
                    <small>Sitio web para empresas 
                   <cite title="Entel Empresas"><a href="http://grandesempresas.entel.cl/comercio-mobile-desafio-que-nace-desde-las-necesidades-del-usuario/" target="_blank">Entel Empresas</a></cite></small>
                  </blockquote> 
                  <p>Las empresas se están digitalizando, no te quedes atrás, necesitas una página adaptable, dinámica y por sobre todo, debe ser rápida. Según la consultora KISSmetrics, un 40% de los usuarios abandona un sitio web si demora más de tres segundos en cargar desde un laptop o desktop y un 30% cierra el sitio si tarda más de seis segundos desde un dispositivo móvil.</p>
                  <p>
                    Las estadísticas confirman la importancia de que las plataformas móviles sean avanzadas y eficaces, los sitios web, al igual que todas las cosas, van quedando obsoletos si no se modernizan en un mundo comercial que evoluciona rápidamente en conjunto con la tecnología.</p>           
                  
                  <ul class="blog-info">
                    <li><i class="fa fa-user"></i> Jorge Leiva CEO Softdirex</li>
                    <li><i class="fa fa-calendar"></i>31-10-2017</li>
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