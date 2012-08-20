<?php


class Convertor {	
	
	private $Base;
	private $Digits = "0123456789ABCDEFG";
	
	public function decode($hex, $base) {
		$this->Base = $base;
		
		return $this->hexToInt($hex);
	}
	
	private function hexToInt($hex) {
		$sum = 0;
		for ($index = 0; $index < strlen($hex); $index++) {
			$sum = $this->Base*$sum + $this->toInt(substr($hex, $index, 1));
		}
		return $sum;
	
	}
	
	private function toInt($hex) {
		if (is_numeric($hex)) return $hex;
		return strpos($this->Digits, $hex);
	}
}

?>