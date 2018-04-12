<?PHP
// Declaramos una variable $rootDir si es que no existe
// isset==> si existe o no una variable
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
//Agregamos desde BD.PHPy la Entitie Usuario
// desde el Path raiz ==> $rootDir
require_once($rootDir . "/int/BD/bd.php");
require_once($rootDir . "/int/entities/Informe.php");
class InformeDao {
    public static function sqladdId(){
      $var=0;
         $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT MAX(inf_id) FROM `informes`");
         foreach($misRegistros as $fila) 
         {$var=$fila['MAX(inf_id)'];}
       //le sumo 1
        $var=$var+1;
        return $var;
   }
   public static function sqlInsert( $comm)
   {
        $stSql  = "insert into informes (";
        $stSql .= " inf_id ,inf_autor, inf_fecha, inf_titulo, inf_descripcion, proyecto_proy_id, inf_estado";
        $stSql .= " )values (";
        $stSql .= " '{$comm->getId()}'"
                . ",'{$comm->getAutor()}'"
                . ",'{$comm->getFecha()}'"
                . ",'{$comm->getTitulo()}'"
                . ",'{$comm->getDescripcion()}'"
                . ",'{$comm->getIdProyecto()}'"
                . ",'{$comm->getEstado()}'"
                . ")";
		return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlContar($param)
   {
        $stSql = "select * from informes WHERE proyecto_proy_id='{$param}' and inf_estado=1";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlExiste($param)
   {
        $stSql = "select * from informes WHERE inf_id = '{$param}'";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
    public static function sqlBuscar($param)
   {
        $stSql = "select * from informes WHERE inf_id = '{$param}'";
        return BD::getInstance()->sqlSelectTodo($stSql);
   }
   public static function sqlUpdate( $comm)
   {
        $stSql =  "update informes SET ";
        $stSql .= " inf_autor='{$comm->getAutor()}'"
                . ",inf_fecha='{$comm->getFecha()}'"
                . ",inf_titulo='{$comm->getTitulo()}'"
                . ",inf_descripcion='{$comm->getDescripcion()}'"
                . ",proyecto_proy_id='{$comm->getIdProyecto()}'"
                . ",inf_estado='{$comm->getEstado()}'"
                       ;
        $stSql .= " Where  inf_id='{$comm->getId()}'"
                       ;
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   // Método que ejecuta una sentencia,
   // Sin embargo no retorna ningún registro
   public static function sqlSelect( $comm)
   {
        $stSql =  "select *  from  informes ";
        $stSql .= " Where  inf_id ='{$comm->getId()}'"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
	if(!$resultado) return false;
	return true;
   }
   public static function sqlListar($idProyecto)
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `informes` WHERE `proyecto_proy_id`='{$idProyecto}' and `inf_estado`=1 ORDER BY `inf_id` DESC ");
       return $misRegistros;
   }
}
?>