<?php
require_once 'init/init.php';

session_start();

if (isset($_SESSION['signed_in'])) {

	$_SESSION = []; //

	 setcookie(session_name(), session_id(), time()-1000, "/");

	 session_destroy();
	 header('Location:index.php');
}
else{

  header('Location:index.php?error=please login');

}




















