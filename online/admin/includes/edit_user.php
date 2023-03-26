<?php

if(isset($_POST['edit_user'])){
	
$_SESSION['edit_username'] = $_POST['username'];
	
}
   
 if(isset($_SESSION['edit_username'])){

$username_array['username'] = escape(clean(trim($_SESSION['edit_username'])));

if(isset($_POST['submit'])){
	
	$first_name            =  clean(ucwords(strtolower($_POST['first_name'])));
	$last_name             =  clean(ucwords(strtolower($_POST['last_name'])));
	$sex                   =  clean(ucwords(strtolower($_POST['sex'])));
	$password              =  clean($_POST['password']);
	
	$column['first_name']        =  escape($first_name);
	$column['last_name']         =  escape($last_name);
	$column['sex']               =  escape($sex);
	
	$password                    =  escape($password);
	$password                    =  password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
	$column['password']          =  $password;
	
	$column['user_updated_at']   =  date("Y-m-d");
	
	update($table = "users", $username_array, $column);
	
	success_display("User profile has been updated successfully");
}



$result = read($table = "users", $username_array);

while($row = fetch_array($result)){
	
	$first_name        = $row['first_name'];
	$last_name         = $row['last_name'];
	$sex               = $row['sex'];
	$username          = $row['username'];
	$user_email        = $row['user_email'];
	$hashed_password   = $row['password'];
	
}
	
}else{
	
	redirect("index.php?source=users");
}

?>

<div class="container"><!--container start-->
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">

<div class="bg1">

	<div class="row">

		<div class="panel">
			
			<?php display_message(); ?>

			<div style="font-size:14px">

				<br>
				<br>

				<form role="form"  method="post" action="">

					<div class="row">
						
						<label class="col-xs-12 col-sm-3 col-md-3 control-label" for="username">Username:</label>
						<div class="col-xs-12 col-sm-9 col-md-9 form-group">

							<input id="username" name="username" class="form-control input-md" type="text" value="<?php echo $username; ?>" disabled>

						</div>

						<br>

						<label class="col-xs-12 col-sm-3 col-md-3 control-label" for="first_name">First Name:</label>
						<div class="form-group">

							<input id="first_name" name="first_name" class="form-control input-md" type="text" value="<?php echo $first_name; ?>">

						</div>

						<br>

						<label class="col-xs-12 col-sm-3 col-md-3 control-label" for="last_name">Last Name:</label>
						 <div class="form-group">

							<input id="last_name" name="last_name" class="form-control input-md" type="text" value="<?php echo $last_name; ?>">

						</div>

						<br>

						<label class="col-xs-12 col-sm-3 col-md-3 control-label" for="sex">Sex:</label>
						<div class="form-group">

							<select name="sex" id="sex" class="form-control">
								<option value="Male" <?php echo ($sex == "Male")   ? 'selected' : ''; ?>>Male</option>
								<option value="Male" <?php echo ($sex == "Female") ? 'selected' : ''; ?>>Female</option>
							</select>

						</div>

						<br>

						<label class="col-xs-12 col-sm-3 col-md-3 control-label" for="user_email">Email Address:</label>
						<div class="form-group">
							<input id="email" name="user_email" class="form-control input-md" type="email" value="<?php echo $user_email; ?>" disabled>

						</div>

						<br>

						<label class="col-xs-12 col-sm-3 col-md-3 control-label" for="password">Password:</label>
						<div class="form-group">

							<input id="password" name="password" class="form-control input-md" type="password" value="<?php echo (!empty($password)) ? $password : $hashed_password; ?>">

						</div>

						<br> 								     

					</div><!--End of row-->


				    <div class="row" style="padding-right:25px;">
						<div class="pull-right">
							<input type="submit" name="submit" value="Update User" class="btn btn-primary">
						</div>
					</div>

				</form>

			</div>

		</div>

	</div>
	
</div>

</div>
</div>
</div><!--container stop-->
