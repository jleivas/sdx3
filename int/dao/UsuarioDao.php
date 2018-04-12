<?PHP
// Declaramos una variable $rootDir si es que no existe
// isset==> si existe o no una variable
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
//Agregamos desde BD.PHPy la Entitie Usuario
// desde el Path raiz ==> $rootDir
require_once($rootDir . "/int/BD/bd.php");
require_once($rootDir . "/int/entities/Cliente.php");
class UsuarioDao {
    public static function sqlHoraRegistro($fecha, $hora, $mail)
   {
        $stSql  = "insert into hora_registro (";
        $stSql .= " `hr_fecha`, `hr_hora`, `hr_mail`, `hr_estado`";
        $stSql .= " )values (";
        $stSql .= " '{$fecha}'"
                . ",'{$hora}'"
                . ",'{$mail}'"
                . ",1"
                . ")";
    return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlFoundRegistro($mail)
   {
        $stSql = "select * from hora_registro WHERE  hr_mail = '{$mail}'";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlInsert( $usuario)
   {
        $stSql  = "insert into cliente (";
        $stSql .= " cli_rut ,cli_pass ,cli_nombre, cli_mail, cli_telefono, cli_direccion, cli_comuna, cli_imagen, cli_tipo, cli_estado";
        $stSql .= " )values (";
        $stSql .= " '{$usuario->getRut()}'"
                . ",'{$usuario->getPass()}'"
                . ",'{$usuario->getNombre()}'"
                . ",'{$usuario->getMail()}'"
                . ",'{$usuario->getTelefono()}'"
                . ",'{$usuario->getDireccion()}'"
                . ",'{$usuario->getComuna()}'"
                . ",'{$usuario->getImagen()}'"
                . ",'{$usuario->getTipo()}'"
                . ",'{$usuario->getEstado()}'"
                . ")";
		return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlContar($param)
   {
        $stSql = "select * from cliente WHERE (cli_nombre LIKE '%{$param}%' OR cli_mail LIKE '%{$param}%') OR (cli_rut LIKE '%{$param}%')";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlExiste($param)
   {
        $stSql = "select * from cliente WHERE cli_rut = '{$param}'";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlFoundMail($param)
   {
        $stSql = "select * from cliente WHERE cli_mail = '{$param}'";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
    public static function sqlBuscar($param)
   {
        $stSql = "select * from cliente WHERE (cli_nombre LIKE '%{$param}%' OR cli_mail LIKE '%{$param}%') OR (cli_rut LIKE '%{$param}%' OR cli_comuna = '{$param}')";
        return BD::getInstance()->sqlSelectTodo($stSql);
   }
   public static function sqlUpdate( $usuario)
   {
        $stSql =  "update cliente SET ";
        $stSql .= " cli_nombre='{$usuario->getNombre()}'"
                . ",cli_pass='{$usuario->getPass()}'"
                . ",cli_mail='{$usuario->getMail()}'"
                . ",cli_telefono='{$usuario->getTelefono()}'"
                . ",cli_direccion='{$usuario->getDireccion()}'"
                . ",cli_comuna='{$usuario->getComuna()}'"
                . ",cli_imagen='{$usuario->getImagen()}'"
                . ",cli_tipo='{$usuario->getTipo()}'"
                . ",cli_estado='{$usuario->getEstado()}'"
                       ;
        $stSql .= " Where  cli_rut='{$usuario->getRut()}'"
                       ;
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   // Método que ejecuta una sentencia,
   // Sin embargo no retorna ningún registro
   public static function sqlSelect( $usuario)
   {
        $stSql =  "select *  from  cliente ";
        $stSql .= " Where  cli_rut ='{$usuario->getRut()}'"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
	if(!$resultado) return false;
	return true;
   }
    // Método que ejecuta una sentencia,
   // Sin embargo no retorna ningún registro
   public static function sqlValida( $user,$pass)
   {
        $stSql =  "select *  from  cliente ";
        $stSql .= " Where  cli_mail ='{$user}' AND cli_pass ='{$pass}'"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
  //if(!$resultado) return null;
  $fila= BD::getInstance()->sqlFetch();
  // Si fila esta vacia,no hay registro devuelve null
  if (!$fila) return null;
  // Llena los valores que faltan a la instancia
  // entregada por parámetro $actor
  $usuarioAux = new Cliente($fila["cli_rut"]
          ,$fila["cli_pass"]
          ,$fila["cli_nombre"]
          ,$fila["cli_mail"]
          ,$fila["cli_telefono"]
          ,$fila["cli_direccion"]
          ,$fila["cli_comuna"]
          ,$fila["cli_imagen"]
          ,$fila["cli_tipo"]
          ,$fila["cli_estado"]);
        return $usuarioAux;
   }
   public static function sqlCargar( $rut)
   {
        $stSql =  "select *  from  cliente ";
        $stSql .= " Where  cli_rut ='{$rut}'"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
  //if(!$resultado) return null;
  $fila= BD::getInstance()->sqlFetch();
  // Si fila esta vacia,no hay registro devuelve null
  if (!$fila) return null;
  // Llena los valores que faltan a la instancia
  // entregada por parámetro $actor
  $usuarioAux = new Cliente($fila["cli_rut"]
          ,$fila["cli_pass"]
          ,$fila["cli_nombre"]
          ,$fila["cli_mail"]
          ,$fila["cli_telefono"]
          ,$fila["cli_direccion"]
          ,$fila["cli_comuna"]
          ,$fila["cli_imagen"]
          ,$fila["cli_tipo"]
          ,$fila["cli_estado"]);
        return $usuarioAux;
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
  $usuarioAux = new Cliente($fila["cli_rut"]
          ,$fila["cli_pass"]
          ,$fila["cli_nombre"]
          ,$fila["cli_mail"]
          ,$fila["cli_telefono"]
          ,$fila["cli_direccion"]
          ,$fila["cli_comuna"]
          ,$fila["cli_imagen"]
          ,$fila["cli_tipo"]
          ,$fila["cli_estado"]);
        return $usuarioAux;
   }
   public static function sqlFetchUsuario($usuario)
   {
	// Retorna un registro
	$fila= BD::getInstance()->sqlFetch();
	// Si fila esta vacia,no hay registro devuelve false
        if (!$fila) return false;
	// Llena los valores que faltan a la instancia
	// entregada por parámetro $actor
        $usuario->setRut($fila["cli_rut"]);
        $usuario->setPass($fila["cli_pass"]);
        $usuario->setNombre($fila["cli_nombre"]);
        $usuario->setMail($fila["cli_mail"]);
        $usuario->setTelefono($fila["cli_telefono"]);
        $usuario->setDireccion($fila["cli_direccion"]);
        $usuario->setComuna($fila["cli_comuna"]);
        $usuario->setImagen($fila["cli_imagen"]);
        $usuario->setTipo($fila["cli_tipo"]);
        $usuario->setEstado($fila["cli_estado"]);
        return true;						  
   }
   public static function sqlEstado($estado)
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `cliente` WHERE `cli_estado`='{$estado}'");
       return $misRegistros;
   }
}
?>