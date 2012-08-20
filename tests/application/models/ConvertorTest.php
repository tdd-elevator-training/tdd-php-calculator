<?php

require_once 'PHPUnit\Framework\TestCase.php';
require_once 'application\models\Convertor.php';

class ConvertorTest extends PHPUnit_Framework_TestCase {
		
	private $Convertor;
	
	protected function setUp() {
		parent::setUp ();
		$this->Convertor = new Convertor(16);
	
	}
	
	protected function tearDown() {
		$this->Convertor = null;
		parent::tearDown ();
	}
	
	public function testShouldConvertHexToInt() {
		$actual =  $this->Convertor->decode('1ABC');
		$this->assertEquals(6844, $actual);
	}
	
	public function testShouldConvertIntToHex() {
		$actual =  $this->Convertor->code('6844');
		$this->assertEquals('1ABC', $actual);
	}
	
	public function testShouldValidateTrueIfValid() {
		$this->assertTrue($this->Convertor->isValid('6844'));
	}
	
	public function testShouldValidateFalseIfInvalid() {
		$this->assertFalse($this->Convertor->isValid('1ABG'));
	}
	
}
?>