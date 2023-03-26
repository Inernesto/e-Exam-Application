<div class="container"><!--container start-->
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">

<?php 


$result = read($table = "users");

?>

<div class="panel">

<?php

display_message();
	
?>

<form action="index.php?source=add_user" method="post">
	<button type="submit" class="btn btn-primary">Add User</button>
</form>
<br>


<div class="table-responsive">
<table class="table table-striped title1">

<tr>
<td><b>S.N.</b></td>
<td><b>Username</b></td>
<td><b>First Name</b></td>
<td><b>Last Name</b></td>
<td><b>Gender</b></td>
<td><b>Email</b></td>
<td>Edit</td>
<td>Delete</td>
</tr>

<?php 
	
$c=1;
	
while($row = fetch_array($result)) {
	
	$username        = $row['username'];
	$first_name      = $row['first_name'];
	$last_name       = $row['last_name'];
    $sex             = $row['sex'];
	$email           = $row['user_email'];

?>

	<tr>
	<td><?php echo $c++; ?></td>
	<td><?php echo $username; ?></td>
	<td><?php echo $first_name; ?></td>
	<td><?php echo $last_name; ?></td>
	<td><?php echo $sex; ?></td>
	<td><?php echo $email; ?></td>
	
	<td>
	
	<form action="index.php?source=edit_user" method="post">
		<input type="hidden" name="username" value="<?php echo $username; ?>">
		<button title="Edit User" type="submit" class="btn btn-primary" name="edit_user"><b><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></b></button>
	</form>
	
	</td>
	
	<td>
	
	<form action="index.php?source=delete_user" method="post">
		<input type="hidden" name="username" value="<?php echo $username; ?>">
		<button title="Delete User" type="submit" class="btn btn-danger" name="delete_user"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></button>
	</form>
	
	</td>
	</tr>
	
<?php
	
}
	
?>

<?
$c=0;
	
?>

</table>

<h3>Admin</h3>

<table class="table table-striped title1">

<tr>
<td><b>S.N.</b></td>
<td><b>Username</b></td>
<td><b>Email</b></td>
<td>Edit</td>
<td>Delete</td>
</tr>

<?php 
	
$c=1;
	
$result_2 = read($table = "admin");
	
while($row = fetch_array($result_2)) {
	
	$username        = $row['username'];
	$email           = $row['user_email'];

?>

	<tr>
	<td><?php echo $c++; ?></td>
	<td><?php echo $username; ?></td>
	<td><?php echo $email; ?></td>
	
	<td>
	
	<form action="index.php?source=edit_admin_user" method="post">
		<input type="hidden" name="username" value="<?php echo $username; ?>">
		<button title="Edit Admin" type="submit" class="btn btn-primary" name="edit_admin_user"><b><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></b></button>
	</form>
	
	</td>
	
	<td>
	
	<form action="index.php?source=delete_admin_user" method="post">
		<input type="hidden" name="username" value="<?php echo $username; ?>">
		<button title="Delete Admin" type="submit" class="btn btn-danger" name="delete_admin_user"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></button>
	</form>
	
	</td>
	</tr>
	
<?php
	
}
	
?>

<?
$c=0;
	
?>

</table>


</div>
</div>


</div>
</div>
</div><!--container closed-->