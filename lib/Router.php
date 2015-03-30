<?php
/**
 * @package Foobar
 * @author Daithi Coobmes <webeire@gmail.com>
 */
namespace Foobar;

/**
 * Router Singleton Class.
 */
class Router
{

    /** @var string  The action method to be called. */
    protected $_action = 'index';
    /** @var string The controller class to be called. */
    protected $_controller = 'Index';
    /** @var string The module name. */
    protected $_module;
    /** @var array Default null. Request Get data. */
    protected $_requestGet;
    /** @var array Default null. Request Post data. */
    protected $_requestPost;

    /** @var boolean Whether running in unit tests or not. */
    public static $testing = false;
    
    /**
     * Get Router singleton.
     * @return Singleton Router
     */
    public static function getInstance()
    {

        static $instance = null;

        if (
            null===$instance ||
            self::$testing
        ) {
            $instance = new static();
        }

        return $instance;
    }

    /**
     * Get the action method.
     * @return string
     */
    public function getAction()
    {

        return $this->_action;
    }

    /**
     * Get the controller class name.
     * @return string
     */
    public function getController()
    {

        return $this->_controller;
    }

    /**
     * Get the module name.
     * @return string
     */
    public function getModule()
    {

        return $this->_module;
    }
    
    /**
     * Get get request
     * @return array Returns null if no post data.
     */
    public function getRequestGet()
    {

        return $this->_requestGet;
    }

    /**
     * Get post request
     * @return array Returns null if no post data.
     */
    public function getRequestPost()
    {

        return $this->_requestPost;
    }

    /**
     * Setter for the request get.
     * @return Router Returns self for chaining.
     */
    public function parseGet($data=null)
    {
        $this->_requestGet = $data;

        return $this;
    }

    /**
     * Setter for the request post.
     * @return Router Returns self for chaining.
     */
    public function parsePost($data=null)
    {

        $this->_requestPost = $data;

        if (@$data['controller'])
            $this->_controller = $data['controller'];
        if (@$data['action'])
            $this->_action = $data['action'];
        if (@$data['module'])
            $this->_module = $data['module'];

        return $this;
    }

    /**
     * Prevent class creation with `new` keyword
     */
    protected function __construct()
    {
        ;
    }

    /**
     * Prevent cloning of instance
     */
    private function __clone()
    {
        ;
    }

    /**
     * Prevent unserializing of instance
     */
    private function __wake()
    {
        ;
    }
}
