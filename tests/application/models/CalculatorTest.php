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
	
	public static function provider() {
		return array(
				array('2', '2', 10, '4'),
				array('3', '4', 10, '7'),
				array('11', '22', 10, '33'),
				array('9', '1', 16, 'A'),
				array('6', '9', 16, 'F'),
				array('6', '8', 16, 'E'),
				array('A', '5', 16, 'F'),
				array('1', 'E', 16, 'F'),
				array('2', 'B', 16, 'D'),
				array('B', 'E', 16, '19'),
				array('C', 'F', 16, '1B'),
				array('F', 'F', 16, '1E'),
				array('1C', '1', 16, '1D'),
		);
	}
	
	/**
	 * @dataProvider provider
	 */
	public function testShouldSumWhenXPlusY($x, $y, $base, $expected) {
		$actual =  $this->Calculator->calculate($x.'+'.$y, $base);
		$this->assertEquals($expected, $actual);
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testShouldExceptionWhenInvalidExpression() {
		$actual =  $this->Calculator->calculate('1');
	}

	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testShouldExceptionWhenMoreThanOnePlus() {
		$actual =  $this->Calculator->calculate('1++3');
	}
		
}
?>