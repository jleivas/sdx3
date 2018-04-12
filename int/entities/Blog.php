<?PHP
// Incluimos el archivo de excepciones
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
   class Blog {
           // Atributos
   		private $id;
		private $link;
		private $titulo;
		private $cita;
		private $autor;
		private $fecha;
		private $imagen;	
		private $categoria;
		private $estado;		   
		

		   
           // Mutadores y Accesadores
		//id
		public function getId(){
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
		}
		public function getLink(){
			return $this->link;
		}
		public function setLink($link){
			$this->link = $link;
		}
		public function getTitulo(){
			return $this->titulo;
		}
		public function setTitulo($titulo){
			$this->titulo = $titulo;
		}
		
		public function getCita()
		{
			return $this->cita;
		}
		public function setCita($cita)
		{
			$this->cita = $cita;
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
		//imagen
		public function getImagen(){
			return $this->imagen;
		}
		public function setImagen($imagen)
		{
			$this->imagen = $imagen;
		}

		public function getCategoria(){
			return $this->categoria;
		}
		public function setCategoria($categoria)
		{
			$this->categoria = $categoria;
		}

		public function getEstado(){
			return $this->estado;
		}
		public function setEstado($estado)
		{
			$this->estado = $estado;
		}

			   
           // Constructor
		public function Blog($id=0,$link="null", $titulo="null", $cita="null", $autor="null",$fecha="null",$imagen="null",$categoria="null",$estado=0)
		{
			$this->setId($id);
			$this->setLink($link);
			$this->setTitulo($titulo);
			$this->setCita($cita);
			$this->setAutor($autor);
			$this->setFecha($fecha);
			$this->setImagen($imagen);
			$this->setCategoria($categoria);
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
		          . chr(34) . "Link" . chr(34) . ":" . chr(34) . $this->getLink() . chr(34) 
		    . "," . chr(34) . "Nombre Autor" . chr(34) . ":" . chr(34) . $this->getAutor() . chr(34) 
		    . "," . chr(34) . "Titulo" . chr(34) . ":" . chr(34) . $this->getTitulo() . chr(34) 
		    . "," . chr(34) . "Fecha" . chr(34) . ":" . chr(34) . $this->getFecha() . chr(34) 
		    . "," . chr(34) . "Cita" . chr(34) . ":" . chr(34) . $this->getCita() . chr(34) 
		    . "," . chr(34) . "Imagen" . chr(34) . ":" . chr(34) . $this->getImagen() . chr(34) 
		    . "," . chr(34) . "ID" . chr(34) . ":" . chr(34) . $this->getId() . chr(34) 
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