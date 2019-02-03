<?php

require_once 'init/init.php';


$response = $user->forgot_reset_password($_POST, $dbcon);


if ($response === "success"){
	echo json_encode([
		'success' => 'success',
		'message' => '<div class="alert alert-success style="color:green;">The password has been updated reset !!</div>',
		'logout'  => 1
	]);

}elseif ($response === "required_field"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-danger" style="color:red;">All the fields are mandatory !!</div>',
		
	]);

}elseif ($response === "pass_length"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-danger" style="color:red;">The password must be at least 4 digits or characters  !!</div>',
	
	]);
}
elseif ($response === "pass_not_match"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-danger" style="color:red;">The new password and confirm password do not match !!</div>',
		
	]);

}elseif ($response === "id_not_match"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-danger" style="color:red;">This request is not valid !!</div>',
		
	]);
	
}elseif ($response === "code_not_match"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-danger" style="color:red;">This request is expired !! We have resent you an e-mail !!</div>',
		
	]);
}
elseif ($response === "error"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-danger" style="color:red;">Failed to reset password!!</div>',
		
	]);
}



