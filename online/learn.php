<?php

session_start();

//echo $_SERVER["PHP_SELF"];
//
//echo "<br>";
//
if(isset($_POST['submit'])){
	
	$_SESSION['time'] = time() + 60;

	print_r($_POST);
}

//$password_1 = password_hash("secret", PASSWORD_BCRYPT, array('cost' => 10));
//$password_2 = password_hash("secret", PASSWORD_BCRYPT, array('cost' => 10));
//
//echo $password_1   = crypt('12345', '$2a$07$usesomesillystringforsalt$');
//echo $password_2   = crypt('12345', '$2a$07$usesomesillystringforsalt$');
//
//var_dump(hash_equals($password_1, $password_2));

//if(hash_equals($password_1, $password_2)){
//	
//	echo "yes";
//}

//echo strtotime(date("Y-m-d") $_SESSION['time']) - strtotime(date("Y-m-d") time());

//echo str_replace(".", "min(s) ", strtotime(date("Y-m-d h:i:s")) / 60) . "secs";


if(strpos(".", "thyytyy.jhjjjk") == 7) 
			
			{ echo (str_replace(".", "min(s) ", "thyytyy.jhjjjk") . "secs"); }

?>


<form action="" method="post">
	
	<div class="form-group">
	<input type="text" name="test" class="form-control">
	</div>
	
	<input type="radio" name="choice" value="1">1
	<br>
	<input type="radio" name="choice" value="2">2
	<br>
	<input type="radio" name="choice" value="3">3
	
	<div class="form-group">
	<input type="submit" name="submit" value="Submit">
	</div>
	
</form>


