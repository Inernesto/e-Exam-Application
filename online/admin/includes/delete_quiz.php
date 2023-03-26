<?php

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete_quiz'])){

	$question_array['exam_id']  = escape(clean(trim($_POST['exam_id'])));
	
	$result_1 = read($table = "question", $question_array);
	
	while($row = fetch_array($result_1)){
		
		$options_array['question_id']  = $row['id'];
		
		delete($table = "options", $options_array);
		delete($table = "answer", $options_array);
		
	}
	
	delete($table = "question", $question_array);
	
	$exam_title   = get_exam_title($question_array['exam_id']);
	
	delete($table = "history", $question_array);
		
	delete($table = "exam", $question_array);
	
	success_display("The Quiz with the title {$exam_title} has been successfully deleted!!!");
	
	redirect("index.php");
	
}else{
	
	redirect("index.php");
}


?>