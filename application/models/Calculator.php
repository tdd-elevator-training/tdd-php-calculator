<?php


class Calculator {	
	public function calculate($expression) {
		$result = substr($expression, 0, 1) + substr($expression, 1, 2);
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
		} else {
			return $result;
		}	
	}
}

?>