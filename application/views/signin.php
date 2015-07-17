<html>
<head>
	<title>sign in</title>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/darkly/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		
	<?php echo $this->session->flashdata('login'); ?>
		<div class="login">
			<h1>Login:</h1>
			<form action="/main/logincheck" method="post">
			  <input type="hidden" name="action" value="loginform">
			  <div class="form-group">
			    <label>Email address</label>
			    <input type="email" class="form-control" name="login">
			  </div>
			  <div class="form-group">
			    <label>Password</label>
			    <input type="password" class="form-control" name="pw">
			  </div>
			  <button type="submit" class="btn btn-default">Login</button>
			</form>
		</div>
	<a href="/register">Don't Have an account? Register</a> 	
	</div>

</body>
</html>