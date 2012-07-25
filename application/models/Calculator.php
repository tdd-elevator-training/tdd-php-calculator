<?php


class Calculator {	
	public function calculate($expression) {
		$result = $this->hexToInt(substr($expression, 0, 1)) + 
				  $this->hexToInt(substr($expression, 2, 1));
		if ($result == 10) return "A"; 
		if ($result == 11) return "B";		
		if ($result == 12) return "C";
		if ($result == 13) return "D";
		if ($result == 14) return "E";
		if ($result == 15) return "F";		
		return $result;	
	}
	
	private function hexToInt($hex) {
		if (is_numeric($hex)) return $hex; 
		if ($hex == "A") return 10;	
		if ($hex == "D") return 13;
	}
}

?>