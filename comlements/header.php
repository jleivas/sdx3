<?php 
$dominio= $_SERVER["HTTP_HOST"];
$url= "https://".$dominio;
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once( $rootDir . "/int/dao/UsuarioDao.php");
session_start();//carga la sesion
 ?>
<div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-phone"></i><span>+569 9867 2957</span></li>
                        <li><i class="fa fa-envelope-o"></i><span>contacto@softdirex.cl</span></li>
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <?php 
                if(!$_SESSION){
                ?>
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
                        <li><a href=<?php echo $url."/entrar.php"; ?>>Ingresar</a></li>
                        <li><a href=<?php echo $url."/registro.php"; ?>>Registrarse</a></li>
                    </ul>
                </div>
                <?php
                }else{
                ?>
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
                        <li ><a href=<?php echo $url."/misdatos.php" ?>><?php echo $_SESSION['usuario']->getNombre() ?></a></li>
                        <li><form action=<?php echo $url."/int/fn/cerrar.php" ?>>
                     <button type="submit" class="btn btn-primary">Cerrar sesión</button>
                    </form></li>
                    </ul>
                </div>
                <?php
                } 
                ?>
                <!-- END TOP BAR MENU -->
            </div>
        </div>        
</div>
    <!-- END TOP BAR -->
    <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <a class="site-logo" href=<?php echo $url; ?>><img src=<?php echo $url."/assets/corporate/img/logos/logo-softdirex.png"; ?> alt="Softdirex"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation pull-right font-transform-inherit">
          <ul>
            <li class="dropdown active">
              <a href=<?php echo $url;?>>
                Inicio 
                
              </a>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Servicios 
                
              </a>
                
              <ul class="dropdown-menu">
                <li><a href=<?php echo $url."/sitios-web.html"; ?>>Sitios web</a></li>
                <li><a href=<?php echo $url."/servicio-tecnico.html"; ?>>Servicio técnico</a></li>
                <li><a href=<?php echo $url."/desarrollo-software.html"; ?>>Desarrollo de software</a></li>
                <li><a href=<?php echo $url."/aplicaciones-web.html"; ?>>Aplicaciones web</a></li>
                <li><a href=<?php echo $url."/certificado-digital.html"; ?>>Certificado digital</a></li>
                <li><a href=<?php echo $url."/social-media.html"; ?>>Social media</a></li>
                <li><a href=<?php echo $url."/asesoria.html"; ?>>Asesoría</a></li>               
              </ul>
            </li>
            <li class="dropdown">
              <a href=<?php echo $url."/portafolio.php" ?>>
                Portafolio 
                
              </a>
            </li>
            <?php if(!$_SESSION){ ?>
              <li class="dropdown">
                <a href=<?php echo $url."/entrar.php" ?>>
                    Cliente
                    
                </a>
            </li>
            <?php 
            }else{
            ?>
            <li class="dropdown dropdown-megamenu">
                <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                    Cliente
                    
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <div class="header-navigation-content">
                            <div class="row">
                                <div class="col-md-4 header-navigation-col">
                                    <h4>Perfil</h4>
                                    <ul>
                                    <li><a href=<?php echo $url."/misdatos.php"; ?>>Datos personales</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4 header-navigation-col">
                                    <h4>Proyectos</h4>
                                    <ul>
                                    <li><a href=<?php echo $url."/proyectos.php"; ?>>Mis proyectos</a></li>
                                    <li><a href=<?php echo $url."/cuenta.php"; ?>>Cuenta</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4 header-navigation-col">
                                    <h4>Sesión</h4>
                                    <ul>
                                    <li>
                                      <form action=<?php echo $url."/int/fn/cerrar.php"; ?>>
                                        <button type="submit" class="btn btn-primary">Cerrar sesión</button>
                                      </form>
                                    </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
            <?php 
            }
            ?>
            <li class="dropdown">
              <a href=<?php echo $url."/compras.html"; ?>>
                Compras 
                
              </a>
            </li>
            <li class="dropdown">
            <a href=<?php echo $url."/faq.html"; ?>>
                Preguntas frecuentes 
                
              </a>
            </li>
            <li class="dropdown">
            <a href=<?php echo $url."/noticias.php"; ?>>
                Noticias 
                
              </a>
            </li>
            <li class="dropdown">
              <a href=<?php echo $url."/page-about.html"; ?>>
                Nosotros 
                
              </a>
            </li>
            <li class="dropdown">
              <a href=<?php echo $url."/page-contacts.html"; ?>>
                Contacto 
                
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>