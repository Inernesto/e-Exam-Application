<?php

$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_password'] = '';
$db['db_name'] = 'project';

foreach($db as $key => $value){
	
	define(strtoupper($key) , $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)

or die("Unable To Connect To The Database");

defined("REGISTRATION_URL") ? null : define("REGISTRATION_URL", "http://localhost/online/registration.php");
	
defined("FORGOT_URL") ? null : define("FORGOT_URL", "http://localhost/online/forgot.php");

defined("RECOVER_URL") ? null : define("RECOVER_URL", "http://localhost/online/recover.php");

defined("LOGIN_URL") ? null : define("LOGIN_URL", "http://localhost/online/login.php");

/*** Database Helper Functions *******/


function escape($string){
	global $connection;
	
	return mysqli_real_escape_string($connection, $string);
} // escape data to database


function confirm($result){
	global $connection;
	
	if(!$result){
		
		die("Query Failed" . mysqli_error($connection));	
	} 
} // confirm sql statements


function row_count($result){
	
	return mysqli_num_rows($result);
} // return the number of rows in a query


function query($sql){
	global $connection;
	
	return mysqli_query($connection, $sql);
} // sending query to the database


function fetch_array($result){
	
	return mysqli_fetch_assoc($result);
} // fetching records from database


function find_all($table){
	
	return "SELECT * FROM " . $table; 
} // finding all the records in a table


function find_by($table, $column){
	
	return "SELECT * FROM " . $table . " WHERE " . implode("", array_keys($column)) . " = '" . implode("", array_values($column)) . "' ";
} // finding a specific record in a table


function create(){
	global $connection;
	
	if(func_num_args() > 1){
		
		if(is_array(func_get_arg(1))){
			
			$sql = "INSERT INTO " . func_get_arg(0) . " (" . implode(",", array_keys(func_get_arg(1))) . ") ";
			$sql .= "VALUES ('" . implode("', '", array_values(func_get_arg(1))) . "')";
			
			confirm(query($sql));
			
			return true;
		}
		
		return false;
	}
	
	return false;
} // creating new record in the database table


function read(){
	global $connection;
	
	if(func_num_args() < 2){
		
		if(is_string(func_get_arg(0))){
		
			$sql = find_all(func_get_arg(0));
			$result = query($sql);
			confirm($result);

			return $result;
			
		}else{
			
			return false;
		}
	}
	
	
	if(func_num_args() < 3){
		
		if(is_array(func_get_arg(1))){
			
			$sql = find_by(func_get_arg(0), func_get_arg(1));
			$result = query($sql);
			confirm($result);
			
			return $result;
		}else{
			
			return false;
		}
	}
	
	return false;
} // reading all or by id from the database table


function specific_query($sql){
	global $connection;
	
	$result = query($sql);
	
	confirm($result);
	
	return $result;
} // requires a specific type of sql statement to the database


function specific_query_2($sql){
	
	return $sql;
} // requires a specific type of sql statement to the database


function update(){
	global $connection;
	
	if(func_num_args() > 1){
		
		if(is_array(func_get_arg(2))){
			
			$update_values = array();
			
			foreach(func_get_arg(2) as $key => $value){
				
				$update_values[] = "{$key}='{$value}'";	
			}
			
			
			
			$sql = "UPDATE " . func_get_arg(0) . " SET ";
			$sql .= implode(", ", $update_values);
			$sql .= " WHERE " . implode(" ", array_keys(func_get_arg(1))) . " = '" . implode(" ", array_values(func_get_arg(1))) . "'";
			
			confirm(query($sql));
			
			return true;
		}
		
		return false;
	}
	
	return false;
} // updating records in the database table


function delete(){
	global $connection;
	
	if(func_num_args() < 3){
		
		$sql = "DELETE FROM " . func_get_arg(0) . " ";
		$sql .= " WHERE " . implode(" ", array_keys(func_get_arg(1))) . " = '" . implode(" ", array_values(func_get_arg(1))) . "'";
		
		confirm(query($sql));
		
		return true;
	}
	
	return false;
} // deleting records from the database table


function last_id(){
	global $connection;
	
	return mysqli_insert_id($connection);
} // returning the last inserted id


?>