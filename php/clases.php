<?php
    function __autoload($class_name) {
        if (file_exists('./../php/dao/' . $class_name . '.php')){
            include './../php/dao/' . $class_name . '.php';
        }
        if (file_exists('./../php/entities/' . $class_name . '.php')){
            include './../php/entities/' . $class_name . '.php';
        }
        if (file_exists('./../php/functions/' . $class_name . '.php')){
            include './../php/functions/' . $class_name . '.php';
        }
    }

    if (file_exists('./../php/dao/daoConnection.php')){
        include_once './../php/dao/daoConnection.php';
    }
	
	// Genric tools
	include '../php/entities/Render.php';
	
	// Generic builder
	$build = new Build();
?>
