<?php 
	comprobarPermisos();
	comprobarPermisosAdministrador();
	$categorias = Categorias::getCategorias();
 ?>
 <nav>
 	<a href="index.php" class="brand">SabioGC</a>
 			<a href="index.php?page=logout">Salir</a>
 			<a href="index.php?page=expertos">Expertos</a>
 			<a href="index.php">Home</a>
 </nav>
 <div class="container">
 	<table>
 		<tr>
 			<th>Categoria</th>
 		</tr>
 		<?php foreach ($categorias as $key => $categoria): ?>
 			<tr>
 				<td>
 					<?php echo $categoria['categoria']; ?>
 				</td>
 			</tr>
 		<?php endforeach ?>

 	</table>
 </div>