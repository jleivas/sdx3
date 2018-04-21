<?php 
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/BlogDao.php");

$dominio= $_SERVER["HTTP_HOST"];
$url= "https://".$dominio;

$ultimas = BlogDao:: sqlTodoLimit(0,6);
 ?>
<!-- CATEGORIES START -->

<h2 class="no-top-space">Categorias</h2>
                  <ul class="nav sidebar-categories margin-bottom-40">
                    <?php if($cat==0 && $cat2==0){?>
                    <li class="active"><a href=<?php echo $url."/noticias.php"; ?>>Todas (<?php echo BlogDao::sqlContarTodo(); ?>)</a></li>
                    <?php }else{?>
                    <li><a href=<?php echo $url."/noticias.php"; ?>>Todas (<?php echo BlogDao::sqlContarTodo(); ?>)</a></li>
                    <?php }?>


                    <?php if($cat==1 || $cat2==1){?>
                    <li class="active"><a href=<?php echo $url."/noticias.php?cat=1"; ?>>Sitios web (<?php echo BlogDao::sqlContar(1); ?>)</a></li>
                    <?php }else{?>
                    <li><a href=<?php echo $url."/noticias.php?cat=1"; ?>>Sitios web (<?php echo BlogDao::sqlContar(1); ?>)</a></li>
                    <?php }?>


                    <?php if($cat==2 || $cat2==2){?>
                    <li class="active"><a href=<?php echo $url."/noticias.php?cat=2"; ?>>Sistemas (<?php echo BlogDao::sqlContar(2); ?>)</a></li>
                    <?php }else{?>
                    <li><a href=<?php echo $url."/noticias.php?cat=2"; ?>>Sistemas (<?php echo BlogDao::sqlContar(2); ?>)</a></li>
                    <?php }?>


                    <?php if($cat==3 || $cat2==3){?>
                    <li class="active"><a href=<?php echo $url."/noticias.php?cat=3"; ?>>Tecnología (<?php echo BlogDao::sqlContar(3); ?>)</a></li>
                    <?php }else{?>
                    <li><a href=<?php echo $url."/noticias.php?cat=3"; ?>>Tecnología (<?php echo BlogDao::sqlContar(3); ?>)</a></li>
                    <?php }?>
                    

                    <?php if($cat==4 || $cat2==4){?>
                    <li class="active"><a href=<?php echo $url."/noticias.php?cat=4"; ?>>Proyectos (<?php echo BlogDao::sqlContar(4); ?>)</a></li>
                    <?php }else{?>
                    <li><a href=<?php echo $url."/noticias.php?cat=4"; ?>>Proyectos (<?php echo BlogDao::sqlContar(4); ?>)</a></li>
                    <?php }?>
                    

                    <?php if($cat==5 || $cat2==5){?>
                    <li class="active"><a href=<?php echo $url."/noticias.php?cat=5"; ?>>Móviles (<?php echo BlogDao::sqlContar(5); ?>)</a></li>
                    <?php }else{?>
                    <li><a href=<?php echo $url."/noticias.php?cat=5"; ?>>Móviles (<?php echo BlogDao::sqlContar(5); ?>)</a></li>
                    <?php }?>
                    
                  </ul>
                  <!-- CATEGORIES END -->

                  <!-- BEGIN RECENT NEWS -->                            
                  <h2>Ultimas publicaciones</h2>
                  <div class="recent-news margin-bottom-10">
                    <?php
                    foreach ($ultimas as $temp) {
                    ?>
                    <div class="row margin-bottom-10">
                      <div class="col-md-3">
                        <img class="img-responsive" alt="" src="<?php echo "../../../".$temp['blo_imagen'] ?>">                        
                      </div>
                      <div class="col-md-9 recent-news-inner">
                        <h3><a href="noticias.php?contenido=<?php echo $temp['blo_link']; ?>"><?php echo $temp['blo_titulo'] ?></a></h3>
                        <p>Autor: <?php echo $temp['blo_autor'] ?></p>
                      </div>                        
                    </div>
                    <?php
                    }
                    ?>
                  </div>
                  <!-- END RECENT NEWS -->    
                  <!-- BEGIN BLOG TALKS -->
                  <div class="blog-talks margin-bottom-30">
                    <hr>
                    <h2><a href=<?php echo $url."/servicios.php"; ?>>Servicios Softdirex</a></h2>
                  </div>                            
                  <!-- END BLOG TALKS -->                        

                  <!-- BEGIN BLOG TALKS -->
                  <div class="blog-talks margin-bottom-30">
                    <h2>Características de nuestros servicios</h2>
                    <div class="tab-style-1">
                      <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1">Soporte</a></li>
                        <li><a data-toggle="tab" href="#tab-2">Chequeo</a></li>
                        <li><a data-toggle="tab" href="#tab-3">Control</a></li>
                      </ul>
                      <div class="tab-content">
                        <div id="tab-1" class="tab-pane row-fluid fade in active">
                          <p class="margin-bottom-10">Ayuda, capacitación y soporte inmediato para la mantención, supervisión y usabilidad de nuestros sistemas.</p>
                          <!--<p><a class="more" href="javascript:;">Read more</a></p>-->
                        </div>
                        <div id="tab-2" class="tab-pane fade">
                          <p>Nuestros clientes tienen toda la facultad de revisar y aprobar el avance de nuestros proyectos a través de nuestro sitio web.</p>
                        </div>
                        <div id="tab-3" class="tab-pane fade">
                          <p>Como proveedores resguardamos la seguridad de los datos y su correcto funcionamiento ofreciendo un manejo y control completo del sistema.</p>
                        </div>
                      </div>
                    </div>
                  </div>                            
                  <!-- END BLOG TALKS -->

                  <!-- BEGIN BLOG PHOTOS STREAM -->
                  <div class="blog-photo-stream margin-bottom-20">
                    <h2><a href="portafolio.php">Nuestro portafolio</a></h2>
                    <ul class="list-unstyled">
                      <?php
                      foreach ($proy as $value) {
                      ?>
                      <li><a href=<?php echo $value['proy_link']; ?>><img alt="" src=<?php echo $url."/".$value['proy_imagen']; ?>></a></li>
                      <?php
                      }
                      ?>
                    </ul>                    
                  </div>
                  <!-- END BLOG PHOTOS STREAM -->