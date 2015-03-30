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