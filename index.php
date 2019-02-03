<?php session_start();
 if (isset($_SESSION['signed_in'])) {
 	header('Location:profile.php');
 }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,
	 shrink-to-fit=no">
	<title>PHP AJAX OOP LOGIN</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	
</head>
<body>

	 <div class="container-fluid main" style="margin-top: 50px;">
		 <nav class="navbar navbar-inverse navbar-fixed-top">
		  <div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Saten Chauhan</a>
		    </div>
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">     
		    <ul class="nav navbar-nav navbar-right text-white">
		        <li class="nav-item ">
                  <a class="nav-link text-white" href="index.php">Home</a>
	            </li>          
	            <li class="nav-item">
	              <a class="nav-link text-white" href="#">Admin</a>
	            </li>
	            <li class="nav-item">
	              <a class="nav-link text-white" href="#" data-toggle="modal" data-target="#login">Login</a>
	            </li>
	            <li class="nav-item">
	              <a class="nav-link text-white" href="#" data-toggle="modal" data-target="#signup" >Sign Up</a>
	            </li>
	            <li class="nav-item">
	              <a class="nav-link text-white" href="logout.php">Logout</a>
	            </li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
<!-- jumbotron -->
        <center><h1 class="btn-primary  text-white form-control" style="height: 60px; font-size: 30px;">Home</h1></center>
		<div class="jumbotron">
			<center><h5><?php if (isset($_GET['success'])) {
			echo '<div class="alert alert-success style="color:green;"> You are registered successfully</div>';}elseif (isset($_GET['sent'])) {
			echo  '<div class="alert alert-info style="color:green;">We have sent you an email for reset password link !! Please check your email </div>';
			}
		 ?></h5></center>
		   <div class="row">
            <div class="col-md-6"><img src="pic/pic32.jpg"  width="100%"></div>
            <div class="col-md-6"><img src="pic/pic37.jpg" width="100%"></div>
           </div>
		  <p>We welcome you to our awesome website where you can learn about AJAX login, signup, reset password and forgot password</p>
		  <center><a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#signup">Register</a>
		  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#login">Login</a>
		</center>
		
		</div>
	</div>

	<!-- Login box -->
	<div class="modal fade my-modal" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;&nbsp;</span></button>
	      <div class="modal-header">
	        &nbsp;<center><h4 class="modal-title btn-primary form-control" id="myModalLabel">Login to your account</h4></center>
	      </div>
	      <div class="modal-body">
	      <form class="form" method="POST" action="login.php">
           <div class="form-group">
             <label for="email">Email:</label>
             <input type="text" class="form-control" name="email" id="email" placeholder="exampl@gmail.com">
           </div>
           <div class="form-group">
              <label for="password">Password:</label>
              <input type="password"  name="password" id="password" class="form-control" placeholder="Please Enter Your Password">
           </div>
		   <br>
           <div class="form-group">
            <center><input type="submit" name="login" class="btn btn-primary" value="Login">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary"><a href="index.php" style="color:white;">Back to Home</a></button><br><br>
            <a href="#" id="forget-password" class="primary text-white" data-toggle="modal" data-target="#send-password-link">Forgot Password ?</a></center>
           </div>
          </form>        
	    </div>
	    <div class="modal-footer"> 


	  </div>
	 </div>
	 </div>
	</div>
	 
<!-- /Login box -->

<!-- signup box -->
	
    <div class="modal fade my-modal" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: darkblue;">&times;&nbsp;</span></button>
	      <div class="modal-header">
	        &nbsp;<center><h4 class="modal-title btn-primary form-control" id="myModalLabel">Signup for a new account</h4></center>
	      </div>
	      <div class="modal-body">
	        <form class="form" method="POST" action="signup.php">
			 
           <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Full Name">
          </div>
           <div class="form-group">
            <label for="country">Country :</label>
            <input type="text" class="form-control" name="country" id="country" placeholder="Enter Your  Country Name">
           </div>
          <div class="form-group">
            <label for="username">Username :</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Enter Your  Username">
           </div>
           <div class="form-group">
             <label for="email">Email :</label>
             <input type="text" class="form-control" name="email" id="email" placeholder="exampl@gmail.com">
           </div>          
           <div class="form-group">
              <label for="password">Password :</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password">
           </div>
           <div class="form-group">
              <label for="cpassword">Confirm Password :</label>
              <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder=" Re-Enter Your Password">
           </div>        
           <center><input type="submit" name="signup" value="Sign Up" class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php" class="btn btn-primary">Cancel</a>
            </center> <br>
            <center><a href="login.php"><b>Already Registered</b> !!</a></center>            
          </form> 
	      </div>
	      <div class="modal-footer">
	         
      </div>
    </div>
   </div>
  </div>
<!-- /Registeration form -->
<!-- Reset Password -->
   <div class="modal fade my-modal" id="send-password-link" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: darkblue;">&times;&nbsp;</span></button>
	      <div class="modal-header">
	        &nbsp;<center><h4 class="modal-title btn-primary form-control" id="myModalLabel">Send Password Reset Link </h4></center>
	      </div>
	      <div class="modal-body">
	       <form class="form" method="POST" action="send-password-link.php">
            <div class="form-group">
             <label for="email">Email:</label>
             <input type="text" class="form-control" name="email" id="email" placeholder="exampl@gmail.com">
           </div><br>
           <div class="form-group">
            <center><button type="submit"  class="btn btn-primary">Send Password Link</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary"><a href="index.php" style="color:white;">Back to Home</a></button><br><br>
           </center>
           </div>
          </form>	         
	    </div>
	    <div class="modal-footer"> 	
	  </div>
	 </div>
	 </div>
	</div>
<!-- /Reset Password -->

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>