<?php 
	$categorias = Categorias::getCategorias();
	$niveles = Niveles::getNiveles();
	$pregunta="";
	$respuestas = "";
	$errors = array();
	if(!isset($_GET['id'])){
		header("Location: index.php");
	}else{
		$id = cleanInput($_GET['id']);
		$pregunta = Preguntas::findById($id);
		$pregunta = $pregunta[0];
		$respuestas = Respuestas::findByPregunta($id);

		

	}


	if(isset($_POST['add'])){
		$bandera = true;
		if(!isset($_POST['pregunta'])){
			
			$bandera = false;
		}
		
		if(!isset($_POST['tipoobjeto'])){
			echo "hola";
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
			$file = 'objeto';
			$tipoobjeto =  cleanInput($_POST['tipoobjeto']);

			$categoria = cleanInput($_POST['categoria']);
			$inrespuesta1 = cleanInput($_POST['inrespuesta1']);
			$inrespuesta2 = cleanInput($_POST['inrespuesta2']);
			$inrespuesta3 = cleanInput($_POST['inrespuesta3']);
			$valrespuesta4 = cleanInput($_POST['valrespuesta4']);

			$nivel = cleanInput($_POST['Nivel']);
			
			try {
				Preguntas::editPregunta($id,$pregunta,uploadFile($_FILES['objeto']),$tipoobjeto,$categoria,$nivel);
			
			Respuestas::editRespuesta($respuestas[0]['id'],$inrespuesta1);
			Respuestas::editRespuesta($respuestas[1]['id'],$inrespuesta2);
			Respuestas::editRespuesta($respuestas[2]['id'],$inrespuesta3);
			Respuestas::editRespuesta($respuestas[3]['id'],$valrespuesta4);


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
 	<a href="index.php?page">Volver</a>
 </nav>
<div class="container">
	<form action="/?page=editpregunta&id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
		<label for="">pregunta</label>
		<input type="text" name="pregunta" value="<?php echo $pregunta['pregunta']; ?>">
		<label for="">Objeto</label>
		<input type="file" name="objeto" value="<?php echo $pregunta['objeto']; ?>">
		<label for="">TipoObjeto</label>
		<select name="tipoobjeto">
			<option value="Imagen">Imagen</option>
			<option value="Video">Video</option>
			<option value="Audio">Audio</option>
		</select>
		<label for="">Categoria</label>
		<select name="categoria" id="">
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
		<input type="text" name="inrespuesta1" value="<?php echo $respuestas[0]['respuesta']; ?>">
		<label for="">Respuesta Incorrecta 2</label>
		<input type="text" name="inrespuesta2" value="<?php echo $respuestas[1]['respuesta']; ?>">
		<label for="">Respuesta Incorrecta 3</label>
		<input type="text" name="inrespuesta3" value="<?php echo $respuestas[2]['respuesta']; ?>">
		<label for="">Respuesta Correcta</label>
		<input type="text" name="valrespuesta4" value="<?php echo $respuestas[3]['respuesta']; ?>">
		<input type="submit" name="add" value="Add">
	</form>
</div>