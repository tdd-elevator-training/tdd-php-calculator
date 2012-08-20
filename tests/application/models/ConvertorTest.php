<?php

require_once 'PHPUnit\Framework\TestCase.php';
require_once 'application\models\Convertor.php';

class ConvertorTest extends PHPUnit_Framework_TestCase {
		
	private $Convertor;
	
	protected function setUp() {
		parent::setUp ();
		$this->Convertor = new Convertor();
	
	}
	
	protected function tearDown() {
		$this->Convertor = null;
		parent::tearDown ();
	}
	
	public function testShouldConvertHexToInt() {
		$actual =  $this->Convertor->decode('1ABC', '16');
		$this->assertEquals(6844, $actual);
	}
	
	public function testShouldConvertIntToHex() {
		$actual =  $this->Convertor->code('6844', '16');
		$this->assertEquals('1ABC', $actual);
	}
		
}
?>