<html>
<head>
<title>DATABASE Database</title>
<?php require_once('header.php'); ?>
<script src="../back.js" defer></script>
<link rel="stylesheet" href="../css/default.css">
<link rel="stylesheet" href="../css/slideshow.css">
</head>

<?php require_once('connection.php'); ?>


<body>
	
<!-- <video autoplay muted loop id="myVideo">
  <source src="../Videos/rain.mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video> -->

<ul class="slideshow">
    <li><span></span></li>
    <li><span></span></li>
    <li><span></span></li>
    <li><span></span></li>
    <li><span></span></li>
    <li><span></span></li>
    <li><span></span></li>
    <li><span></span></li>
    
</ul>

</div>
<div class="container mt-3 mb-3 no_new_line3"> 
DATABASE
</div>


<!-- <h2 ><div class="no_new_line"> -->
<div class="container mt-3 mb-3 no_new_line">
		<form method="post">
			<div class="row justify-content-center">
				<div class="col-7">
					<div class="form-group">
						<br>
						<h1 style="text-align: center">Log In</h1>
						<br>
						<label>Email:</label>
						<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
					</div>
					<br>
					<button id="submit" class="btn btn-primary" >Submit</button>

					<br>
					<br>
					<h6>Do not have an account? <a href = "signup.php">Sign Up</a></h6>
				</div>
			</div>
		</form>
	</div>

	<div class="container mt-3 mb-3 no_new_line_admin" style="font-weight: 100px;"> 
		Admin Log in<br>
		Email: test@vcu.edu<br>
		Password: test@vcu.edu
</div>


</div>
<!-- </h2> -->
	

</body>

</html>