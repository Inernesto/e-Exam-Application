<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><b>Admin Dashboard</b></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class = "<?php echo (!isset($_GET['source'])) ? 'active' : ''; ?>"><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
        
        <li class = "<?php echo (isset($_GET['source']) && (($_GET['source'] == 'users') || ($_GET['source'] == 'add_user') || ($_GET['source'] == 'edit_user') || ($_GET['source'] == 'edit_admin_user') )) ? 'active' : ''; ?>"><a href="index.php?source=users">User</a></li>
        
		<li class = "<?php echo (isset($_GET['source']) && $_GET['source'] == 'rank') ? 'active' : ''; ?>"><a href="index.php?source=rank">Ranking</a></li>
		
		<li class = "<?php echo (isset($_GET['source']) && $_GET['source'] == 'feedback') ? 'active' : ''; ?>"><a href="index.php?source=feedback">Feedback</a></li>
       
        <li class="dropdown <?php echo ((isset($_GET['source'])) && (($_GET['source'] == 'add_quiz') || ($_GET['source'] == 'add_quiz_step_2'))) ? 'active' : ''; ?> ">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quiz<span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
           
            <li><a href="index.php?source=add_quiz">Add Quiz</a></li>
			
          </ul>
        </li>
        
        <li class="pull-right"> <a href="../logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Signout</a></li>
		
      </ul>
          </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>