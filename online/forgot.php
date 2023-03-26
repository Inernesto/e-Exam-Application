<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ECI PROJECTS || FORGOT </title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>


</head>

<?php include_once ("admin/config/init.php"); ?>

<body>

<!--header start-->
<div class="row header">

		<div class="col-xs-10 col-sm-10 col-md-6">

			<a href="index.php" class="log1"><span class="logo">Test Your Skill</span></a>

		</div>


	
	
	<div class="col-xs-2 col-sm-2 col-md-2 col-md-offset-4">
	
		<a href="#" class="pull-right btn sub1" data-toggle="modal" data-target="#myModal">
			<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Signin</b></span>
		</a>
		
	</div>
	
	
	
<!--sign in modal start-->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content title1">
      <div class="modal-header">

       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
        <h4 class="modal-title title1"><span style="color:orange">Log In</span></h4>       
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="login.php" method="POST">
		  <fieldset>


			<!-- Text input-->
			<div class="form-group">
			  <label class="col-xs-12 col-sm-3 col-md-3 control-label" for="email">Email:</label>  
			  <div class="col-xs-12 col-sm-9 col-md-9">
			  <input id="email" name="email" placeholder="Enter your email address" class="form-control input-md" type="email">
			  </div>
			</div>


			<!-- Password input-->
			<div class="form-group">
			  <label class="col-xs-12 col-sm-3 col-md-3 control-label" for="password">Password:</label>

			  <div class="col-xs-12 col-sm-9 col-md-9">
				<input id="password" name="password" placeholder="Enter your Password" class="form-control input-md" type="password">
				<a href="forgot.php" class="pull-right">Forgot Password?</a>
			  </div>

			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" name="login">Log in</button>
			</div>
			
			
		  </fieldset>
		</form>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--sign in modal closed-->

</div>


<!--header end-->

<div class="row bg1">

	<div class="row forgot-fix">

		<div class="col-sm-3 col-md-3">
		</div>

		<div class="col-xs-9 col-sm-6 col-md-6 panel" style="background-image:url(image/bg1.jpg); min-height:200px;">
			
<?php
	
	display_message();
?>

			<h2 align="center" style="font-family:'typo'; color:#000066">PLEASE ENTER YOUR EMAIL ADDRESS BELOW</h2>


			<div style="font-size:14px">

				<form role="form"  method="post" action="login.php">

					<div class="row">

						<div class="col-md-3">

							<b>Email Address:</b>

						</div>

						<div class="col-md-9">
						<!-- Text input-->
							<div class="form-group">

								  <input id="name" name="email" placeholder="Please Enter Your Email Address" class="form-control input-md" type="text">

							</div>

						</div>

					</div><!--End of row-->


					<div class="form-group" align="right">

						<input type="submit" name="forgot_password" value="Submit" class="btn btn-primary">

					</div>

				</form>

			</div><!--col-md-6 end-->

		</div>

		<div class="col-sm-3 col-md-3">
		</div>

	</div>

</div><!--container end-->


<!--Footer start-->

<div class="row footer">

<!--
<div class="col-xs-3 col-sm-3 col-md-3 box">
<a href="" target="_blank">About us</a>
</div>
-->

<div class="col-xs-4 col-sm-4 col-md-4 box">
<a href="#" data-toggle="modal" data-target="#admin">Admin Login</a>
</div>

<div class="col-xs-4 col-sm-4 col-md-4 box">
<a href="#" data-toggle="modal" data-target="#developers">Developer</a>
</div>

<div class="col-xs-4 col-sm-4 col-md-4 box">
<a href="feedback.php" target="_blank">Feedback</a>
</div>

</div>


<div class="clearfix"></div>


<!-- Modal For Developers-->
<div class="modal fade title1" id="developers">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style="font-family:'typo' "><span style="color:orange">Developer</span></h4>
      </div>
	  
      <div class="modal-body">

		<div class="row">
		<div class="col-md-4">
		 <img src="image/IMG-20191009-WA0002.jpg" width=100 height=100 alt="" class="img-rounded">
		 </div>
		 <div class="col-md-5">
		<a href="https://www.instagram.com/in_ernesto/" style="color:#202020; font-family:'typo' ; font-size:18px" title="Find on Instagram">in_ernesto</a>
		<h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">+234 8160999657</h4>
		<h4 style="font-family:'typo' ">ernest.inyama@gmail.com</h4>
		</div>
		</div>

      </div>
    
    </div>  <!-- /.modal-content -->
  </div>  <!-- /.modal-dialog -->
</div>  <!-- /.modal -->



<!--Modal for admin login-->
<div class="modal fade" id="admin">
  <div class="modal-dialog">
    <div class="modal-content">
	  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title"><span style="color:orange;font-family:'typo' ">ADMIN LOGIN</span></h4>
	  </div>
	<div class="modal-body title1">
		<div class="row">
			<div class="col-sm-1 col-md-1">

			</div>
				<div class="col-xs-12 col-sm-10 col-md-10">
					<form role="form" method="post" action="admin.php">
						<label class="control-label" for="email">Email:</label> 
						<div class="form-group">
							<input type="text" name="email" placeholder="Enter Your Email Address" class="form-control"> 
						</div>
						
						<label class="control-label" for="password">Password:</label> 
						<div class="form-group">
							<input type="password" name="password" placeholder="Password" class="form-control">
						</div>
						
<!--						<div class="row form-group"></div>-->
						<div class="form-group" align="right">
							<input type="submit" name="admin" value="Login" class="btn btn-primary">
						</div>
					</form>
				</div>
			 <div class="col-sm-1 col-md-1">

			 </div>
		 </div>
	 </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--footer end-->


</body>


 <script src="js/jquery.js" type="text/javascript"></script>

 <script src="js/bootstrap.min.js"  type="text/javascript"></script>
	  


<!--footer end-->

</html>