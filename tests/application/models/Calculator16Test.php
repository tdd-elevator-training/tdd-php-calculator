<?php

require_once 'PHPUnit\Framework\TestCase.php';
require_once 'application\models\Calculator16.php';

class Calculator16Test extends PHPUnit_Framework_TestCase {
	
	private $Calculator;
	
	protected function setUp() {
		parent::setUp ();
		$this->Calculator = new Calculator16();
	
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
	
	public function testShould19WhenBPlusE() {
		$actual =  $this->Calculator->calculate('B+E');
		$this->assertEquals('19', $actual);
	}
	
	public function testShould1BWhenCPlusF() {
		$actual =  $this->Calculator->calculate('C+F');
		$this->assertEquals('1B', $actual);
	}
	
	public function testShould1EWhen1CPlus2() {
		$actual =  $this->Calculator->calculate('1C+2');
		$this->assertEquals('1E', $actual);
	}
	
	public function testShould22When11Plus11() {
		$actual =  $this->Calculator->calculate('11+11');
		$this->assertEquals('22', $actual);
	}
	
	public function testShould44When22Plus22() {
		$actual =  $this->Calculator->calculate('22+22');
		$this->assertEquals('44', $actual);
	}
	
	public function testShould132When99Plus99() {
		$actual =  $this->Calculator->calculate('99+99');
		$this->assertEquals('132', $actual);
	}
	
	public function testShould101When100Plus1() {
		$actual =  $this->Calculator->calculate('100+1');
		$this->assertEquals('101', $actual);
	}

  	public function testShould_1CDE455_When_CDE456_Plus_FFFFFF() {
		$actual =  $this->Calculator->calculate('CDE456+FFFFFF');
		$this->assertEquals('1CDE455', $actual);
	}	
	
/** TODO contimue with big int	
	public function testShouldSubBigInteger() {
		$actual =  $this->Calculator->calculate('ABCDE657DBEAA+ABCEF54645FFE');
		$this->assertEquals('1579CDB9E21EA8', $actual);
	}
**/
	
}
?>