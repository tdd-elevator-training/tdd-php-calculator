<?php


class Calculator {	
	public function calculate($expression) {
		$result = substr($expression, 0, 1) + substr($expression, 1, 2);
		if ($result == 10) {
			return "A";
		} else {
			return $result;
		}	
	}
}

?>