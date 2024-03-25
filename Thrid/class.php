<?php
class myProgram {
	public $progName = 0;
	public $outputSeq = array();
	public $rangeSeq = array();
	public $arithProgSumVal = 0;
	public $arithProgSeriesVal = array();
	
	public function fstFunction($userNum){
		$nuNum = 0;
		if($userNum % 2 == 0){
			$nuNum = $userNum / 2;
		}else{
			$nuNum = (3 * $userNum) + 1;
		}
		
		$this->progName = $nuNum;
		return $this->progName;
	}
	
	public function collSeq($userNum){
		$part1Arr = array();
		
		while(true){
			$part1Arr[] = $userNum;
			
			$chkNum = $userNum - 1;
			if($chkNum == 0){
				break;
			}
			
			$userNum = $this->fstFunction($userNum);
		}
		
		$this->outputSeq = $part1Arr;
		return $this->outputSeq;
	}
	
	public function calcRange($initNum, $endNum){
		$resultArray = array();
		
		for($e = $initNum; $e <= $endNum; $e++){
			$max = 0;
			$calcArr = $this->collSeq($e);
			$arrayIter = count($calcArr);
			$arrayIter = $arrayIter - 1;
			foreach($calcArr as $mx){
				if($max < $mx){
					$max = $mx;
				}
			}
			
			$resultArray[] = [ "number" => $e, "max_value" => $max, "iterations" => $arrayIter ];
		}
		$this->rangeSeq = $resultArray;
		return $this->rangeSeq;
	}
	
	public function arithProgSum($fstTerm, $commDiff, $numterms){
		$sum = ($numterms / 2) * (2 * $fstTerm + ($numterms - 1) * $commDiff);
		$this->arithProgSumVal = $sum;
		return $this->arithProgSumVal;
	}
	
	public function arithProgSeries($fstTerm, $commDiff, $numterms){
		$series = array();
		$current_term = $fstTerm;
		
		for($i = 0; $i < $numterms; $i++){
			$series[] = $current_term;
			$current_term = $current_term + $commDiff;
		}
		
		$this->arithProgSeriesVal = $series;
		return $this->arithProgSeriesVal;
	}
}
?>
