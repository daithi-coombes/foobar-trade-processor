<?php
namespace FoobarTest;
use FoobarTest;

/**
 * @group foo
 */
class AuthenticationControllerTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {

        global $authMock;

        $authMock = $this->getMockBuilder(
            '\\Foobar\\TradeProcessor\\AuthenticationController')
            ->getMock();
    }
    
    public function testLoginSuccess()
    {
        
        global $authMock;

        $username = 'foo';
        $password = 'bar';

        $authMock->login($username, $password);
        $actual = json_decode($authMock->getResult())['code'];
        $expected = 200;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @expectedException InvalidArgumentException
     * @covers \Foobar\TradeProcessor\AuthenticationController::getBlockedIps()
     */
    public function testRateLimiting()
    {
        
        global $authMock;

        $username = 'bad';
        $password = 'login';
        $ip = '127.0.0.1';

        //throw exception
        for ($x=0; $x<3; $x++) {
            $authMock->login($username, $password, $ip);
        }

        //block IP address
        $ips = $authMock->getBlockedIps();
        $this->assertTrue(in_array($ip, $ips));
    }

    public function testFailedLogin()
    {
        
        global $authMock;

        $username = 'bad';
        $password = 'login';

        $authMock->login($username, $password);
        $actual = json_decode($authMock->getResult())['code'];
        $expected = 401;

        $this->assertEquals($expected, $actual);
    }
}