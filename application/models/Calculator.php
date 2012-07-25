<?php


class Calculator {	
	public function calculate($expression) {
		preg_match_all("/[0-9A-F]+/", $expression, $out);
		
		$sum = $this->hexToInt($out[0][0]) + 
				  $this->hexToInt($out[0][1]);
					
		$big = (int)($sum / 16);
		if ($big <> 0) { 
			return $this->toHex($big).$this->toHex($sum % 16); 
		}
		
		return $this->toHex($sum); 		
	}
	
	private function toHex($int) {		
		if ($int == 10) return "A";
		if ($int == 11) return "B";
		if ($int == 12) return "C";
		if ($int == 13) return "D";
		if ($int == 14) return "E";
		if ($int == 15) return "F";
		return $int;
	}
	
	private function hexToInt($hex) {
		if (strlen($hex) == 2) {
			return 16*$this->hexToInt(substr($hex, 0, 1)) + $this->hexToInt(substr($hex, 1, 1));
		}
		
		if (is_numeric($hex)) return $hex; 
		if ($hex == "A") return 10;
		if ($hex == "B") return 11;
		if ($hex == "C") return 12;
		if ($hex == "D") return 13;
		if ($hex == "E") return 14;
		if ($hex == "F") return 15;		
	}
}

?>