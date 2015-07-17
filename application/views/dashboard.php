<html>
<head>
	<title>Dashboard</title>
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/darkly/bootstrap.min.css">
<?php 
		$sessionuser = $this->session->userdata('user');?>
</head>
<body>
	<div class="container">
		<nav class="nav navbar-inverse">
		  <div class="container-fluid">
			<div class="navbar-header brand">Book Review: 
			</div>
				 
			<ul class="nav navbar-nav">
				<li><a href="/dashboard">Home</a></li>
				<li><a href="/users/edit/<?= $sessionuser['id']; ?>">Profile</a></li>
			</ul>
				<form action="/logout" method="post"><input type="submit" class="btn btn-default navbar-right" value="Log Off"></input></form>
		  </div>
		</nav>
		<p class="nav navbar-nav text-primary">Welcome <?php 
		$sessionuser = $this->session->userdata('user');
		echo $sessionuser['first_name'] . " " . $sessionuser['last_name'] ?>!</p><br>

		ALL USERS:
		<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>E-mail</th>
				<th>Created At</th>
				<th>User Level</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			foreach ($users as $user => $value) {
				echo "<tr><td>" . $value['id'] . "</td><td><a href='/users/show/" . $value['id'] . "'>". $value['first_name'] . " " . $value['last_name'] . "</a></td><td>" . $value['email'] . "</td><td>" . $value['created_at'] . "</td><td>" . $value['user_level'] . "</td></tr>";
			} ?>
		</tbody>
		</table>
	</div>
</body>
</html>