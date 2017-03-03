<?php 
comprobarPermisos();
comprobarPermisosAdministrador();
$expertos = Expertos::getExpertos();
 ?>
 <nav>
 	<a href="index.php" class="brand">SabioGC</a>
 	<a href="index.php?page=logout">Salir</a>
 	<a href="index.php?page=categorias">Categorias</a>
 	<a href="index.php">Home</a>
 </nav>
 <div class="container">
 	<table>
 		<caption>Expertos <a href="index.php?page=addexperto">
 			<i class="fa fa-plus"></i>
 		</a></caption>
 		<tr>
 			<th>Nombre</th>
 			<th>Usuario</th>
 			<th></th>
 			<th></th>
 		</tr>
 		<?php foreach ($expertos as $key => $experto): ?>
 			<tr>
 				<td><?php echo $experto['nombre']; ?></td>
 				<td><?php echo $experto['usuario'] ?></td>
 				<td><a href="index.php?page=editexperto&id=<?php echo $experto['id']; ?>"><i class="fa fa-pencil"></i></a></td>
 				<td><a href="index.php?page=experto&id=<?php echo $experto['id'] ?>"><i class="fa fa-eye"></i></a></td>
 			</tr>
 		<?php endforeach ?>
 	</table>
 </div>
