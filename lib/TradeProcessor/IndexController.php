<?php
namespace Foobar\TradeProcessor;
use Foobar\Controller;

class IndexController extends Controller
{

    public function index()
    {
        
        return array('foo'=>'bar');
    }
}