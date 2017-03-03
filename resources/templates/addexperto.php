<?php 
comprobarPermisos();
comprobarPermisosAdministrador();
$errors=array();
$categorias = Categorias::getCategorias();

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
			Expertos::insertar($nombre,$usuario,$email,$password);
			foreach ($_POST['categorias'] as $key => $categoria) {
				ExpertosCategorias::insertar($categoria,$_SESSION['usuario']['id']);

			}
			header("Location: index.php?page=expertos");
		} catch (Exception $e) {
			$errors[]= $e->getMessage();
		}
		
	}

}
 ?>
 <nav>
 	<a href="index.php" class="brand">SabioGC</a>
 	<?php if (isAdmin()): ?>
			<a href="index.php?page=expertos">Expertos</a>
			<a href="index.php?page=categorias">Categorias</a>
		<?php endif ?>
			<a href="index.php?page=logout">Salir</a>
 </nav>
 	<div class="container">
		<div class="errors">
			<?php foreach ($errors as $key => $error): ?>
				<div class="error"><?php echo $error ?></div>
			<?php endforeach ?>
		</div>
 		<form action="index.php?page=addexperto" method="post">
 			<label for="">Nombre</label>
 			<input type="text" name="nombre">
 			<label for="">Username</label>
 			<input type="text" name="usuario">
 			<label for="">Email</label>
 			<input type="email" name="email">
 			<label for="">Password</label>
 			<input type="password" name="password">
 			<label for="">Verify password</label>
 			<input type="password" name="vpassword">
 			<?php foreach ($categorias as $key => $categoria): ?>
 				<div>
 					<input type="checkbox" name="categorias[]" value="<?php echo $categoria['categoria'] ?>"><label for=""><?php echo $categoria['categoria']; ?></label>
 				</div>
 			<?php endforeach ?>
 			<input type="submit" name="registrar" value="registrar">

 		</form>
 	</div>
 