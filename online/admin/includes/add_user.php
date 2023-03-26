<?php

if($_SERVER['REQUEST_METHOD'] == "POST") {
	
	if(isset($_POST['add_user'])){

		$min = 3;
		$max = 10;


		$username             = clean(trim(ucwords(strtolower($_POST['username']))));
		$user_email           = clean(trim($_POST['user_email']));
		$password             = clean(trim($_POST['password']));
		$confirm_password     = clean(trim($_POST['confirm_password']));


		if(empty($username) || empty($user_email) || empty($password) || empty($confirm_password)) {

			$errors[] = "Sorry every field must be filled";
		}	


		if(strlen($username) < $min) {

			$errors[] = "Please your username cannot be less than {$min}";
		}	


		if(strlen($username) > $max) {

			$errors[] = "Please your username cannot be greater than {$max}";
		}


		if(strpos($user_email, '@') == false) {

			$errors[] = "Please enter a valid email address";
		}	


		if($password !== $confirm_password) {

			$errors[] = "Your password fields do not match";
		}

		if(admin_username_exist($username)) {

			$errors[] = "Please you cannot use this username, it already exists";
		}

		if(admin_email_exist($user_email)) {

			$errors[] = "Please this email is already registered, if this is you please signin";
		}


		if(!empty($errors)) {

			foreach ($errors as $error) {

				validation_errors_display($error);
			}

		}else{

			$table = "admin";

			$register['id']                         = substr(number_format(time() * rand(),0,'',''),0,9);
			$register['username']                   = escape($username);
			$register['user_email']                 = escape($user_email);
			
			$password                               = escape($password);
			$password                               = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
			$register['password']                   = $password;
			
			$register['user_role']                  = "Admin";		


			create($table, $register);

			success_display("This admin has been successfully created!!!");

		}
	}
}else{
	
	redirect("index.php?source=users");
}


?>



<div class="container"><!--container start-->
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">


<div class="panel">

<?php
	
display_message();
	
?>

<form action="index.php?source=add_user" method="post">

<fieldset>


<div class="form-group">

<label class="control-label" for="username">Username</label> 


<input id="username" name="username" placeholder="Enter username" class="form-control input-md" type="text">


</div>


<div class="form-group">

<label class="control-label" for="user_email">Email</label> 


<input id="user_email" name="user_email" placeholder="Enter user email" class="form-control input-md" type="text">


</div>


<!-- Text input-->
<div class="form-group">

<label class="control-label" for="password">Password</label>


<input id="password" name="password" placeholder="Enter user password" class="form-control input-md" type="password">


</div>


<div class="form-group">

<label class="control-label" for="confirm_password">Confirm Password</label>


<input id="confirm_password" name="confirm_password" placeholder="Conform user password" class="form-control input-md" type="password">


</div>


<div class="form-group pull-right">

<input  type="submit" class="btn btn-primary" value="Add User" name="add_user">

</div>


</fieldset>
		
</form>

</div>


</div><!--container closed-->
</div>
</div>