<?php

$user_array['username'] = escape(trim($_SESSION['username']));

$email = escape(trim(get_user_email($table = "users", $user_array)));

$result = specific_query("SELECT * FROM history WHERE email = '{$email}' ORDER BY date DESC ");

?>
	
<div class="panel title">
<table class="table table-striped title1" >
<tr style="color:red">
<td><b>S.N.</b></td>
<td><b>Quiz</b></td>
<td><b>Score</b></td>

<?php
	
$c=0;
	
while($row = fetch_array($result)){
	
$exam_id = $row['exam_id'];
$score   = $row['score'];

$c++;

?>

<tr>
<td><?php echo $c; ?></td>
<td><?php echo get_exam_title($exam_id); ?></td>
<td><?php echo $score; ?></td>
</tr>

<?php
	
}

?>

</table>
</div>
