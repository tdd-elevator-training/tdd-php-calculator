<?php


class Calculator10and16 {	
	
	private $Base;
	
	public function calculate($expression, $base) {
		$this->Base = $base;
		preg_match_all("/[0-9A-F]+/", $expression, $out);
		
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
		if ($int == 10) return "A";
		if ($int == 11) return "B";
		if ($int == 12) return "C";
		if ($int == 13) return "D";
		if ($int == 14) return "E";
		if ($int == 15) return "F";
		return $int;
	}
	
	private function toInt($hex) {
		$sum = 0; 
		for ($index = 0; $index < strlen($hex); $index++) {
			$sum = $this->Base*$sum + $this->hexToInt(substr($hex, $index, 1)); 
		}
		return $sum;								
	}
	
	private function hexToInt($hex) {	
		if (is_numeric($hex)) return $hex;
		if ($hex == "A") return 10;
		if ($hex == "B") return 11;
		if ($hex == "C") return 12;
		if ($hex == "D") return 13;
		if ($hex == "E") return 14;
		if ($hex == "F") return 15;
		return $hex;
	}
}

?>