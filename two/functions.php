<?php

function calculate_number_range($initNum, $endNum){
    $resultArray = array();
    
	for($e = $initNum; $e <= $endNum; $e++){
        $max = 0;
		$calcArr = part1Arr($e);
		$arrayIter = count($calcArr);
		$arrayIter = $arrayIter - 1;
		foreach($calcArr as $mx){
			if($max < $mx){
				$max = $mx;
			}
		}
		
        $resultArray[] = [ "number" => $e, "max_value" => $max, "iterations" => $arrayIter ];
    }
	
    return $resultArray;
}

function part1Arr($userNum){
	$part1Arr = array();
	
	while(true){
		$part1Arr[] = $userNum;
		
		$chkNum = $userNum - 1;
		if($chkNum == 0){
			break;
		}
		
		$userNum = calcPart($userNum);
	}
	
	return $part1Arr;
}

function calcPart($userNum){
	$nuNum = 0;
	if($userNum % 2 == 0){
		$nuNum = $userNum / 2;
	}else{
		$nuNum = (3 * $userNum) + 1;
	}
	return $nuNum;
}
?>