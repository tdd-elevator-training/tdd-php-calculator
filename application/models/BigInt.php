<?php

class BigInt {
	
	private $data = array(1, 2, 3);
	
	public function __construct($size) {
	}
	
	public function set($index, $number) {
		$this->data[$index] = $number;
	} 
	
	public function getValue() {
		$result = '';
		foreach ($this->data as $int) {
			$result = $result.$int;
		}
		return $result;
	}

}

?>