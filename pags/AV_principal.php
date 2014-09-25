<?php 
session_start();
//Validar si se está ingresando con sesión correctamente
if (!isset($_SESSION['user'])){
echo '<script language = javascript>
alert("Sesion invalida");
self.location = "../index2.php";
</script>';
}
else
{
include ("../includes/header_aula.php");
    include("../includes/header_al.php");
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
        <div class="slider">
            <ul class="frames">
                <li id="one" class="slide">
                    <img src="../imgs/1.jpg" alt="Slide1">
                    <nav>
                        <a class="prev" href="#five">&larr;</a>
                        <a class="next" href="#two">&rarr;</a>
                    </nav>
                    <li id="two" class="slide">
                    <img src="../imgs/2.jpg" alt="Slide 2">
                    <nav>
                        <a class="prev" href="#one">&larr;</a>
                        <a class="next" href="#three">&rarr;</a>
                    </nav>            
                </li>
                <li id="three" class="slide">
                    <img src="../imgs/3.jpg" alt="Slide 3">
                    <nav>
                        <a class="prev" href="#two">&larr;</a>
                        <a class="next" href="#four">&rarr;</a>
                    </nav>            
                </li>
                <li id="four" class="slide">
                    <img src="../imgs/Slider4.jpg" alt="Slide 4">
                    <nav>
                        <a class="prev" href="#three">&larr;</a>
                        <a class="next" href="#five">&rarr;</a>
                    </nav>            
                </li>
                <li id="five" class="slide">
                    <img src="../imgs/Slider5.jpg" alt="Slide 5">
                    <nav>
                        <a class="prev" href="#four">&larr;</a>
                        <a class="next" href="#one">&rarr;</a>
                    </nav>            
                </li>
                <li class="quicknav">
                    <ul>
                        <li><a href="#one"></a></li>
                        <li><a href="#two"></a></li>
                        <li><a href="#three"></a></li>
                        <li><a href="#four"></a></li>
                        <li><a href="#five"></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <aside>
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
          <br><br>
          <hr>
            <h4 id="Log">Log out</h4>
    </form>
    <section id="Main">
       

        <h2>PORTAL DEL ESTUDIANTE</h2>
        <div id="Agen">
       
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
       <form name='formA' method='post' action='av_contenido.php' >
       <input class='bids' type='hidden' name='id' value=".$fila5[0]."> </input> <button type='submit' class='pill orange' >
       <i class='icon-plus-sign'>".$fila5[1]."</i></button>
       </form>
       ";
       //var_dump($fila5[0]);
        }
       ?>
            
        </div>
       
    </section>
</aside>

<?php include("../includes/footer2.php");
}
?>