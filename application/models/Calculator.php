<?php


class Calculator {	
	
	public function calculate($expression) {
		preg_match_all("/[0-9]+/", $expression, $out);
		
		if (count($out[0]) < 2 || substr_count($expression, '+') != 1) {
			throw new RuntimeException('Invalid expression format');
		}
		
		$sum = (int)($out[0][0]) + 
			   (int)($out[0][1]);	
		
		return $sum;
	}
}

?>