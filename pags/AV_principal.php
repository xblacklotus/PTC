<?php 
session_start();
//Validar si se está ingresando con sesión correctamente
if (!isset($_SESSION['user'])){
echo '<script language = javascript>
alert("Sesion invalida");

self.location = "../index2.php";

self.location = "loginAlumno.php";

</script>';
}
else
{
include ("../includes/header_aula.php");
    $id_alumno=$_SESSION['user'];
    $peticion="select id_seccion, nombres, apellidos,grado from alumno where id=".$id_alumno."" ;
    $resultado=mysqli_query($conexion,$peticion);
    $fila=mysqli_fetch_array($resultado);
    $sec = $fila[0];
    $nombres = $fila[1];
    $apellidos = $fila[2];
    $grado = $fila[3];

    $peticion2="select nombre from seccion where id=".$sec."" ;
    $resultado2=mysqli_query($conexion,$peticion2);
    $fila2=mysqli_fetch_array($resultado2);
    $seccion=$fila2[0];
?>
<header>
    <hgroup>
        <h1><a href="#" title="Aula virtual">Aula Virtual</a></h1>
        <h2>tus tareas a un click</h2>
    </hgroup>
    
</header>
    <aside id="promotion">
    <div id="slides">
        <div class="slides_container">
            <a href="#" title="Wilhelm Klingspor Gotisch" target="_blank"><img src="../imgs/fondo1.jpg" width="918" height="240" alt="Slide 1"></a>
            <a href="#" title="Quentin caps" target="_blank"><img src="../imgs/banner.jpg" width="918" height="240" alt="Slide 2"></a>
            <a href="#" title="Engravers" target="_blank"><img src="../imgs/fondo1.jpg" width="918" height="240" alt="Slide 3"></a>
            <a href="#" title="Bello Pro" target="_blank"><img src="../imgs/banner.jpg" width="918" height="240" alt="Slide 4"></a>
        </div>
        <a href="#" class="prev"><img src="../imgs/arrow-prev.gif" width="20" height="43" alt="Arrow Prev"></a>
        <a href="#" class="next"><img src="../imgs/arrow-next.gif" width="20" height="43" alt="Arrow Next"></a>
    </div>
</aside>
    <aside id="right">
        <section>

            <form name="formAl" method="post" id="block">
                    <h5>Nombre Alumno</h5>
                    <?php echo '<label>'.$nombres.'</label>';  ?>
                    <br>
                    <h5>Apellido Alumno</h5>
                    <?php echo '<label>'.$apellidos.'</label>';  ?>
                    <br>
                    <h5>Año cursado</h5>
                    <?php echo '<label>'.$grado.'</label>';  ?>
                    <br>
                    <h5>Sección: </h5>
                    <?php echo '<label>'.$seccion.'</label>';  ?>
                  <br>
                  <hr>
                  <hr>
                  <br>
                   <li><a href="../includes/desconectar_alumno.php">Cerrar sesión</a></li>
            </form>
         </section>   
    </aside>
    <article>
       

        <h2>PORTAL DEL ESTUDIANTE</h2>
        <h5>Materias inscritas</h5>
       
         <?php
//Bloque de grado
    $peticion3="select grado from alumno where id=".$id_alumno."" ;
    $resultado3=mysqli_query($conexion,$peticion3);
    $fila3=mysqli_fetch_array($resultado3);
    $grado = $fila3[0];
?>
<?php
    $peticion4="select id_seccion from alumno where id=".$id_alumno."" ;
    $resultado4=mysqli_query($conexion,$peticion4);
    $fila4=mysqli_fetch_array($resultado4);
    $seccion = $fila4[0];
   // echo 'seccion: '.$seccion;
?>
<?php
    $peticion5="select * from materias where grado=".$grado." and id_seccion=".$seccion."" ;
        $resultado5=mysqli_query($conexion,$peticion5);
    
    $a=0;
    $numero=1;
    while ($fila5=mysqli_fetch_array($resultado5)) {
      $total=0;
       echo "
       <form class='cae_texto'name='formA' method='post' action='av_contenido.php' >
       <input class='bids' type='hidden' name='id' value=".$fila5[0]." /> 
       <button type='submit' >
        
       </button><p>".$fila5[1]."</p>
       </form>
       ";
       //var_dump($fila5[0]);
        }
       ?>
            
    
       
    </article>

<?php include("../includes/footer2.php");
}
?>