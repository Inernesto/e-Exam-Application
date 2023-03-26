<?php 

if(isset($_GET['feedback_id'])){
	
	$feedback_id = escape(clean($_GET['feedback_id']));
}else{
	
	redirect("index.php?source=feedback");
}



$result = specific_query("SELECT * FROM feedback WHERE feedback_id = '{$feedback_id}' ORDER BY date DESC");

while($row = fetch_array($result)) {
	
	
	$email    = $row['email'];
	$subject  = $row['subject'];
	$date     = $row['date'];
	$date     = date("d-m-Y",strtotime($date));
	$time     = $row['time'];
	$feedback = $row['feedback'];
	
?>
	
<div class="container"><!--container start-->
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
	
	
<div class="panel">
<a title="Back to Archive" href="index.php?source=feedback" style="font-size:20px;">
<b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b>
</a>
<h2 style="text-align:center; margin-top:-15px;font-family:Ubuntu,sans-serif;">
<b><?php echo $subject; ?></b>
</h2>
 
<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;">
<span style="line-height:35px;padding:5px;">-&nbsp;<b>DATE:</b>&nbsp;<?php echo $date; ?></span>
<span style="line-height:35px;padding:5px;">&nbsp;<b>Time:</b>&nbsp;<?php echo $time; ?></span>
<span style="line-height:35px;padding:5px;">&nbsp;<b>By:</b>&nbsp;<?php echo $email; ?></span>
<br>
<?php echo $feedback; ?>
</div>
</div>

<?php
	
}

?>




</div>
</div>
</div><!--container closed-->