<!DOCTYPE html>
<html>
	<head>
		<title>Sign In</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<!-- <link rel="stylesheet" href="application/views/HeaderNFooter/style.css"> -->
	</head>
	<style>
		body {
		background-color: #fda4ba; /* For browsers that do not support gradients */
		background-image: linear-gradient(#fda4ba, #CC4576);
		width: 100%;
		height: 100vh;
		color: #ffff;
		}

		#example1 {
		border: 1px;
		padding: 30px;
		box-shadow: 0px 0px 40px rgb(99, 51, 68, 0.5);
		border-radius: 10px;
		}
	</style>
	<body>
		<div class="container-fluid">
			<br>
			<br>
			<div class="row justify-content-md-center" >
				<div class="col-md-4 col-md-offset-4" id="example1">
					<form action="<?php echo site_url('Login/auth'); ?>" method="POST" >
					<img src="https://i.imgur.com/WGz8BdN.png" alt="profile picture" class="img-fluid  my-3 p-1 d-none d-md-block"/>
						<h3 style="text-align:center; padding:10px;"> Please sign in</h3>
					<div class="form-group">
						<label for="exampleInputUsername">Username</label>
						<input type="username" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Username">
					</div>
					<div class="form-group" >
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
					</div>
					<button type="submit" class="btn  btn-info" style="background-color:#f587a2; border:none;" >Sign In</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>