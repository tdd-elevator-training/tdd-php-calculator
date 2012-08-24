<?php

require_once 'PHPUnit\Framework\TestCase.php';
require_once 'application\models\Calculator.php';

class CalculatorUnitTest extends PHPUnit_Framework_TestCase {
		
	private $Calculator;
	
	protected function setUp() {
		parent::setUp ();
		$this->Calculator = new Calculator();
	
	}
	
	protected function tearDown() {
		$this->Calculator = null;
		parent::tearDown ();
	}
	
	public function testShouldSumWhenXPlusY() {
		$this->assertEquals(444, $this->Calculator->calculate('123+321', 10));
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testShouldExceptionWhenInvalidExpression() {
		$this->Calculator->calculate('1', '10');
	}

	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testShouldExceptionWhenMoreThanOnePlus() {
		$this->Calculator->calculate('1++3', '10');
	}
		
}
?>