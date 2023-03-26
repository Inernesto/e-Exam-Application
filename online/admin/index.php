<?php include_once ("includes/header.php"); ?>

<!-- admin start-->

<!--navigation menu-->
<?php include_once ("includes/navigation.php"); ?>

<!--navigation menu closed-->





<?php

$users_array['username'] = escape(clean(trim($_SESSION['username'])));

if( (isset($_SESSION['username'])) && (get_user_role($table = "admin", $users_array)  == "Admin") ){
	

	
if(isset($_GET['source'])){
	
	$source = clean($_GET['source']);
}else{
	
	$source = "";
}
	
	switch($source){
			
		case "users";
			include_once ("includes/users.php");
		break;
		
		case "add_user";
			include_once ("includes/add_user.php");
		break;
		
		case "edit_user";
			include_once ("includes/edit_user.php");
		break;
		
		case "edit_admin_user";
			include_once ("includes/edit_admin_user.php");
		break;
		
		case "delete_user";
			include_once ("includes/delete_user.php");
		break;
		
		case "delete_admin_user";
			include_once ("includes/delete_admin_user.php");
		break;	
			
		case "rank";
			include_once ("includes/rank.php");
		break;
			
		case "show_rank";
			include_once ("includes/show_rank.php");
		break;
			
		case "feedback";
			include_once ("includes/feedback.php");
		break;
			
		case "show_feedback";
			include_once ("includes/show_feedback.php");
		break;
		
		case "delete_feedback";
			include_once ("includes/delete_feedback.php");
		break;
		
		case "add_quiz";
			include_once ("includes/add_quiz.php");
		break;
			
		case "add_quiz_step_2";
			include_once ("includes/add_quiz_step_2.php");
		break;		
		
		case "edit_quiz";
			include_once ("includes/edit_quiz.php");
		break;		
		
		case "edit_quiz_step_2";
			include_once ("includes/edit_quiz_step_2.php");
		break;
		
		case "delete_quiz";
			include_once ("includes/delete_quiz.php");
		break;
	
			
		default:
			include_once ("includes/exam.php");
		break;
	}
	
	
}else{
	
		redirect("../logout.php");
}
	
	
?>


<?php include_once ("includes/footer.php"); ?>