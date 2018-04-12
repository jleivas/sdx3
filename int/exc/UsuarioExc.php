<?PHP
class UsuarioExc extends Exception{
    // Constantes de Errores validas.
	const THROW_FIRSTNAME  = 1;
    const THROW_LASTNAME  = 2;
    const THROW_RUT  = 3;
    const THROW_MAIL  = 4;
    const THROW_DIRECCION  = 5;
    const THROW_PASS  = 6;
    const THROW_EXCEDENTE  = 7;
    // recibe como parámetro el código de Error (constante)
	public function UsuarioExc($code = 0) {
	    switch ($code) {
           // Error definido como constante dentro de la clase
           // Por eso se utiliza self y no this
            case self::THROW_FIRSTNAME:
                throw new Exception('Error, Nombres deben tener entre 3..60 caracteres');
                break;
            case self::THROW_LASTNAME:
                throw new Exception('Error, Apellidos deben tener entre 3..45 caracteres');
                break;
            case self::THROW_RUT:
                throw new Exception('Error, rut debe tener entre 9..10 caracteres, además, no debe contener puntos');
                break;
            case self::THROW_MAIL:
                throw new Exception('Error, Mail no se pudo insertar.');
                break;
            case self::THROW_DIRECCION:
                throw new Exception('Error, Dirección mal ingresada.');
                break;
            case self::THROW_PASS:
                throw new Exception('Error, Password de usuario debe tener entre 4 y 25 caracteres.');
                break;
            case self::THROW_EXCEDENTE:
                throw new Exception('Error con registro de saldo, parámetros incorrectos.');
                break;

            default: 
                throw new Exception('Error Desconocido Clase Cliente');
                break;
        }		
    }
    // representación de cadena personalizada del objeto
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {'Error'}<br>";
    }	
}
?>