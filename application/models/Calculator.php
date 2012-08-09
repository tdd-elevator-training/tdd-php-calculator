<?php


class Calculator {	
	
	private $Base;
	private $Digits = "0123456789ABCDEFG";
	
	public function calculate($expression, $base) {
		$this->Base = $base;

		if ($this->isContainsInvalidNumber($expression)) {
			throw new RuntimeException('Invalid number');
		}
		
		if ($base > strlen($this->Digits) || $base <= 1) {
			throw new RuntimeException('Invalid base');
		}
		
		preg_match_all('/['.$this->Digits.']+/', $expression, $out);
		
		if (count($out[0]) < 2 || substr_count($expression, '+') != 1) {
			throw new RuntimeException('Invalid expression format');
		}		
			
		$sum = $this->hexToInt($out[0][0]) + 
			   $this->hexToInt($out[0][1]);	

		return $this->intToHex ($sum);
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

}

?>