<?php


class Calculator {	
	public function calculate($expression) {
		$result = $this->hexToInt(substr($expression, 0, 1)) + 
				  $this->hexToInt(substr($expression, 2, 1));
		if ($result >= 10 & $result <= 15) return $this->toHex($result);
		
		if ($result > 16) {
			$result = '1'.$this->toHex($result - 16);			
		}
		return $result;	
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