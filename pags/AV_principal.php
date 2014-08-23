<?php include ("../includes/header_aula.inc");?>

<header>
		<div class="slider">
			<ul class="frames">
				<li id="one" class="slide">
					<img src="../imgs/Slider.jpg" alt="Slide1">
					<nav>
						<a class="prev" href="#five">&larr;</a>
						<a class="next" href="#two">&rarr;</a>
					</nav>
					<li id="two" class="slide">
                    <img src="../imgs/Slider2.jpg" alt="Slide 2">
                    <nav>
                        <a class="prev" href="#one">&larr;</a>
                        <a class="next" href="#three">&rarr;</a>
                    </nav>            
                </li>
                <li id="three" class="slide">
                    <img src="../imgs/Slider3.jpg" alt="Slide 3">
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
    <div id="block">
          <h3>Nombre Alumno</h3>
          <br>
          <ul>
            <h4>Año cursado:</h4><br>
            <h4>Sección: </h4><br>
            <h4>Número de lista</h4><br>
          </ul>
          <br><br>
          <hr>
          	<h4 id="Log">Log out</h4>
    </div>
    <section id="Main">
    	<h2>PORTAL DEL ESTUDIANTE</h2>
    	<div id="Agen">
    	<h3>Agenda</h3>
    		<select name="Agenda" size="4" style="height: 110px; width: 270px; margin-left: 10px;">
    			<optgroup label="Agenda">
    				<option value="0">Entrega de tarea</option>
    				<option value="1">Entrega de tarea</option>
    				<option value="2">Entrega de tarea</option>
    				<option value="3">Entrega de tarea</option>
    				<option value="4">Entrega de tarea</option>
    				<option value="5">Entrega de tarea</option>
    			</optgroup>
    		</select>
    	</div>
    </section>
</aside>

<?php include("../includes/footer2.inc");?>