<?php

require_once 'application\models\Convertor.php';

class Calculator {	
	
	public function calculate($expression, $base) {
		$convertor = new Convertor($base);
		
		preg_match_all('/[0-9A-Z]+/', $expression, $out);
		
		if (count($out[0]) < 2 || substr_count($expression, '+') != 1) {
			throw new RuntimeException('Invalid expression format');
		}		
		
		if (!$convertor->isValid($out[0][0]) || !$convertor->isValid($out[0][1])) { 
			throw new RuntimeException('Invalid number');
		}
			
		$sum = $convertor->decode($out[0][0]) + 
			   $convertor->decode($out[0][1]);	

		return $convertor->code($sum);
	}

}

?>