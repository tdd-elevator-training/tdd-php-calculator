<?php


class Calculator {	
	public function calculate($expression) {
		return substr($expression, 0, 1) + substr($expression, 1, 2);

	}
}

?>