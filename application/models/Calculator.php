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
			
		$sum = $this->toInt($out[0][0]) + 
			   $this->toInt($out[0][1]);	

		if ($base == 16) {						
			if ($sum > $base) {
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
		if (strlen($hex) == 2) {
			return $this->Base*$this->toInt(substr($hex, 0, 1)) + $this->toInt(substr($hex, 1, 1));
		}
		
		if (is_numeric($hex)) return $hex; 
		return strpos($this->Digits, $hex);
	}
}

?>