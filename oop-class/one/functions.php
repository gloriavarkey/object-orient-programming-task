<?php

function calculateFunction($x){
	$val = 0;
	
	if($x % 2 == 0){
		//even number
		$val = $x / 2;
		return $val;
	}else{
		$val = (3 * $x) + 1;
		return $val;
	}
}

function collatzArray($num){
	$storeArr = array();
	$exitVal = false;
	
	while(true){
		$storeArr[] = $num;
		
		$chk = $num - 1;
		if($chk == 0){
			break;
		}
		
		$num = calculateFunction($num);
	}
	
	return $storeArr;
}


?>