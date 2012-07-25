<?php

require_once 'PHPUnit\Framework\TestCase.php';
require_once 'application\models\BigInt.php';

class BigIntTest extends PHPUnit_Framework_TestCase {
	
	public function testShouldSumTwoInteger() {
		$int = new BigInt(10);
		$int->set(0, 1);
		$int->set(1, 2);
		$int->set(2, 3);

		$this->assertEquals("123", $int->getValue()); 
	}

}

