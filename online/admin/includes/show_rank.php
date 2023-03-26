<?php
if(isset($_GET['exam_id'])){
	
	$exam_id = escape(clean($_GET['exam_id']));
}else{
	
	redirect("index.php?source=rank");
}
?>


<div class="container"><!--container start-->
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">


<?php

$result = specific_query("SELECT * FROM history WHERE exam_id = '{$exam_id}' ORDER BY score DESC");

?>

<div class="panel title">

<a title="Back to Archive" href="index.php?source=rank" style="font-size:20px;">
<b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b>
</a>
<br>
<br>

<div class="table-responsive">
<table class="table table-striped title1" >
<tr style="color:red">
<td><b>Position</b></td>
<td><b>Username</b></td>
<td><b>Email Address</b></td>
<td><b>Score</b></td>
<td><b>Date</b></td>
</tr>

<?php
	
$c=0;
	
while($row = fetch_array($result)){
	
$exam_id               = $row['exam_id'];
$email                 = $row['email'];
$score                 = $row['score'];
$date                  = $row['date'];
	
$user_email['user_email']   = $email;
	
$c++;

?>

<tr>
<td><?php echo $c; ?></td>
<td><?php echo get_username($table = "users", $user_email); ?></td>
<td><?php echo $email; ?></td>
<td><?php echo $score; ?></td>
<td><?php echo $date; ?></td>
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