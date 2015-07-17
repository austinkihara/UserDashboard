<html>
<head>
	<title>Main</title>
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/darkly/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="bootstrap.min.js"></script>
</head>
<body>
	<nav class="nav navbar-inverse">
	  <div class="container-fluid">
		<div class="navbar-header brand">CodingDojo Wall Home: </div>
			 <p class="nav navbar-nav text-primary">Welcome !</p>
			<form action="/main/signin" method="post"><input type="submit" class="btn btn-default navbar-right" value="Sign In"></input></form>
	  </div>
	</nav>
	<div class="jumbotron">
		<div class="container">
			<p class="text-primary"><?php echo $this->session->flashdata('logout'); ?></p>
			<h2>Welcome to the Wall</h2><p class="text-info">This app was built with the codingDojo folks!</p>
			
			<div class="row">
				<div class="col-md-3">
					<h3>Manage Users</h3>
					<p>Using the application you can add remove and edit users for the application.</p>
				</div>
				<div class="col-md-3">
					<h3>Leave Messages</h3>
					<p>Users will be able to leave a message to another user using the application.</p>
				</div>
				<div class="col-md-3">
					<h3>Edit User Information</h3>
					<p>Admins can edit information.</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>