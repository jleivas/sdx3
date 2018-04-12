<?PHP
// Incluimos el archivo de excepciones
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once ($rootDir."/int/exc/UsuarioExc.php");
   class Cliente {
           // Atributos
		private $rut;
		private $pass;
		private $nombre;
		private $mail;		   
		private $telefono;
		private $direccion;
		private $comuna;
		private $imagen;
		private $tipo;
		private $estado;

		   
           // Mutadores y Accesadores
		public function getRut(){
			return $this->rut;
		}
		public function setRut($rut){
			if($rut == null ||
				strlen($rut) < 9 ||
				strlen($rut) > 10)
				throw new UsuarioExc(UsuarioExc::THROW_RUT);
			$this->rut = $rut;
		}
		public function getPass(){
			return $this->pass;
		}
		public function setPass($pass){
			if($pass == null ||
				strlen($pass) < 4 ||
				strlen($pass) > 60)
				throw new UsuarioExc(UsuarioExc::THROW_PASS);
			$this->pass = $pass;
		}
		public function getNombre()
		{
			return $this->nombre;
		}
		public function setNombre($nombre)
		{
			if ($nombre == null 
			     || strlen($nombre) < 3
				 || strlen($nombre) > 60
				 )
                   // Lanzamos una Excepción de FirstName
			throw new UsuarioExc(UsuarioExc::THROW_FIRSTNAME);
			//throw new Exception("Error FistName 3..45");
			$this->nombre = $nombre;
		}
		public function getMail()
		{
			return $this->mail;
		}		
		public function setMail($mail)
		{
			if (strlen($mail) < 4
				 || strlen($mail) > 60
				 )
			throw new UsuarioExc(UsuarioExc::THROW_MAIL);
			$this->mail = $mail;
		}
		public function getTelefono()
		{
			return $this->telefono;
		}		
		public function setTelefono($telefono)
		{
			$this->telefono = $telefono;
		}
		public function getDireccion()
		{
			return $this->direccion;
		}		
		public function setDireccion($direccion)
		{
			$this->direccion = $direccion;
		}
		public function getComuna()
		{
			return $this->comuna;
		}		
		public function setComuna($comuna)
		{
			$this->comuna = $comuna;
		}	
		public function getImagen()
		{
			return $this->imagen;
		}		
		public function setImagen($imagen)
		{
			$this->imagen = $imagen;
		}
		public function getTipo()
		{
			return $this->tipo;
		}		
		public function setTipo($tipo)
		{
			$this->tipo = $tipo;
		}
		public function getEstado()
		{
			return $this->estado;
		}		
		public function setEstado($estado)
		{
			$this->estado = $estado;
		}	   
           // Constructor
		public function Cliente($rut=0,$pass="null",$nombre="null",$mail="null",$telefono="null",$direccion="null",$comuna="null",$imagen="null",$tipo=0,$estado=0)
		{
			$this->setRut($rut);
			$this->setPass($pass);
			$this->setNombre($nombre);
			$this->setMail($mail);
			$this->setTelefono($telefono);
			$this->setDireccion($direccion);
			$this->setComuna($comuna);
			$this->setImagen($imagen);
			$this->setTipo($tipo);
			$this->setEstado($estado);
		}
// Destructor
	    function __destruct() {
		echo "<a></a>";
            }
		   // Constructor
		//public function Usuario($rut=1111111, $dv=1, $medidor=0, $nombre="null",$apellido="null",$mail=null,$telefono=null,$direccion="null",$tipo="USER",$password="null")
		
         
			   
           // toString
           // imprimir
        public function __toString(){
        // Registro JSon
		return "{" 
		          . chr(34) . "Rut" . chr(34) . ":" . chr(34) . $this->getRut() . chr(34) 
		    . "," . chr(34) . "Nombre" . chr(34) . ":" . chr(34) . $this->getNombre() . chr(34) 
		    . "," . chr(34) . "Mail" . chr(34) . ":" . chr(34) . $this->getMail() . chr(34) 
		    . "," . chr(34) . "Estado" . chr(34) . ":" . chr(34) . $this->getEstado() . chr(34) 
		 . "}";
   		}   
   		public function imprimir()
   		{
        	echo $this->__toString();
   		}
   }
   
// Una vez que este Listo eliminar este código   
//$usuario = new Usuario();
//var_dump($usuario);
//$usuario = new Usuario(234,null,"Valdivia","2017-01-01");
//var_dump($actor);
// Para realizar pruebas
//$actor = new Actor(325,"Juan","Valdivia");
//echo "Imprimir ";
//$actor->imprimir(); // llama imprimir el cual reutiliza __toString()
//echo "ToString : " . $actor; // al concatenar, automáticamente llama a __toString
?>