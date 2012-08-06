<?php


class CalculatorX {	
	
	private $Base;
	private $Digits = "0123456789ABCDEFG";
	
	public function calculate($expression, $base) {
		$this->Base = $base;
		preg_match_all("/[".$this->Digits."]+/", $expression, $out);
		
		$sum = $this->toInt($out[0][0]) + 
			   $this->toInt($out[0][1]);					
		
		return $this->toHex($sum);	
	}

	private function toHex($int) {
		if ($int / $this->Base < 1) {
			return $this->intToHex($int);
		}
		
		$high = (int)($int / $this->Base);
		return $this->toHex($high).$this->intToHex($int % $this->Base);
	}
	
	private function intToHex($int) {		
		return $this->Digits[$int];
	}
	
	private function toInt($hex) {
		$sum = 0; 
		for ($index = 0; $index < strlen($hex); $index++) {
			$sum = $this->Base*$sum + $this->hexToInt(substr($hex, $index, 1)); 
		}
		return $sum;								
	}
	
	private function hexToInt($hex) {	
		return strpos($this->Digits, $hex);
	}
}

?>