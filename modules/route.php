<?php 
if (!isset($_GET['page'])) {
	require_once 'resources/templates/main.php';

}else{
	$file = "resources/templates/$_GET[page].php";
	if(!file_exists($file)){
		require_once 'resources/templates/main.php';
	}else{
		require_once $file;
	}
	
}?>
