<?php

include_once ("admin/config/init.php");

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit_feedback'])){
	
	$email                             =  escape(clean(trim($_POST['email'])));
	$subject                           =  escape(clean(trim($_POST['subject'])));
	$feedback                          =  escape(clean(trim($_POST['feedback'])));
	
	foreach($_POST as $key => $value){

		if(empty($key) || empty($value)){

				$errors[] = "Sorry every field must be filled";
			}

			break;
		}


		if(!empty($errors)) {

			foreach ($errors as $error) {

				validation_errors_display($error);
			}

		}else{
	
			$feedback_column['feedback_id']    =  uniqid();
			$feedback_column['email']          =  $email;
			$feedback_column['subject']        =  ucwords(strtolower($subject));
			$feedback_column['feedback']       =  $feedback;
			$feedback_column['date']           =  date("Y-m-d");
			$feedback_column['time']           =  date("h:i:sa");

			create($table = "feedback", $feedback_column);

			success_display("Thank you, your feedback has been submitted!!!");

			redirect("feedback.php");
			
		}
}


?>