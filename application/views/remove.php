<html>
<head>
	<title>Edit Profile</title>
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/darkly/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="bootstrap.min.js"></script>
<?php $sessionuser = $this->session->userdata('user'); ?>
</head>
<body>
	<div class="container">
		<nav class="nav navbar-inverse">
		  <div class="container-fluid">
			<div class="navbar-header brand">CodingDojo Wall Home: </div>
				<ul class="nav navbar-nav">
					<li><a href=
					<?php if($sessionuser['user_level'] == 'admin'){
							echo "/admindash";
						} else
						{
							echo "/dashboard";
						}
					?>
					>Home</a></li>
					<li><a href="/users/edit/<?= $sessionuser['id']; ?>">Profile</a></li>
				</ul>
				<form action="/logout" method="post"><input type="submit" class="btn btn-default navbar-right" value="Log Off"></input></form>
		  </div>
		</nav>
	
			<div class="row">
				<h3>Are you sure you want to delete this user?</h3>
				<form action="/main/delete/<?php echo $user['id']; ?>">
				   <div class="panel-body">
				   	<h4 class="panel-title">Profile: <?php
		 echo $user['first_name'] . " " . $user['last_name']; ?></h4>
			    Registered at: <?= $user['created_at']; ?><br>
				User ID: <?= $user['id']; ?><br>
				Email Address: <?= $user['email']; ?><br>
				Description: <?= $user['description']; ?><br>
			  </div>
				<input type="submit" name="update" class="btn btn-default" value="Delete">
			</form>
			</div>
			</div>
		</div>
	</div>

</body>
</html>