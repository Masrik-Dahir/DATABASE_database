<?php 
	require_once('connection.php');
	$stmt = $conn->prepare("SELECT Permission FROM `Users` WHERE ID=:ID");
	$stmt->bindValue(':ID', $_SESSION['user_ID']);
	$stmt->execute();
	$queryResult = $stmt->fetch();
	if ($queryResult['Permission'] != 1){
		header("Location: http://cmsc508.com/~nguyenvt35/508-project-nguyenvt35-dahirma/PHP/denied.php");
	}
?>

<html>
<head>
<title>HR database - Employees</title>
<?php require_once('header.php'); ?>

<!-- Font Awesome library -->
<script src="https://kit.fontawesome.com/aec5ef1467.js"></script>

<!-- JS libraries for datatables buttons-->
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.5/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.5/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

<script src="../js/advanced-employee.js"></script>

<!-- CSS for datatables buttons -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css"/>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=georgia'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/icons.css">
    <link rel="stylesheet" href="../css/box.css">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/glowing.css">
    <link rel="stylesheet" href="../css/new.css">
    <link rel="stylesheet" href="../css/if.css">
</head>



<body>
<div class="topnav">
  <a href="index.php">Home</a>
  <a class="active" href="advanced-employee.php">Users</a>
  <a href="etf-basic.php">ETF</a>
  <a href="mutual-fund-basic.php">Mutual Fund</a>
  <a href="option-basic.php">Option</a>
  <a href="cryptocurrency-basic.php">Cryptocurrency</a>
  <a href="exchange.php">Exchanges and Assets</a>
  <a href="temp.php">Market Index</a>
  <!-- <a class="right" href="logout.php">Log Out</a> -->
  <a class="color w3-text-teal;" href="logout.php" style="float: right; color:black;"> <bdi style="margin: 35px;">Log Out</bdi></a>
</div>

<div class="container-fluid mt-3 mb-3">
	<h4>Employees</h4>
	
	<div class="pb-3">
		<button type="button" id="addEmployee" class="btn btn-primary btn-sm">Add Employee</button>
	</div> 
        	
	<div>
		<table id="table-employee" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Email Address</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Date of Birth</th>
					<th>Permission</th>
					<th>Actions</th>
				</tr>
			</thead>
		</table>
	</div>
</div>

<div id="employee-modal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="employee-form">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Employee</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">

					<?php
					$email_address = "";
					$first_name = "";
					$last_name = "";
					$date_of_birth = "";
					?>

						<label>Email</label> <input type="text" class="form-control" id="email_address" placeholder="Enter email" value="<?php echo $email_address; ?>" required>

						<label>Password</label> <input type="password" class="form-control" id="password" placeholder="Enter password" required>

						<label>First name</label><input type="text" class="form-control" id="first_name" placeholder="Enter first name" value="<?php echo $first_name; ?>" required>
						
						<label>Last name</label> <input type="text" class="form-control" id="last_name" placeholder="Enter last name" value="<?php echo $last_name; ?>" required>

						<label>Date of Birth</label> <input type="date" class="form-control" id="date_of_birth" placeholder="Enter Date of Birth" value="<?php echo $date_of_birth; ?>" required>

						
				</div>
				<div class="modal-footer">
					<input type="hidden" name="ID" id="ID"/>
					<input type="hidden" name="action" id="action" value=""/>
					<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
					<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>

</body>
</html>