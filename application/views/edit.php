<html>
<head>
	<title>Edit Profile</title>
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/darkly/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="bootstrap.min.js"></script>
<?php $sessionuser = $this->session->userdata('user'); 
?>
</head>
<body>
	<div class="container">
		<nav class="nav navbar-inverse">
		  <div class="container-fluid">
			<div class="navbar-header brand">CodingDojo Wall Home: </div>
				<ul class="nav navbar-nav">
					<li><a href=<?php if($sessionuser['user_level'] == 'admin'){
							echo "/admindash";
						} else
						{
							echo "/dashboard";
						}
					?>>Home</a></li>
					<li><a href="/users/edit/<?= $sessionuser['id']; ?>">Profile</a></li>
				</ul>
				<form action="/logout" method="post"><input type="submit" class="btn btn-default navbar-right" value="Log Off"></input></form>
		  </div>
		</nav>
		<p class="nav navbar-nav text-primary">Welcome <?php
			echo $sessionuser['first_name'] . " " . $sessionuser['last_name'] ?>!</p><br>
		<h2>Edit Profile</h2>
		<?php echo $this->session->flashdata('edit'); ?>
		<div class="row">
			<div class="col-sm-5">
				<h3>Edit Information</h3>
				<form action="/main/updateuser/<?php echo $user['id']; ?>" method="post">
				<div class="form-group">
				    <label>Email address</label>
				    <input type="email" class="form-control input-sm" name="email" value="<?php echo $user['email']; ?>">
				</div>
				<div class="form-group">
					<label>First Name</label>
				    <input type="text" class="form-control input-sm" name="first_name" value="<?php echo $user['first_name']; ?>">
				</div>
				<div class="form-group">
				    <label>Last Name</label>
				    <input type="text" class="form-control input-sm" name="last_name" value="<?php echo $user['last_name']; ?>">
				</div>
			</div>
			<div class="col-sm-5">
				<h3>Change Password</h3>	
				<div class="form-group">
				    <label>Password</label>
				    <input type="password" class="form-control input-sm" name="password" value="">
				</div>
				<div class="form-group">
				    <label>Confirm Password</label>
				    <input type="password" class="form-control input-sm" name="confirmpassword" value="">
				</div>
			</div>
			<div class="row">
				<h3>Edit Description</h3>
				<div class="form-group">
				    <label>Description</label>
				    <input type="text" class="form-control input-sm" name="description" value="<?php echo $user['description']; ?>">
				</div>	
				<input type="hidden" name="id" value="<?php echo $user['id']; ?>">	
				<input type="submit" name="update" class="btn btn-default" value="Update">
			</form>
			</div>
		</div>
	</div>

</body>
</html>