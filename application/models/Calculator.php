<?php


class Calculator {	
	
	private $Digits = "0123456789ABCDEF";
	
	public function calculate($expression, $base) {
		preg_match_all('/['.$this->Digits.']+/', $expression, $out);
		
		if (count($out[0]) < 2 || substr_count($expression, '+') != 1) {
			throw new RuntimeException('Invalid expression format');
		}
			
		$sum = $this->toInt($out[0][0]) + 
			   $this->toInt($out[0][1]);	

		if ($base == 16) {						
			if ($sum > 16) {
				return '1'.$this->toHex($sum - 16);
			} else if ($sum > 9) {
				return $this->Digits[$sum];
			}			 		
		}
		
		return (string)$sum;
	}
	
	private function toHex($int) {
		return $this->Digits[$int];
	}
	
	private function toInt($hex) {
		if (is_numeric($hex)) return $hex; 
		return strpos($this->Digits, $hex);
	}
}

?>