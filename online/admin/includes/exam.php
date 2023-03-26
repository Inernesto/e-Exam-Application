<?php 


$result = read($table = "exam");

?>

<div class="panel">

<?php
	
display_message();
?>

<div class="table-responsive">
<table class="table table-striped title1">

<tr>
<td><b>S.N.</b></td>
<td><b>Exam Id</b></td>
<td><b>Title</b></td>
<td><b>Instructions</b></td>
<td><b>No. of Questions</b></td>
<td><b>Right Answer Score</b></td>
<td><b>Wrong Answer Score</b></td>
<td><b>Time Duration</b></td>
<td><b>Tags</b></td>
<td><b>Date</b></td>
<td><b>Edit</b></td>
<td><b>Delete</b></td>
</tr>

<?php 
	
$c=1;
	
while($row = fetch_array($result)) {
	
	$exam_id             = $row['exam_id'];
	$question_total      = $row['question_total'];
	$right_score_ans     = $row['right_score_ans'];
    $wrong_score_ans     = $row['wrong_score_ans'];
    $instructions        = $row['instructions'];
	$title               = $row['title'];
	$time                = $row['time'];
	$tag                 = $row['tag'];
	$date                = $row['tag'];

?>

	<tr>
	<td><?php echo $c++; ?></td>
	<td><?php echo $exam_id; ?></td>
	<td><?php echo $title; ?></td>
	<td><?php echo $instructions; ?></td>		
	<td><?php echo $question_total; ?></td>
	<td><?php echo $right_score_ans; ?></td>
	<td><?php echo $wrong_score_ans; ?></td>
	<td><?php echo $time; ?></td>
	<td><?php echo $tag; ?></td>
	<td><?php echo $date; ?></td>
	
	<td>
	
	<form action="index.php?source=edit_quiz" method="post">
		<input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">
		<button title="Edit Quiz" type="submit" class="btn btn-primary" name="edit_quiz"><b><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></b></button>
	</form>
	
	</td>
	
	<td>
	
	<form action="index.php?source=delete_quiz" method="post">
		<input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">
		<button title="Edit Quiz" type="submit" class="btn btn-danger" name="delete_quiz"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></button>
	</form>
	
	</td>
	
	</tr>
	
<?php
	
}
	
$c=0;
	
?>

</table>
</div>
</div>
