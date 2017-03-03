<?php 
comprobarPermisos();
comprobarPermisosAdministrador();
if(!isset($_GET['id'])){
	header("Location: index.php?page=expertos");
}
$errors=array();
$id=cleanInput($_GET['id']);
$experto= Expertos::findById($id);
$categorias = Categorias::getCategorias();
$categoriasexperto = ExpertosCategorias::findByUser($id);

if (isset($_POST['registrar'])) {
	$bandera = true;
	if (!isset($_POST['nombre'])) {
		$errors[]="Escribe el nombre";
		$bandera = false;
	}
	if (!isset($_POST['usuario'])) {
		$errors[]="Escribe el usuario";
		$bandera = false;
	}
	if (!isset($_POST['email'])) {
		$errors[]="Escribe el email";
		$bandera = false;
	}
	if (!isset($_POST['categorias'])) {
		$errors[]="selecciona alguna categoría";
		$bandera=false;
	}
	if (!isset($_POST['password'])) {
		$errors[]="Escribe la password";
		$bandera = false;
	}
	if ($_POST['password']!=$_POST['vpassword']) {
		$errors[]="Las contraseñas no coinciden";
		$bandera = false;

	}
	if ($bandera == true) {
		$nombre = cleanInput($_POST['nombre']);
		$usuario = cleanInput($_POST['usuario']);
		$email = cleanInput($_POST['email']);
		$password = cleanInput($_POST['password']);
		try {
			Expertos::edit($id,$nombre,$usuario,$email,$password);
			ExpertosCategorias::cleanByUser($experto['id']);
			foreach ($_POST['categorias'] as $key => $categoria) {
				ExpertosCategorias::insertar($categoria,$experto['id']);
			}
			header("Location: index.php?page=experto&id=$id");
		} catch (Exception $e) {
			$errors[]= $e->getMessage();
		}
		
	}

}

 ?>
 	<nav>
 		<a href="index.php" class="brand">SabioGC</a>
 		<a href="index.php?page=logout">Salir</a>
 		<a href="index.php?page=expertos">Volver</a>
 	</nav>
 	<div class="container">
		<div class="errors">
			<?php foreach ($errors as $key => $error): ?>
				<div class="error"><?php echo $error ?></div>
			<?php endforeach ?>
		</div>
 		<form action="index.php?page=editexperto&id=<?php echo $id ?>" method="post">
 			<label for="">Nombre</label>
 			<input type="text" name="nombre" value="<?php echo $experto['nombre'] ?>">
 			<label for="">Username</label>
 			<input type="text" name="usuario" value="<?php echo $experto['usuario'] ?>">
 			<label for="">Email</label>
 			<input type="email" name="email" value="<?php echo $experto['email'] ?>">
 			<label for="">Password</label>
 			<input type="password" name="password" value="<?php echo $experto['password'] ?>">
 			<label for="">Verify password</label>
 			<input type="password" name="vpassword" value="<?php echo $experto['password'] ?>">
 			<?php foreach ($categorias as $key => $categoria): ?>
 				<?php $bandera = false; ?>
 				<?php foreach ($categoriasexperto as $key => $expcategoria): ?>
 					<?php if ($expcategoria['categoria']==$categoria['categoria']) {
 						$bandera = true;
 					} ?>
 					
 				<?php endforeach ?>
 				<?php if ($bandera == false): ?>
	 				<div>
	 					<input type="checkbox" name="categorias[]" value="<?php echo $categoria['categoria'] ?>"><label for=""><?php echo $categoria['categoria']; ?></label>
	 				</div>
	 			<?php else: ?>
	 				<div>
 					<input type="checkbox" name="categorias[]" value="<?php echo $categoria['categoria'] ?>" checked><label for=""><?php echo $categoria['categoria']; ?></label>
 				</div>
 				<?php endif ?>
 			<?php endforeach ?>
 			<input type="submit" name="registrar" value="registrar">

 		</form>
 	</div>
 
