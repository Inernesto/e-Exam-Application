<?php
# Include the Autoloader (see "Libraries" for install instructions)

require 'vendor/autoload.php';

use Mailgun\Mailgun;

/*****end of mail gun*************/

include ("admin/config/init.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
	
	if(isset($_POST['login'])){
	
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
		
		
			$table                     = "users";
			$user_email['user_email']  = $email;

			if(email_exist($email) && password_verify($password, get_user_password($table, $user_email)) && is_verified($email)){

				$_SESSION['username'] = get_username($table, $user_email);

				redirect("exam/index.php");
			}else{
				
				validation_errors_display("Invalid email address or password");
				
				redirect("index.php");
			}
		}
	}
	
	
	
	if(isset($_POST['forgot_password'])){
		
		$email       =  escape(clean($_POST['email']));
		
		if(empty($email)) {

			$errors[] = "Sorry every field must be filled";
		}
		
		
		if(!empty($errors)) {

			foreach ($errors as $error) {

				validation_errors_display($error);
			}

			redirect("forgot.php");
		}else{
		
		
			$table                    =  "users";
			$user_email['user_email'] =  $email;

			if(email_exist($email)){

				$username = get_username($table, $user_email);

				$validation_code = md5(uniqid(time()));


				$message = "<p>Please click here to confirm your email <a href='" . RECOVER_URL . "?email={$user_email['user_email']}&validation_code={$validation_code}'>". RECOVER_URL . "?email={$user_email['user_email']}&validation_code={$validation_code}</a></p>";


				if(mailgun_api($message, $user_email['user_email'], $username)){

					$id['id']                          = get_user_id($table, $user_email);
					$column['email_validation_code']   = $validation_code;

					update($table, $id, $column);

					success_display("Please check your email address for a reset link, if you don't see it in your inbox please check your spam folder");

					redirect("forgot.php");
				}
			}
		}
	}

	
	
	if(isset($_POST['recover_password'])){
	
		$email             =  escape(clean($_POST['email']));
		$password          =  escape(clean($_POST['password']));
		$confirm_password  =  escape(clean($_POST['confirm_password']));
		$validation_code   =  escape(clean($_POST['validation_code']));
		
		if(empty($email) && empty($password) && empty($confirm_password) && empty($validation_code)) {

			$errors[] = "Sorry every field must be filled";
		}
		
		if($password !== $confirm_password) {
			
			$errors[] = "Your password fields do not match";
		}
		
		if(!empty($errors)) {

			foreach ($errors as $error) {

				validation_errors_display($error);
			}

			redirect("recover.php?email={$email}&validation_code={$validation_code}");
		}else{
		
			$table                          = "users";
			
			$password                       = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
			$user['password']               = $password;
			
			$user['email_validation_code']  = "verified";
			$user['user_updated_at']        = date("Y-m-d");
			
			$user_email['user_email']  = $email;
				
			$id['id']                       = get_user_id($table, $user_email);

			if(email_exist($email) && is_validation_code($validation_code)){

				update($table, $id, $user);
					
				success_display("Your password has been re-set successfully, please you can now Sign in");

				redirect("index.php");
			}
		}
	}
	
}else{
	
	redirect("index.php");
}


?>