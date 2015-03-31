<?php
namespace FoobarTest;
use FoobarTest;

class ControllerTest extends \PHPUnit_Framework_TestCase
{

	function setUp()
	{

		global $mockRoute;

		\Foobar\Router::$testing = true;
		$mockRoute = \Foobar\Router::getInstance();
		$mockRoute->parsePost(array(
			'module' => 'TradeProcessor'
		));
	}

	public function testFactory()
	{

		global $mockRoute;

		$actual = \Foobar\Controller::factory($mockRoute);

		$this->assertInstanceOf('\Foobar\Controller', $actual);
	}

	public function testDefaultController()
	{

		$mockRoute = \Foobar\Router::getInstance();
		$controller = \Foobar\Controller::factory($mockRoute);

		//test by classname, not instance, to ensure default Controller is returned.
		$actual = get_class($controller);
		$expected = 'Foobar\\Controller';

		$this->assertEquals($expected, $actual);
	}

	/**
	 * @covers \Foobar\Controller::getResult()
	 */
	public function testDoAction()
	{

		global $mockRoute
			,$mockController;

		$controller = \Foobar\Controller::factory($mockRoute)
			->doAction();

		$actual = $controller->getResult();
		$expected = array('foo'=>'bar');

		$this->assertEquals($expected, $actual);
	}
}