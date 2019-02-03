<?php session_start();
 if (!isset($_SESSION['signed_in'])) {
 	header('Location:index.php');
 }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP OOP Login Example Using AJAX jQuery</title>
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
		      <a class="navbar-brand" href="#"><?= $_SESSION['signed_in']['name']; ?></a>
		    </div>
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">     
		    <ul class="nav navbar-nav navbar-right text-white">
	            <li class="nav-item">
	              <a class="nav-link text-white" href="#" data-toggle="modal" data-target="#change-password">Change Password</a>
	            </li>
	            <li class="nav-item">
	              <a class="nav-link text-white" href="logout.php">Logout</a>
	            </li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav><br>

       <div class="jumbotron">
        <?php if (isset($_GET['success'])) {
			echo '<div class="alert alert-success style="color:green;">Your password has been changed</div>';
		} ?>
	      <div class="row">
		   <div class="col-lg-2">
			  <h1>Profile</h1><span>Welcome:&nbsp;<?= ucwords($_SESSION['signed_in']['name']); ?></span>
		   </div>
		   <div class="col-lg-10">
		   <center><img src="pic/pic37.jpg" style="width:40%; box-shadow: 0px 0px 15px 1px rgba(61,57,61,0.97);" class="img-thumbnail" name="profile-image" id="profile-image">
		   </center>
		   </div>
		</div>
	    
        <div><center><h3>Profile Details</h3></center><br></div>
         <table class="table table-bordered">
           <tr>
             <th width="10%" style="width: 50px;"><b>User ID:</b></th>
             <td><?= $_SESSION['signed_in']['id']; ?></td>
             <th width="10%" ><b>Country:</b></th>
             <td><?= ucfirst($_SESSION['signed_in']['country']); ?></td>
           </tr>
           <tr>
             <th width="10%"><b>Full Name:</b></th>
             <td><?= ucwords($_SESSION['signed_in']['name']); ?></td>
             <th>Joined Date</th>
             <td><?= $_SESSION['signed_in']['joined_at']; ?></td>
           </tr>
           <tr>
             <th width="10%"><b>Username:</b></th>
             <td><?= $_SESSION['signed_in']['username']; ?></td>
             <th width="10%" ><b>E-mail:</b></th>
             <td ><?= $_SESSION['signed_in']['email']; ?></td>
           </tr>
         </table>
		</div>


	<!-- change password box -->	
	<div class="modal fade my-modal" id="change-password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	    	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: darkblue;">&times;&nbsp;</span></button>
	      <div class="modal-header">&nbsp;
	        <center><h4 class="modal-title btn-primary form-control" id="myModalLabel">Change your password</h4></center>
	      </div>
	      <div class="modal-body">
	        <form class="form" method="POST" action="changepass.php">
			  <div class="form-group">
			    <label for="oldpassword">Old Password</label>.php
			    <input type="password" class="form-control" name="oldpassword" id="oldpassword" placeholder="Old Password">
			  </div>
			  <div class="form-group">
			    <label for="npassword">New Password</label>
			    <input type="password" class="form-control" name="npassword" id="npassword" placeholder="New Password">
			  </div>
			  <div class="form-group">
			    <label for="cpassword">Confirm Password</label>
			    <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder=" Confirm New Password">
			  </div>	
			  <center><button type="submit" name="submit" class="btn btn-primary">Save Changes</button></center>
			</form>
	       </div>
	       <div class="modal-footer">
	        
	        
	     </div>
	    </div>
	  </div>
	</div>

	<!-- /change password box -->

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>