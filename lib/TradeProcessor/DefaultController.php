<?php
/**
 * Default controller class for the Trade Processor module.
 * 
 * @package Foobar
 * @subpackage TradeProcessor
 * @author Daithi Coombes <webeire@gmail.com>
 */
namespace Foobar\TradeProcessor;
use Foobar\Controller;

/**
 * Default controller
 */
class DefaultController extends Controller
{

	/**
	 * Default action.
	 */
    public function index()
    {
        
        return array('foo'=>'bar');
    }
}