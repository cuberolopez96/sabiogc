<?php 
comprobarPermisos();
$preguntas = Preguntas::getPreguntas();

 ?>
 <nav>
 	<a href="index.php" class="brand">SabioGC</a>
	<a href="index.php?page=logout">Salir</a>
	<?php if (isAdmin()): ?>
			<a href="index.php?page=expertos">Expertos</a>
			<a href="index.php?page=categorias">Categorias</a>
		<?php endif ?>
 </nav>
<div class="container">
	<table>
		<caption>
		Preguntas
		<a href="index.php?page=addpregunta"><i class="fa fa-plus"></i></a>
		</caption>
		<tr>
			<th>Enunciado</th>
			<th></th>
			<th></th>
		</tr>
		<?php foreach ($preguntas as $key => $pregunta): ?>
			<tr>
				<td><?php echo $pregunta['pregunta']; ?></td>
				<td><a href="index.php?page=editpregunta&id=<?php echo $pregunta['id'] ?>"><i class="fa fa-pencil"></i></a></td>
				<td><a href="index.php?page=pregunta&id=<?php echo $pregunta['id'] ?>"><i class="fa fa-eye"></i></a></td>
			</tr>
		<?php endforeach ?>
	</table>
</div>