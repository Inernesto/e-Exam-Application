
<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
	
	if(isset($_POST['edit_quiz'])){

		$exam_id  = escape(clean($_POST['exam_id']));

		$exam_array['exam_id'] = $exam_id;

		$result = read($table = "exam", $exam_array);

		while($row = fetch_array($result)){

			$exam_id           =  $row['exam_id'];
			$question_total    =  $row['question_total'];
			$right_score_ans   =  $row['right_score_ans'];
			$wrong_score_ans   =  $row['wrong_score_ans'];
			$instructions      =  $row['instructions'];
			$title             =  $row['title'];
			$time              =  $row['time'];
			$tag               =  $row['tag'];
		}

			$_SESSION['exam_id']        = $exam_id;
			$_SESSION['question_total'] = $question_total;

	}


	if(isset($_POST['submit'])){
		

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



			$column['exam_id']         =  escape(clean(trim($_SESSION['exam_id'])));
			$column['title']           =  escape(clean($_POST['title']));
			$column['question_total']  =  escape(clean($_POST['question_total']));
			$column['right_score_ans'] =  escape(clean($_POST['right_score_ans']));
			$column['wrong_score_ans'] =  escape(clean($_POST['wrong_score_ans']));
			$column['time']            =  escape(clean($_POST['time']));
			$column['tag']             =  escape(clean(trim($_POST['tag'])));
			$column['instructions']    =  escape(clean($_POST['instructions']));
			$column['date']            =  date("Y-m-d");

			$exam_array['exam_id']     = escape(clean(trim($_SESSION['exam_id'])));

			if(update($table = "exam", $exam_array, $column)){

				$_SESSION['exam_id']             = escape(clean(trim($_SESSION['exam_id'])));
				$_SESSION['question_total']      = escape(clean(trim($_SESSION['question_total'])));

				$_SESSION['edit_question_total'] = escape(clean($_POST['question_total']));

				redirect("index.php?source=edit_quiz_step_2");

			}else{

				redirect("index.php");
			}

		}
			
	}else{

		redirect("index.php");
}
	

?>

<div class="container"><!--container start-->
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">



<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Quiz Details</b></span>

<br>
<br>

 <div class="col-xs-3 col-sm-3 col-md-3">
 
 </div>
 
 <div class="col-xs-6 col-sm-6 col-md-6"> 
 
<?php

display_message();
	
?>
 
 <form class="" name="form" action=""  method="POST">
<fieldset>

<!-- Text input-->
<label class="col-xs-12 col-sm-12 col-md-12" for="title">Enter Exam title</label>  
<div class="col-xs-12 col-sm-12 col-md-12 form-group">
  <input id="title" name="title" placeholder="Enter Exam title" class="form-control input-md" type="text" value="<?php echo $title; ?>">
</div>



<!-- Text input-->
<label class="col-xs-12 col-sm-12 col-md-12" for="question_total">Enter total number of questions</label>  
<div class="col-xs-12 col-sm-12 col-md-12 form-group">
  <input id="question_total" name="question_total" placeholder="Enter total number of questions" class="form-control input-md" type="number" value="<?php echo $question_total; ?>">
</div>

<!-- Text input-->
<label class="col-xs-12 col-sm-12 col-md-12" for="right_score_ans">Enter marks on right answer</label>  
<div class="col-xs-12 col-sm-12 col-md-12 form-group">
  <input id="right_score_ans" name="right_score_ans" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number" value="<?php echo $right_score_ans; ?>">
</div>

<!-- Text input-->
  <label class="col-xs-12 col-sm-12 col-md-12" for="wrong_score_ans">Enter marks on wrong answer without sign</label>  
  <div class="col-xs-12 col-sm-12 col-md-12 form-group">
  <input id="wrong_score_ans" name="wrong_score_ans" placeholder="Enter marks on wrong answer without sign" class="form-control input-md" min="0" type="number" value="<?php echo $wrong_score_ans; ?>">
</div>

<!-- Text input-->
  <label class="col-xs-12 col-sm-12 col-md-12" for="time">Enter time limit for test in minute</label>  
  <div class="col-xs-12 col-sm-12 col-md-12 form-group">
  <input id="time" name="time" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number" value="<?php echo $time; ?>">
</div>

<!-- Text input-->
 <label class="col-xs-12 col-sm-12 col-md-12" for="tag">Enter #tag which is used for searching</label>  
 <div class="col-xs-12 col-sm-12 col-md-12 form-group">
  <input id="tag" name="tag" placeholder="Enter #tag which is used for searching" class="form-control input-md" type="text" value="<?php echo $tag; ?>">
</div>


<!-- Text input-->
 <label class="col-xs-12 col-sm-12 col-md-12" for="instructions">Write Exam instructions here...</label>  
 <div class="col-xs-12 col-sm-12 col-md-12 form-group">
  <textarea id="instructions" rows="8" cols="8" name="instructions" class="form-control" placeholder="Write Exam instructions here..."><?php echo str_replace('\r\n', '</br>', $instructions); ?>	
  </textarea>  
</div>

 
 <div class="col-xs-12 col-sm-12 col-md-12 form-group"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Edit Quiz" class="btn btn-primary" name="submit">
</div>

</fieldset>
</form>
</div>

<div class="col-xs-3 col-sm-3 col-md-3">

</div>

</div><!--container closed-->
</div>
</div>
