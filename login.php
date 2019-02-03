<?php

require_once 'init/init.php';


$login_response = $user->login($_POST, $dbcon);


if ($login_response === "success"){
	echo json_encode([
		'success' => 'success',
		'message' => '<div class="alert alert-success style="color:green;">You are loggedin successfully</div>',
		'url' => 'profile.php',

	]);

}elseif ($login_response === "required_field"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-info" style="color:red;">All the fields are required !!</div>',
		//'url' => 'profile.php',
	]);

}elseif ($login_response === "not_valid"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-info" style="color:red;">Please Enter Valid E-mail Address !!</div>',
		//'url' => 'profile.php',
	]);

}elseif ($login_response === "not_exists"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-info" style="color:red;">The E-mail Address does not match !!</div>',
		//'url' => 'profile.php',
	]);

}elseif ($login_response === "error"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-info" style="color:red;">The Password does not match !!</div>',
		//'url' => 'profile.php',
	]);


}