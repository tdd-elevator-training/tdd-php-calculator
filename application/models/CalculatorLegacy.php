<?php


class CalculatorLegacy {	

	public function calculate($expr, $base) {
		$b = false;
		for ($i = 0; $i < strlen($expr); $i++) {
			if ($expr[$i] == '+') {
				continue;
			}
				
			$d = $expr[$i];
			$int = (!is_numeric($d))?strpos("0123456789ABCDEFG", $d):$d;
			$b |= ($int === false) || $int >= $base;
		}

		if ($b) {
			throw new RuntimeException('Invalid number');
		}
		
		if ($base > strlen("0123456789ABCDEFG") || $base <= 1) {
			throw new RuntimeException('Invalid base');
		}
		
		preg_match_all('/[0-9A-G]+/', $expr, $out);
		
		if (count($out[0]) < 2 || substr_count($expr, '+') != 1) {
			throw new RuntimeException('Invalid expression format');
		}		
		
		$sum = 0;
		for ($i = 0; $i < strlen($out[0][0]) ; $i++) {
			$c = substr($out[0][0], $i, 1);
			$sum = $base*$sum + (int)((is_numeric($c))?$c:strpos("0123456789ABCDEFG", $c));
		}
		
		$sum2 = 0;
		for ($i = strlen($out[0][1]) - 1; $i >= 0; $i--) {
			$c = substr($out[0][1], $i, 1);
			$a = (!is_numeric($c))?strpos("0123456789ABCDEFG", $c):$c;
			$sum2 += $a*pow($base, strlen($out[0][1]) - $i - 1);
		}
	
		$sum += $sum2;

		$res = '';
		$l = $sum;
		do {
			$h = $l % $base;
			$l = (int)$l / $base;
			$digits = "0123456789ABCDEFG";
			$res = $digits[$h].$res;
		} while ($l >= 1);
		
		return $res;
	}

}

?>