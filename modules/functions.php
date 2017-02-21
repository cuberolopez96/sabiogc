<?php 
function cleanInput($input) {
 
  $search = array(
    '@<script[^>]*?>.*?</script>@si',   // Elimina javascript
    '@<[\/\!]*?[^<>]*?>@si',            // Elimina las etiquetas HTML
    '@<style[^>]*?>.*?</style>@siU',    // Elimina las etiquetas de estilo
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Elimina los comentarios multi-línea
  );
 
    $output = preg_replace($search, '', $input);
    return $output;
  }
function uploadFile($file){
	$dir = 'resources/uploads/';
	$mymeTypes = array('video/mp4','video/x-flv','audio/mpeg3','audio/x-mpeg3','image/jpeg','image/pjpeg','image/png');
	

		if(!in_array($file['type'], $mymeTypes)){
			throw new Exception("El fichero no tiene una extension permitida");
		}else{
			$dirname = $dir.basename($file['name']);
			if (!move_uploaded_file($file['tmp_name'], $dirname)) {
				throw new Exception("No se pudo subir el fichero", 1);
				
			}else{
			return $dirname;
			}

		}
	

}
function cargarVariablesSesion(){
	if (!isset($_SESSION['usuario'])) {
		$_SESSION['usuario']="";
	}
}
function comprobarPermisos(){
	if (empty($_SESSION['usuario'])) {
		header("Location: /?page=login");
	}
}
  
?>