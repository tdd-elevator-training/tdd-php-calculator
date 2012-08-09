<?php

require_once 'PHPUnit\Framework\TestCase.php';
require_once 'application\models\CalculatorLegacy.php';

class CalculatorLegacyTest extends PHPUnit_Framework_TestCase {
		
	private $Calculator;
	
	protected function setUp() {
		parent::setUp ();
		$this->Calculator = new CalculatorLegacy();
	
	}
	
	protected function tearDown() {
		$this->Calculator = null;
		parent::tearDown ();
	}
	
	public static function provider() {
		return array(
// 				array('2', '2', 10, '4'),
// 				array('3', '4', 10, '7'),
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
		$actual =  $this->Calculator->calculate($x.'+'.$y, $base);
		$this->assertEquals($expected, $actual);
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
	
	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testShouldExceptionWhenIUseNotExistsSymbols() {
		$this->Calculator->calculate('G+1', '16');
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testShouldExceptionWhenIUseNotExistsSymbols2() {
		$this->Calculator->calculate('10300+1', '2');
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testShouldExceptionWhenIUseNotExistsSymbols3() {
		$this->Calculator->calculate('1+1A1', '4');
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testShouldExceptionWhenIUseNotExistsSymbols4() {
		$this->Calculator->calculate('QWE+ASD', '17');
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testShouldExceptionWhenBaseIsMoreThan17() {
		$this->Calculator->calculate('1+1', '18');
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testShouldExceptionWhenBaseIsLessThan2() {
		$this->Calculator->calculate('0+0', '1');
	}
		
}
?>