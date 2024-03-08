<?php
session_start();
require('connection.php');



	if (isset($_POST['submit'])) {

		
		$password= !empty(htmlentities($_POST['password']))? trim(htmlentities($_POST['password'])) : null;
			$name= !empty(htmlentities($_POST['name']))? trim(htmlentities($_POST['name'])) : null;
				$phone= !empty(htmlentities($_POST['phone']))? trim(htmlentities($_POST['phone'])) : null;

								$sql = 'SELECT * FROM corona WHERE name = :name && password = :password ';
								$stmt = $pdo->prepare($sql);
								$stmt->execute(['name'=>$name,'password'=>$password]);
								$post = $stmt->fetch();

								if($post === false){

													?>
														<h2>Failure!</h2>
											  
											  <div class="alert alert-danger alert-dismissible" id="myAlert">
											  	<p>No <strong>User exists</strong> by that name.</p>
											    <a href="index.php" class="close">&times;</a>
											    <strong>Hey <?php echo $name; ?>! check your phone/username</strong> and try again.
											  </div>
											</div> <?php }

											else{	
													date_default_timezone_set('Africa/Nairobi');
													$_SESSION['name']=$post->name;
														$_SESSION['phone']= $post->phone;
														$_SESSION['user_id'] = $post->id;
														$_SESSION['logged_in'] = time();
																?>
														<div class="alert alert-success" role="alert">
															 <a href="home.php" class="close" style="color: red;">&times;</a>
															  Successfully logged in!! at: <?php echo date("m/d/y h:i:sa", $_SESSION['logged_in']); ?> 

															</div><?php



										}


					



	}








?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="cyborg.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<nav>
	<h1>Login</h1>
			<div class="container">
				<h3>Login Account</h3>
				<form class="form-group" method="post" action="index.php">
					<div class="form-group">
					<label>name</label>
					</div>
					<div class="form-group">
					<input type="text" name="name" class="form-control"  placeholder="name">
					</div>
					<div class="form-group">
					<label>Phone</label>
					</div>
					<div class="form-group">
					<input type="text" name="phone" class="form-control" value="phone" placeholder="name">
					</div>

					<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" value="password" placeholder="password">
					</div>
					<button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Confirm login?');">Login</button>

					



				</form>



			</div>



	<div style="margin-top: 100px;"></div>


	<footer style="background-color: #21212d; height: 100px; margin: 0 auto; padding: 0;">
		
		<p style="color: white; text-align: center; margin: auto; display: block; padding-top: 20px;"> Kimani Website &copy; 2017</p>

		
	</footer>


</body>
</html>