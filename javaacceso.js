function validar_campos (formulario)
{

     if(formulario.nombre.value.length == 0)
	{ 
		alert("El campo nombre esta vacio")
         return false;       } 


     if(formulario.contrasea.value.length == 0)
	{ 
		alert("El campo de la clave esta vacio")
         return false;       } 
}



