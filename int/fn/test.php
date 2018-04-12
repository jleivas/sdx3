<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/BlogDao.php");
require_once($rootDir . "/int/dao/ComentarioDao.php");

$consulta_noticias = BlogDao::sqlTodo();
$num_total_registros = BlogDao::sqlContarTodo();
$host= $_SERVER["HTTP_HOST"];
$url= $_SERVER["REQUEST_URI"];
echo "http://" . $host . $url;
echo "<br>URL".$url."<br>";
//Limito la busqueda
$TAMANO_PAGINA = 4;

//examino la página a mostrar y el inicio del registro a mostrar
$pagina = 1;
if (isset($_GET["pagina"])) {
   $inicio = 0;
   $pagina = $_GET["pagina"];
   $inicio = ($pagina - 1) * $TAMANO_PAGINA;
   echo "Pagina actual: ".$pagina."  Desde:".$inicio." Hasta:".$TAMANO_PAGINA;
}
else {
   echo "Pagina actual: ".$pagina;
   $inicio = ($pagina - 1) * $TAMANO_PAGINA;
   echo "Pagina actual: ".$pagina."  Desde:".$inicio." Hasta:".$TAMANO_PAGINA;
}
//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

$rs = BlogDao::sqlTodoLimit($inicio,$TAMANO_PAGINA);

$url="test.php";

foreach ($rs as $fila) {
   echo "<br>".$fila['blo_titulo'];
}
echo "<br>";

if ($total_paginas > 1) {
   if ($pagina != 1)
      echo '<a href="'.$url.'?pagina='.($pagina-1).'">Anterior</a>';
      for ($i=1;$i<=$total_paginas;$i++) {
         if ($pagina == $i)
            //si muestro el índice de la página actual, no coloco enlace
            echo $pagina;
         else
            //si el índice no corresponde con la página mostrada actualmente,
            //coloco el enlace para ir a esa página
            echo '  <a href="'.$url.'?pagina='.$i.'">'.$i.'</a>  ';
      }
      if ($pagina != $total_paginas)
         echo '<a href="'.$url.'?pagina='.($pagina+1).'">Siguiente</a>';
}


?>