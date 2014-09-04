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

function modi(name)
{
    var form = document.forms['from'+name];
    form.action= "modificar_notas.php";
    form.submit();
}   

function verNotas(name)
{
    var form = document.forms['from'+name];
    form.action= "visualizar_notas.php";
    form.submit();
}

function ingresar_seccion()
{
    //VAlidar aqui
    var resp=confirm("¿Esta seguro que desea ingresar esta seccion?");
    if (resp)
    {
        //
        //le puse mute a todo por cierto
        //
        var ajax;
        //vaya aqui se crea la variable q contendra el "ajax"
        ajax=new XMLHttpRequest();
        //Se supone q aqui le da el formato pero no le hagan caso
        var url= "../includes/ingresar_seccion.php" ;
        //Aqui guardamos la variable de la pagina a llamar a ejecutarse
        var form = document.forms['form'];
        //aqui obtenes todo el "formulario"    
        var elemento = form['nombre_seccion'];
        //aqui obtenes el elemento nada mas de el formulario q esta en la variable
        var preguntatexto =elemento.value;
        //y aqui ya pasas el valor a la variable para ajax
        var datos="nombre_seccion="+preguntatexto;
        //Aqui haces el arreglo para todos los datos q fueras a mandar
        ajax.open("POST",url,true);
        //Aqui "configuras" el ajax, sera por metodo post, ponemos la direccion
        //No recuerdo para q era el true pero ahi lo dejan
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        //y esto es otra cosa q ahi la dejan
        //ajax.onreadystatechange se ejecuta cuando este listo el ajax
        ajax.onreadystatechange=function()
        {
            //y se ejecuta lo de adentro cuando la accion ha sido realizada
          if (ajax.readyState==4 && ajax.status==200) 
          {
            //El estado 4 ya completo la accion
            //el estado 4 es q no me acuerdo ni el 200 pero es q estan listos                        
            alert(ajax.responseText);
                
          };
        }
        ajax.send(datos);
    }    
}