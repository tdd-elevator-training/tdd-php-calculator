<?php

require_once 'PHPUnit\Framework\TestCase.php';
require_once 'application\models\Calculator.php';
require_once 'application\models\Convertor.php';

class CalculatorUnitTest extends PHPUnit_Framework_TestCase {
		
	private $Calculator;
	private $Convertor;
	
	protected function setUp() {
		parent::setUp ();
		$this->Convertor = $this->getMock('Convertor', array('isValid', 'decode', 'code'), array('16'));
		$this->Calculator = new Calculator($this->Convertor);
	}
	
	protected function tearDown() {
		$this->Calculator = null;
		parent::tearDown ();
	}
	
	public function testShouldSumWhenXPlusY() {
		$this->shouldValidateOnMock('123', '321');
		$this->shouldDecode('123', '321');
		$this->shouldCode(444);
		$this->assertEquals(444, $this->Calculator->calculate('123+321'));
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testShouldExceptionWhenInvalidExpression() {
		$this->Calculator->calculate('1');
	}

	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testShouldExceptionWhenMoreThanOnePlus() {
		$this->Calculator->calculate('1++3');
	}
	
	private function shouldValidateOnMock($value1, $value2) {
		$this->Convertor->expects($this->at(0))
			->method('isValid')
			->with($this->equalTo($value1))
			->will($this->returnValue(true));
		
		$this->Convertor->expects($this->at(1))
			->method('isValid')
			->with($this->equalTo($value2))
			->will($this->returnValue(true));
	}
	
	private function shouldDecode($value1, $value2) {
		$this->Convertor->expects($this->at(2))
		    ->method('decode')
		    ->with($this->equalTo($value1))
		    ->will($this->returnValue($value1));
		
		$this->Convertor->expects($this->at(3))
			->method('decode')
			->with($this->equalTo($value2))
			->will($this->returnValue($value2));
	}
	
	private function shouldCode($value) {
		$this->Convertor->expects($this->at(4))
			->method('code')
			->with($this->equalTo($value))
			->will($this->returnValue($value));
	}
	
}
?>