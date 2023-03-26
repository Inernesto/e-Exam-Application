<?php
	
include_once ("includes/header.php");
?>


<div class="bg">

<!--navigation menu-->

<?php
	
include_once ("includes/navigation.php");
	
?>


	<div class="container"><!--container start-->
		<div class="row">
			<div class="col-md-12">
			
			
<?php
				
		$users_array['username'] = escape(clean(trim($_SESSION['username'])));		
				
		if( (isset($_SESSION['username'])) && (get_user_role($table = "users", $users_array)  == "Subscriber") ){		
				
			if(isset($_GET['source'])){
				
				$source = clean($_GET['source']);
			}else{
				
				$source = " ";
			}
				
			switch($source){
					
				case 'quiz';
					include_once ("includes/quiz.php");
				break;
					
				
				case 'result';
					include_once ("includes/result.php");
				break;
				
					
				case 'history';
					include_once ("includes/history.php");
				break;
					
				
				case 'instruction';
					include_once ("includes/instruction.php");
				break;
					
				
				case 'profile';
					include_once ("includes/profile.php");
				break;
					
					
				default:
					include_once ("includes/exam.php");
				break;

			}
			
		}else{
			
			redirect("../logout.php");
		}
				
			?>



			</div>
		</div>
	</div>
</div>


<?php include_once ("includes/footer.php"); ?>
