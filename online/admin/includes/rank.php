<div class="container"><!--container start-->
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">


<?php

$result = read($table = "exam");

?>

<div class="panel title">
<div class="table-responsive">
<table class="table table-striped title1" >
<tr style="color:red">
<td><b>S/N</b></td>
<td><b>Exam_id</b></td>
<td><b>Title</b></td>
<td><b>No. of Questions</b></td>
<td><b>Total Marks</b></td>
<td></td>
</tr>

<?php
	
$c=0;
	
while($row = fetch_array($result)){
	
$exam_id               = $row['exam_id'];
$title                 = $row['title'];
$question_total        = $row['question_total'];
$right_score_ans       = $row['right_score_ans'];
	
$c++;

?>

<tr>
<td><?php echo $c; ?></td>
<td><?php echo $exam_id; ?></td>
<td><?php echo $title; ?></td>
<td><?php echo $question_total; ?></td>
<td><?php echo ($question_total * $right_score_ans); ?></td>
<td><a href="index.php?source=show_rank&exam_id=<?php echo $exam_id; ?>" class="btn btn-success">Show Rank</a></td>
</tr>

<?php
	
}

?>

</table>
</div>
</div>


</div>
</div>
</div><!--container closed-->