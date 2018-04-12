//Instanciamos una variable ventana de la clase Ventana
ventana = new Ventana();

// Clase Ventana
function Ventana(){
    // Solicita una página Html, y la despliega en un DIV
    //***************************************************
    this.showHTML = function(stDiv,stHtml){
	var stRespuesta;
            $.ajax({  type: "GET"  // Typo GET o POST
                ,  url: stHtml    // Nombre del HTML
		,  async: false   // asincrónico en false o sea sincrónico
		,  cache: false   // Cache en False, así obligamos a buscar la página
		// si funciona pasa por succes
		,  success: function (response) {
                    stRespuesta = response;
		}
		// si hay un error pasa por error
		, error: function (msg, status, errorThrown) { 
                    //alert(errorThrown+' '+status+' '+msg.statusText+' >>1.-'+msg.responseText); 
                    alert('La URL ingresada no se encontró, busque el contenido manualmente.');
                    window.location.href='../noticias.php';
		}              
            });
        document.getElementById(stDiv).innerHTML = stRespuesta;
    };
	  
    // Ejecuta un PHP y devuelve el contenido como objeto ya que este viene en formato JSON
    //***************************************************
    this.cmdPost = function(stPhp,stData){
	//alert (stData)
	var stRespuesta;
            $.ajax({  type: "POST"
                ,  url: stPhp 
                ,  async: false
                ,  cache: false
                ,  data: stData    // Enviamos los datos recibidos por parámetros
                // Para enviar los datos en formato JSON utilizamos contenType
                //,  contentType: "application/json; charset=utf-8"  

                // Para Recibir JSON
                ,  dataType: "json"
                ,  success: function (response) {
                    //alert("oo" + response);
					//document.location.href = response;
                    //Convierte el texto recibido en response en objeto
                    // siempre y cuando response se encuentre en formato JSON
                    var datos = (typeof response) == 'string' ? 
                eval('(' + response + ')') : 
                response;							 
                    stRespuesta = datos;
                }
                , error: function (msg, status, errorThrown) { 
                    alert(errorThrown+' '+status+' '+msg.statusText+' >>1.-'+msg.responseText); 
                }              
            });
	return stRespuesta;
    };
    
    this.cmdPostHtml = function(stPhp,stData){
	//alert (stData)
	var stRespuesta="";
            $.ajax({  type: "POST"
                ,  url: stPhp 
                ,  async: false
                ,  cache: false
                ,  data: stData    // Enviamos los datos recibidos por parámetros
                // Para enviar los datos en formato JSON utilizamos contenType
                //,  contentType: "application/json; charset=utf-8"  

                // Para Recibir JSON
                //,  dataType: "json"
                ,  success: function (response) {
                //    alert("oo" + response);
                    //Convierte el texto recibido en response en objeto
                    // siempre y cuando response se encuentre en formato JSON							 
                    stRespuesta = response;
                }
                , error: function (msg, status, errorThrown) { 
                    alert(errorThrown+' '+status+' '+msg.statusText+' >>1.-'+msg.responseText); 
                }              
            });
	document.getElementById('containerRight').innerHTML=stRespuesta;
	//return stRespuesta;
    };
}