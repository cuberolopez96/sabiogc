<?php 
require_once 'modules/config.php';
require_once 'modules/functions.php';
require_once 'modules/entity/ConnectDB.php';
require_once 'modules/entity/Preguntas.php';
require_once 'modules/entity/Categorias.php';
require_once 'modules/entity/Niveles.php';
require_once 'modules/entity/Respuestas.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<title>
	</title>
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link rel="stylesheet" href="resources/css/init.css">
	<link rel="stylesheet" href="resources/font-awesome-4.7.0/css/font-awesome.min.css">

</head>
<body>
	<nav>
		<a href="/" class="brand">SabioGC</a>
		<a href="/?page=add"><i class="fa fa-plus">
		</i></a>
	</nav>
	<main>
		<?php require_once 'modules/route.php' ?>
	</main>
</body>
</html>