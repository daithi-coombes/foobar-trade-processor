<?php
namespace Foobar\TradeProcessor;
use Foobar\Controller;

class DefaultController extends Controller
{

    public function index()
    {
        
        return array('foo'=>'bar');
    }
}