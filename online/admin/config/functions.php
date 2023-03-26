<?php

# Include the Autoloader (see "Libraries" for install instructions)

//require 'vendor/autoload.php';

use Mailgun\Mailgun;

/*****end of mail gun*************/


/*** Helper Functions *******/

function clean($string){
	
	return htmlentities(trim($string));
} // 


function redirect($location){
	
	return header("Location: {$location}");
}


function is_url($url){
	
	return filter_var($url, FILTER_VALIDATE_URL);
}


function subtract_string_before($string, $pointer){
	
	$str_len = strlen($string);
	
	$str_pos = strpos($string, $pointer);
	
	$start = 0;
	
	$stop = $str_pos;
	
	return substr($string, $start, $stop);
}

	
function subtract_string_after($string, $pointer){
	
	$str_len = strlen($string);
	
	$str_pos = strpos($string, $pointer);
	
	$start = $str_pos + 1;
	
	$stop = $str_len - $str_pos;
	
	return substr($string, $start, $stop);
}


function is_email($email){
	
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}


function is_validation_code($validation_code){
	
	$result = specific_query("SELECT * FROM users WHERE email_validation_code = '{$validation_code}' ");
	
	if(row_count($result) == 1){
		
		return true;
	}
	
	return false;
}


function is_verified($email){

	$result = specific_query("SELECT * FROM users WHERE user_email = '{$email}' AND email_verification = 1 ");
	
	if(row_count($result) == 1){
		
		return true;
	}
	
	return false;		
}


function url_exist($url, $actual_url){
	
	if($url == $actual_url){
		
		return true;
	}else{
		
		return false;
	}
}


function admin_email_exist($email){	
	
	$result = specific_query("SELECT * FROM admin WHERE user_email = '{$email}'");
	
	if(row_count($result) == 1){
		
		return true;
	}
	
	return false;
}


function admin_username_exist($username){
	
	$result = specific_query("SELECT * FROM admin WHERE username = '{$username}' ");
	
	if(row_count($result) == 1){
		
		return true;
	}
	
	return false;
}



function email_exist($email){
	
	$result = specific_query("SELECT * FROM users WHERE user_email = '{$email}'");
	
	if(row_count($result) == 1){
		
		return true;
	}
	
	return false;
}


function username_exist($username){
	
	$result = specific_query("SELECT * FROM users WHERE username = '{$username}' ");
	
	if(row_count($result) == 1){
		
		return true;
	}
	
	return false;
}


function is_admin($table, $email){

	if(get_user_role($table, $email) === "Admin"){
		
		return true;
	}
	
	return false;
}


function is_examiner($table, $email){
	
	if(get_user_role($table, $email) === "Examiner"){
		
		return true;
	}
	
	return false;
}


function get_user_role(){
	
	$result = specific_query("SELECT * FROM " . func_get_arg(0) . " WHERE " . implode(" ", array_keys(func_get_arg(1)))  . " = '" . implode(" ", array_values(func_get_arg(1))) . "'");
	
	confirm($result);
	
	$row = fetch_array($result);
	
	return $row['user_role'];
}


function get_user_password(){
	
	$result = specific_query("SELECT * FROM " . func_get_arg(0) . " WHERE " . implode(" ", array_keys(func_get_arg(1)))  . " = '" . implode(" ", array_values(func_get_arg(1))) . "'");
	
	confirm($result);
	
	$row = fetch_array($result);
	
	return $row['password'];
}


function get_user_email(){
	
	$result = specific_query("SELECT * FROM " . func_get_arg(0) . " WHERE " . implode(" ", array_keys(func_get_arg(1)))  . " = '" . implode(" ", array_values(func_get_arg(1))) . "'");
	
	confirm($result);
	
	$row = fetch_array($result);
	
	return $row['user_email'];
}


function get_user_id(){
		
	$result = specific_query("SELECT * FROM " . func_get_arg(0) . " WHERE " . implode(" ", array_keys(func_get_arg(1)))  . " = '" . implode(" ", array_values(func_get_arg(1))) . "'");
	
	confirm($result);
	
	$row = fetch_array($result);
	
	return $row['id'];
	
}


function get_username(){
	
	$result = specific_query("SELECT * FROM " . func_get_arg(0) . " WHERE " . implode(" ", array_keys(func_get_arg(1)))  . " = '" . implode(" ", array_values(func_get_arg(1))) . "'");
	
	confirm($result);
	
	$row = fetch_array($result);
	
	return $row['username'];
}


function get_validation_code(){
		
	$result = specific_query("SELECT * FROM " . func_get_arg(0) . " WHERE " . implode(" ", array_keys(func_get_arg(1)))  . " = '" . implode(" ", array_values(func_get_arg(1))) . "'");
	
	confirm($result);
	
	$row = fetch_array($result);
	
	return $row['email_validation_code'];
}


function set_message($message){
	
	if(!empty($message)){
		
		$_SESSION['message'] = [];
		
		$_SESSION['message'][] = $message;
	}else{
		
		$message = "";
	}
}


function display_message(){
	
	if(isset($_SESSION['message'])){
		
		foreach($_SESSION['message'] as $message){
			
			echo $message;
		}
		
		unset($_SESSION['message']);
	}
}


function validation_errors_display($error){
	
$error_message = "<div class='alert alert-warning alert-dismissible' role='alert'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					<strong>Warning!</strong> {$error}
				</div>";

set_message($error_message);
	
}


function success_display($success){
	
$success_message = "<div class='alert alert-success alert-dismissible' role='alert'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					<strong>Successful!</strong> {$success}
				</div>";

set_message($success_message);	
	
}


function mailgun_api($message, $receipient_email, $receipient_name) {

$api_key = "4ee27f990c6516218d6fa9a208b3a6e5-4879ff27-409a8662";
	
# Instantiate the client.

$mgClient = Mailgun::create('4ee27f990c6516218d6fa9a208b3a6e5-4879ff27-409a8662', 'https://api.mailgun.net');
	
$domain = "sandboxfc9eea5d53ec48dabc35e166a2f91d15.mailgun.org";
# Make the call to the client.
$params = array(
	'from'	=> 'Ernest Inyama <ernest.inyama@gmail.com>',
	'to'	=> $receipient_name . " <" . $receipient_email . ">",
	'subject' => 'Email Confirmation Code',
	'html'	=> "<html>{$message}</html>"
);
	
return $result = $mgClient->messages()->send($domain, $params);
	
}


/****** This are exam helper functions ***********/

function get_exam_question_per_page(){
	
	return $per_page = 5;
}

function get_exam_query_limit(){
	
	return ((get_current_exam_page() - 1) * 5);
}



function is_exam_id(){
	
	return (array_key_exists('exam_id', $_SESSION) && isset($_SESSION['exam_id'])) ? true : false;
}


function is_exam_start(){
	
	return (array_key_exists('start_quiz', $_SESSION) && $_SESSION['start_quiz'] == true) ? true : false;
}


function get_session_exam_id(){
	
	if(array_key_exists('exam_id', $_SESSION)){
		
		return escape(trim($_SESSION['exam_id']));
	}
}


function get_session_question_id($session_key){
	
	if(array_key_exists($session_key, $_SESSION)){
		
		$the_array = explode("/", $_SESSION[$session_key]);
		
		return escape(trim($the_array[0]));
	}
	
}


function get_session_option_id($session_key){
	
	if(array_key_exists($session_key, $_SESSION)){
		
		$the_array = explode("/", $_SESSION[$session_key]);
		
		return escape(trim($the_array[2]));
	}
	
}


function get_session_question_number($session_key){
	
	if(array_key_exists($session_key, $_SESSION)){
		
		$the_array = explode("/", $_SESSION[$session_key]);
		
		return escape(trim($the_array[1]));
	}
	
}


function get_exam_title($exam_id){
	
	$exam_id_array['exam_id'] = escape(clean($exam_id));
	
	$result = read($table = "exam", $exam_id_array);
	
	while($row = fetch_array($result)){
		
		return $exam_title = $row['title'];
	}
}


function get_question_id($exam_id, $sn){
	
	$exam_id = escape(clean($exam_id));
	$sn      = escape(clean($sn));
	
	$result = specific_query("SELECT * FROM question WHERE exam_id = '{$exam_id}' AND sn = {$sn}");
	
	while($row = fetch_array($result)){
		
		return $question_id = $row['id'];
	}
}


function get_options_id($question_id, $option){
	
	$question_id_array['question_id'] = escape(clean($question_id));
	
	$result = specific_query("SELECT * FROM options WHERE question_id = '{$question_id}' AND option = '" . trim($option) . "'");
	
	while($row = fetch_array($result)){
		
		return $options_id = $row['id'];
	}
}


function get_answer_id($question_id){
	
	$question_id_array['question_id'] = escape(clean($question_id));
	
	$result = read($table = "answer", $question_id_array);
	
	while($row = fetch_array($result)){
		
		return $answer_id = $row['id'];
	}
}


function exam_overall_score($exam_id){
	
	$exam_id_array['exam_id'] = escape(clean($exam_id));
	
	$result = read($table = "exam", $exam_id_array);
	
	while($row = fetch_array($result)){
		
		return escape(trim($row['question_total'] * $row['right_score_ans']));
	}
}


function get_right_ans_score($exam_id){
	
	$exam_id_array['exam_id'] = escape(clean($exam_id));
	
	$result = read($table = "exam", $exam_id_array);
	
	while($row = fetch_array($result)){
		
		return $right_score_ans = $row['right_score_ans'];
	}
}


function get_wrong_ans_score($exam_id){
	
	$exam_id_array['exam_id'] = escape(clean($exam_id));
	
	$result = read($table = "exam", $exam_id_array);
	
	while($row = fetch_array($result)){
		
		return $row['wrong_score_ans'];
	}
}


function get_total_question_number($exam_id){
	
	$exam_id = escape(trim($exam_id));
	
	$result = specific_query("SELECT * FROM question where exam_id = '{$exam_id}'");
	
	return row_count($result);
}


function get_exam_total_page_number(){
	
	return $value = ceil(get_total_question_number($_SESSION['exam_id']) / 5);
}


function set_exam_page_number(){
	
	$_SESSION['exam_page_number'] = 1;
}


function get_current_exam_page(){
	
	 if(isset($_SESSION['exam_page_number'])){
		 
		 return $_SESSION['exam_page_number'];
	 }
}

function get_exam_score(){
	
	return (trim($_SESSION['score']) * get_right_ans_score(trim($_SESSION['exam_id'])));
}


function get_exam_time(){
	
	$exam_array['exam_id'] = escape(clean(trim($_SESSION['exam_id'])));
	
	$result = read($table = "exam", $exam_array);
	
	while($row = fetch_array($result)){
		
		$exam_time = $row['time'];
	}
	
	return $exam_time;
}


function get_answered_qestion(){
	
	$count = 0;
	
	foreach($_SESSION as $key => $value){
		
		if((substr($key, 0, 9) == "question_") && (!empty($value))){
			
			$count++;
		} 
	}
	
	return $count;
}


function get_time_remaining(){
	
	return abs(round(($_SESSION['time'] - time()) / 60, 2));
}


function set_exam_next_page(){
	
	if(get_current_exam_page() < get_exam_total_page_number()){
		
		$_SESSION['exam_page_number'] += 1;
	}
}


function set_exam_previous_page(){
	
	if(get_current_exam_page() > 0){
		
		$_SESSION['exam_page_number'] -= 1;
	}
}


function is_exam_page_number_set(){
	
	return (isset($_SESSION['exam_page_number'])) ? true : false;
}


function is_exam_next_page(){
	
	return (get_current_exam_page() < get_exam_total_page_number()) ? true : false;
}


function is_exam_previous_page(){
	
	return (get_current_exam_page() > 1) ? true : false;
}


function is_exam_next_previous_page(){
	
	return (is_exam_next_page() && is_exam_previous_page()) ? true : false;
}


function is_exam_previous_finish_page(){
	
	return ((get_current_exam_page() == get_exam_total_page_number()) && is_exam_previous_page()) ? true : false;
}


function is_exam_finish_page(){
	
	return ((get_current_exam_page() == get_exam_total_page_number()) && !is_exam_next_previous_page()) ? true : false;
}


function unset_exam_session_values(){
	
	foreach($_SESSION as $key => $value){
	
		if($key != "username"){
			
			unset($_SESSION[$key]);
		}
	}
}


function is_exam_taken($exam_id, $email){
	
	$exam_id = escape(trim($exam_id));
	
	$email   = escape(trim($email));
	
	$result  = specific_query("SELECT * FROM history WHERE exam_id = '{$exam_id}' AND email = '{$email}' ");
	
	return (row_count($result) == 1) ? true : false;
}


function exam_finish(){
	
	foreach($_SESSION as $key => $value){

		if(substr($key, 0, 8) == "question"){

			$question_id = get_question_id($key);
			$option_id   = get_option_id($key);

			$result = specific_query("SELECT * FROM answer WHERE question_id = '{$question_id}' AND id = '{$option_id}'");

			if(row_count($result) == 1){

				$_SESSION['score']++;

			}

		}
	}
	
	$user['username'] = $_SESSION['username'];
	
	$table             = "history";
	$column['email']   = escape(trim(get_user_email($users_table = "users", $user)));
	$column['exam_id'] = escape(trim(get_session_exam_id()));
	$column['score']   = escape(trim(get_exam_score()));
	
	if(is_exam_taken($column['exam_id'], $column['email'])){
		
		$update_array['exam_id'] = escape(trim(get_session_exam_id()));
		
		if(update($table, $update_array, $column)){
			
			success_display("You have successfully completed this Quiz. You can view your score below!");
			
		}else{
			
			redirect("../index.php?source=quiz");
		}
	}else{
		
		if(create($table, $column)){
			
			success_display("You have successfully completed this Quiz. You can view your score below!");
				
		}else{
			
			redirect("../index.php?source=quiz");
		}	
	}
	
	
	foreach($_SESSION as $key){

		if($key !== "username"){

		unset($key);

		}

	}
	
	
}
?>