<?php
require "./class.php";
$newObj = new myProgram();
?>
<!DOCTYPE html>
<html>
<head>
<title>3x + 1 Assignment</title>

<style>
table th{
	width: 150px;
	padding: 8px;
}

table td{
	width: 150px;
	text-align: center;
}
  .histogram {
    display: flex;
    align-items: flex-end;
    min-height: 100px;
    padding: 10px;
  }

  .bar {
    margin-right: 5px;
    flex-shrink: 0;
  }

.bar {
    display: inline-block;
    background-color: blue;
    margin-right: 5px;
    transform: scaleY(-1); /* Flip the bar vertically */
	padding: 0px 5px 10px 5px;
}

.bar small {
    display: block;
	color: #fff;
    text-align: center;
    margin-top: 0px;
    transform: scaleY(-1); /* Flip the text vertically */
}
</style>
</head>
<body>

<h1><a href="./">Part 1</a></h1>
<form action="./" method="GET">
	<input type="number" name="part1" placeholder="Add Positive Number" required />
	<input type="submit" name="submit_part1" value="Submit" />
</form>

<?php
$part1Arr = array(0);

if(isset($_GET["submit_part1"])){
	$part1 = abs($_GET["part1"]);
	
	if($part1 >= 1){
		$part1Arr = $newObj->collSeq($part1);
	}
}
?>

<p>
<?php
$maximumNum = 0;

foreach($part1Arr as $p1){
	if($p1 >= 1){
		echo $p1.", ";
	}
	
	if($maximumNum < $p1){
		$maximumNum = $p1;
	}
}

$numIteration = count($part1Arr) - 1;

if($maximumNum >= 1){
	echo "<br><br>";
	echo "Maximum Number - ".$maximumNum;
	echo "<br>";
	echo "Number of Iterations - ".$numIteration;
}
?>
</p>

<br>
<h1>Part 2</h1>
<form action="./" method="GET">
	<input type="number" name="first_num" placeholder="Start Number" required />
	<input type="number" name="second_num" placeholder="Finish Number" required />
	<input type="submit" name="num_submit" value="Submit" />
</form>

<?php
if(isset($_GET["num_submit"])){
	$first_num = abs($_GET["first_num"]);
	$second_num = abs($_GET["second_num"]);
	
	if($first_num >= 1 && $second_num >= 1){
		if($second_num <= $first_num){
			echo "Number Error!";
		}else{
			
			$resultArr = $newObj->calcRange($first_num, $second_num);
			
			$dataArr = array();
			foreach ($resultArr as $reArr) { 
				$dataArr[] = $reArr["iterations"]; 
			}

			$hisObj = new calcstats();
			$hisArr = $hisObj->showHistogram($dataArr);
			ksort($hisArr);
			echo "
				<h3>A Simple Histogram</h3>
				<div class='histogram'>	
			";
			foreach ($hisArr as $hisIndex => $hisValue) {
				echo "<div class='bar' style='height: " . $hisValue."0px;' title='x:" .
				$hisIndex.", y:".$hisValue."'><small>".$hisIndex.":".$hisValue.
				"</small></div>";
			}
			echo "</div><p>[x(iterations): y(frequency)]</p>";
			
			echo "
				<br>
				<h3>Results:</h3>
				<table border='1'>
				<tr>
					<th>Number</th>
					<th>Maximum Number</th>
					<th>Iterations</th>
				</tr>
			";
			
			$maxIter = 0;
			foreach($resultArr as $resArr){
				$lpIter = $resArr["iterations"];
				if($maxIter < $lpIter){ $maxIter = $lpIter; }
				echo "
					<tr>
						<td>".$resArr["number"]."</td>
						<td>".$resArr["max_value"]."</td>
						<td>".$lpIter."</td>
					</tr>
				";
			}
			
			echo "
				</table>
				<br>
			";
			
			$minIter = $maxIter;
			foreach($resultArr as $ressArr){
				$neuIter = $ressArr["iterations"];
				if($minIter > $neuIter){
					$minIter = $neuIter;
				}
			}
			
			echo "
				<p>Minimum Iteration - $minIter</p>
				<p>Maximum Iteration - $maxIter</p>
				<br>
				<h3>Maximum Iteration:</h3>
				<table border='1'>
				<tr>
					<th>Number</th>
					<th>Maximum Number</th>
					<th>Iterations</th>
				</tr>
			";
			
			foreach($resultArr as $resArr){
				$lpIter = $resArr["iterations"];
				if($lpIter == $maxIter){
					echo "
						<tr>
							<td>".$resArr["number"]."</td>
							<td>".$resArr["max_value"]."</td>
							<td>".$lpIter."</td>
						</tr>
					";
				}
			}
			
			echo "
				</table>
				<br>
				<h3>Minimum Iteration:</h3>
				<table border='1'>
				<tr>
					<th>Number</th>
					<th>Maximum Number</th>
					<th>Iterations</th>
				</tr>
			";
			
			foreach($resultArr as $resArr){
				$lpIter = $resArr["iterations"];
				if($lpIter == $minIter){
					echo "
						<tr>
							<td>".$resArr["number"]."</td>
							<td>".$resArr["max_value"]."</td>
							<td>".$lpIter."</td>
						</tr>
					";
				}
			}
			
			echo "
				</table>
				<br>
			";
		}
	}else{ echo "Entered Number Error!"; }
}
?>

<h1><a href="./">Part 3</a></h1>
<form action="./" method="GET">
	<input type="number" name="fstTerm" placeholder="Add First Term" required />
	<input type="number" name="commDiff" placeholder="Add Common Difference" required />
	<input type="number" name="numTerms" placeholder="Add Number of Terms" required />
	<input type="submit" name="calcAP" value="Submit" />
</form>

<?php
if(isset($_GET["calcAP"])){
	$fstTerm = $_GET["fstTerm"];
	$commDiff = $_GET["commDiff"];
	$numterms = $_GET["numTerms"];
	
	$apSum = $newObj->arithProgSum($fstTerm, $commDiff, $numterms);
	$apSeries = $newObj->arithProgSeries($fstTerm, $commDiff, $numterms);
	
	echo "<p>Sum of Arithmetic Progression: ".$apSum."</p>";
	echo "<p>Arithmetic Progression Series:</p>";
	
	echo "<p>";
	foreach($apSeries as $ap){
		echo $ap.", ";
	}
	echo "</p>";
}
?>

</body>
</html>