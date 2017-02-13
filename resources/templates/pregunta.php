	<?php 
		if(!$_GET['id'])
			header('location: index.php');
		$preguntas = Preguntas::findById($_GET['id']);
		$pregunta = $preguntas[0];
		$respuestas = Respuestas::findByPregunta($pregunta['id']);


	?>
	<div class="encabezado">
		<div class="encabezado-objeto">
			<?php if (!isset($pregunta['Objeto'])): ?>
				<img src="http://viajar.especiales.elperiodico.com/50-paraisos-de-ensueno/files/2013/05/rocosas.jpg" alt="">
			<?php else: ?>
				
				<?php if ($pregunta['tipoObjeto']=='Imagen'): ?>
					<img src="<?php echo $pregunta['Objeto']; ?>" alt="">
					
				<?php else: ?>
					<?php if ($pregunta['tipoObjeto']=='Vídeo'): ?>
						<video src="<?php echo $pregunta['Objeto']; ?>" autoplay>
							
						</video>
					<?php else: ?>
						<audio src="">
							<source src="<?php echo $pregunta['Objeto'] ?>">
						</audio>
						
					<?php endif ?>
				<?php endif ?>
			<?php endif ?>
		</div>
		<header>
			<h3><?php echo $pregunta['pregunta'] ?></h3>
		</header>
	</div>
	<ul class="collection">
		<?php foreach ($respuestas as $key => $respuesta): ?>
			<?php if ($respuesta['valida']==0): ?>
				<li><?php echo $respuesta['respuesta'] ?></li>
			<?php else: ?>
				<li class="success"><?php echo $respuesta['respuesta'] ?></li>
			<?php endif ?>
		<?php endforeach ?>
	</ul>