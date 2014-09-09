<?php include("../includes/inheader.php");?>
<script type="text/javascript" src="../js/funciones.js"></script>

//Agergar alumno//
<form name="formIng" method="post">
<label>Nombre Alumno</label>
<input type="text" id="nombre"></input>
<label>Apellido :</label>
<input type="text" id="apellido"></input>
<label>Grado</label>
<input type="text" id="grad"></input>

<?php
$id_alumnos=array();
$i=0;
$peticion= "select  u.id from usuario as u, alumno as al where u.id = al.id_usuario";
            $resultado=mysqli_query($conexion,$peticion);
            if($resultado)
            {
              while($fila=mysqli_fetch_array($resultado)){
              	array_push($id_alumnos, $fila["id"]);
              	echo $id_alumnos[$i];
              	$i++;
              	
              }
            } 

$id_profe = array();
$i=0;
$peticion= "select  u.id from usuario as u, profesor as pr where u.id = pr.id_usuario";
            $resultado=mysqli_query($conexion,$peticion);
            if($resultado)
            {
              while($fila=mysqli_fetch_array($resultado)){
              	array_push($id_profe, $fila["id"]);
              	echo $id_profe[$i];
              	$i++;
              }
            } 
$id_comparacion = array();
$id_vacios= array();

$i=0;
$peticion= "select  id from usuario";
            $resultado=mysqli_query($conexion,$peticion);
            if($resultado)
            {
              while($fila=mysqli_fetch_array($resultado)){
              	array_push($id_comparacion, $fila["id"]);
              	echo $id_comparacion[$i];
              	$i++;
              }
            }
            $con= sizeof($id_alumnos);
            $con2=sizeof($id_profe);
            $con3=sizeof($id_comparacion);

            for ($i=0; $i <$con ; $i++) { 
            	for ($j=0; $j <$con3 ; $j++) { 
            	    if($id_comparacion[$j]==$id_alumnos[$i])
            	    {
            	    	$id_comparacion[$j]=-1;
            	    }
            	}
            }
            for ($i=0; $i < $con2; $i++) { 
            	for ($j=0; $j < $con3; $j++) { 
            	   if($id_comparacion[$j]==$id_profe[$i]){
            	   	$id_comparacion[$j]=-1;
 					echo "gyf".$id_comparacion[$j];
            	   }
            	}
            }
            echo ".........";
            echo "<input type='text' list='browsers' >
                 <datalist id='browsers' >";
            for ($i=0; $i <$con3 ; $i++) {             	
            	if($id_comparacion[$i]>0){
                 echo "
                 <option> ".$id_comparacion[$i]."</option>";
            	}
            }
         echo "</datalist>";

?>
<?php
$id_s=array();
$letra=array();
$i=0;
$peticion= "select id from seccion";
$resultado=mysqli_query($conexion,$peticion);
            if($resultado)
            {
              while($fila=mysqli_fetch_array($resultado)){
              	array_push($id_s, $fila["id"]);
              	echo $id_s[$i];
              	$i++;
              }
            }  

   $i=0;
   $peticion= "select nombre from seccion";
$resultado=mysqli_query($conexion,$peticion);
            if($resultado)
            {
              while($fila=mysqli_fetch_array($resultado)){
              	array_push($letra, $fila["nombre"]);
              	echo $letra[$i];
              	$i++;
              }
            }
              

?>


<br>
<input type="text" list="browsers" >
<datalist id="browsers" >
   <option> 7
   <option> 8
   <option> 9
</datalist>

<label>Seccion</label>
<input type="text" id="sec"></input>
<label>Usuario</label>
<input type="text" id="user"></input>
<button type="button" class="pill orange" onclick="javascript:ingresar_alumno();"><i class="icon-plus-sign">Ingresar</i></button>
</form>
