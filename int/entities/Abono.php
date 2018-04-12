<?PHP
   class Abono {
           // Atributos
		private $id;
		private $monto;
		private $fecha;
		private $tipo;
		private $estado;
		private $linkProyecto;	
		
		   
           // Mutadores y Accesadores
		public function getId(){
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
		}
		public function getMonto()
		{
			return $this->monto;
		}
		public function setMonto($monto){
			$this->monto = $monto;
		}
		public function getFecha()
		{
			return $this->fecha;
		}
		public function setFecha($fecha){
			$this->fecha = $fecha;
		}
		public function getTipo()
		{
			return $this->tipo;
		}
		public function setTipo($tipo){
			$this->tipo = $tipo;
		}
		public function getEstado()
		{
			return $this->estado;
		}
		public function setEstado($estado){
			$this->estado = $estado;
		}
		public function getLinkProyecto()
		{
			return $this->linkProyecto;
		}
		public function setLinkProyecto($linkProyecto){
			$this->linkProyecto = $linkProyecto;
		}
			   
           // Constructo
		public function Abono($id=0, $monto=0, $fecha="null",$tipo="null",$estado=0,$linkProyecto="null")
		{
			$this->setId($id);
			$this->setMonto($monto);
			$this->setFecha($fecha);
			$this->setTipo($tipo);
			$this->setEstado($estado);
			$this->setLinkProyecto($linkProyecto);
		}
// Destructor
	    function __destruct() {
		echo "<a></a>";
            }
		   
         
			   
           // toString
           // imprimir
        public function __toString(){
        // Registro JSon
		return "{" 
		          . chr(34) . "Id" . chr(34) . ":" . chr(34) . $this->getId() . chr(34) 
		    . "," . chr(34) . "Monto" . chr(34) . ":" . chr(34) . $this->getMonto() . chr(34) 
		    . "," . chr(34) . "Proyecto" . chr(34) . ":" . chr(34) . $this->getLinkProyecto() . chr(34) 
		    . "," . chr(34) . "Estado" . chr(34) . ":" . chr(34) . $this->getEstado() . chr(34) 
		 . "}";
   		}   
   		public function imprimir()
   		{
        	echo $this->__toString();
   		}
   }
   
?>