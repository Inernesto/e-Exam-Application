<?php

if(isset($_SESSION['exam_id']) && isset($_SESSION['question_total'])){
	
	$exam_id         = escape(clean(trim($_SESSION['exam_id'])));
	$question_total  = escape(clean(trim($_SESSION['question_total'])));
	
}else{
	
	redirect("index.php?source=add_quiz");
}


if(isset($_POST['question'])){
	
	for($i=1; $i <= $question_total; $i++){
		
		$column['id']      = uniqid();
		$column['exam_id'] = $exam_id;
		$column['qns']     = escape(clean($_POST["qns{$i}"]));
		$column['choice']  = 4;
		$column['sn']      = $i;
		
		
		
		if(create($table = "question", $column)){
			
			$option_1['id']           = uniqid();
			$option_1['question_id']  = $column['id'];
			$option_1['option']       = escape(clean(trim($_POST["qns{$i}_1"])));
			
			$option_2['id']           = uniqid();
			$option_2['question_id']  = $column['id'];
			$option_2['option']       = escape(clean(trim($_POST["qns{$i}_2"])));
			
			$option_3['id']           = uniqid();
			$option_3['question_id']  = $column['id'];
			$option_3['option']       = escape(clean(trim($_POST["qns{$i}_3"])));			
			
			$option_4['id']           = uniqid();
			$option_4['question_id']  = $column['id'];
			$option_4['option']       = escape(clean(trim($_POST["qns{$i}_4"])));
			
			
			create($table = "options", $option_1);
			create($table = "options", $option_2);
			create($table = "options", $option_3);
			create($table = "options", $option_4);

			
			$ans = escape(clean($_POST["qns_ans{$i}"]));


			switch($ans){

				case 'a';
					$id = $option_1['id'];
				break;

				case 'b';
					$id = $option_2['id'];
				break;

				case 'c';
					$id = $option_3['id'];
				break;

				case 'd';
					$id = $option_4['id'];
				break;

				default:
					$id = "";
				break;
			}

			$qns_ans['question_id'] = $column['id'];
			$qns_ans['id']          = $id;

			create($table = "answer", $qns_ans);

			unset($_SESSION['exam_id']);
			unset($_SESSION['question_total']);

			success_display("Thank you, this quiz has been successfully uploaded!!!");

			redirect("index.php?source=add_quiz");
			
			
		}
	}
}


?>

<div class="container"><!--container start-->
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">



<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span>
<br>
<br>
 <div class="col-xs-3 col-sm-3 col-md-3"></div>
 
 <div class="col-xs-6 col-sm-6 col-md-6">
 <form class="" name="form" action=""  method="POST">
<fieldset>

<?php
 
 for($i=1; $i <= $question_total; $i++){

?>
	 
<b>Question number&nbsp;<?php echo $i; ?>&nbsp;:</b>
<br>
  
<!-- Text input-->
<label class="col-xs-12 col-sm-12 col-md-12 control-label" for="qns<?php echo $i; ?>"></label>  
<div class="col-xs-12 col-sm-12 col-md-12 form-group">
	<textarea rows="3" cols="5" name="qns<?php echo $i; ?>" class="form-control" placeholder="Write question number <?php echo $i; ?> here..."></textarea>  
</div>
  
<!-- Text input-->
 <label class="col-xs-12 col-sm-12 col-md-12 control-label" for="<?php echo "qns{$i}.1"; ?>"></label>  
 <div class="col-xs-12 col-sm-12 col-md-12 form-group">
  <input id="<?php echo "qns{$i}.1"; ?>" name="<?php echo "qns{$i}_1"; ?>" placeholder="Enter option a" class="form-control input-md" type="text">
</div>

<!-- Text input-->
 <label class="col-xs-12 col-sm-12 col-md-12 control-label" for="<?php echo "qns{$i}.2"; ?>"></label>  
 <div class="col-xs-12 col-sm-12 col-md-12 form-group">
  <input id="<?php echo "qns{$i}.2"; ?>" name="<?php echo "qns{$i}_2"; ?>" placeholder="Enter option b" class="form-control input-md" type="text">
</div>

<!-- Text input-->
<label class="col-xs-12 col-sm-12 col-md-12 control-label" for="<?php echo "qns{$i}.3"; ?>"></label>  
<div class="col-xs-12 col-sm-12 col-md-12 form-group">
  <input id="<?php echo "qns{$i}.3"; ?>" name="<?php echo "qns{$i}_3"; ?>" placeholder="Enter option c" class="form-control input-md" type="text">
</div>

<!-- Text input-->
 <label class="col-xs-12 col-sm-12 col-md-12 control-label" for="<?php echo "qns{$i}.4"; ?>"></label>  
 <div class="col-xs-12 col-sm-12 col-md-12 form-group">
  <input id="<?php echo "qns{$i}.4"; ?>" name="<?php echo "qns{$i}_4"; ?>" placeholder="Enter option d" class="form-control input-md" type="text">
</div>

<br>
<b>Correct answer</b>:
<br>

<label class="col-xs-12 col-sm-12 col-md-12 control-label" for="<?php echo "qns_ans{$i}"; ?>"></label>  
<div class="col-xs-12 col-sm-12 col-md-12 form-group">
	<select id="<?php echo "qns_ans{$i}"; ?>" name="<?php echo "qns_ans{$i}"; ?>" placeholder="Choose correct answer " class="form-control input-md" >
		<option value="">Select answer for question <?php echo $i; ?></option>
		<option value="a">option a</option>
		<option value="b">option b</option>
		<option value="c">option c</option>
		<option value="d">option d</option> 
	</select>
</div>
  
  
  <br>
  <br>
 
 <?php 
 
 }
    
?>

 <div class="form-group">
  <div class="col-xs-12 col-sm-12 col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary" name="question">
  </div>
</div>

</fieldset>
</form>
</div>

<div class="col-xs-3 col-sm-3 col-md-3"></div>


</div><!--container closed-->
</div>
</div>