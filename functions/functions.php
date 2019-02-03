<?php


function debug($arg){
	echo "<pre>";
	print_r($arg);
	echo "</pre>";
	exit();
}


function generateCode(){
	$str = "$10AbzxsdertyqwopukmnbvchgfhMAZX&MNLKPRTY1234567890#$&%";
    $token_str = str_shuffle($str);
    $token = substr($token_str, 0, 15);
    return $token;
}

function recoveryPasswordEmailMessage($user){
	
	$url  = "http://localhost/phpajaxlogin/recovery-password.php?id=".$user->id;
	$url .= "&code=".$user->vcode;
	$msg = '<p>';
	$msg .= 'Hello '.$user->name;
	$msg .= '<br> We just recieved a request to send you password recovery link</p>';
	$msg .= '<p> Click on this link to reset you password</p>';
	$msg .= '<a href="'. $url .'">Recover Password</a></p>';
	$msg .= '<br><hr>';
	$msg .= 'If you did not send this request, Please just ignore this email';

	return $msg;

}