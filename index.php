<?php 
$controller = 'teacher';
$function = 'login';

if (isset($_GET['c']) && $_GET['c'] != '' ) {
	$controller = $_GET['c'];
}
if (isset($_GET['f']) && $_GET['f'] != '' ) {
	$function = $_GET['f'];
}

if (file_exists('controller/'.$controller.'.php')) {
	include('controller/'.$controller.'.php');
	$class = $controller.'Controller';
	$obj = new $class();
	if(method_exists($class, $function)){
		$obj->$function();
	}else{
		echo "Page Not found";
	}
	
}else{
	echo 'Page not found';
}
