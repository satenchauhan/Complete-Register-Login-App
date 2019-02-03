<?php

require_once 'init/init.php';


$signup_response = $user->signup($_POST, $dbcon);


if ($signup_response === "success"){
	echo json_encode([
		'success' => 'success',
		'message' => '<div class="alert alert-success style="color:green;"> You are registered successfully</div>',
		'url'  => 'index.php?success',

	]);
}
elseif ($signup_response === "required_field"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-info" style="color:tomato;">All the fields are required !!</div>',
		//'url' => 'profile.php',
	]);
}
elseif ($signup_response === "inavlid_name"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-danger" style="color:red;">The invalid characters for fullname field !! <b style="color:green;">Only alphabets characters allowed !!</b></div>',
		//'url' => 'profile.php',
	]);
}
elseif ($signup_response === "invalid_country"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-danger" style="color:red;">The special characters or symbols are not allowed for country field !! </div>',
		//'url' => 'profile.php',
	]);
}
elseif ($signup_response === "inavlid_username"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-danger" style="color:red;">The special characters or symbols are not allowd for username field !!</div>',
		//'url' => 'profile.php',
	]);
}
elseif ($signup_response === "username_length"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-danger" style="color:red;">The username must contain at least 4 characters !!</div>',
		//'url' => 'profile.php',
	]);
}
elseif ($signup_response === "not_valid"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-danger" style="color:red;">Please Enter Valid E-mail Address !!</div>',
		//'url' => 'profile.php',
	]);
}
elseif ($signup_response === "email_exists"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-danger" style="color:red;">The E-mail address already exists !!</div>',
		//'url' => 'profile.php',
	]);

}elseif ($signup_response === "pass_length"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-danger" style="color:red;">The password must be at least 4 digits or characters  !!</div>',
		//'url' => 'profile.php',
	]);
}
elseif ($signup_response === "pass_not_match"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-danger" style="color:red;">The password and confirm password do not match !!</div>',
		//'url' => 'profile.php',
	]);
}
elseif ($signup_response === "error"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-danger" style="color:red;">Your registeration is failed !!</div>',
		//'url' => 'profile.php',
	]);
}

