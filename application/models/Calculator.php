<?php


class Calculator {	
	
	private $Digits = "0123456789ABCDEF";
	
	public function calculate($expression, $base) {
		preg_match_all("/[0-9]+/", $expression, $out);
		
		if (count($out[0]) < 2 || substr_count($expression, '+') != 1) {
			throw new RuntimeException('Invalid expression format');
		}
			
		$sum = (int)($out[0][0]) + 
			   (int)($out[0][1]);	

		if ($base == 16) {
			if ($sum > 9) {
				return $this->Digits[$sum];
			} 
			
		}
		
		return $sum;
	}
}

?>