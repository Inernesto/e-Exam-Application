<?php

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["delete_admin_user"])){
	
	$users_array['username'] = escape(clean(trim($_POST['username'])));
	
	delete($table = "admin", $users_array);
	
	success_display("The user {$users_array['username']} has been deleted");
	
	redirect("index.php?source=users");
}else{
	
	redirect("index.php?source=users");
}

?>