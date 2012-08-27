<?php

require_once 'application\models\Convertor.php';

class Calculator {	
	
	private $Convertor;
	
	public function __construct($convertor) {
		$this->Convertor = $convertor; 
	}

	public function calculate($expression) {
		preg_match_all('/[0-9A-Z]+/', $expression, $out);
		
		if (count($out[0]) < 2 || substr_count($expression, '+') != 1) {
			throw new RuntimeException('Invalid expression format');
		}		
		
		if (!$this->Convertor->isValid($out[0][0]) || !$this->Convertor->isValid($out[0][1])) { 
			throw new RuntimeException('Invalid number');
		}
			
		$sum = $this->Convertor->decode($out[0][0]) + 
			   $this->Convertor->decode($out[0][1]);	

		return $this->Convertor->code($sum);
	}

}

?>