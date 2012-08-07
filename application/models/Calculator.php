<?php


class Calculator {	
	
	private $Base;
	private $Digits = "0123456789ABCDEFG";
	
	public function calculate($expression, $base) {
		$this->Base = $base;
		preg_match_all('/['.$this->Digits.']+/', $expression, $out);
		
		if (count($out[0]) < 2 || substr_count($expression, '+') != 1) {
			throw new RuntimeException('Invalid expression format');
		}
		
		if ($this->isInvalidNumber($out[0][0]) || $this->isInvalidNumber($out[0][1])) {
			throw new RuntimeException('Invalid expression format');
		}
			
		$sum = $this->hexToInt($out[0][0]) + 
			   $this->hexToInt($out[0][1]);	

		return $this->intToHex ($sum);
	}

	private function isInvalidNumber($hex) {
		$is_invalid = false;
		for ($index = 0; $index < strlen($hex); $index++) {
			$is_invalid |= $this->toInt($hex[$index]) >= $this->Base;				
		}			
		return $is_invalid;		
	}
	
	private function intToHex($int) {
		if ($int / $this->Base < 1) {
			return $this->toHex($int);
		}
				
		$high = (int)($int / $this->Base);
		return $this->intToHex($high).$this->intToHex($int % $this->Base);
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

}

?>