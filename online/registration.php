<?php
# Include the Autoloader (see "Libraries" for install instructions)

require 'vendor/autoload.php';

use Mailgun\Mailgun;

/*****end of mail gun*************/


include_once ("admin/config/init.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
	
		if(isset($_POST['submit'])){

			$min = 3;
			$max = 10;

			$first_name           = clean(ucwords(strtolower($_POST['first_name'])));
			$last_name            = clean(ucwords(strtolower($_POST['last_name'])));
			$sex                  = clean($_POST['sex']);
			$username             = clean(ucwords(strtolower($_POST['username'])));
			$user_email           = clean($_POST['user_email']);
			$password             = clean($_POST['password']);
			$confirm_password     = clean($_POST['confirm_password']);


			if(empty($first_name) || empty($last_name) || empty($sex) || empty($username) || empty($user_email) || empty($password) || empty($confirm_password)) {

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

			if(username_exist($username)) {

				$errors[] = "Please you cannot use this username, it already exists";
			}

			if(email_exist($user_email)) {

				$errors[] = "Please this email is already registered, if this is you please signin";
			}


			if(!empty($errors)) {

				foreach ($errors as $error) {

					validation_errors_display($error);
				}

				redirect("index.php");
			}else{

					$table = "users";

		//			$register['id']                         = uniqid(time());
					$register['id']                         = substr(number_format(time() * rand(),0,'',''),0,9);
					$register['first_name']                 = escape($first_name);
					$register['last_name']                  = escape($last_name);
					$register['sex']                        = escape($sex);
					$register['username']                   = escape($username);
					$register['user_email']                 = escape($user_email);
				
					$password                               = escape($password);
				    $password                               = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
					$register['password']                   = $password;
				
					$register['email_validation_code']      = md5(uniqid(time()));

					$register['user_role']                  = "Subscriber";
					$register['user_created_at']            = date("Y-m-d");
					$register['user_updated_at']            = date("Y-m-d");


					$message = "<p>Please click here to confirm your email 
					<a href='" . REGISTRATION_URL . "?email={$register['user_email']}&validation_code={$register['email_validation_code']}'>
					". REGISTRATION_URL ."?email={$register['user_email']}&validation_code={$register['email_validation_code']}</a></p>";		


					if(mailgun_api($message, $register['user_email'], $register['username'])){

						create($table, $register);

						success_display("Please check the email address you registered for an activation link and click it, if you don't see it in your inbox please check your spam folder");

						redirect("index.php");
					}
				}
		}
}
	
else if($_SERVER['REQUEST_METHOD'] == "GET") {
	
		if(isset($_GET['email']) && isset($_GET['validation_code'])){

			$user_email      = escape(clean($_GET['email']));
			$validation_code = escape(clean($_GET['validation_code']));
			$url             = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

			if(is_url($url) && is_email($user_email) && is_validation_code($validation_code) && email_exist($user_email)){

				$table                        = "users";

				$user_email_array['user_email']     = $user_email;
				$user_id['id']                      = get_user_id($table, $user_email_array);

				$column['user_updated_at']          = date("Y-m-d");
				$column['email_verified_at']        = date("Y-m-d");
				$column['email_validation_code']    = "verified";
				$column['email_verification']       = 1;

				update($table, $user_id, $column);

				success_display("Your have been registered successfully, please you can now Sign in");

				redirect("index.php");
			}
		}
	
}else{
	
	redirect("index.php");
}



?>


