<?php

require_once 'PHPUnit\Framework\TestCase.php';
require_once 'application\models\Calculator.php';

class CalculatorTest extends PHPUnit_Framework_TestCase {
	
	public function testShould4When2Plus2() {
		$calculator = new Calculator();
		$actual =  $calculator->calculate('2+2');
 		$this->assertEquals('4', $actual);
	}	
	
}
?>