<?php
namespace FoobarTest;
use FoobarTest;

class ViewTest extends \PHPUnit_Framework_TestCase
{

    function setUp()
    {

        global $view;

        $view = new \Foobar\View();
    }

    /**
     * @todo assertTag() is deprecated, replace it
     */
    public function testRenderHead()
    {

        global $view;

        $actual = $view->getHead();
        $matcher = array(
            'tag'       => 'title',
            'ancestor'  => array('tag', 'DOCTYPE'),
            'parent'    => array('tag', 'head')
        );

        //$this->assertTag($matcher, $actual);
    }

    /**
     * @todo write unit tests
     */
    public function testRenderHeader()
    {

        global $view;

        $view->getHeader();
    }

    /**
     * @todo write unit tests
     */
    public function testRenderFooter()
    {

        global $view;

        $view->getFooter();
    }
}