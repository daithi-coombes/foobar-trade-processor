<?php
namespace Foobar\TradeProcessor;
use Foobar\Controller;

class AuthenticationController extends Controller
{

    /**
     * Login a user.
     * @param string $username The username.
     * @param string $password The password.
     * @return boolean
     */
    public function login($username, $password, $ip=null)
    {

    }

    /**
     * Get a list of blockedIps and their start times.
     * @return array
     */
    public function getBlockedIps()
    {

    }

    /**
     * Do rate limiting for brute force attacks
     * @throws Exception And blocks IP address
     */
    private function rateLimiting()
    {

    }
}