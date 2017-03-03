<?php  
comprobarPermisos();
comprobarPermisosAdministrador();
if(!isset($_GET['id'])){
	header("Location: index.php?page=expertos");

}
$id= cleanInput($_GET['id']);
$experto = Expertos::findById($id);
$categorias = ExpertosCategorias::findByUser($id);
?>
<nav>
	<a href="index.php" class="brand">SabioGC</a>
	<a href="index.php?page=logout">Salir</a>
	<a href="index.php?page=expertos">Volver</a>
</nav>
<div class="encabezado">
	<header>
		<h2><?php echo $experto['usuario']; ?></h2>
	</header>

</div>

<div class="container">
	<ul class="collection">
		<?php foreach ($categorias as $key => $categoria): ?>
			<li><?php echo $categoria['categoria']; ?></li>
		<?php endforeach ?>
	</ul>
</div>