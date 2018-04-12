<?PHP
// Incluimos el archivo de excepciones
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
   class Informe {
           // Atributos
		private $id;
		private $autor;
		private $fecha;
		private $titulo;
		private $descripcion;
		private $idProyecto;
		private $estado;		   
		

		   
           // Mutadores y Accesadores
		//id
		public function getId(){
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
		}
		public function getAutor()
		{
			return $this->autor;
		}
		public function setAutor($autor)
		{
			
			  
			$this->autor = $autor;
		}
		public function getFecha(){
			return $this->fecha;
		}

		public function setFecha($fecha)
		{
			$this->fecha = $fecha;
		}
		public function getTitulo(){
			return $this->titulo;
		}
		public function setTitulo($titulo){
			$this->titulo = $titulo;
		}
		public function getDescripcion(){
			return $this->descripcion;
		}
		public function setDescripcion($descripcion){
			$this->descripcion = $descripcion;
		}
		public function getIdProyecto(){
			return $this->idProyecto;
		}
		public function setIdProyecto($idProyecto){
			$this->idProyecto = $idProyecto;
		}
		public function getEstado(){
			return $this->estado;
		}
		public function setEstado($estado)
		{
			$this->estado = $estado;
		}


			   
           // Constructor
		public function Informe($id=0, $autor="null", $fecha=null, $titulo="null",$descripcion="null",$idProyecto=0,$estado=0)
		{
			$this->setId($id);
			$this->setAutor($autor);
			$this->setFecha($fecha);
			$this->setTitulo($titulo);
			$this->setDescripcion($descripcion);
			$this->setIdProyecto($idProyecto);
			$this->setEstado($estado);
		}
// Destructor
	     function __destruct() {
	     echo "<a></a>";
         }
		   // Constructor
		//public function Usuario($rut=1111111, $dv=1, $medidor=0, $nombre="null",$apellido="null",$mail=null,$telefono=null,$direccion="null",$tipo="USER",$username="null",$password="null")
		
         
			   
           // toString
           // imprimir
        public function __toString(){
        // Registro JSon
		return "{" 
		          . chr(34) . "Id" . chr(34) . ":" . chr(34) . $this->getId() . chr(34) 
		    . "," . chr(34) . "Nombre Autor" . chr(34) . ":" . chr(34) . $this->getAutor() . chr(34) 
		    . "," . chr(34) . "Titulo" . chr(34) . ":" . chr(34) . $this->getTitulo() . chr(34) 
		    . "," . chr(34) . "Fecha" . chr(34) . ":" . chr(34) . $this->getFecha() . chr(34) 
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