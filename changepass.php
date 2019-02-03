<?php

require_once 'init/init.php';


$response = $user->change_password($_POST, $dbcon);


if ($response === "success"){
	echo json_encode([
		'success' => 'success',
		'message' => '<div class="alert alert-success style="color:green;">The password has been changed</div>',
		'url'  => 'profile.php?success',
	]);

}elseif ($response === "required_field"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-info" style="color:red;">All the fields are mandatory !!</div>',
		//'url' => 'profile.php',
	]);

}elseif ($response === "old_pass_not_match"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-danger" style="color:red;">Incorrect old password ! <span style="color:green;">Please write correct old password !!</span></div>',
	]);

}elseif ($response === "pass_length"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-danger" style="color:red;">The password must be at least 4 digits or characters  !!</div>',
		//'url' => 'profile.php',
	]);
}
elseif ($response === "pass_not_match"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-danger" style="color:red;">The new password and confirm password do not match !!</div>',
		//'url' => 'profile.php',
	]);
}
elseif ($response === "error"){
	echo json_encode([
		'error'   => 'error',
		'message' => '<div class="alert alert-danger" style="color:red;">Failed to change password!!</div>',
		//'url' => 'profile.php',
	]);
}

