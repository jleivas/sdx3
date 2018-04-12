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
                            <img src="assets/pages/img/posts/img11.png" alt="">
                          </div>
                          <!--<div class="item">
                               
                            <iframe src="http://player.vimeo.com/video/56974716?portrait=0" style="width:100%; border:0" allowfullscreen="" height="259"></iframe>
                            
                          </div>-->
                          <div class="item active">
                            <img src="assets/pages/img/posts/img12.jpg" alt="">
                          </div>
                          <div class="item">
                            <img src="assets/pages/img/posts/img13.jpg" alt="">
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