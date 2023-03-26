<?php

include ("admin/config/init.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
	
	if(isset($_POST['admin'])){
	
		$email        =  escape(clean($_POST['email']));
		$password     =  escape(clean($_POST['password']));
		
		
		if(empty($email) || empty($password)) {

			$errors[] = "Sorry every field must be filled";
		}
		
		
		if(!empty($errors)) {

			foreach ($errors as $error) {

				validation_errors_display($error);
			}

			redirect("index.php");
			
		}else{
		
		
			$table                     = "admin";
			$user_email['user_email']  = $email;
			

			if(admin_email_exist($email) && password_verify($password, get_user_password($table, $user_email)) && is_admin($table, $user_email)){

				$_SESSION['username'] = get_username($table, $user_email);

				redirect("admin/index.php");
			}else{
				
				redirect("index.php");
			}
			
		}
		
	}
	
}else{
	
	redirect("index.php");
}
?>