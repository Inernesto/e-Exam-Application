<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Project Worlds || DASHBOARD </title>
<link  rel="stylesheet" href="../css/bootstrap.min.css">
<link  rel="stylesheet" href="../css/bootstrap-theme.min.css">    
<link rel="stylesheet" href="../css/main.css">
<link  rel="stylesheet" href="../css/font.css">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

<?php include_once ("config/init.php"); ?>

<?php
	
$users_array['username'] = escape(clean(trim($_SESSION['username'])));
	
if( (isset($_SESSION['username'])) && (get_user_role($table = "admin", $users_array)  !== "Admin") ){
	
	redirect("../logout.php");
}

?>

</head>

<body style="background:#eee;">

<div class="header">
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6">
			<span class="logo">Test Your Skill</span>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6">


			<span class="pull-right top title1" >
				<span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true">
				</span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span>
				
				<a href="index.php?source=profile" style="padding-right:25px;" class="log1"><?php echo $_SESSION['username']; ?></a>&nbsp;&nbsp;
				
				<a href="../logout.php" style="padding-right:25px;" class="log1"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</a>
			</span>

		</div>
	</div>
</div>