<?php


class Calculator {	
	public function calculate($expression) {
		$result = substr($expression, 0, 1) + $this->hexToInt(substr($expression, 2, 1));
		if ($result == 10) {
			return "A";
		} else if ($result == 11) {
			return "B";
		} else if ($result == 12) {
			return "C";
		} else if ($result == 13) {
			return "D";
		} else if ($result == 14) {
			return "E";
		}  else if ($result == 15) {
			return "F";
		} else {
			return $result;
		}	
	}
	
	private function hexToInt($hex) {
		if (is_numeric($hex)) return $hex; 
		if ($hex == "A") return 10;	
	}
}

?>