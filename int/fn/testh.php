<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 
<?php 
 
    /*
     * 1.- Creamos la variable que contiene el archivo que tenemos que crear.
     * 2.- preguntamos si existe el archivo, si el archivo existe "se ha modificado"
       en caso contrario el archivo se ha creado.
     * 3.- Con fopen abrimos un archivo o url, en este caso vamos a abrir un archivo
       pasando como parámetro la variable $nombre_archivo que es la que contiene 
       nuestro archivo y como segundo parámetro como lo vamos a abrir, en este caso "a"
       que nos abre el fichero en solo lectura y sitúa el puntero al final del fichero
       y en el caso de que no exista lo crea.
 
       ******Para terminar*******
 
       4.-Con el fwrite escribimos dentro del archivo la fecha con la hora de Creación 
       o modificación, según el caso, con la variable $mensaje, 
 
    */
    $nombre_carpeta = "../../2017/a"; 

	if(!is_dir($nombre_carpeta)){ 
	@mkdir($nombre_carpeta, 0755); 
	}else{ 
	echo "Ya existe ese directorio\n"; 
	}  
     
    $nombre_archivo = "../../2017/a/logs.php"; 
 
    $contenido ="<?php\n".
    			"if (!isset(\$rootDir)) \$rootDir = \$_SERVER['DOCUMENT_ROOT'];\n".
    			"require_once(\$rootDir . '/int/dao/ComentarioDao.php'); \n".
    			"?>ñ \n".

    


require_once($rootDir . "/int/dao/BlogDao.php");
 
    if($archivo = fopen($nombre_archivo, "a"))
    {
        if(fwrite($archivo, date("d m Y H:m:s"). " ". $contenido. "\n"))
        {
            echo "Se ha ejecutado correctamente";
        }
        else
        {
            echo "Ha habido un problema al crear el archivo";
        }
 
        fclose($archivo);
    }

    
    
  

    $nombre_archivo2 = "../../2017/a/index.html";
    $redir = "<script>\ndocument.location.href='http://www.softdirex.cl/';\n</script>";
    if($archivo2 = fopen($nombre_archivo2, "a"))
    {
        if(fwrite($archivo2, $redir))
        {
            echo "Se ha ejecutado correctamente";
        }
        else
        {
            echo "Ha habido un problema al crear el archivo";
        }
 
        fclose($archivo2);
    }
 
 ?>