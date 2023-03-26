<?php

$username['username'] = escape(trim($_SESSION['username']));
	
$email = escape(trim(get_user_email($table = "users", $username)));
	
$result = specific_query("SELECT * FROM history WHERE email = '{$email}' ORDER BY date DESC LIMIT 1");

?>


	
<div class="panel">
<center>

<?php echo display_message(); ?>

<h1 class="title" style="color:#660033">Result</h1>

<center>
<br>
<table class="table table-striped title1" style="font-size:20px;font-weight:1000;">

<?php

while($row = fetch_array($result)){
	
$exam_id = $row['exam_id'];
$score   = $row['score'];
$date    = $row['date'];
	
?>

<tr style="color:#66CCFF">
<td>Quiz Title</td>
<td><?php echo get_exam_title($exam_id); ?></td>
</tr>

<tr style="color:#66CCFF">
<td>Total Questions</td>
<td><?php echo get_total_question_number($exam_id); ?></td>
</tr>

<tr style="color:#99cc32">
<td>Right Answers&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td>
<td><?php echo ($score / get_right_ans_score($exam_id)); ?></td>
</tr>
 
<tr style="color:red">
<td>Wrong Answers&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td>
<td><?php echo (exam_overall_score($exam_id) - $score) / get_right_ans_score($exam_id); ?></td>
</tr>

<tr style="color:#66CCFF">
<td>Your Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td>
<td><?php echo $score; ?></td>
</tr>

<?php
	
}
	
unset_exam_session_values();
	
$time = 1800 + (60*60);
	
if(time() - strtotime($date) >= $time){
	
	redirect("index.php");
}

?>

</table>

</center>

</center>

</div>
