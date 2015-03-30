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

    /** @var string The full path to the package root directory */
    protected $_tplDirectory;
    
    /**
     * Constructor.
     */
    public function __construct()
    {

        $this->_tplDirectory = FOOBAR_DIR . '/view';
    }

    /**
     * Get footer html.
     * @return string
     */
    public function getFooter()
    {

        $html = file_get_contents($this->_tplDirectory . '/footer.tpl');

        return $this->render($html);
    }

    /**
     * Get head html.
     * @return string
     */
    public function getHead()
    {

        $html = file_get_contents($this->_tplDirectory . '/head.tpl');

        return $this->render($html);
    }

    /**
     * Get header html.
     * @return string
     */
    public function getHeader()
    {

        $html = file_get_contents($this->_tplDirectory . '/header.tpl');

        return $this->render($html);
    }

    /**
     * @todo maybe should return DomDocument?
     */
    public function render($html)
    {

        return $html;
    }
}