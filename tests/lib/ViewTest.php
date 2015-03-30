<?php
namespace FoobarTest;
use FoobarTest;

class ViewTest extends PHPUnit_Framework_TestCase
{

    public function testRenderHead()
    {

        $view->getHead();
    }

    public function testRenderHeader()
    {

        $view->renderHeader();
    }

    public function testRenderFooter()
    {

        $view->renderFooter();
    }
}