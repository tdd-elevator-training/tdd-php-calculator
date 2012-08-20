<?php


class Convertor {	
	
	private $Base;
	private $Digits = "0123456789ABCDEFG";
	
	public function __construct($base) {
		$this->Base = $base;
	}
	
	public function decode($hex) {
		return $this->hexToInt($hex);
	}
	
	public function code($hex) {
		return $this->intToHex($hex);
	}
	
	public function isValid($hex) {
		return !$this->isContainsInvalidNumber($hex);
	}
	
	private function intToHex($int) {
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
	
	private function isContainsInvalidNumber($expression) {
		$is_invalid = false;
		for ($index = 0; $index < strlen($expression); $index++) {
			if ($expression[$index] == '+') {
				continue;
			}
				
			$int = $this->toInt($expression[$index]);
			$is_invalid |= ($int === false) || $int >= $this->Base;
		}
		return $is_invalid;
	}
}

?>