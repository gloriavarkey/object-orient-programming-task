<?php
include("./functions.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>My First Practical Task</title>
</head>
<body>

<h1><a href="./">Part 1</a></h1>
<form action="./" method="GET">
	<input type="number" name="firstNum" required />
	<input type="submit" value="Send" name="submitForm" />
</form>

<?php

if(isset($_GET["submitForm"])){
	$firstNum = abs(floatval($_GET["firstNum"]));
	
	if($firstNum >= 1){
		$newArr = collatzArray($firstNum);

		foreach($newArr as $ax){
			echo $ax.",";
		}
	}else{
		echo "Please Enter a number Greater than Zero!";
	}
}

?>

</body>
</html>