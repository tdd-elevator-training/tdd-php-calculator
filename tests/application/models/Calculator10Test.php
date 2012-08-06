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

	public function testShould10When9Plus1() {
		$actual =  $this->Calculator->calculate('9+1');
		$this->assertEquals('10', $actual);
	}
	
	public function testShould13When11Plus2() {
		$actual =  $this->Calculator->calculate('11+2');
		$this->assertEquals('13', $actual);
	}
	
	public function testShould22When11Plus11() {
		$actual =  $this->Calculator->calculate('11+11');
		$this->assertEquals('22', $actual);
	}
	
	public function testShould44When22Plus22() {
		$actual =  $this->Calculator->calculate('22+22');
		$this->assertEquals('44', $actual);
	}
	
	public function testShould198When99Plus99() {
		$actual =  $this->Calculator->calculate('99+99');
		$this->assertEquals('198', $actual);
	}
	
	public function testShould101When100Plus1() {
		$actual =  $this->Calculator->calculate('100+1');
		$this->assertEquals('101', $actual);
	}

  	public function testShould_1111111110_When_123456789_Plus_987654321() {
		$actual =  $this->Calculator->calculate('123456789+987654321');
		$this->assertEquals('1111111110', $actual);
	}	
	
	
}
?>