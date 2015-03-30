<?php
namespace FoobarTest;
use FoobarTest;

class Router extends \PHPUnit_Framework_TestCase
{

	function setUp()
	{
		\Foobar\Router::$testing = true;
	}

	public function getInstance()
	{

		$test1 = Foobar\Router::getInstance();
		$test2 = Foobar\Router::getInstance();

		$this->assertSame($test1, $test2);
	}

	/**
	 * @todo finish testing setters/getters
	 */
	public function testParseGetRequests()
	{

		//test null
		$expected = null;
		\Foobar\Router::getInstance()
			->parseGet($expected);
		$actual = \Foobar\Router::getInstance()
			->getRequestGet();
		$this->assertSame($expected, $actual);

		//test data
		$expected = array('foo'=>'bar');
		\Foobar\Router::getInstance()
			->parseGet(array('foo'=>'bar'));
		$actual = \Foobar\Router::getInstance()
			->getRequestGet();
		//$this->assertSame($expected, $actual);
	}

	/**
	 * @todo finish testing setters/getters
	 */
	public function testParsePostRequests()
	{

		//test null
		$expected = null;
		\Foobar\Router::getInstance()
			->parsePost($expected);
		$actual = \Foobar\Router::getInstance()
			->getRequestPost();
		$this->assertSame($expected, $actual);

		//test data
		$expected = array('foo'=>'bar');
		\Foobar\Router::getInstance()
			->parsePost($expected);
		$actual = \Foobar\Router::getInstance()
			->getRequestPost();
		//$this->assertSame($expected, $actual);
	}
}