<?php

if(isset($_POST['edit_admin_user'])){
	
	$_SESSION['edit_username'] = $_POST['username'];
	
}


   
 if(isset($_SESSION['edit_username'])){
	
	$username_array['username'] = escape(clean(trim($_SESSION['edit_username'])));
	 
	$_SESSION['edit_username'] = $_POST['username'];
	 
	if(isset($_POST['submit'])){
	
		$username_array['username'] = escape(clean(trim($_SESSION['edit_username'])));
		
		$column['username']        =  escape(clean($_POST['username']));
		$column['user_email']      =  escape(clean($_POST['user_email']));

		$password                  =  escape(clean($_POST['password']));
		$password_hash             =  password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
		$column['password']        =  $password_hash;

		update($table = "admin", $username_array, $column);

		success_display("Admin profile has been updated successfully");
		
	}
	 
	 
	$result = read($table = "admin", $username_array);

	while($row = fetch_array($result)){

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
						
						<label for="username" class="col-xs-12 col-sm-3 col-md-3 control-label">Username:</label>
						<div class="col-xs-12 col-sm-9 col-md-9 form-group">

							<input id="username" name="username" class="form-control input-md" type="text" value="<?php echo $username; ?>">

						</div>

						<br>

						<label for="user_email" class="col-xs-12 col-sm-3 col-md-3 control-label">Email Address:</label>
						<div class="form-group">

							<input id="email" name="user_email" class="form-control input-md" type="email" value="<?php echo $user_email; ?>">

						</div>

						<br>

						<label for="password" class="col-xs-12 col-sm-3 col-md-3 control-label">Password:</label>
						<div class="form-group">

							<input id="password" name="password" class="form-control input-md" type="password" value="<?php echo (!empty($password)) ? $password : $hashed_password; ?>">

						</div>

						<br> 								      

					</div><!--End of row-->


				    <div class="row" style="padding-right:25px;">
						<div class="pull-right">
							<input type="submit" name="submit" value="Update Admin" class="btn btn-primary">
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