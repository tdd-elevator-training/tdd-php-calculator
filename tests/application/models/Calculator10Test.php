<?php

require_once 'PHPUnit\Framework\TestCase.php';
require_once 'application\models\Calculator10.php';

class Calculator10Test extends PHPUnit_Framework_TestCase {
	
	private $Calculator;
	
	protected function setUp() {
		parent::setUp ();
		$this->Calculator = new Calculator10();
	
	}
	
	protected function tearDown() {
		$this->Calculator = null;		
		parent::tearDown ();
	}
	
	public static function provider() {
		return array(
				array(2, 2, 4),
				array(3, 4, 7),
				array(11, 22, 33),
		);
	}
	
	/**
	 * @dataProvider provider
	 */
	public function testShouldSumWhenXPlusY($x, $y, $expected) {
		$actual =  $this->Calculator->calculate($x.'+'.$y);
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