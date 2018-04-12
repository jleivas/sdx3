<?PHP
   class Proyecto {
           // Atributos
   		private $id;
		private $link;
		private $nombre;
		private $imagen;
		private $monto;
		private $saldo;
		private $categoria;
		private $estado;
		private $factura;
		private $rutCliente;	
		
		   
           // Mutadores y Accesadores
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
		public function getNombre()
		{
			return $this->nombre;
		}
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
		public function getMonto()
		{
			return $this->monto;
		}
		public function setMonto($monto){
			$this->monto = $monto;
		}
		
		public function getImagen()
		{
			return $this->imagen;
		}
		public function setImagen($imagen){
			$this->imagen = $imagen;
		}
		
		public function getSaldo()
		{
			return $this->saldo;
		}
		public function setSaldo($saldo){
			$this->saldo = $saldo;
		}
		public function getCategoria()
		{
			return $this->categoria;
		}
		public function setCategoria($categoria){
			$this->categoria = $categoria;
		}
		public function getEstado()
		{
			return $this->estado;
		}
		public function setEstado($estado){
			$this->estado = $estado;
		}
		public function getFactura()
		{
			return $this->factura;
		}
		public function setFactura($factura){
			$this->factura = $factura;
		}
		public function getRutCliente()
		{
			return $this->rutCliente;
		}
		public function setRutCliente($rutCliente){
			$this->rutCliente = $rutCliente;
		}
			   
           // Constructo
		public function Proyecto($id=0,$link="null", $nombre="null",$imagen="null", $monto=0,$saldo=0,$categoria=0,$estado=0, $factura="null", $rutCliente="null")
		{
			$this->setId($id);
			$this->setLink($link);
			$this->setNombre($nombre);
			$this->setMonto($monto);
			$this->setImagen($imagen);
			$this->setSaldo($saldo);
			$this->setCategoria($categoria);
			$this->setEstado($estado);
			$this->setFactura($factura);
			$this->setRutCliente($rutCliente);
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
		          . chr(34) . "Link" . chr(34) . ":" . chr(34) . $this->getLink() . chr(34) 
		    . "," . chr(34) . "Nombre" . chr(34) . ":" . chr(34) . $this->getNombre() . chr(34) 
		    . "," . chr(34) . "Cliente" . chr(34) . ":" . chr(34) . $this->getRutCliente() . chr(34) 
		    . "," . chr(34) . "Monto" . chr(34) . ":" . chr(34) . $this->getMonto() . chr(34) 
		    . "," . chr(34) . "Estado" . chr(34) . ":" . chr(34) . $this->getEstado() . chr(34) 
		 . "}";
   		}   
   		public function imprimir()
   		{
        	echo $this->__toString();
   		}
   }
   
?>