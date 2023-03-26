<?php

include_once ("../../admin/config/init.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
	
	if(isset($_POST['quiz_start'])){
		
	    $_SESSION['exam_id'] = escape(clean($_POST['exam_id']));
		
		$_SESSION['start_quiz'] = true;
		
		$_SESSION['score']  = 0;
		
		$_SESSION['time']   = time() + (get_exam_time() * 60);
		
		set_exam_page_number();
		
		redirect("../index.php?source=quiz");
		
	}
	
	
	
	if(isset($_POST['submit'])){
		
		if(is_exam_start() && is_exam_id()){
			
			if(is_exam_page_number_set()){
				
				foreach($_POST as $key => $value){

					$_SESSION[$key] = $value;
				}
				
				if($_POST['submit'] == "previous"){
					
					set_exam_previous_page();
					
					redirect("../index.php?source=quiz");
				}
				
				if($_POST['submit'] == "next"){

					set_exam_next_page();
					
					redirect("../index.php?source=quiz");
				}
				
				if($_POST['submit'] == "finish"){

					exam_finish();
					
					redirect("../index.php?source=result");
				}
				
			}else{
				
				redirect("../index.php?source=quiz");
			}
			
		}else{
			
			redirect("../index.php?source=quiz");
		}
		
	}else{
		
		redirect("../index.php?source=quiz");
	}
	
	
}else{
	
	redirect("../index.php");
}


?>