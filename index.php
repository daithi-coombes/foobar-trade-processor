<?php
/**
 * Front controller.
 * 
 * A market trade processor.
 * 
 * @package Foobar
 * @author Daithi Coombes <webeire@gmail.com>
 */
namespace Foobar;
use Foobar\Router;

//bootstrap
require_once('bootstrap.php');

//set default module
if (isset($_POST['module']))
    $_POST['module'] = 'TradeProcessor';

//route request
$route = Router::getInstance()
	->parseGet(null)
	->parseFiles(null)
	->parsePost($_POST);    //only parse post requests


//controller::action()
$controller = Controller::factory($route)
	->doAction();


//view()
$view = View::getView($controller)
	->render();
