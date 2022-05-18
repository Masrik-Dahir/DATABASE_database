<html>
<head>
<title>DATABASE Database</title>
<?php require_once('header.php'); ?>
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

<div class="container mt-3 mb-3 no_new_line_signup_header"> 
DATABASE
</div>

	<div class="container mt-3 mb-3 no_new_line_signup_main">
		<form method="post">
			<div class="row justify-content-center">
				<div class="col-7">
					<div class="form-group">
						<br>
						<h1 style="text-align: center">Sign Up</h1>
						<label>Email:</label>
						<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $email; ?>" required>
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="<?php echo $passw; ?>" required>
					</div>
                    <div class="form-group">
						<label>First Name:</label>
						<input type="text" class="form-control" id="first" placeholder="Enter First Name" name="first" value="<?php echo $first_name; ?>" required>
					</div>
                    <div class="form-group">
						<label>Last Name:</label>
						<input type="text" class="form-control" id="last" placeholder="Enter Last Name" name="last" value="<?php echo $last_name; ?>" required>
					</div>
                    <div class="form-group">
						<label>Date of Birth:</label>
						<input type="date" class="form-control" id="birth" placeholder="Enter Birth Date" name="birth" value="<?php echo $date_of_birth; ?>" required>
					</div>
					<br>
					<button id="submit" class="btn btn-primary">Create Account</button>

					<!-- <script type="text/javascript">
						document.getElementById("submit").onclick = function () {
							location.href = "index.php";
						};
					</script> -->

					<br>
					<br>
					<h6>Already have an account? <a href = "index.php">Log In</a></h6>
				</div>
			</div>
		</form>
	</div>

</body>
</html>