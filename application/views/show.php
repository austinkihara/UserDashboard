<html>
<head>
	<title>Profile</title>
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/darkly/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="bootstrap.min.js"></script>
</head>
<body>
	<div class="container container-fluid">
		<!-- Nav bar -->
		<nav class="nav navbar-inverse">
		  <div class="container-fluid">
			<div class="navbar-header brand">
				CodingDojo Wall Home: 
			</div>
			<p class="nav navbar-nav text-primary">
				Welcome <?php 
		$sessionuser = $this->session->userdata('user');
		echo $sessionuser['first_name'] . " " . $sessionuser['last_name'] ?>
			!</p>
			<ul class="nav navbar-nav">
				<li><a href="<?php if($sessionuser['user_level'] == 'admin'){
							echo "/admindash";
						} else
						{
							echo "/dashboard";
						}
					?>">Home</a></li>
				<li><a href="/users/edit/<?= $sessionuser['id']; ?>">Profile</a></li>
			</ul>
			<form action="/logout" method="post"><input type="submit" class="btn btn-default navbar-right" value="Log Off"></input></form>
		  </div>
		</nav>
		<!-- User info listed -->
		
		<div class="row">
			<div class="panel panel-primary">
			  <div class="panel-heading">
			    <h3 class="panel-title">Profile: <?php
		 echo $user['first_name'] . " " . $user['last_name']; ?></h3>
			  </div>
			  <div class="panel-body">
			    Registered at: <?= $user['created_at']; ?><br>
				User ID: <?= $user['id']; ?><br>
				Email Address: <?= $user['email']; ?><br>
				Description: <?= $user['description']; ?><br>
			  </div>
			</div>
			
		</div>
		<div clas="row">
			<h4>Leave a Message for <?php echo $user['first_name']; ?></h4>
		<!-- POST message YOU ARE HERE -->
		<div class="post col-sm-12">
			<form action="/main/message_post/<?= $sessionuser['id']; ?>" method="post">
			<input type="hidden" name="wall_id" value="<?= $user['id'] ?>">
			  <div class="form-group">
			  	<label>Message</label>
			    <input type="text" class="form-control input-sm" name="message">
			    <button type="submit" class="btn btn-default">Post Message</button>
			  </div>
			</form>
		</div>
		<!--Loop through and list messages -->
		<?php 
		// var_dump($comments);
		// var_dump($messages);
		foreach($messages as $message)
			{
				echo "<h4><p class='text-info'>" . $message['first_name'] ." ". $message['last_name'] . " - " . $message['created_at'] ." - ". $message['message'] . "</h4></p>";

				foreach($comments as $comment){
					if($comment['message_id'] == $message['id'])
					{
						echo $comment['first_name']." ".$comment['last_name']."@ ".$comment['created_at']." - ".$comment['comment']."<br>";
					}	
				}

				echo "<form action='/main/comment_post/".$sessionuser['id']."' method='post'><input type='hidden' name='message_id' value='".$message['id']."'><input type='hidden' name='user_id' value='".$sessionuser['id']."'><input type='hidden' name='wall_id' value='".$user['id']."'><input type='text' name='comment'><button type='submit' class='btn btn-default'>Post A Comment</button></form>";

			}

		 ?>
	</div>
</div>


</body>
</html>