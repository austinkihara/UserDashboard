<html>
<head>
	<title>Admin Dash</title>
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/darkly/bootstrap.min.css">
<?php 
		$sessionuser = $this->session->userdata('user');?>
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
		$user = $this->session->userdata('user');
		echo $user['first_name'] . " " . $user['last_name'] ?>!</p><br>
		Admin Dashboard
		<table class="table table-striped table-hover">		
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>E-mail</th>
					<th>Created At</th>
					<th>User Level</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

<?php 
			foreach ($users as $user => $value) {
				echo "<tr><td>" . $value['id'] . "</td><td><a href='/users/show/" . $value['id'] . "'>". $value['first_name'] . " " . $value['last_name'] . "</a></td><td>" . $value['email'] . "</td><td>" . $value['created_at'] . "</td><td>" . $value['user_level'] . "</td><td><a href='/users/edit/".$value['id'],"'>Edit</a> | <a href='/remove/".$value['id']."'>Remove</a>" ."</td></tr>";
			} ?>
		</tbody>
		</table>
	</div>

</body>
</html>