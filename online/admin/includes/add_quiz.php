
<?php

if(isset($_POST['quiz'])){
	
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
	
		$column['exam_id']         =  uniqid();
		$column['title']           =  escape(clean($_POST['title']));
		$column['question_total']  =  escape(clean($_POST['question_total']));
		$column['right_score_ans'] =  escape(clean($_POST['right_score_ans']));
		$column['wrong_score_ans'] =  escape(clean($_POST['wrong_score_ans']));
		$column['time']            =  escape(clean($_POST['time']));
		$column['tag']             =  escape(clean(trim($_POST['tag'])));
		$column['instructions']    =  escape(clean($_POST['instructions']));
		$column['date']            =  date("Y-m-d");

		if(create($table = "exam", $column)){

			$_SESSION['exam_id']        = $column['exam_id'];
			$_SESSION['question_total'] = $column['question_total'];

			redirect("index.php?source=add_quiz_step_2");
		}else{

			redirect("index.php?source=add_quiz");
		}
	
	}
	
}

?>

<div class="container"><!--container start-->
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">



<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Quiz Details</b></span><br /><br />
 <div class="col-xs-3 col-sm-3 col-md-3">
 	
 </div>
 
 <div class="col-xs-6 col-sm-6 col-md-6">

<?php

display_message();
	 
 ?>
 
 <form class="" name="form" action=""  method="POST">
<fieldset>


<!-- Text input-->

<label class="col-xs-12 col-sm-12 col-md-12 control-label" for="title">Enter Exam title</label>

<div class="col-xs-12 col-sm-12 col-md-12 form-group">

	<input id="title" name="title" placeholder="Enter Exam title" class="form-control input-md" type="text">

</div>



<!-- Text input-->
<label class="col-xs-12 col-sm-12 col-md-12 control-label" for="question_total">Enter total number of questions</label>
<div class="col-xs-12 col-sm-12 col-md-12 form-group">

	<input id="question_total" name="question_total" placeholder="Enter total number of questions" class="form-control input-md" type="number">

</div>

<!-- Text input-->
<label class="col-xs-12 col-sm-12 col-md-12 control-label" for="right_score_ans">Enter marks on right answer</label>  
<div class="col-xs-12 col-sm-12 col-md-12 form-group">

	<input id="right_score_ans" name="right_score_ans" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">

</div>

<!-- Text input-->
<label class="col-xs-12 col-sm-12 col-md-12 control-label" for="wrong_score_ans">Enter marks on wrong answer without sign</label>  
<div class="col-xs-12 col-sm-12 col-md-12 form-group">

	<input id="wrong_score_ans" name="wrong_score_ans" placeholder="Enter marks on wrong answer without sign" class="form-control input-md" min="0" type="number">

</div>

<!-- Text input-->
<label class="col-xs-12 col-sm-12 col-md-12 control-label" for="time">Enter time limit for test in minutes</label>  
<div class="col-xs-12 col-sm-12 col-md-12 form-group">

	<input id="time" name="time" placeholder="Enter time limit for test in minutes" class="form-control input-md" min="1" type="number">

</div>

<!-- Text input-->
<label class="col-xs-12 col-sm-12 col-md-12 control-label" for="tag">Enter #tag which is used for searching</label>  
<div class="col-xs-12 col-sm-12 col-md-12 form-group">
	<input id="tag" name="tag" placeholder="Enter #tag which is used for searching" class="form-control input-md" type="text">

</div>


<!-- Text input-->
<label class="col-xs-12 col-sm-12 col-md-12 control-label" for="instructions">Write Exam instructions here...</label>  
<div class="col-xs-12 col-sm-12 col-md-12 form-group">
	<textarea id="instructions" rows="8" cols="8" name="instructions" class="form-control" placeholder="Write Exam instructions here..."></textarea>  
</div>

 
<div class="col-xs-12 col-sm-12 col-md-12 form-group"> 
	<input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary" name="quiz">
</div>

</fieldset>
</form>
</div>

<div class="col-xs-3 col-sm-3 col-md-3">
	
</div>

</div><!--container closed-->
</div>
</div>
