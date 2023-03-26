<?php

if(is_exam_start()){
	
	redirect("index.php?source=quiz");
}

?>
	

<div class="panel">

	<div class="table-responsive">

		<table class="table table-striped title1">

			<tr>
			<td><b>S.N.</b></td>
			<td><b>Topic</b></td>
			<td><b>Total question</b></td>
			<td><b>Marks</b></td>
			<td><b>Time limit</b></td>
			<td><b>Click here to start</b></td>
			</tr>


<?php

			$c = 1;	

			$column['username'] = $_SESSION['username'];

			$email = get_user_email($table = "users", $column);

			$result = read($table = "exam");

			while($row = fetch_array($result)) {
				$title            = $row['title'];
				$no_of_questions  = $row['question_total'];
				$right_ans_score  = $row['right_score_ans'];
				$time             = $row['time'];
				$exam_id          = $row['exam_id'];
				
				if(is_exam_taken($exam_id, $email)){

?>	

					<tr>
					<td> <?php echo $c++; ?> </td>
					<td> <?php echo $title; ?> &nbsp;<span title="You have taken this quiz already" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
					<td> <?php echo $no_of_questions; ?> </td>
					<td> <?php echo $right_ans_score * $no_of_questions; ?> </td>
					<td> <?php echo $time; ?> &nbsp;min</td>
					<td><b><a href="javascript:void(0);" class="btn sub1" style="margin:0px;background:red" disabbled="true"  title="You have taken this quiz already"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Restart</b></span></a></b></td>
					</tr>

<?php

				}else{

?>


					<tr>
					<td> <?php echo $c++; ?> </td>
					<td> <?php echo $title; ?> </td>
					<td> <?php echo $no_of_questions; ?> </td>
					<td> <?php echo $right_ans_score * $no_of_questions; ?> </td>
					<td> <?php echo $time; ?> &nbsp;min</td>
					<td>
					
					<form method="post" action="index.php?source=instruction">
						
						<input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">
						
						<button class="btn sub1" type="submit" style="margin:0px;background:#99cc32" name="quiz_instruction">
						
							<span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span>
							
						</button>
						
					</form>
					
					</td>
					</tr>
<?php

				}
			}

			$c=0;


?>


		</table>
		
	</div>
	
</div>
