<?php

if(is_exam_id() && is_exam_page_number_set() && is_exam_start() && isset($_SESSION['score']) && isset($_SESSION['time'])){
	
	$exam_id = get_session_exam_id();
}else{
	
	redirect("index.php");
}


if( time() >= escape(clean(trim($_SESSION['time']))) ){
	
	exam_finish();
	
	redirect("index.php?source=result");
}


$result = specific_query("SELECT * FROM question WHERE exam_id = '$exam_id' LIMIT " . get_exam_query_limit() . "," . get_exam_question_per_page() );

?>

<div class="row">

<div class="col-xs-12 col-sm-4 col-md-4">
	
	<div class="panel">
			
		<p> <b>You have <?php if(strpos(get_time_remaining(), ".")){ echo str_replace(".", "min(s) ", get_time_remaining()) . "secs "; }else{ echo get_time_remaining() . "min(s) "; } ?> remaining</b> </p>
		
		<p> <b>Questions Answered: <?php echo get_answered_qestion() . " out of " . get_total_question_number($_SESSION['exam_id']); ?> </b></p>
				
	</div>
</div>


<div class="col-xs-12 col-sm-8 col-md-8">
	

<div class="panel" style="margin:5%">

	<form action="includes/session.php" method="POST"  class="form-horizontal">
	
	<br>
	
<?php
	
while($row = fetch_array($result)){

$question_id = $row['id'];
$sn          = $row['sn'];
$qns         = $row['qns'];
	
?>

	
	<b>Question &nbsp; <?php echo $sn; ?> &nbsp;::</b>
	<br> 
	<b><?php echo clean($qns); ?></b>
	<br>
	<br>
	
<?php
	
	$result_2 = specific_query("SELECT * FROM options WHERE question_id = '$question_id' ");
	
	while($row_2 = fetch_array($result_2)){
		
		$option    = $row_2['option'];
		$option_id = $row_2['id'];
		
?>
		
	<input type="radio" name="question_<?php echo $sn; ?>" value=" <?php echo $question_id . "/" . $sn . "/" . $option_id; ?> " <?php echo (get_session_option_id('question_' . $sn) == $option_id) ? 'checked' : ''; ?> > <?php echo clean($option); ?> 
	<br>
	<br>
	
<?php	
	
	}
	
?>




<?php

}

	
?>

<br>

<?php
		
if(is_exam_next_previous_page()){
	
?>

	<div class="row">
	
	
		<div class="col-xs-6 col-sm-6 col-md-6" style="padding-left:25px;">
			<button type="submit" class="btn btn-primary pull-left" name="submit" value="previous">
			<span class="glyphicon glyphicon-backward" aria-hidden="true"></span>&nbsp;Previous</button>
		</div>
		
		<div class="col-xs-6 col-sm-6 col-md-6" style="padding-right:25px;">
			<button type="submit" class="btn btn-primary pull-right" name="submit" value="next">
			Next&nbsp;<span class="glyphicon glyphicon-forward" aria-hidden="true"></span></button>
		</div>
	</div>



<?php

}
		
		
elseif(is_exam_previous_finish_page()){
	
?>

	<div class="row">
	
	
		<div class="col-xs-6 col-sm-6 col-md-6" style="padding-left:25px;">
			<button type="submit" class="btn btn-primary pull-left" name="submit" value="previous">
			<span class="glyphicon glyphicon-backward" aria-hidden="true"></span>&nbsp;Previous</button>
		</div>
		
		<div class="col-xs-6 col-sm-6 col-md-6" style="padding-right:25px;">
			<button type="submit" class="btn btn-primary pull-right" name="submit" value="finish">
			<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button>
		</div>
		
	</div>

<?php
	
	
}
		

elseif(is_exam_finish_page()){
	
?>


	<div class="row" style="padding-right:25px;">

		<button type="submit" class="btn btn-primary pull-right" name="submit" value="finish">
		<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button>

	</div>

<?php
	
	
}

elseif(is_exam_previous_page()){

?>
	<div class="row" style="padding-left:25px;">

	<button type="submit" class="btn btn-primary pull-left" name="submit" value="previous">
	<span class="glyphicon glyphicon-backward" aria-hidden="true"></span>&nbsp;Previous</button>

	</div>
	
<?php
	
}

elseif(is_exam_next_page()){
	
?>
	
	<div class="row" style="padding-right:25px;">

		<button type="submit" class="btn btn-primary pull-right" name="submit" value="next">
		Next&nbsp;<span class="glyphicon glyphicon-forward" aria-hidden="true"></span></button>

	</div>
	
<?php
	
}

?>




</form>

</div>

</div>


</div>