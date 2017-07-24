function validar_campos (formulario)

{
	if(formulario.nombre.value.length == 0)
	{ 
		alert("El campo nombre esta vacio")
         return false;                                         }
          
    if(formulario.Numero.value <= 0)
	{ 
		alert("El campo numero esta vacio o posee un numero negativo ")
         return false;   
                                               }
          
    if(formulario.Fecha.value.length == 0)
	{ 
		alert("El campo fecha esta vacio")
         return false;               }    
     
    if(formulario.hora.value.length == 0)
	{ 
		alert("El campo hora esta vacio")
         return false;               }                             
         
         
    if(formulario.hora.value.length != 0 )
	{ 
		var x =formulario.hora.value.split(":")
		if(x[1] != 00 && x[1]!= 30 ){ 
		alert("Debe ingresar minutos en 0 o en 30 ")
		
         return false;       }}
         
          
    if(formulario.Descripcion.value.length == 0)
	{ 
		alert("El campo descripcion esta vacio")
         return false;       }
           
    if(formulario.Duracion.value == 0 || formulario.Duracion.value <= 0 )
	{ 
		alert("El campo duracion esta vacio o Posee un numero negativo / nulo")
         return false;             }
         
      if (formulario.Duracion.value != 0){
		    var aux = formulario.Duracion.value % 30 
            if( aux != 0) {     
            alert(" La duracion debe ser multiplo de 30")
            return false;
              }}
      
     if(formulario.categoria.value.length == 0)
	{ 
		alert("El campo descripcion esta vacio")
         return false;       }     
}
