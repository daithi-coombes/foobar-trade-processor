<?php
/**
 * @package Foobar
 * @author Daithi Coombes <webeire@gmail.com>
 */
namespace Foobar;
use Foobar;

/**
 * Main View class.
 */
class View
{

    /** @var string The full path to the package root directory. */
    protected $_tplDirectory;
    /** @var \Foobar\Controller The relevant controller. */
    protected $controller;
    
    /**
     * Constructor.
     */
    public function __construct()
    {

        $this->_tplDirectory = FOOBAR_DIR . '/view';
    }

    /**
     * @covers \Foobar\View::setController()
     */
    public static function getView(Controller $controller)
    {
        
        $obj = new View();
        $obj->setController($controller);

        return $obj;
    }

    public function render()
    {

        foreach (array(
            $this->_tplDirectory.'/head.tpl',
            $this->_tplDirectory.'/header.tpl',
            $this->_tplDirectory.'/body.tpl',
            $this->_tplDirectory.'/footer.tpl'
        ) as $tpl) {

            $this->getTpl($tpl);
        }
    }

    /**
     * Set the controller for this view.
     * @return View Returns self for chaining.
     */
    public function setController(Controller $controller)
    {

        $this->controller = $controller;
        return $this;
    }

    /**
     * Load a tpl file.
     * @param string $path The full path and filename of the tpl file.
     */
    private function getTpl($path)
    {

        $data = $this->controller->getResult();
        require_once($path);
    }
}