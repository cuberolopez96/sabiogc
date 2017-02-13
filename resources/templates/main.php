<?php 
$preguntas = Preguntas::getPreguntas();

 ?>
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