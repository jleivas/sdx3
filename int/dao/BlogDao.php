<?PHP
// Declaramos una variable $rootDir si es que no existe
// isset==> si existe o no una variable
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
//Agregamos desde BD.PHPy la Entitie Usuario
// desde el Path raiz ==> $rootDir
require_once($rootDir . "/int/BD/bd.php");
require_once($rootDir . "/int/entities/Blog.php");
class BlogDao {
   public static function sqladdId(){
         $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT MAX(blo_id) FROM `blog`");
         foreach($misRegistros as $fila) 
         {$var=$fila['MAX(blo_id)'];}
       //le sumo 1
        $var=$var+1;
        return $var;
   }
   public static function sqlInsert( $blog)
   {
        $stSql  = "insert into blog (";
        $stSql .= " blo_id ,blo_link ,blo_titulo, blo_cita, blo_autor, blo_fecha, blo_imagen, blo_categoria, blo_estado";
        $stSql .= " )values (";
        $stSql .= " '{$blog->getId()}'"
                . ",'{$blog->getLink()}'"
                . ",'{$blog->getTitulo()}'"
                . ",'{$blog->getCita()}'"
                . ",'{$blog->getAutor()}'"
                . ",'{$blog->getFecha()}'"
                . ",'{$blog->getImagen()}'"
                . ",'{$blog->getCategoria()}'"
                . ",'{$blog->getEstado()}'"
                . ")";
		return BD::getInstance()->sqlEjecutar($stSql);
   }
    public static function sqlBuscar($param)
   {
        $stSql = "select * from blog WHERE blo_link = '{$param}'";
        return BD::getInstance()->sqlSelectTodo($stSql);
   }
   public static function sqlExiste($link)
   {
        $stSql = "select * from blog WHERE blo_link='{$link}' and blo_estado=1";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlUpdate( $blog)
   {
        $stSql =  "update blog SET ";
        $stSql .= " blo_titulo='{$blog->getTitulo()}'"
                . ",blo_cita='{$blog->getCita()}'"
                . ",blo_autor='{$blog->getAutor()}'"
                . ",blo_link='{$blog->getLink()}'"
                . ",blo_fecha='{$blog->getFecha()}'"
                . ",blo_imagen='{$blog->getImagen()}'"
                . ",blo_categoria='{$blog->getCategoria()}'"
                . ",blo_estado='{$blog->getEstado()}'"
                       ;
        $stSql .= " Where  blo_id='{$blog->getId()}'"
                       ;
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   // Método que ejecuta una sentencia,
   // Sin embargo no retorna ningún registro
   public static function sqlSelect( $blog)
   {
        $stSql =  "select *  from  blog ";
        $stSql .= " Where  blo_link ='{$blog->getLink()}'"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
	if(!$resultado) return false;
	return true;
   }
    // Método que ejecuta una sentencia,
   // Sin embargo no retorna ningún registro
   public static function sqlCargar( $link)
   {
        $stSql =  "select *  from  blog ";
        $stSql .= " Where  blo_link ='{$link}'"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
  //if(!$resultado) return null;
  $fila= BD::getInstance()->sqlFetch();
  // Si fila esta vacia,no hay registro devuelve null
  if (!$fila) return null;
  // Llena los valores que faltan a la instancia
  // entregada por parámetro $actor
  $blogAux = new Blog($fila["blo_id"]
          ,$fila["blo_link"]
          ,$fila["blo_titulo"]
          ,$fila["blo_cita"]
          ,$fila["blo_autor"]
          ,$fila["blo_fecha"]
          ,$fila["blo_imagen"]
          ,$fila["blo_categoria"]
          ,$fila["blo_estado"]);
        return $blogAux;
   }
   // Método que busca el siguiente registro disponible
   // De acuerdo a la sentencia sql ejecutada por sqlSelect
   // crea una instancia de actory la devuelve
   // Observe que no recibe parámetro, ya que retorna un actor
   public static function sqlFetch()
   {
  // Retorna un registro
  $fila= BD::getInstance()->sqlFetch();
  // Si fila esta vacia,no hay registro devuelve null
  if (!$fila) return null;
  // Llena los valores que faltan a la instancia
  // entregada por parámetro $actor
  $blogAux = new Blog($fila["blo_id"]
          ,$fila["blo_link"]
          ,$fila["blo_titulo"]
          ,$fila["blo_cita"]
          ,$fila["blo_autor"]
          ,$fila["blo_fecha"]
          ,$fila["blo_imagen"]
          ,$fila["blo_categoria"]
          ,$fila["blo_estado"]);
        return $blogAux;
   }
   public static function sqlFetchBlog($blog)
   {
	// Retorna un registro
	$fila= BD::getInstance()->sqlFetch();
	// Si fila esta vacia,no hay registro devuelve false
        if (!$fila) return false;
	// Llena los valores que faltan a la instancia
	// entregada por parámetro $actor
        $blog->setId($fila["blo_id"]);
        $blog->setLink($fila["blo_link"]);
        $blog->setTitulo($fila["blo_titulo"]);
        $blog->setCita($fila["blo_cita"]);
        $blog->setAutor($fila["blo_autor"]);
        $blog->setFecha($fila["blo_fecha"]);
        $blog->setImagen($fila["blo_imagen"]);
        $blog->setCategoria($fila["blo_categoria"]);
        $blog->setEstado($fila["blo_estado"]);
        return true;						  
   }
   public static function sqlContar($param)
   {
        $stSql = "select * from blog WHERE blo_categoria='{$param}' and blo_estado=1";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlContarTodo()
   {
        $stSql = "select * from blog WHERE blo_estado=1";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlCategoria($categoria,$inicio,$tam_pag)
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `blog` WHERE `blo_categoria`='{$categoria}' and `blo_estado`=1 ORDER BY `blo_id` DESC LIMIT {$inicio},{$tam_pag}");
       return $misRegistros;
   }
   public static function sqlTodo()
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `blog` WHERE `blo_estado`=1 ORDER BY `blo_id` DESC");
       return $misRegistros;
   }

   public static function sqlEstado($estado)
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `blog` WHERE `blo_estado`={$estado} ORDER BY `blo_id` DESC");
       return $misRegistros;
   }

   public static function sqlTodoLimit($inicio,$tam_pag)
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `blog` WHERE `blo_estado`=1 ORDER BY `blo_id` DESC LIMIT {$inicio},{$tam_pag}");
       return $misRegistros;
   }
}
?>