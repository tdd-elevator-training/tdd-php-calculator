<?php


class Convertor {	
	
	private $Base;
	private $Digits = "0123456789ABCDEFG";
	
	public function __construct($base) {
		$this->Base = $base;
	}
	
	public function code($int) {
		$result = '';
		$low = $int;
		do {
			$high = $low % $this->Base;
			$low = (int)$low / $this->Base;
			$result = $this->toHex($high).$result;
		} while ($low >= 1);
	
		return $result;
	}
	
	
	private function toHex($int) {
		return $this->Digits[$int];
	}
	
	public function decode($hex) {
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
	
	public function isValid($expression) {
		$is_invalid = false;
		for ($index = 0; $index < strlen($expression); $index++) {
			if ($expression[$index] == '+') {
				continue;
			}
				
			$int = $this->toInt($expression[$index]);
			$is_invalid |= ($int === false) || $int >= $this->Base;
		}
		return !$is_invalid;
	}
}

?>