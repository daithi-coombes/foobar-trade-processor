<?php
/**
 * Main controller class for the Foobar domain.
 * 
 * @package Foobar
 * @author Daithi Coombes <webeire@gmail.com>
 */
namespace Foobar;
use Foobar;

class Controller
{

    /** @var \Foobar\Route The route instance. */
    protected $_route;
    /** @var array An array of data to pass to the View. */
    protected $_data = array();

    /**
     * Factory method.
     * Get the controller object based on the Route instance.
     * @param Route $route The route instance.
     * @return Controller
     */
    public static function factory(Router $route)
    {
        
        $module = $route->getModule();
        ($module) ?
            $namespace = '\Foobar\\' . $route->getModule() . '\\':
            $namespace = '\Foobar\\';
        $class = $namespace . $route->getController() . 'Controller';

        $obj = new $class();
        $obj->setRoute($route);

        return $obj;
    }

    /**
     * Default action method.
     */
    public function index()
    {
        ;
    }

    /**
     * Gets action method from router and calls it.
     * @return \Foobar\Controller Returns self for chaining.
     */
    public function doAction()
    {
        
        //call action method
        $method = $this->_route->getAction();
        $this->_data = $this->$method();

        return $this;
    }

    /**
     * Get the parsed result.
     * @uses self::result
     * @return array.
     */
    public function getResult()
    {

        return $this->_data;
    }

    /**
     * Set the Route instance.
     * @return Controller Returns self for chaining.
     */
    public function setRoute(Router $route)
    {

        $this->_route = $route;
        return $this;
    }
}
