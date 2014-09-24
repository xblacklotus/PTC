<?php include ("../includes/header_aula.php");
    include("../includes/inheader.php");
    $id_alumno=3;
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
       
         <table id="tbmats" class="striped tight sortable" cellspacing="0" cellpadding="0" style="max-width="100px"">
            <thead><tr>
                <th>Tarea</th>
                <th>Fecha de entrega</th></tr>
            </thead>
            <tr>
                 <?php 
        $consulta="select titulo, fecha_entrega from anuncios";
        $res2=mysqli_query($conexion,$consulta);
        $fila3=mysqli_fetch_array($res2);
        $titulo=$fila3[0];
        $fecha =$fila3[1];
        ?>
            </tr>
        </table>
            <select name="Agenda" size="4" style="height: 110px; width: 270px; margin-left: 10px;">
                <optgroup label="Agenda">
                    <option value="0">Entrega de tarea</option>
                    <option value="1">Entrega de tarea</option>
                </optgroup>
            </select>
        </div>
        <!--Aqui esta el includes de anuncios-->
        <form>
        <div id="Anuncio">
       
            <h3>Anuncios</h3>
            <select name="Anuncios" size="4" style="height: 140px; width: 580px; margin-left: 10px;">
                <optgroup label="Anuncios">
            <?php
                $i = 0;
                $consulta = "select * from anuncios";
                $res = mysqli_query($conexion,$consulta);
                while ($resAnu = mysqli_fetch_array($res)) {
                    $consu = "select nombre from materias where id =".$resAnu['id_materia'];
                    $re = mysqli_query($conexion,$consu);
                    $fila = mysqli_fetch_array($re);
                    $mat = $fila[0];
                    echo '<option><strong>'.$mat."</strong> : ".$resAnu['anuncio'].'</option>';
                    $i++;
                    }
            ?>
                </optgroup>
                </select>
        </div>
        </form>
        <!---->
    </section>
</aside>
<?php include("../includes/footer2.php");
//hola
?>