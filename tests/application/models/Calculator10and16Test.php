<?php

require_once 'PHPUnit\Framework\TestCase.php';
require_once 'application\models\Calculator10and16.php';

class Calculator10and16Test extends PHPUnit_Framework_TestCase {
	
	private $Calculator;
	
	protected function setUp() {
		parent::setUp ();
		$this->Calculator = new Calculator10and16();
	
	}
	
	protected function tearDown() {
		$this->Calculator = null;		
		parent::tearDown ();
	}
	
	public function __construct() {
	}
	
	public function testShould4When2Plus2Base10() {
		$actual =  $this->Calculator->calculate('2+2', '10');
		$this->assertEquals('4', $actual);
	}
	
	public function testShould7When3Plus4Base10() {
		$actual =  $this->Calculator->calculate('3+4', '10');
		$this->assertEquals('7', $actual);
	}
	
	public function testShould10When9Plus1Base10() {
		$actual =  $this->Calculator->calculate('9+1', '10');
		$this->assertEquals('10', $actual);
	}
	
	public function testShould13When11Plus2Base10() {
		$actual =  $this->Calculator->calculate('11+2', '10');
		$this->assertEquals('13', $actual);
	}
	
	public function testShould22When11Plus11Base10() {
		$actual =  $this->Calculator->calculate('11+11', '10');
		$this->assertEquals('22', $actual);
	}
	
	public function testShould44When22Plus22Base10() {
		$actual =  $this->Calculator->calculate('22+22', '10');
		$this->assertEquals('44', $actual);
	}
	
	public function testShould198When99Plus99Base10() {
		$actual =  $this->Calculator->calculate('99+99', '10');
		$this->assertEquals('198', $actual);
	}
	
	public function testShould101When100Plus1Base10() {
		$actual =  $this->Calculator->calculate('100+1', '10');
		$this->assertEquals('101', $actual);
	}
	
	public function testShould_1111111110_When_123456789_Plus_987654321_Base10() {
		$actual =  $this->Calculator->calculate('123456789+987654321', '10');
		$this->assertEquals('1111111110', $actual);
	}
	
	public function testShould4When2Plus2Base16() {
 		$actual =  $this->Calculator->calculate('2+2', '16');
 		$this->assertEquals('4', $actual);
	}
	
	public function testShould7When3Plus4Base16() {
		$actual =  $this->Calculator->calculate('3+4', '16');
		$this->assertEquals('7', $actual);
	}

	public function testShouldAWhen9Plus1Base16() {
		$actual =  $this->Calculator->calculate('9+1', '16');
		$this->assertEquals('A', $actual);
	}
	
	public function testShouldBWhen8Plus3Base16() {
		$actual =  $this->Calculator->calculate('8+3', '16');
		$this->assertEquals('B', $actual);
	}
	
	public function testShouldCWhen7Plus5Base16() {
		$actual =  $this->Calculator->calculate('7+5', '16');
		$this->assertEquals('C', $actual);
	}
	
	public function testShouldDWhen6Plus7Base16() {
		$actual =  $this->Calculator->calculate('6+7', '16');
		$this->assertEquals('D', $actual);
	}
	
	public function testShouldEWhen5Plus9Base16() {
		$actual =  $this->Calculator->calculate('5+9', '16');
		$this->assertEquals('E', $actual);
	}
	
	public function testShouldFWhen5PlusABase16() {
		$actual =  $this->Calculator->calculate('5+A', '16');
		$this->assertEquals('F', $actual);
	}
	
	public function testShouldFWhenDPlus2Base16() {
		$actual =  $this->Calculator->calculate('D+2', '16');
		$this->assertEquals('F', $actual);
	}
	
	public function testShould19WhenBPlusEBase16() {
		$actual =  $this->Calculator->calculate('B+E', '16');
		$this->assertEquals('19', $actual);
	}
	
	public function testShould1BWhenCPlusFBase16() {
		$actual =  $this->Calculator->calculate('C+F', '16');
		$this->assertEquals('1B', $actual);
	}
	
	public function testShould1EWhen1CPlus2Base16() {
		$actual =  $this->Calculator->calculate('1C+2', '16');
		$this->assertEquals('1E', $actual);
	}
	
	public function testShould22When11Plus11Base16() {
		$actual =  $this->Calculator->calculate('11+11', '16');
		$this->assertEquals('22', $actual);
	}
	
	public function testShould44When22Plus22Base16() {
		$actual =  $this->Calculator->calculate('22+22', '16');
		$this->assertEquals('44', $actual);
	}
	
	public function testShould132When99Plus99Base16() {
		$actual =  $this->Calculator->calculate('99+99', '16');
		$this->assertEquals('132', $actual);
	}
	
	public function testShould101When100Plus1Base16() {
		$actual =  $this->Calculator->calculate('100+1', '16');
		$this->assertEquals('101', $actual);
	}

  	public function testShould_1CDE455_When_CDE456_Plus_FFFFFFBase16() {
		$actual =  $this->Calculator->calculate('CDE456+FFFFFF', '16');
		$this->assertEquals('1CDE455', $actual);
	}	
	
/** TODO contimue with big int	
	public function testShouldSubBigIntegerBase16() {
		$actual =  $this->Calculator->calculate('ABCDE657DBEAA+ABCEF54645FFE');
		$this->assertEquals('1579CDB9E21EA8', $actual);
	}
**/
	
	
	
}
?>