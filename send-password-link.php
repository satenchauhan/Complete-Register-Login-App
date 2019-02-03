<?php

require_once 'init/init.php';

$response = $user->email_reset_password_link($_POST,$dbcon);

if ($response === "success"){
	echo json_encode([
		'success' => 'success',
		'message' => '<div class="alert alert-success style="color:green;">We have sent you an email for reset password link !!</div>',
		  'url' => 'index.php?sent',
	]);

}elseif ($response === "required_field"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-info" style="color:red;">All the fields are mandatory !!</div>',
		
	]);

}elseif ($response === "not_valid"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-info" style="color:red;">Please Enter Valid E-mail Address !!</div>',
		
	]);

}elseif ($response === "not_exists"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-info" style="color:red;">The E-mail Address does not exists !!</div>',
		
	]);

}elseif ($response === "error"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-danger" style="color:red;">Failed to reset password!!</div>',
		
	]);
}



