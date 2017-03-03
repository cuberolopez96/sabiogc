<?php 
	comprobarPermisos();
	$categorias = ExpertosCategorias::findByUser($_SESSION['usuario']['id']);
	$niveles = Niveles::getNiveles();
	$errors = array();
	if(isset($_POST['add'])){
		$bandera = true;
		if(!isset($_POST['pregunta'])){
			
			$bandera = false;
		}
		
		if(!isset($_POST['tipoobjeto'])){
			$bandera = false;
		}
		if(!isset($_POST['categoria'])){
			$bandera = false;
		}
		if(!isset($_POST['Nivel'])){
			$bandera = false;
		}
		if(!isset($_POST['inrespuesta1'])){
			$bandera = false;
		}
		if(!isset($_POST['inrespuesta2'])){
			$bandera = false;
		}
		if(!isset($_POST['inrespuesta3'])){
			$bandera = false;
		}
		if(!isset($_POST['valrespuesta4'])){
			$bandera = false;
		}
		if ($bandera==true) {

			$pregunta = cleanInput($_POST['pregunta']);
			$_FILES['objeto']['name']=cleanInput($_FILES['objeto']['name']);
			$tipoobjeto =  cleanInput($_POST['tipoobjeto']);

			$categoria = cleanInput($_POST['categoria']);
			$inrespuesta1 = cleanInput($_POST['inrespuesta1']);
			$inrespuesta2 = cleanInput($_POST['inrespuesta2']);
			$inrespuesta3 = cleanInput($_POST['inrespuesta3']);
			$valrespuesta4 = cleanInput($_POST['valrespuesta4']);

			$nivel = cleanInput($_POST['Nivel']);
			
			try {
				Preguntas::insertPreguntas($pregunta,uploadFile($_FILES['objeto']),$tipoobjeto,$categoria,$nivel,1);
			
			$lastId=Preguntas::getLastId();
			Respuestas::InsertRespuestas($inrespuesta1,$lastId,0);
			Respuestas::InsertRespuestas($inrespuesta2,$lastId,0);
			Respuestas::InsertRespuestas($inrespuesta3,$lastId,0);
			Respuestas::InsertRespuestas($valrespuesta4,$lastId,1);


			header("Location: index.php");
			} catch (Exception $e) {
				$errors[]= $e->getMessage();
			}

		}
		


	}
 ?>
 <nav>
 	<a href="index.php" class="brand">SabioGC</a> 			
	<a href="index.php?page=logout">Salir</a>
	<a href="index.php">Volver</a>
 </nav>
<div class="container">
	<div>
		<?php foreach ($errors as $key => $error): ?>
			<div class="error"><?php echo $error ?></div>
		<?php endforeach ?>
	</div>
	<form action="/?page=addpregunta" method="post" enctype="multipart/form-data">
		<label for="">pregunta</label>
		<input type="text" name="pregunta" required>
		<label for="">Objeto</label>
		<input type="file" name="objeto" >
		<label for="">TipoObjeto</label>
		<select name="tipoobjeto" >
			<option value="imagen">Imagen</option>
			<option value="video">video</option>
			<option value="audio">Audio</option>
		</select>
		<label for="">Categoria</label>
		<select name="categoria" id="" required>
			<?php foreach ($categorias as $key => $categoria): ?>
				<option value="<?php echo $categoria['categoria'] ?>">
					<?php echo $categoria['categoria'] ?>
				</option>
			<?php endforeach ?>
		</select>
		<label for="">Nivel</label>
		<select name="Nivel" id="">
			<?php foreach ($niveles as $key => $nivel): ?>
				<option value="<?php echo $nivel['Nivel']; ?>">
					<?php echo $nivel['Nivel']; ?>
				</option>
			<?php endforeach ?>
		</select>
		<label for="">Respuesta Incorrecta 1</label>
		<input type="text" name="inrespuesta1" required="">
		<label for="">Respuesta Incorrecta 2</label>
		<input type="text" name="inrespuesta2" required="">
		<label for="">Respuesta Incorrecta 3</label>
		<input type="text" name="inrespuesta3" required="">
		<label for="">Respuesta Correcta</label>
		<input type="text" name="valrespuesta4" required="">
		<input type="submit" name="add" value="Add">
	</form>
</div>