<?php


class Calculator {	
	
	public function calculate($expression) {
		preg_match_all("/[0-9]+/", $expression, $out);
		
		$sum = (int)($out[0][0]) + 
			   (int)($out[0][1]);	
		
		return $sum;
	}
}

?>