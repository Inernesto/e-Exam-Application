<?php 

$result = specific_query("SELECT * FROM feedback ORDER BY date DESC");

?>

<div class="container"><!--container start-->
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">


<div class="panel">

<?php
	
display_message();
	
?>

<div class="table-responsive">
<table class="table table-striped title1">
<tr>
<td><b>S.N.</b></td>
<td><b>Subject</b></td>
<td><b>Email</b></td>
<td><b>Date</b></td>
<td><b>Time</b></td>
<!--<td><b>By</b></td>-->
<td></td>
<td></td>
</tr>

<?php

$c=1;
while($row = fetch_array($result)) {
	
	$date       = clean($row['date']);
	$date       = clean(date("d-m-Y",strtotime($date)));
	$time       = clean($row['time']);
	$subject    = clean($row['subject']);
//	$name       = clean($row['name']);
	$email      = clean($row['email']);
	$id         = clean($row['feedback_id']);
	
	
?>

	
	<tr>
	<td><?php echo $c++; ?></td>
	<td><?php echo $subject; ?></td>
	<td><?php echo $email; ?></td>
	<td><?php echo $date; ?></td>
	<td><?php echo $time; ?></td>
<!--	<td><?php // echo $name; ?></td>-->
	<td><a title="Click Here To Open Feedback" href="index.php?source=show_feedback&feedback_id=<?php echo $id; ?>"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b></a></td>
	<td><a title="Delete Feedback" href="index.php?source=delete_feedback&feedback_id=<?php echo $id; ?>"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td>
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
