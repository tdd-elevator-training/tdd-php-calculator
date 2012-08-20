<?php

require_once 'application\models\Convertor.php';

class Calculator {	
	
	public function calculate($expression, $base) {
		$this->Base = $base;
		$convertor = new Convertor($base);

		if (!$convertor->isValid($expression)) {
			throw new RuntimeException('Invalid number');
		}
		
		if ($base > strlen($this->Digits) || $base <= 1) {
			throw new RuntimeException('Invalid base');
		}
		
		preg_match_all('/['.$this->Digits.']+/', $expression, $out);
		
		if (count($out[0]) < 2 || substr_count($expression, '+') != 1) {
			throw new RuntimeException('Invalid expression format');
		}		
			
		$sum = $convertor->decode($out[0][0]) + 
			   $convertor->decode($out[0][1]);	

		return $convertor->code($sum);
	}

}

?>