<html>
<head>
	<title>register</title>
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/darkly/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
	<?php echo $this->session->flashdata('registration'); ?>
		<div class="register">
			<h1>Register:</h1>
			<form action="/main/registercheck" method="post">
			  <input type="hidden" name="action" value="register">
			  <div class="form-group">
			    <label>First Name</label>
			    <input type="text" class="form-control input-sm" name="first_name">
			  </div>
			  <div class="form-group">
			    <label>Last Name</label>
			    <input type="text" class="form-control input-sm" name="last_name">
			  </div>				
			  <div class="form-group">
			    <label>Email address</label>
			    <input type="text" class="form-control input-sm" name="email">
			  </div>
			  <div class="form-group">
			    <label>Password</label>
			    <input type="password" class="form-control input-sm" name="password">
			  </div>
			  <div class="form-group">
			    <label>Confirm Password</label>
			    <input type="password" class="form-control input-sm" name="confirm">
			  </div>
			  <button type="submit" class="btn btn-default">Register</button>
			</form><br>
		</div>
	</div>
</body>
</html>