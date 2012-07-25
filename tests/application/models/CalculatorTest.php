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
	
	public function testShouldBWhen8Plus3() {
		$actual =  $this->Calculator->calculate('8+3');
		$this->assertEquals('B', $actual);
	}
	
	public function testShouldCWhen7Plus5() {
		$actual =  $this->Calculator->calculate('7+5');
		$this->assertEquals('C', $actual);
	}
	
	public function testShouldDWhen6Plus7() {
		$actual =  $this->Calculator->calculate('6+7');
		$this->assertEquals('D', $actual);
	}
	
	public function testShouldEWhen5Plus9() {
		$actual =  $this->Calculator->calculate('5+9');
		$this->assertEquals('E', $actual);
	}
	
	public function testShouldFWhen5PlusA() {
		$actual =  $this->Calculator->calculate('5+A');
		$this->assertEquals('F', $actual);
	}
	
	public function testShouldFWhenDPlus2() {
		$actual =  $this->Calculator->calculate('D+2');
		$this->assertEquals('F', $actual);
	}
	
}
?>