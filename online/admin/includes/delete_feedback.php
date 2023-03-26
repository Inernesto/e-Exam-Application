<?php

if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['feedback_id'])){
	
	$feedback_array['feedback_id']    =  escape(clean(trim($_GET["feedback_id"])));
	
	delete($table = "feedback", $feedback_array);
	
	success_display("The feedback with id {$feedback_array['feedback_id']} has been deleted");
	
	redirect("index.php?source=feedback");
}else{
	
	redirect("index.php?source=feedback");
}


?>