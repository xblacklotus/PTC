function ingresar()
{    
    var r = confirm("¿Esta seguro que de desea ingresar?");
    if (r) 
    {
    	return true;
    } 
    else
    {
        return false;
    }
}
function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}
function validar_notas();
{
	var validas=false;
	var k=document.getElementById('cantidad');
	for (var i = 0 i <k ; i++) 
	{
		if(isNumber(document.notas.elements['nota'+i])
		{
			if(document.notas.elements['nota'+i]>=1 && document.notas.elements['nota'+i]<=10)
			{
				validas=true;
			}
			else
			{
				validas=false;
				alert("Notas no validas");
				return validas;
			}
			if(i==k-1){
				alert("cumple");
				return validas;
			}
		}
		else
		{
			alert("Notas no son solo numeros");
			return false;
		}		
	};
}

