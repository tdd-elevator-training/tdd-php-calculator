<?php


class Calculator {	
	public function calculate($expression) {
		$result = substr($expression, 0, 1) + substr($expression, 1, 2);
		if ($result == 10) {
			return "A";
		} else if ($result == 11) {
			return "B";
		} else { 
			return $result;
		}	
	}
}

?>