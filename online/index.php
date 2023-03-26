<?php

include_once ('includes/header.php');

?>

<body>
<div class="header">
	<div class="row">
		<div class="col-xs-9 col-sm-10 col-md-6">
			<a href="index.php" class="log1"><span class="logo">Test Your Skill</span></a>
		</div>

	<div class="col-xs-3 col-sm-2 col-md-2 col-md-offset-4">
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

	</div><!--header row closed-->
</div>

<div class="bg1">

	<div class="row">

		<div class="col-xs-3 col-sm-3 col-md-7">

		</div>

		<div class="col-xs-9 col-sm-6 col-md-4 panel">

		<?php

		display_message();

		?>
		<!-- sign in form begins -->  
		<form class="form-horizontal" name="form" action="registration.php" method="POST" autocomplete="on">
			<fieldset>


				<!-- Text input-->
				<div class="form-group">

				  <label class="col-xs-12 col-sm-12 col-md-12" for="first_name">First Name:</label> 

				  <div class="col-xs-12 col-sm-12 col-md-12">

					  <input id="first_name" name="first_name" placeholder="Enter your first name" class="form-control input-md" type="text">

				  </div>

				</div>


				<div class="form-group">

				  <label class="col-xs-12 col-sm-12 col-md-12" for="last_name">Last Name</label> 

				  <div class="col-xs-12 col-sm-12 col-md-12">

					  <input id="last_name" name="last_name" placeholder="Enter your last name" class="form-control input-md" type="text">

				  </div>

				</div>


				<div class="form-group">

				  <label class="col-xs-12 col-sm-12 col-md-12" for="username">Username</label>

				  <div class="col-xs-12 col-sm-12 col-md-12">

					  <input id="username" name="username" placeholder="Enter your username" class="form-control input-md" type="text">

				  </div>

				</div>


				<!-- Text input-->
				<div class="form-group">

				  <label class="col-xs-12 col-sm-12 col-md-12" for="user_email">Email Address</label>

				  <div class="col-xs-12 col-sm-12 col-md-12">

						<input id="email" name="user_email" placeholder="Enter your email address" class="form-control input-md" type="email">

				  </div>

				</div>


				<!-- Text input-->
				<div class="form-group">

				  <label class="col-xs-12 col-sm-12 col-md-12" for="sex">Gender</label>

				  <div class="col-xs-12 col-sm-12 col-md-12">

					  <select id="sex" name="sex" placeholder="Enter your gender" class="form-control input-md">

						  <option value="">Select Gender</option>
						  <option value="Male">Male</option>
						  <option value="Female">Female</option> 

					  </select>

				  </div>

				</div>


				<!-- Text input-->
				<div class="form-group">

				  <label class="col-xs-12 col-sm-12 col-md-12" for="password">Password</label>

				  <div class="col-xs-12 col-sm-12 col-md-12">

					<input id="password" name="password" placeholder="Enter your password" class="form-control input-md" type="password">

				  </div>

				</div>


				<div class="form-group">

				  <label class="col-xs-12 col-sm-12 col-md-12" for="confirm_password">Confirm Password</label>

				  <div class="col-xs-12 col-sm-12 col-md-12">

					<input id="confirm_password" name="confirm_password" placeholder="Conform password" class="form-control input-md" type="password">

				  </div>

				</div>


				<!-- Button -->
				<div class="form-group">

				<!--  <label class="col-md-12 control-label" for=""></label>-->

				  <div class="col-xs-12 col-sm-12 col-md-12">

					<input  type="submit" class="sub" value="sign up" name="submit">

				  </div>

				</div>

			</fieldset>
			
		</form>
		
		</div><!--col-md-4 end-->

		<div class="col-xs-offset-0 col-sm-offset-3 col-md-offset-0">

		</div>

	</div>

</div>
<!--</div>container end-->

<!--Footer start-->
<div class="row footer">

<!--
	<div class="col-xs-3 col-sm-3 col-md-3 box">
		<a href="" target="_blank">About us</a>
	</div>
-->

	<div class="col-xs-4 col-sm-4 col-md-4 box">
		<a href="#" data-toggle="modal" data-target="#admin">Admin</a>
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
	  

  
<?php

include_once ("includes/footer.php");
?>
