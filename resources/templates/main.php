<?php 
comprobarPermisos();
$preguntas = Preguntas::getPreguntas();

 ?>
 <header>
 	<h2>Bienvenido <?php echo $_SESSION['usuario']['usuario']; ?></h2>
 </header>
<div class="cards">
	<?php foreach ($preguntas as $key => $pregunta): ?>
		<div class="card">
			<header>
				<h3><?php echo $pregunta['pregunta']; ?><a href="/?page=editpregunta&id=<?php echo $pregunta['id'] ?>"><i class="fa fa-pencil"></i></a></h3>
				<h4><a href="/?page=pregunta&id=<?php echo $pregunta['id'] ?>">Ver</a></h4>
			</header>
		</div>
	<?php endforeach ?>
</div>