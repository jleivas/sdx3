<?PHP
// Declaramos una variable $rootDir si es que no existe
// isset==> si existe o no una variable
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
//Agregamos desde BD.PHPy la Entitie Usuario
// desde el Path raiz ==> $rootDir
require_once($rootDir . "/int/BD/bd.php");
require_once($rootDir . "/int/entities/Proyecto.php");
class ProyectoDao {
   public static function sqladdId(){
         $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT MAX(proy_id) FROM `proyecto`");
         foreach($misRegistros as $fila) 
         {$var=$fila['MAX(proy_id)'];}
       //le sumo 1
        $var=$var+1;
        return $var;
   }
   public static function sqlInsert( $proyecto)
   {
        $stSql  = "insert into proyecto (";
        $stSql .= " proy_id,proy_link ,proy_nombre, proy_imagen, proy_monto, proy_saldo, proy_categoria, proy_estado, proy_factura, cliente_cli_rut";
        $stSql .= " )values (";
        $stSql .= " '{$proyecto->getId()}'"
                . ",'{$proyecto->getLink()}'"
                . ",'{$proyecto->getNombre()}'"
                . ",'{$proyecto->getImagen()}'"
                . ",'{$proyecto->getMonto()}'"
                . ",'{$proyecto->getSaldo()}'"
                . ",'{$proyecto->getCategoria()}'"
                . ",'{$proyecto->getEstado()}'"
                . ",'{$proyecto->getFactura()}'"
                . ",'{$proyecto->getRutCliente()}'"
                . ")";
		return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlContar($param)
   {
        $stSql = "select * from proyecto WHERE proy_link LIKE '%{$param}%'";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlExiste($param)
   {
        $stSql = "select * from proyecto WHERE proy_link = '{$param}'";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
    public static function sqlBuscar($param)
   {
        $stSql = "select * from proyecto WHERE proy_link LIKE '%{$param}%'";
        return BD::getInstance()->sqlSelectTodo($stSql);
   }
   public static function sqlUpdate( $proyecto)
   {
        $stSql =  "update proyecto SET ";
        $stSql .= " proy_nombre='{$proyecto->getNombre()}'"
                . ",proy_imagen='{$proyecto->getImagen()}'"
                . ",proy_monto='{$proyecto->getMonto()}'"
                . ",proy_saldo='{$proyecto->getSaldo()}'"
                . ",proy_categoria='{$proyecto->getCategoria()}'"
                . ",proy_estado='{$proyecto->getEstado()}'"
                . ",proy_factura='{$proyecto->getFactura()}'"
                . ",cliente_cli_rut='{$proyecto->getRutCliente()}'"
                       ;
        $stSql .= " Where  proy_link='{$proyecto->getLink()}'"
                       ;
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   // Método que ejecuta una sentencia,
   // Sin embargo no retorna ningún registro
   public static function sqlSelect( $proyecto)
   {
        $stSql =  "select *  from  proyecto ";
        $stSql .= " Where  proy_link ='{$proyecto->getLink()}'"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
	if(!$resultado) return false;
	return true;
   }
    // Método que ejecuta una sentencia,
   // Sin embargo no retorna ningún registro
   public static function sqlCargar( $link)
   {
        $stSql =  "select *  from  proyecto ";
        $stSql .= " Where  proy_link ='{$link}'"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
  //if(!$resultado) return null;
  $fila= BD::getInstance()->sqlFetch();
  // Si fila esta vacia,no hay registro devuelve null
  if (!$fila) return null;
  // Llena los valores que faltan a la instancia
  // entregada por parámetro $actor
  $proyectoAux = new Proyecto($fila["proy_id"]
          ,$fila["proy_link"]
          ,$fila["proy_nombre"]
          ,$fila["proy_imagen"]
          ,$fila["proy_monto"]
          ,$fila["proy_saldo"]
          ,$fila["proy_categoria"]
          ,$fila["proy_estado"]
          ,$fila["proy_factura"]
          ,$fila["cliente_cli_rut"]);
        return $proyectoAux;
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
  $proyectoAux = new Proyecto($fila["proy_id"]
          ,$fila["proy_link"]
          ,$fila["proy_nombre"]
          ,$fila["proy_imagen"]
          ,$fila["proy_monto"]
          ,$fila["proy_saldo"]
          ,$fila["proy_categoria"]
          ,$fila["proy_estado"]
          ,$fila["proy_factura"]
          ,$fila["cliente_cli_rut"]);
        return $proyectoAux;
   }
   public static function sqlFetchProyecto($proyecto)
   {
	// Retorna un registro
	$fila= BD::getInstance()->sqlFetch();
	// Si fila esta vacia,no hay registro devuelve false
        if (!$fila) return false;
	// Llena los valores que faltan a la instancia
	// entregada por parámetro $actor
        $proyecto->setId($fila["proy_id"]);
        $proyecto->setLink($fila["proy_link"]);
        $proyecto->setNombre($fila["proy_nombre"]);
        $proyecto->setImagen($fila["proy_imagen"]);
        $proyecto->setMonto($fila["proy_monto"]);
        $proyecto->setSaldo($fila["proy_saldo"]);
        $proyecto->setCategoria($fila["proy_categoria"]);
        $proyecto->setEstado($fila["proy_estado"]);
         $proyecto->setEstado($fila["proy_factura"]);
        $proyecto->setRutCliente($fila["cliente_cli_rut"]);
        return true;						  
   }
   public static function sqlCategoria($categoria)
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `proyecto` WHERE `proy_categoria`='{$categoria}' and `proy_estado`!=0 ORDER BY `proy_id` DESC");
       return $misRegistros;
   }
   public static function sqlCliente($rut)
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `proyecto` WHERE `cliente_cli_rut`='{$rut}' and `proy_estado`!=0 ORDER BY `proy_id` DESC");
       return $misRegistros;
   }
   public static function sqlPagados($rut)
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `proyecto` WHERE `cliente_cli_rut`='{$rut}' and `proy_estado`!=0 and proy_saldo=0 ORDER BY `proy_id` DESC");
       return $misRegistros;
   }
   public static function sqlPendientes($rut)
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `proyecto` WHERE `cliente_cli_rut`='{$rut}' and `proy_estado`=2 and proy_saldo!=0 ORDER BY `proy_id` DESC");
       return $misRegistros;
   }
   public static function sqlCobrados($rut)
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `proyecto` WHERE `cliente_cli_rut`='{$rut}' and `proy_estado`=1 and proy_saldo!=0 ORDER BY `proy_id` DESC");
       return $misRegistros;
   }
   public static function sqlTodo()
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `proyecto` WHERE `proy_estado`!=0 ORDER BY `proy_id` DESC");
       return $misRegistros;
   }
   public static function sqlTodoLimit($inicio,$fin)
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `proyecto` WHERE `proy_estado`!=0 ORDER BY `proy_id` DESC LIMIT {$inicio},{$fin}");
       return $misRegistros;
   }
   public static function sqlEstado($estado)
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `proyecto` WHERE `proy_estado`='{$estado}' ORDER BY `proy_id` DESC");
       return $misRegistros;
   }
}
?>