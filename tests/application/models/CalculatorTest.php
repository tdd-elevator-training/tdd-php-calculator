<?php

require_once 'PHPUnit\Framework\TestCase.php';
require_once 'application\models\Calculator.php';

class CalculatorTest extends PHPUnit_Framework_TestCase {
	
	private $Calculator;
	
	protected function setUp() {
		parent::setUp ();
		$this->Calculator = new Calculator();
	
	}
	
	protected function tearDown() {
		$this->Calculator = null;		
		parent::tearDown ();
	}
	
	public function __construct() {
	}
	
	public function testShould4When2Plus2() {
 		$actual =  $this->Calculator->calculate('2+2');
 		$this->assertEquals('4', $actual);
	}
	
	public function testShould7When3Plus4() {
		$actual =  $this->Calculator->calculate('3+4');
		$this->assertEquals('7', $actual);
	}

	public function testShouldAWhen9Plus1() {
		$actual =  $this->Calculator->calculate('9+1');
		$this->assertEquals('A', $actual);
	}
	
	public function testShouldAWhen8Plus3() {
		$actual =  $this->Calculator->calculate('8+3');
		$this->assertEquals('B', $actual);
	}
	
	public function testShouldAWhen7Plus5() {
		$actual =  $this->Calculator->calculate('7+5');
		$this->assertEquals('C', $actual);
	}
	
}
?>