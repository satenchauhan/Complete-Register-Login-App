<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP OOP Login Example Using AJAX jQuery</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
	<div class="container-fluid main">
		<nav class="navbar navbar-inverse navbar-fixed-top">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		   <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Saten</a>
		   </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		   <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav navbar-right">
		       <li class="nav-item">
	              <a class="nav-link text-white" href="#" data-toggle="modal" data-target="#change-password">Change Password</a>
	            </li>
	            <li class="nav-item">
	              <a class="nav-link text-white" href="logout.php">Logout</a>
	            </li>
		      </ul>
		    </div><!-- /.navbar-collapse
		  </div><!-- /.container-fluid -->
		</nav><br><br>
		</div>
<!-- change password -->
	 <div class="row">
		<div class="col-lg-4 col-lg-offset-4">
			<center><h1  class="modal-title btn-primary form-control" style="font-size: 20px; height: 40px;">Reset Password</h1></center><br>
		   <div class="modal-body">
			<form class="form" method="POST" action="reset-password.php">
				<input type="hidden" name="id" value="<?=$_GET['id']; ?>">
				<input type="hidden" name="code" value="<?=$_GET['code']; ?>">
			  <div class="form-group">
			    <label for="npassword">New Password</label>
			    <input type="password" class="form-control" name="npassword" id="npassword" placeholder="New Password">
			  </div>
			  <div class="form-group">
			    <label for="cpassword">Confirm Password</label>
			    <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm New Password">
			  </div>	
			  <button type="submit" class="btn btn-primary">Reset Password</button>
			</form>
		   </div>
		  <div class="modal-footer">

	    </div>
	   </div>
	  </div>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>