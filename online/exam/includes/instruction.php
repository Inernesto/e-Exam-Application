<?php

if(is_exam_start()){
	
	redirect("index.php?source=quiz");
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	if(isset($_POST['quiz_instruction'])){
		
		$exam_id = $_POST['exam_id'];
		
		$result = specific_query("SELECT * FROM exam WHERE exam_id = '{$exam_id}' ");
		
		$row = fetch_array($result);
		
		
	}else{
		
		redirect("index.php");
	}

	
}else{
	
	redirect("index.php");
}

?>

<div class="row">

	<div class="panel">

		<h4 class="text-center"><b><?php echo $row['instructions']; ?></b></h4>

		<div class="row">

			<div class="col-xs-6 col-sm-6 col-md-6">

				<a href="index.php" class="btn btn-danger">Quit</a>

			</div>

			<div class="col-xs-6 col-sm-6 col-md-6">

				<form method="post" action="includes/session.php">

					<input type="hidden" name="exam_id" value="<?php echo $exam_id;?>">

					<button class="btn pull-right" type="submit" style="margin:0px;background:#99cc32" name="quiz_start">

						<span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class=""><b>Click Here To Start</b></span>

					</button>

				</form>

			</div>

		</div>

	</div>

</div>
