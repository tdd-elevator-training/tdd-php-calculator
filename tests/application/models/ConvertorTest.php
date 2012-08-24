<?php

require_once 'PHPUnit\Framework\TestCase.php';
require_once 'application\models\Convertor.php';

class ConvertorTest extends PHPUnit_Framework_TestCase {
		
	public static function validDataProvider() {
		return array(
				array(10, '2', '2'),
				array(10, '4', '4'),
				array(10, '3', '3'),
				array(10, '7', '7'),
				array(10, '11', '11'),
				array(10, '22', '22'),
				array(10, '33', '33'),
				
				array(16, '1', '1'),
				array(16, '2', '2'),
				array(16, '5', '5'),
				array(16, '6', '6'),
				array(16, '8', '8'),
				array(16, '9', '9'),
				array(16, 'A', '10'),
				array(16, 'B', '11'),
				array(16, 'C', '12'),
				array(16, 'D', '13'),
				array(16, 'E', '14'),
				array(16, 'F', '15'),
				array(16, '11', '17'),
				array(16, '19', '25'),
				array(16, '1B', '27'),
				array(16, '1E', '30'),
				array(16, '1C', '28'),
				array(16, '1D', '29'),
				array(16, '22', '34'),
				array(16, '44', '68'),
				array(16, '99', '153'),
				array(16, '100', '256'),
				array(16, '101', '257'),
				array(16, '132', '306'),
				
				array(17, '2', '2'),
				array(17, '3', '3'),
				array(17, '4', '4'),
				array(17, 'D', '13'),
				array(17, 'F', '15'),
				array(17, 'G', '16'),
				array(17, '10', '17'),
				array(17, '1G', '33'),
				array(17, '1F', '32'),
				array(17, '3F', '66'),
				
				array(2, '0101010101', '341'),
				array(2, '1010101010', '682'),
				array(2, '1111111111', '1023'),
		);
	}
	
	public static function invalidDataProvider() {
		return array(
			array(16, 'G'),
			array(2, '10300'),
			array(4, '1A1'),
			array(16, 'QWE'),
			array(16, 'ASD'),	
		);
	}
	
	/**
	 * @dataProvider validDataProvider
	 */
	public function testShouldConvertHexToInt($base, $hex, $int) {
		$convertor = new Convertor($base);
		$actual =  $convertor->decode($hex);
		$this->assertEquals($int, $actual);
	}
	
	/**
	 * @dataProvider validDataProvider
	 */
	public function testShouldConvertIntToHex($base, $hex, $int) {
		$convertor = new Convertor($base);
		$actual =  $convertor->code($int);
		$this->assertEquals($hex, $actual);
	}
	
	/**
	 * @dataProvider validDataProvider
	 */
	public function testShouldValidateTrueIfValid($base, $hex) {
		$this->validate($base, $hex, true);
	}
	
	/**
	 * @dataProvider invalidDataProvider
	 */
	public function testShouldValidateFalseIfInvalid($base, $hex) {
		$this->validate($base, $hex, false);
	}
	
	private function validate($base, $hex, $isValid) {
		$convertor = new Convertor($base);
		$actual =  $convertor->isValid($hex);
		$this->assertEquals($isValid, $actual);
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testShouldExceptionWhenBaseIsMoreThan17() {
		new Convertor(18);
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testShouldExceptionWhenBaseIsLessThan2() {
		new Convertor(1);
	}
}
?>