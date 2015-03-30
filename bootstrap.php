<?php
/**
 * Bootstrap Foobar
 * 
 * @package Foobar
 * @author Daithi Coombes <webeire@gmail.com>
 */
namespace Foobar;

/**
 * Autoload function.
 * 
 * If root namespace is 'Foobar' then will attempt to load file.
 * 
 * @param string $classname The fully qualified class name.
 */
spl_autoload_register(function($classname){

    $parts = explode("\\", $classname);
    if ($parts[0]=='Foobar') {
    	$parts[0] = 'lib';
    	$filename = implode(DIRECTORY_SEPARATOR, $parts) . '.php';

    	if (is_readable($filename)) {
    		include_once $filename;
    	}
    }
});


