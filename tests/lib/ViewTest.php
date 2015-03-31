<?php
namespace FoobarTest;
use FoobarTest;

class ViewTest extends \PHPUnit_Framework_TestCase
{

    function setUp()
    {

        global $view
            ,$mockController;

        $view = new \Foobar\View();
        $mockController = new \Foobar\Controller();
    }

    /**
     * @covers \Foobar\View::getView()
     * @covers \Foobar\View::setController()
     */
    public function testViewFactory()
    {

        global $mockController;

        //test getView()
        $actual = \Foobar\View::getView($mockController);
        $expected = '\\Foobar\\View';
        $this->assertInstanceOf($expected, $actual);

        //test setController
        $expected = '\\Foobar\\Controller';
        $this->assertInstanceOf($expected, \PHPUnit_Framework_Assert::readAttribute($actual, 'controller'));
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