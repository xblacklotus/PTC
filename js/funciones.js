function enviar(name)
{    
    var resp=confirm("¿Esta seguro que desea eliminar este  perfil?");
    if (resp)
    {
        var ajax;
        ajax=new XMLHttpRequest();
        var url= "../includes/eliminarPer.php" ;
        var oForm1 = document.forms['from'+name];//aqui obtenes todo el "formulario"    
        var oForm1Element = oForm1['p_id'];//aqui obtenes el elemento nada mas de el formulario q esta en la variable
        var preguntatexto =oForm1Element.value;;//y aqui ya pasas el valor a la variable para ajax
        var datos="strTexto="+preguntatexto;
        ajax.open("POST",url,true);
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.onreadystatechange=function()
        {
          if (ajax.readyState==4 && ajax.status==200) 
          {
            alert(ajax.responseText);
            document.location.href="perfiles.php";
          };
        }
        ajax.send(datos);
    }    
}   

function verNotas(name)
{   
    alert("from"+name);  
    var form = document.forms['from'+name];
    form.action= "visualizar_notas.php";
    alert("hola");
    form.submit();
}