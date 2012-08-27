<?php

require_once 'PHPUnit\Framework\TestCase.php';
require_once 'application\models\Calculator.php';

class CalculatorTest extends PHPUnit_Framework_TestCase {
			
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
				array('11', '11', 16, '22'),
				array('22', '22', 16, '44'),
				array('99', '99', 16, '132'),
				array('100', '1', 16, '101'),
				array('D', '3', 17, 'G'),
				array('D', '2', 17, 'F'),
				array('D', '4', 17, '10'),
				array('G', '1', 17, '10'),
				array('G', 'G', 17, '1F'),
				array('1G', '1G', 17, '3F'),
				array('1010101010', '0101010101', 2, '1111111111'),
		);
	}
	
	/**
	 * @dataProvider provider
	 */
	public function testShouldSumWhenXPlusY($x, $y, $base, $expected) {
		$calculator = new Calculator(new Convertor($base));
		$actual =  $calculator->calculate($x.'+'.$y);
		$this->assertEquals($expected, $actual);
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testShouldExceptionWhenInvalidExpression() {
		$calculator = new Calculator(new Convertor('10'));
		$calculator->calculate('1');
	}

	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testShouldExceptionWhenMoreThanOnePlus() {
		$calculator = new Calculator(new Convertor('10'));
		$calculator->calculate('1++3');
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testShouldExceptionWhenIUseNotExistsSymbols() {
		$calculator = new Calculator(new Convertor('16'));
		$calculator->calculate('G+1');
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testShouldExceptionWhenIUseNotExistsSymbols2() {
		$calculator = new Calculator(new Convertor('2'));
		$calculator->calculate('10300+1');
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testShouldExceptionWhenIUseNotExistsSymbols3() {
		$calculator = new Calculator(new Convertor('4'));
		$calculator->calculate('1+1A1');
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testShouldExceptionWhenIUseNotExistsSymbols4() {
		$calculator = new Calculator(new Convertor('17'));
		$calculator->calculate('QWE+ASD');
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testShouldExceptionWhenBaseIsMoreThan17() {
		$calculator = new Calculator(new Convertor('18'));
		$calculator->calculate('1+1');
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testShouldExceptionWhenBaseIsLessThan2() {
		$calculator = new Calculator(new Convertor('1'));
		$calculator->calculate('0+0');
	}
		
}
?>