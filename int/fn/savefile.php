<?php
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

$contentHtml = "";

if(isset($_POST['fecha'])){//será el path de la noticia
    $path=$_POST['fecha'];
    $contentHtml = $contentHtml . '
<?php
if (!isset($rootDir)) $rootDir = $_SERVER[\'DOCUMENT_ROOT\'];
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
    $titulo=$blog\->getTitulo();
    $cat2=$blog\->getCategoria();
  }
}
    ';
	if(isset($_POST['category'])){
        $category=$_POST['category'];
        if(isset($_POST['autor'])){
            $autor=$_POST['autor'];
            if(isset($_POST['titulo'])){
                $titulo=$_POST['titulo'];
                if(isset($_POST['img1'])){
                    $img1=$_POST['img1'];
                }else{
                    //no img1 CARRUSEL
                }
                if(isset($_POST['img2'])){
                    $img2=$_POST['img2'];
                }else{
                    //no img2 CARRUSEL
                }
                if(isset($_POST['img3'])){
                    $img3=$_POST['img3'];
                }else{
                    //no img3 CARRUSEL
                }
                if(isset($_POST['video'])){
                    $video=$_POST['video'];
                }else{
                    //no VIDEO CARRUSEL
                }
                if(isset($_POST['longTitle'])){
                    $longTitle=$_POST['longTitle'];
                }else{
                    //no Long Title <h2><a href="">
                }
                if(isset($_POST['introText'])){
                    $introText=$_POST['introText'];
                }else{
                    //no introText <p>
                }
                if(isset($_POST['commit'])){//commit <blockquote><p>
                    $commit=$_POST['commit'];
                    if(isset($_POST['autorCommit'])){//autorCommit <small><p>
                        $autorCommit=$_POST['autorCommit'];
                    }else{
                        //no autorCommit <small><p>
                    }
                    if(isset($_POST['cargoAutorCommit'])){//cargoAutorCommit <small><p> excluyente
                        $cargoAutorCommit=$_POST['cargoAutorCommit'];//e.g <cite title="cargoAutorCommit">
                    }else{
                        //no cargoAutorCommit <small><p>
                    }
                    if(isset($_POST['lugarAutorCommit'])){//lugarAutorCommit <cite><small> excluyente
                        $lugarAutorCommit=$_POST['lugarAutorCommit'];
                    }else{
                        //no lugarAutorCommit <cite><small>
                    }
                    if(isset($_POST['parraf1'])){//parraf1 <p> excluyente
                        $parraf1=$_POST['parraf1'];
                    }else{
                        //no parraf1 <p>
                    }
                    if(isset($_POST['imgParraf1'])){//imgParraf1 <img> excluyente
                        $imgParraf1=$_POST['imgParraf1'];
                    }else{
                        //no imgParraf1 <img>
                    }
                    if(isset($_POST['parraf2'])){//parraf2 <p> excluyente
                        $parraf2=$_POST['parraf2'];
                    }else{
                        //no parraf2 <p>
                    }
                    if(isset($_POST['imgParraf2'])){//imgParraf2 <img> excluyente
                        $imgParraf2=$_POST['imgParraf2'];
                    }else{
                        //no imgParraf2 <img>
                    }
                    if(isset($_POST['parraf3'])){//parraf3 <p> excluyente
                        $parraf3=$_POST['parraf3'];
                    }else{
                        //no parraf3 <p>
                    }
                    if(isset($_POST['imgParraf3'])){//imgParraf3 <img> excluyente
                        $imgParraf3=$_POST['imgParraf3'];
                    }else{
                        //no imgParraf3 <img>
                    }
                    if(isset($_POST['fuente'])){//fuente <p> excluyente
                        $fuente=$_POST['fuente'];
                        if(isset($_POST['linkFuente'])){//linkFuente <a> excluyente
                            $linkFuente=$_POST['linkFuente'];
                        }else{
                            //no linkFuente <a>
                        }
                    }else{
                        //no fuente <p>
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