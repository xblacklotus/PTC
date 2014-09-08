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

function ingresar()
{    
    var r = confirm("¿Esta seguro que de desea ingresar?");
    if (r ) {
        
        if(validar_notas())
        {
            return true;        
        }
        else
            return false;  
    } 
    else{
        return false;
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

        alert(datos);

        if(validar_notas())
        {
            
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
            alert("hoa");
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
        var preguntatexto =elemento.value;
        var preguntatexto2 =elemento2.value;
        var preguntatexto3 =elemento3.value;
        //y aqui ya pasas el valor a la variable para ajax
        var datos="nombre_maestro="+preguntatexto+"& apellido_maestro="+preguntatexto2+"& usuario="+preguntatexto3;
        alert(datos);
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
        var elemento2 = form['id_usuario2'];
        var elemento3 = form['id_ma'];
        var preg = elemento.value;
        var preg1 = elemento1.value;
        var preg2 = elemento2.value;
        var preg3 = elemento3.value;
        
        var datos = "nombre2="+preg+"&apellido2="+preg1+"&id_usuario2="+preg2+"$id_ma="+preg3;
        alert(datos);
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
        alert(datos);
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

function ingresar_materias(){
    var resp = confirm("¿Estas seguro de ingresar esta seccion?");
    if (resp) {
        var ajax;
        ajax = new XMLHttpRequest();
        var url = "../includes/ingresar_materias.php";
        var form = document.forms['form'];
        //
        //
        var elemento = form['nombre_materia'];
        var elemento2 = form['inputgra'];
        var elemento3 = form['inputse'];
        var datos = "nombre_materia="+elemento.value+"&grados="+elemento2.value+"&secciones="+elemento3.value;
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
        var preg = elemento.value;
        var preg1 = elemento1.value;
        var preg2 = elemento2.value;
        var datos = "new_ma="+preg+"&new_gra="+preg1+"&new_se="+preg2+"&ma_id="+elemento3.value;
        alert(datos);
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
        var datos = "ma_id="+pregu;
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
        
        var datos = "new_se="+preg+"&se_id="+preg1;
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

function eliminar_seccion(i) {
    var resp = confirm("¿Estas seguro de eliminar esta seccion?");
    if (resp) {
        var ajax;
        ajax = new XMLHttpRequest();
        var url = "../includes/eliminar_seccion.php";
        var form = document.forms['formMo'+i+''];
        var elemento = form['se_id'];
        var pregu = elemento.value;
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
    };
}

function ingresar_usuario()
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

function graficarPastel(datos,div_donde_imprimir,titulo)
{
    AmCharts.ready(function () {
                // PIE CHART
                chart = new AmCharts.AmPieChart();
                chart.dataProvider = datos;
                chart.titleField = titulo;
                chart.valueField = "value";
                chart.outlineColor = "#FFFFFF";
                chart.outlineAlpha = 0.8;
                chart.outlineThickness = 2;
                chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
                // this makes the chart 3D
                chart.depth3D = 15;
                chart.angle = 30;

                // WRITE
                chart.write(div_donde_imprimir);
            });
}

function graficarColumnas(datos,div_donde_imprimir,titulo)
{
    AmCharts.ready(function ()
     {
         // PIE CHART   
        var chart;
        var chart = new AmCharts.AmSerialChart();
        chart.dataProvider = chartData;
        chart.categoryField = "country";

        var graph = new AmCharts.AmGraph();
        graph.valueField = "visits";
        graph.type = "column";
        chart.addGraph(graph);


        var categoryAxis = chart.categoryAxis;
        categoryAxis.autoGridCount  = false;
        categoryAxis.gridCount = chartData.length;
        categoryAxis.gridPosition = "start";


        categoryAxis.labelRotation = 90;

        graph.fillAlphas = 0.8;

        chart.angle = 30;
        chart.depth3D = 15;
        // WRITE


        chart.write(div_donde_imprimir);
    });
}


    
    