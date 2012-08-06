<?php


class Calculator10 {	
	
	public function calculate($expression) {
		preg_match_all("/[0-9A-F]+/", $expression, $out);
		
		$sum = (int)($out[0][0]) + 
			   (int)($out[0][1]);					
		
		return (string)($sum);	
	}
}

?>