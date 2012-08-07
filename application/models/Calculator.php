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
			
		$sum = $this->hexToInt($out[0][0]) + 
			   $this->hexToInt($out[0][1]);	

		return $this->intToHex ($sum);
	}

	private function intToHex($int) {
		$big = (int)($int / $this->Base);
		if ($big <> 0) {
			return $this->intToHex($big).$this->intToHex($int % $this->Base);
		}
				
		return $this->toHex($int);
	}

	
	private function toHex($int) {
		return $this->Digits[$int];
	}
	
	private function hexToInt($hex) {		
		if (strlen($hex) == 2) {
			return $this->Base*$this->hexToInt(substr($hex, 0, 1)) + $this->hexToInt(substr($hex, 1, 1));
		}
		
		return $this->toInt ($hex);

	}
	
	private function toInt($hex) {
		if (is_numeric($hex)) return $hex; 
		return strpos($this->Digits, $hex);
	}

}

?>