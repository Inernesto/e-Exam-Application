<?php

if(isset($_SESSION['exam_id']) && isset($_SESSION['question_total'])){
	
	$exam_id         = escape(clean(trim($_SESSION['exam_id'])));
	$question_total  = escape(clean(trim($_SESSION['question_total'])));
	
	$exam_array['exam_id']    = $exam_id;  
	
	
}else{
	
	redirect("index.php");
}


if(isset($_POST['edit_question'])){
	
	for($i=1; $i <= $question_total; $i++){
		
		$update_column["id"]      = escape(clean(get_question_id($exam_id, $i)));
		$column["exam_id"]        = $exam_id;
		$column["qns"]            = escape(clean($_POST["qns{$i}"]));
		$column["choice"]         = 4;
		$column["sn"]             = $i;
		
		$question_id = escape(clean(get_question_id($exam_id, $i)));
		
		update($table = "question", $update_column, $column);

		$options_delete_array['question_id'] = escape(clean(get_question_id($exam_id, $i))); 

		if(delete($table = "options", $options_delete_array)){

			for($j=1; $j<=4; $j++){

				$option['id']           = uniqid();
				$option['question_id']  = $question_id;
				$option['option']       = escape(clean(trim($_POST["qns{$i}_{$j}"])));

				create($table = "options", $option);

				$ans = escape(clean($_POST["qns_ans{$i}"]));


				if($ans == "a" && $j == 1){

					$answer_delete_array['question_id'] = $question_id;

					if(delete($table = "answer", $answer_delete_array)){

						$qns_ans['question_id'] = $question_id;
						$qns_ans['id']          = $option['id'];

						create($table = "answer", $qns_ans);

					}

				}


				if($ans == "b" && $j == 2){

					$answer_delete_array['question_id'] = $question_id;

					if(delete($table = "answer", $answer_delete_array)){

						$qns_ans['question_id'] = $question_id;
						$qns_ans['id']          = $option['id'];

						create($table = "answer", $qns_ans);

					}

				}


				if($ans == "c" && $j == 3){

					$answer_delete_array['question_id'] = $question_id;

					if(delete($table = "answer", $answer_delete_array)){

						$qns_ans['question_id'] = $question_id;
						$qns_ans['id']          = $option['id'];

						create($table = "answer", $qns_ans);

					}

				}


				if($ans == "d" && $j == 4){

					$answer_delete_array['question_id'] = $question_id;

					if(delete($table = "answer", $answer_delete_array)){

						$qns_ans['question_id'] = $question_id;
						$qns_ans['id']          = $option['id'];

						create($table = "answer", $qns_ans);

					}

				}

			}

		}
				
	}

	
	
	if(isset($_SESSION['edit_question_total']) && (clean(trim($_SESSION['edit_question_total'])) > $question_total)){
		
		$edit_question_total = clean(trim($_SESSION['edit_question_total']));
//		$i = $question_total + 1;
		
		for($i = $question_total + 1; $i <= $edit_question_total; $i++){
			
			$question_column['id']      = uniqid();
			$question_column['exam_id'] = $exam_id;
			$question_column['qns']     = escape(clean($_POST["qns{$i}"]));
			$question_column['choice']  = 4;
			$question_column['sn']      = $i;

			
			if(create($table = "question", $question_column)){

				$option_1['id']           = uniqid();
				$option_1['question_id']  = $question_column['id'];
				$option_1['option']       = escape(clean(trim($_POST["qns{$i}_1"])));

				$option_2['id']           = uniqid();
				$option_2['question_id']  = $question_column['id'];
				$option_2['option']       = escape(clean(trim($_POST["qns{$i}_2"])));

				$option_3['id']           = uniqid();
				$option_3['question_id']  = $question_column['id'];
				$option_3['option']       = escape(clean(trim($_POST["qns{$i}_3"])));			

				$option_4['id']           = uniqid();
				$option_4['question_id']  = $question_column['id'];
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

				$qns_ans['question_id'] = $question_column['id'];
				$qns_ans['id']          = $id;

				create($table = "answer", $qns_ans);

			}
		}
	}
	
	success_display("Thank you, the quiz with the name " . get_exam_title($exam_id) . " has been successfully updated!!!");

	redirect("index.php");
	
	unset($_SESSION['exam_id']);
	unset($_SESSION['question_total']);
	unset($_SESSION['edit_question_total']);
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
 <form class="form-horizontal title1" name="form" action=""  method="POST">
<fieldset>

<?php
 
$i = 1;

$result_qns = read($table = "question", $exam_array);

while($row = fetch_array($result_qns)){

	$question_id      = $row['id'];
	$qns              = $row['qns'];
	
?>
	 
<b>Question number&nbsp;<?php echo $i; ?>&nbsp;:</b>
<br><!-- Text input-->
<label class="col-xs-12 col-sm-12 col-md-12 control-label" for="qns<?php echo $i; ?>"></label>  
<div class="col-xs-12 col-sm-12 col-md-12 form-group">
  <textarea rows="3" cols="5" name="qns<?php echo $i; ?>" class="form-control" placeholder="Write question number <?php echo $i; ?> here..."><?php echo str_replace('\r\n', '</br>', $qns); ?>	
  </textarea>  
</div>

<?php
		
	$j = 1;

	$question_array['question_id'] = $question_id;

	$result_opt = read($table = "options", $question_array);

	while($row  = fetch_array($result_opt)){

		  $option_id     =  $row['id'];
		  $question_id   =  $row['question_id'];
		  $option        =  $row['option'];
		
?>

<!-- Text input-->
<label class="col-xs-12 col-sm-12 col-md-12 control-label" for="<?php echo "qns{$i}_{$j}"; ?>"></label>  
<div class="col-xs-12 col-sm-12 col-md-12 form-group">
  <input id="<?php echo "qns{$i}_{$j}"; ?>" name="<?php echo "qns{$i}_{$j}"; ?>" placeholder="Enter option a" class="form-control input-md" type="text" value="<?php echo $option; ?>">
</div>


<?php
		
		$j++;
	}	
		
?>


<br>
<b>Correct answer</b>:
<br>


<?php
		$j = 1;

		$question_array['question_id'] = $question_id;

		$result_opt = read($table = "options", $question_array);

		while($row  = fetch_array($result_opt)){

			$option_id     =  $row['id'];


			$options_array['id']  =  $option_id;

			$result_ans = read($table = "answer", $options_array);

			while($row = fetch_array($result_ans)){

				$answer_id           = $row['id'];
	
?>

<label class="col-xs-12 col-sm-12 col-md-12 control-label" for="<?php echo "qns_ans{$i}"; ?>"></label>  
<div class="col-xs-12 col-sm-12 col-md-12 form-group">
	<select id="<?php echo "qns_ans{$i}"; ?>" name="<?php echo "qns_ans{$i}"; ?>" placeholder="Choose correct answer " class="form-control input-md" >
	  <option value="">Select answer for question <?php echo $i; ?></option>
	  <option value="a" <?php echo ($answer_id == $option_id && $j == 1) ? 'selected' : ''; ?>>option a</option>
	  <option value="b" <?php echo ($answer_id == $option_id && $j == 2) ? 'selected' : ''; ?>>option b</option>
	  <option value="c" <?php echo ($answer_id == $option_id && $j == 3) ? 'selected' : ''; ?>>option c</option>
	  <option value="d" <?php echo ($answer_id == $option_id && $j == 4) ? 'selected' : ''; ?>>option d</option> 
	</select>
</div>
  
  <br>
  <br> 
  
  
<?php
		}

		$j++;
	}

	$i++;
}
		
?>
  
  
  
  
<?php
 
	if(isset($_SESSION['edit_question_total']) && (clean(trim($_SESSION['edit_question_total'])) > $question_total)){
		
		$edit_question_total = clean(trim($_SESSION['edit_question_total']));
//		$i = $question_total + 1;
		
		for($i = $question_total + 1; $i <= $edit_question_total; $i++){

?>
	 
<b>Question number&nbsp;<?php echo $i; ?>&nbsp;:</b>
<br><!-- Text input-->
<label class="col-xs-12 col-sm-12 col-md-12 control-label" for="qns<?php echo $i; ?>"></label>  
<div class="col-xs-12 col-sm-12 col-md-12 form-group">
  <textarea rows="3" cols="5" name="qns<?php echo $i; ?>" class="form-control" placeholder="Write question number <?php echo $i; ?> here..."></textarea>  
</div>

<!-- Text input-->
<label class="col-xs-12 col-sm-12 col-md-12 control-label" for="<?php echo "qns{$i}_1"; ?>"></label>  
<div class="col-xs-12 col-sm-12 col-md-12 form-group">
  <input id="<?php echo "qns{$i}_1"; ?>" name="<?php echo "qns{$i}_1"; ?>" placeholder="Enter option a" class="form-control input-md" type="text">
</div>

<!-- Text input-->
<label class="col-xs-12 col-sm-12 col-md-12 control-label" for="<?php echo "qns{$i}_2"; ?>"></label>  
<div class="col-xs-12 col-sm-12 col-md-12 form-group">
  <input id="<?php echo "qns{$i}_2"; ?>" name="<?php echo "qns{$i}_2"; ?>" placeholder="Enter option b" class="form-control input-md" type="text">
</div>

<!-- Text input-->
<label class="col-xs-12 col-sm-12 col-md-12 control-label" for="<?php echo "qns{$i}_3"; ?>"></label>  
<div class="col-xs-12 col-sm-12 col-md-12 form-group">
  <input id="<?php echo "qns{$i}_3"; ?>" name="<?php echo "qns{$i}_3"; ?>" placeholder="Enter option c" class="form-control input-md" type="text">
</div>

<!-- Text input-->
<label class="col-xs-12 col-sm-12 col-md-12 control-label" for="<?php echo "qns{$i}_4"; ?>"></label>  
<div class="col-xs-12 col-sm-12 col-md-12 form-group">
  <input id="<?php echo "qns{$i}_4"; ?>" name="<?php echo "qns{$i}_4"; ?>" placeholder="Enter option d" class="form-control input-md" type="text">
</div>

<br>
<b>Correct answer</b>:
<br>

<label class="col-xs-12 col-sm-12 col-md-12 control-label" for="<?php echo "qns{$i}_4"; ?>"></label>  
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
		
	}
    
?>

<div class="col-xs-12 col-sm-12 col-md-12 form-group"> 
	<input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Edit Questions" class="btn btn-primary" name="edit_question">
</div>

</fieldset>
</form>
</div>
<div class="col-xs-3 col-sm-3 col-md-3"></div>



</div><!--container closed-->
</div>
</div>