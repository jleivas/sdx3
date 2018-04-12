<?PHP
// Declaramos una variable $rootDir si es que no existe
// isset==> si existe o no una variable
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
//Agregamos desde BD.PHPy la Entitie Usuario
// desde el Path raiz ==> $rootDir
require_once($rootDir . "/int/BD/bd.php");
require_once($rootDir . "/int/entities/Comentario.php");
class ComentarioDao {
    public static function sqladdId(){
         $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT MAX(com_id) FROM `comentario`");
         foreach($misRegistros as $fila) 
         {$var=$fila['MAX(com_id)'];}
       //le sumo 1
        $var=$var+1;
        return $var;
   }
   public static function sqlCargar( $id)
   {
        $stSql =  "select *  from  comentario ";
        $stSql .= " Where  com_id ='{$id}'"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
  //if(!$resultado) return null;
  $fila= BD::getInstance()->sqlFetch();
  // Si fila esta vacia,no hay registro devuelve null
  if (!$fila) return null;
  // Llena los valores que faltan a la instancia
  // entregada por parámetro $actor
  $comAux = new Comentario($fila["com_id"]
          ,$fila["com_autor"]
          ,$fila["com_fecha"]
          ,$fila["com_mensaje"]
          ,$fila["com_estado"]
          ,$fila["blog_blo_link"]);
        return $comAux;
   }
   public static function sqlInsert( $comm)
   {
        $stSql  = "insert into comentario (";
        $stSql .= " com_id ,com_autor, com_fecha, com_mensaje, com_estado, blog_blo_link";
        $stSql .= " )values (";
        $stSql .= " '{$comm->getId()}'"
                . ",'{$comm->getAutor()}'"
                . ",'{$comm->getFecha()}'"
                . ",'{$comm->getMensaje()}'"
                . ",'{$comm->getEstado()}'"
                . ",'{$comm->getLinkBlog()}'"
                . ")";
		return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlContar($param)
   {
        $stSql = "select * from comentario WHERE blog_blo_link='{$param}' and com_estado=1";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlExiste($param)
   {
        $stSql = "select * from comentario WHERE com_id = '{$param}' and com_estado=1";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
    public static function sqlBuscar($param)
   {
        $stSql = "select * from comentario WHERE com_id = '{$param}'";
        return BD::getInstance()->sqlSelectTodo($stSql);
   }
   public static function sqlUpdate( $comm)
   {
        $stSql =  "update comentario SET ";
        $stSql .= " com_autor='{$comm->getAutor()}'"
                . ",com_fecha='{$comm->getFecha()}'"
                . ",com_mensaje='{$comm->getMensaje()}'"
                . ",com_estado='{$comm->getEstado()}'"
                . ",blog_blo_link='{$comm->getLinkBlog()}'"
                       ;
        $stSql .= " Where  com_id='{$comm->getId()}'"
                       ;
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   // Método que ejecuta una sentencia,
   // Sin embargo no retorna ningún registro
   public static function sqlSelect( $comm)
   {
        $stSql =  "select *  from  comentario ";
        $stSql .= " Where  com_id ='{$comm->getId()}'"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
	if(!$resultado) return false;
	return true;
   }
   public static function sqlListar($link)
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `comentario` WHERE `blog_blo_link`='{$link}' and `com_estado`=1 ORDER BY com_id DESC;");
       return $misRegistros;
   }
}
?>