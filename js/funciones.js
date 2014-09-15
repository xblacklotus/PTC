function exportar_excel(tabla,filas,columnas)
{
    var ajax;
    ajax=new XMLHttpRequest();
    var url= "importar_excel.php" ;    
    ajax.open("POST",url,true);
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");        
    ajax.onreadystatechange=function()
    {
      if (ajax.readyState==4 && ajax.status==200){        
        //alert(ajax.responseText);
        
        if(ajax.responseText=="1")
        {
            document.getElementById("descarga").click();            
        }
        else{
            alert("no entra"+ajax.responseText);
            document.getElementById("prueba").innerHTML=ajax.responseText;

        }
      }
    }    
    ajax.send("tabla="+tabla+"&filas="+filas+"&columnas="+columnas);
}
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
            if(ajax.responseText==ajax.responseText)
            {
                document.location.href="perfiles.php";
            }
          }
        }
        ajax.send(datos);
    }    
}
function validar_notas()
{
    var validas=false;
    var k=document.getElementById('cantidad').value;
    var i =0;
    for (i= 0 ;i <k ; i++) 
    {
        if(!isNaN(document.getElementById('nota'+i).value))
        {
            if(document.getElementById('nota'+i).value>=1 && document.getElementById('nota'+i).value<=10)
            {                
                validas=true;
            }
            else{
                validas=false;  
                alert("Valor/es invalido");
                return validas;
            }
            if(i==k-1){                
                return validas;
            }        
        }
        else
        {
            alert(document.getElementById('nota'+i).value+ " no es un numero");            
            return false;
        }
    };    
}

function ingresar_notas()
{
    var resp=confirm("¿Esta seguro que desea modificar las secciones?");
    if (resp) 
    {
        var ajax;
        ajax = new XMLHttpRequest();
        var url = "guardar_notas.php";        
        var datos = $("#notas").serialize();
        if(validar_notas())
        {
            
            ajax.open("POST",url,true);
            ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");            
            ajax.onreadystatechange=function()
            {            
                if (ajax.readyState==4 && ajax.status==200) 
                {                       
                    alert(ajax.responseText);
                    if(ajax.responseText=='Exito al guardar notas')
                    {
                        document.location.href="perfiles.php";
                    }
                }
                
            }
            ajax.send(datos);
        }
        
    }
}

function modi(name)
{
    var form = document.forms['from'+name];
    form.action= "modificar_notas.php";
    form.submit();
}   

function notasMateria(name)
{   
    var form = document.forms['form'+name];
    form.action= "../includes/notas_Materias.php";
    form.submit();    
}

function verNotas(name)
{
    var form = document.forms['from'+name];
    form.action= "visualizar_notas.php";
    form.submit();
}
//función para comprobar si una variable es númerica
function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
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
        if(isNumber(preguntatexto)) {
            alert("ERROR: El nombre de la sección no puede ser un número!");
        }else {
            if (preguntatexto != "") {
                if (preguntatexto.length > 1) {
                    alert("ERROR: La longitud del nombre de la sección excede el límite permitido!");
                }else{
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
            }else{
                alert("ERROR: Llene los campos obligatorios!");
            }
        }
    }    
}

//PARA INGRESAR PROFESORES

function ingresar_maestro()

{
   
    //VAlidar aqui
    var resp=confirm("¿Esta seguro que desea ingresar este maestro");
    if (resp)
    {
        
        //
        //le puse mute a todo por cierto
        //
        var ajax;
        //vaya aqui se crea la variable q contendra el "ajax"
        ajax=new XMLHttpRequest();
       
        //Se supone q aqui le da el formato pero no le hagan caso
        var url= "../includes/ingresar_maestro.php" ;
       
        //Aqui guardamos la variable de la pagina a llamar a ejecutarse
        var form = document.forms['forming'];
        
        //aqui obtenes todo el "formulario"    
        var elemento = form['nombre_maestro'];
        var elemento2 = form['apellido_maestro'];
        var elemento3 = form['usuario'];
        //aqui obtenes el elemento nada mas de el formulario q esta en la variable
        var preg =elemento.value;
        var preg2 =elemento2.value;
        var preg3 =elemento3.value;
        

        if(preg =="" || preg2 =="" || preg3=="")
        {
            alert("No pueden haber espacios en blanco");
            
        }
        else if(!isNaN(preg) || !isNaN(preg2))
        {
          alert("Hay campos que no tienen que ser numericos");
            
        }
        else if(!isNaN(preg2))
        {
            alert("El usuario tiene que ser numerico");
             
        }
        else if(preg2<1)
        {
            alert("Usuario fuera de rango");
             
            
        }
        else
        {
           
            //y aqui ya pasas el valor a la variable para ajax
        var datos="nombre_maestro="+preg+"& apellido_maestro="+preg2+"& usuario="+preg3;
        
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
            alert(ajax.responseText);
            document.location.href="mantenimiento_maestros.php";
                
          };
        }
        ajax.send(datos);
        }
        
    };    
}


function modificar_maestro(i)
{
    var resp=confirm("¿Esta seguro que desea modificar el maestro?");
    if (resp) 
    {
        var ajax;
        ajax = new XMLHttpRequest();
        var url = "../includes/modificar_maestro.php";
        var form = document.forms['formMo'+i+''];
        var elemento = form['nombre2'];
        var elemento1 = form['apellido2'];
        var elemento2 = form['id_ma'];
        var preg = elemento.value;
        var preg1 = elemento1.value;
        var preg2 = elemento2.value;
        if(preg =="" || preg2 =="" )
        {
            alert("No pueden haber espacios en blanco");
        }
        else if(!isNaN(preg) || !isNaN(preg1))
        {
            alert("Hay campos que no tienen que ser numericos");
        }
       
        else
        {
            var datos = "nombre2="+preg+"&apellido2="+preg1+"&id_ma="+preg2;
            alert(datos);
            ajax.open("POST",url,true);
            ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            alert(ajax);
            ajax.onreadystatechange=function()
            {            
                if (ajax.readyState==4 && ajax.status==200) 
                {                       
                    alert(ajax.responseText);    
                    document.location.href="mantenimiento_maestros.php";            
                }
            }
            ajax.send(datos);
        }
        
    }
}

function eliminar_maestro(i) {
    var resp = confirm("¿Estas seguro de eliminar este maestro?");
    if (resp) {
        var ajax;
        ajax = new XMLHttpRequest();
        var url = "../includes/eliminar_maestro.php";
        var form = document.forms['formMo'+i+''];
        var elemento = form['id_ma'];
        var pregu = elemento.value;
        var datos = "id_ma="+pregu;        
        ajax.open("POST",url,true);
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.onreadystatechange=function()
        {
            if (ajax.readyState==4 && ajax.status==200) {
                alert(ajax.responseText);
                document.location.href="mantenimiento_maestros.php";
            };
            
        }
        ajax.send(datos);
    };
}

//PERFILES
function ingresar_perfiles()

{
   
    //VAlidar aqui
    var resp=confirm("¿Esta seguro que desea ingresar este perfil");
    if (resp)
    {
        var ajax;
        //vaya aqui se crea la variable q contendra el "ajax"
        ajax=new XMLHttpRequest();
        
        //Se supone q aqui le da el formato pero no le hagan caso
        var url= "../includes/ingresar_perfil.php" ;
        
        //Aqui guardamos la variable de la pagina a llamar a ejecutarse
        var form = document.forms['forming'];
       // obtenes todo el "formulario"    
        var elemento = form['descripcion'];
        var elemento2 = form['porcentaje'];
        var elemento3 = form['metermateria'];
        var elemento4 = form['metertri'];
        //aqui obtenes el elemento nada mas de el formulario q esta en la variable
        var preg =elemento.value;
        var preg2 =elemento2.value;
        var preg3 =elemento3.value;
        var preg4 =elemento4.value;

        
        if(preg =="" || preg2 =="" || preg3=="" || preg4=="")
        {
            alert("No pueden haber espacios en blanco");
        }
        else if(!isNaN(preg) || !isNaN(preg3) )
        {
            alert("Hay campos que no tienen que ser numericos");
        }
        else if(isNaN(preg2))
        {
            alert("El porcentaje tiene que ser numerico");
        }
        else if(preg2<10)
        {
            alert("porcentaje fuera de rango");
            
        }
        else
        {
            
            //y aqui ya pasas el valor a la variable para ajax
            var datos="descripcion="+preg+"& porcentaje="+preg2+"& metermateria="+preg3+"& metertri="+preg4;
            
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
                   
                        alert(ajax.responseText);
                        document.location.href="mantenimiento_perfiles.php";
                    
                    
              };
            }
            ajax.send(datos);
        }
        
    };    
}


function modificar_perfiles(i)
{
   
    var resp=confirm("¿Esta seguro que desea modificar este perfil");
    if (resp)
    {
        var ajax;
        //vaya aqui se crea la variable q contendra el "ajax"
        ajax=new XMLHttpRequest();
        
        //Se supone q aqui le da el formato pero no le hagan caso
        var url= "../includes/modificar_perfiles.php" ;
        
        //Aqui guardamos la variable de la pagina a llamar a ejecutarse
        var form = document.forms['formMo'+i+''];
       // obtenes todo el "formulario"    
        var elemento = form['d2'];
        var elemento2 = form['p2'];
        var elemento3 = form['id_materia2'];
        var elemento4 = form['t2'];
        var elemento5 = form['id_per'];
        //aqui obtenes el elemento nada mas de el formulario q esta en la variable
        var preg =elemento.value;
        var preg2 =elemento2.value;
        var preg3 =elemento3.value;
        var preg4 =elemento4.value;
        var preg5 =elemento5.value;

        
        if(preg =="" || preg2 =="" || preg3=="" || preg4=="")
        {
            alert("No pueden haber espacios en blanco");
        }
        else if(!isNaN(preg) || !isNaN(preg3) )
        {
            alert("Hay campos que no tienen que ser numericos");
        }
        else if(isNaN(preg2))
        {
            alert("El porcentaje tiene que ser numerico");
        }
        else if(preg2<10)
        {
            alert("porcentaje fuera de rango");
            
        }
        else
        {
            
            //y aqui ya pasas el valor a la variable para ajax
            var datos="d2="+preg+"& p2="+preg2+"& id_materia2="+preg3+"& t2="+preg4+"& id_per="+preg5;
            
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
                    
                        alert(ajax.responseText);
                        document.location.href="mantenimiento_perfiles.php";
                    
                    
              }
            }
            ajax.send(datos);
        }
    }
}

function eliminar_perfiles(i) {
    var resp = confirm("¿Estas seguro de eliminar este perfil");
    if (resp) {
        var ajax;
        ajax = new XMLHttpRequest();
        var url = "../includes/eliminar_perfil.php";
        var form = document.forms['formMo'+i+''];
        var elemento = form['id_per'];
        var pregu = elemento.value;
        var datos = "id_per="+pregu;        
        ajax.open("POST",url,true);
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.onreadystatechange=function()
        {
            if (ajax.readyState==4 && ajax.status==200) {
               
                        alert(ajax.responseText);
                        document.location.href="mantenimiento_perfiles.php";
                    
            };
            
        }
        ajax.send(datos);
    };
}



function ingresar_alumno()
{
    var resp = confirm("¿Estasseguro de ingresar este alumno?");
    if (resp) {
        var ajax;
        ajax = new XMLHttpRequest();
        var url = "../includes/ingresar_alumno.php";
        var form = document.forms['formIng'];
        var elemento = form['nombre'];
        var elemento1 = form['apellido'];
        var elemento2 = form['grad'];
        var elemento3 = form['sec'];
        var elemento4 = form['user']
        var datos = "nombre="+elemento.value+"&apellido="+elemento1.value+"&grad="+elemento2.value+"&sec="+elemento3.value+"&user="+elemento4.value;

        ajax.open("POST",url,true);
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.onreadystatechange=function()
        {
            if (ajax.readyState==4 && ajax.status==200){
                alert(ajax.responseText);
            }
        }
        ajax.send(datos);
    };
}

function combo(thelist, theinput)
{
  theinput = document.getElementById(theinput);
  theinput.value = thelist.value; 
}
function ingresar_materias(){
    var resp = confirm("¿Estas seguro de ingresar esta materia?");
    if (resp) {
        var ajax;
        ajax = new XMLHttpRequest();
        var url = "../includes/ingresar_materias.php";
        var form = document.forms['form'];
        //
        //
        var elemento = form['nombre_materia'];
        var elemento1 = form['inputgra'];
        var elemento2 = form['inputse'];
        var pregunta = elemento.value;
        var pregunta1 = elemento1.value;
        var pregunta2 = elemento2.value;
        if (pregunta =="") {
            alert("ERROR : Llene el campo obligatorio del nombre de la materia!");
        }else{
            if (pregunta1 =="") {
                alert("ERROR : Llene el campo obligatorio del grado al que pertenece la materia!");
            }else{
                if (pregunta2 == "") {
                    alert("ERROR : Llene el campo obligatorio de la sección del grado al que pertenece la materia!");
                }else{
                    if (pregunta.length > 20) {
                        alert("ERROR: La longitud del nombre de la materia excede el límite permitido!");
                    }else{
                        if (pregunta1.length > 1) {
                            alert("ERROR: La longitud del grado excede el límite permitido!");
                        }else{
                            if (isNumber(pregunta)) {
                            alert("ERROR: El nombre de la materia no puede ser un número!");
                        }else{
                            if (isNumber(pregunta1)) {
                                if (isNumber(pregunta2)) {
                                    alert("ERROR: El nombre de la sección no puede ser numerica!");
                                }else{
                                    ///////////////////////////
                                    var datos = "nombre_materia="+elemento.value+"&grados="+elemento1.value+"&secciones="+elemento2.value;
                                    ajax.open("POST",url,true);
                                    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
                                    ajax.onreadystatechange=function()
                                    {
                                        if (ajax.readyState==4 && ajax.status==200) {
                                            if(ajax.responseText=="ADVERTENCIA: La materia se ha guardado correctamente!")
                                            {
                                                alert(ajax.responseText);
                                                document.location.href="mantenimiento_materias.php";
                                            }
                                            
                                        };
                                    }
                                    ajax.send(datos);
                                    ///////////////////////////
                                }
                            }else{
                                alert("ERROR: El grado no puede tener letras!");
                            }
                        }
                        }
                    }
                }
            }
        }
    };
}

function combo(thelist, theinput)
{
  theinput = document.getElementById(theinput);
  theinput.value = thelist.value; 
}

function modificar_materia(i){
    var resp=confirm("¿Esta seguro que desea modificar las materia?");
    if (resp) 
    {
        var ajax;
        ajax = new XMLHttpRequest();
        var url = "../includes/modificar_materia.php";
        var form = document.forms['formMo'+i+''];
        var elemento = form['new_ma'];
        var elemento1 = form['new_gra'];
        var elemento2 = form['new_se'];
        var elemento3 = form['ma_id'];
        var pregunta = elemento.value;
        var pregunta1 = elemento1.value;
        var pregunta2 = elemento2.value;
        var pregunta3 = elemento3.value;
        if (pregunta =="") {
            alert("ERROR : Llene el campo obligatorio del nombre de la materia!");
        }else{
            if (pregunta1 =="") {
                alert("ERROR : Llene el campo obligatorio del grado al que pertenece la materia!");
            }else{
                if (pregunta2 == "") {
                    alert("ERROR : Llene el campo obligatorio de la sección del grado al que pertenece la materia!");
                }else{
                    if (pregunta.length > 20) {
                        alert("ERROR: La longitud del nombre de la materia excede el límite permitido!");
                    }else{
                        if (pregunta1.length >1) {
                            alert("ERROR: La longitud del número del grado excede el límite permitido!");
                        }else{
                            if (isNumber(pregunta)) {
                            alert("ERROR: El nombre de la materia no puede ser un número!");
                        }else{
                            if (isNumber(pregunta1)) {
                                if (isNumber(pregunta2)) {
                                    alert("ERROR: El nombre de la sección no puede ser numerica!");
                                }else{
                                    /////////////////////////////
                                    var datos = "new_ma="+pregunta+"&new_gra="+pregunta1+"&new_se="+pregunta2+"&ma_id="+pregunta3;
                                    ajax.open("POST",url,true);
                                    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
                                    ajax.onreadystatechange=function()
                                    {            
                                        if (ajax.readyState==4 && ajax.status==200) 
                                        {                       

                                            if("ADVERTENCIA: La materia se ha modificado correctamente!"==ajax.responseText)
                                            {
                                                alert(ajax.responseText);
                                                document.location.href="mantenimiento_materias.php";
                                            }
                                            
                                        }
            
                                    }
                                    ajax.send(datos);
                                    ///////////////////////////
                                }
                            }else{
                                alert("ERROR: El grado no puede tener letras!");
                            }
                        }
                        }
                    }
                }
            }
        }
    }
}

function eliminar_materia(i){
    var resp = confirm("¿Estas seguro de eliminar esta materia?");
    if (resp) {
        var ajax;
        ajax = new XMLHttpRequest();
        var url = "../includes/eliminar_materia.php";
        var form = document.forms['formMo'+i+''];
        var elemento = form['ma_id'];
        var pregu = elemento.value;
        if (pregu == "") {
            alert("ERROR: conflicto al intentar eliminar la materia!");
        }else{
            ////////
            var datos = "ma_id="+pregu;
            ajax.open("POST",url,true);
            ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            ajax.onreadystatechange=function()
            {
                if (ajax.readyState==4 && ajax.status==200) {
                    if(ajax.responseText=="ADVERTENCIA: La materia se ha eliminado correctamente!")
                    {
                        alert(ajax.responseText);
                        document.location.href="mantenimiento_materias.php";
                    }
                };
            
            }
            ajax.send(datos);
            ////////
        }
    };
}
function modificar_seccion(i)
{
    var resp=confirm("¿Esta seguro que desea modificar las secciones?");
    if (resp) 
    {
        var ajax;
        ajax = new XMLHttpRequest();
        var url = "../includes/modificar_seccion.php";
        var form = document.forms['formMo'+i+''];
        var elemento = form['new_se'];
        var elemento1 = form['se_id'];
        var preg = elemento.value;
        var preg1 = elemento1.value;
        if (preg == "" || preg1 == "") {
            alert("ERROR: Llene los campos obligatorios!");
        }else{
            if (isNumber(preg)) {
                alert("ERROR: El nombre de la sección no puede ser un número!");
            }else{
                if (preg.length >1) {
                    alert("ERROR: La longitud del nombre de la sección excede el límite permitido!");
                }else{
                    /////////////////////////
                    var datos = "new_se="+preg+"&se_id="+preg1;
                    ajax.open("POST",url,true);
                    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
                    ajax.onreadystatechange=function()
                    {            
                        if (ajax.readyState==4 && ajax.status==200) 
                        {                       
                            alert(ajax.responseText);                
                        }
            
                    }
                    ajax.send(datos);
                    ////////////////////////
                }
            }
        }
    }
}

function eliminar_seccion(i) {
    var resp = confirm("¿Estas seguro de eliminar esta seccion?");
    if (resp) {
        var ajax;
        ajax = new XMLHttpRequest();
        var url = "../includes/eliminar_seccion.php";
        var form = document.forms['formMo'+i+''];
        var elemento = form['se_id'];
        var pregu = elemento.value;
        if (pregu == "") {
            alert("ERROR: Llene los campos obligatorios!");
        }else{
            if (isNumber(pregu)) {
                //////////////////////////
                var datos = "se_id="+pregu;
                ajax.open("POST",url,true);
                ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
                ajax.onreadystatechange=function()
                {
                    if (ajax.readyState==4 && ajax.status==200) {
                    alert(ajax.responseText);
                    };
                }
                ajax.send(datos);
                /////////////////////////
            }else{
                alert("ERROR: Conflicto al eliminar el ID de la sección!");
            }
        }
    };
}

function ingresar_usuario(i)
{
    var resp = confirm("¿Estasseguro de ingresar este usuario?");
    if (resp) {
        var ajax;
        ajax = new XMLHttpRequest();
        var url = "../includes/ingresar_usuarios.php";
        var form = document.forms['formIng'];
        var elemento = form['contra_usu'];
        var elemento1 = form['contra_rea'];
        var datos = "contra_usu="+elemento.value+"&contra_rea="+elemento1.value;
        ajax.open("POST",url,true);
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.onreadystatechange=function()
        {
            if (ajax.readyState==4 && ajax.status==200){
                alert(ajax.responseText);
            }
        }
        ajax.send(datos);
    };
}
function modificar_usuario(i)
{
    var resp=confirm("¿Esta seguro que desea modificar el usuario?");
    if (resp) 
    {
        var ajax;
        ajax = new XMLHttpRequest();
        var url = "../includes/modificar_usuario.php";
        var form = document.forms['formMo'+i+''];
        var elemento = form['contra'];
        var elemento1 = form['id_usuario'];
        var preg = elemento.value;
        var preg1 = elemento1.value;
        var datos = "contra="+preg+"&id_usuario="+preg1;
        ajax.open("POST",url,true);
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        alert(ajax);
        ajax.onreadystatechange=function()
        {            
            if (ajax.readyState==4 && ajax.status==200) 
            {                       
                alert(ajax.responseText);                
            }
            
        }
        ajax.send(datos);
    }
}
function eliminar_usuario(i) {
    var resp = confirm("¿Estas seguro de eliminar este usuario?");
    if (resp) {
        var ajax;
        ajax = new XMLHttpRequest();
        var url = "../includes/eliminar_usuario.php";
        var form = document.forms['formMo'+i+''];
        var elemento = form['id_usuario'];
        var pregu = elemento.value;
        var datos = "id_usuario="+pregu;
        ajax.open("POST",url,true);
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.onreadystatechange=function()
        {
            if (ajax.readyState==4 && ajax.status==200) {
                alert(ajax.responseText);
            };
            
        }
        ajax.send(datos);
    };
}
function ingresar_alumno(i)
{
    var resp = confirm("¿Estasseguro de ingresar este alumno?");
    if (resp) {
        var ajax;
        ajax = new XMLHttpRequest();
        var url = "../includes/ingresar_alumno.php";
        var form = document.forms['formIng'];
        var elemento = form['nombre'];
        var elemento1 = form['apellido'];
        var elemento2= form['gradd'];
        var elemento3= form['secc'];
        var elemento4=form['userr'];
        var preg = elemento.value;
        var preg1  = elemento1.value;
        var preg2 = elemento2.value;
        var preg3 = elemento3.value;
        var preg4 = elemento4.value;
        var datos = "nombre="+preg+"&apellido="+preg1+"&gradd="+preg2+"&secc="+preg3+"&userr="+preg4;
        ajax.open("POST",url,true);
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.onreadystatechange=function()
        {
            if (ajax.readyState==4 && ajax.status==200){
                alert(ajax.responseText);
            }
        }
        ajax.send(datos);
    };
}
function modificar_alumno(i)
{
    var resp=confirm("¿Esta seguro que desea modificar este alumno?");
    if (resp) 
    {
        var ajax;
        ajax = new XMLHttpRequest();
        var url = "../includes/modificar_alumno.php";
        var form = document.forms['formMo'+i];
        var elemento = form['name'];
        var elemento1 = form['nick'];
        var elemento2= form['grade'];
        var elemento3= form['section'];
        var elemento5=form['id_alu'];        
        var preg = elemento.value;
        var preg1  = elemento1.value;
        var preg2 = elemento2.value;
        var preg3 = elemento3.value;
        var preg5 = elemento5.value;
        var datos = "nombre="+preg+"&apellido="+preg1+"&gradd="+preg2+"&secc="+preg3+"&id="+preg5;
        ajax.open("POST",url,true);
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        alert(ajax);
        ajax.onreadystatechange=function()
        {            
            if (ajax.readyState==4 && ajax.status==200) 
            {                       
                alert(ajax.responseText);                
            }
            
        }
        ajax.send(datos);
    }
}
function eliminar_alumno(i) {
    var resp = confirm("¿Estas seguro de eliminar este alumno?");
    if (resp) {
        var ajax;
        ajax = new XMLHttpRequest();
        var url = "../includes/eliminar_alumno.php";
        var form = document.forms['formMo'+i+''];
        var elemento = form['id_alu'];
        var pregu = elemento.value;
        var datos = "id_alu="+pregu;
        ajax.open("POST",url,true);
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.onreadystatechange=function()
        {
            if (ajax.readyState==4 && ajax.status==200) {
                alert(ajax.responseText);
            };
            
        }
        ajax.send(datos);
    };
}

function ingresar_anuncio(){
    var resp = confirm("¿Esta seguro de agregar este anuncio?");
    if (resp) {
        var ajax;
        ajax = new XMLHttpRequest();
        var url = "../includes/ingresar_anuncio.php";
        var form = document.forms['form'];
        var elemento = form['prof'];
        var elemento1 = form['anuncio'];
        var elemento2 = form['mat'];
        var pregunta = elemento.value;
        var pregunta1 = elemento1.value;
        var pregunta2 = elemento2.value;
        if (pregunta == "") {
            alert("ERROR : No se ha encontrado el identificador del profesor!");
        }else{
            if (pregunta1 == "") {
                alert("ERROR : El anuncio no puede estar vacío!");
            }else{
                if (pregunta2 == "") {
                    alert("ERROR : No se ha encontrado el identificador de la materia!");
                }else{
                    if (isNumber(pregunta)) {
                        if (isNumber(pregunta2)) {
                            alert("ERROR : No se reconoce el valor del identificador de la materia!");
                        }else{
                            if (pregunta1.length > 250) {
                                alert("ERROR : La longitud del anuncio excede el límite permitido!");
                            }else{
                            ///////////////////////////
                            var datos = "profesor="+pregunta+"&anuncio="+pregunta1+"&materia="+pregunta2;
                            ajax.open("POST",url,true);
                            ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
                            ajax.onreadystatechange = function()
                            {
                                
                                if (ajax.readyState == 4 && ajax.status == 200) {
                                    if (ajax.responseText=="ADVERTENCIA: El anuncio se ha guardado correctamente!") {
                                        alert(ajax.responseText);
                                        document.location.href="mantenimiento_anuncios.php";
                                    }
                                    
                                }
                            }
                            ajax.send(datos);
                            ///////////////////////////
                            }
                        }
                    }else{
                        alert("ERROR : No se reconoce el valor del identificador del profesor!");
                    }
                }
            }
        }
    }
}

function modificar_anuncio(i) {
    var resp = confirm("¿Esta seguro que desea modificar el anuncio?");
    if (resp) {
        var ajax;
        ajax = new XMLHttpRequest();
        var url ="../includes/modificar_anuncio.php";
        var form = document.forms['formAn'+i+''];
        var elemento = form['new_anu'];
        var elemento1 = form['an_id'];
        var pregunta = elemento.value;
        var pregunta1 = elemento1.value;
        if (pregunta == "") {
            alert("ERROR : No se puede guardar un anuncio vacío!");
        }else{
            if (pregunta1 == "") {
                alert("ERROR : No se puede encontrar el valor del ID del anuncio!");
            }else{
                if (isNumber(pregunta1)) {
                    if (pregunta.length > 250) {
                        alert("ERROR : Se excede la longitud máxima de carácteres en el anuncio!");
                    }else{
                        ///////////////
                        var datos = "new_anu="+pregunta+"&id="+pregunta1;
                        ajax.open("POST",url,true);
                                    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
                                    ajax.onreadystatechange=function()
                                    {            
                                        if (ajax.readyState==4 && ajax.status==200) 
                                        {                       

                                            if(ajax.responseText =="ADVERTENCIA: El anuncio se ha modificado correctamente!")
                                            {
                                                alert(ajax.responseText);
                                                document.location.href="mantenimiento_anuncios.php";
                                            }
                                            
                                        }
            
                                    }
                                    ajax.send(datos);
                        ///////////////
                    }
                }else{
                    alert("ERROR : No se puede identificar el valor del ID del anuncio!");
                }
            }
        }
    };
}

function eliminar_anuncio(i) {
    var resp = confirm("¿Estas seguro de eliminar este anuncio?");
    if (resp) {
        var ajax;
        ajax = new XMLHttpRequest();
        var url = "../includes/eliminar_anuncio.php";
        var form = document.forms['formAn'+i+''];
        var elemento = form['an_id'];
        var pregunta = elemento.value;
        if (pregunta == "") {
            alert("ERROR : No se puede reconocer el identificador del anuncio!");
        }else{
            if (isNumber(pregunta)) {
                ///////////////////////////
                var datos = "an_id="+pregunta;
                ajax.open("POST",url,true);
                ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
                ajax.onreadystatechange=function(){
                    if (ajax.readyState == 4 && ajax.status == 200) {
                        if (ajax.responseText="ADVERTENCIA: El anuncio se ha eliminado correctamente!") {
                            alert(ajax.responseText);
                            document.location.href="mantenimiento_anuncios.php";
                        }
                        
                    }
                }
                ajax.send(datos);
                ///////////////////////////
            }else{
                alert("ERROR : Conflicto al eliminar el ID del anuncio!");
            }
        }
    }
}