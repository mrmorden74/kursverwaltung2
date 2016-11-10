<?php 
// spl_autoload_register(function ($class) {
//     include 'classes/' . $class . '.class.php';

	
    spl_autoload_extensions(".class.php"); // comma-separated list
    spl_autoload_register();
?>

