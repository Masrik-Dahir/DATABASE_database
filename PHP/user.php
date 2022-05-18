<html>
<head>
<title>DATABASE - Users</title>
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

<script src="../js/backup.js"></script>

<!-- CSS for datatables buttons -->
<link rel="stylesheet" href="../css/default.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css"/>
</head>

<?php require_once('connection.php'); ?>

<body>
<div class="topnav">
  <a href="index.php">Home</a>
  <?php
  $stmt = $conn->prepare("SELECT Permission FROM `Users` WHERE ID=:ID");
  $stmt->bindValue(':ID', $_SESSION['user_ID']);
  $stmt->execute();
  $queryResult = $stmt->fetch();
  if ($queryResult['Permission'] == 1) {
  echo "<a class=\"active\" href=\"user.php\">Users</a>"; } ?>
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
	<h4>Users</h4>
	
	<div class="pb-3">
		<button type="button" id="addUser" class="btn btn-primary btn-sm">Add Admin</button> &nbsp; 	
		<button type="button" id="deleteUser" class="btn btn-primary btn-sm">Delete User</button>
	</div> 
	<div>
		<table id="table-user" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>DOB</th>
					<th>Permission</th>
					<th>Phone Number</th>
					<th>Brokerage</th>
					<th>Action</th>
				</tr>
			</thead>
		</table>
	</div>
</div>



<div id="user-modal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user-form">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit User</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>First name</label><input type="text" class="form-control" id="first_name" placeholder="Enter first name" required>
						
						<label>Last name</label> <input type="text" class="form-control" id="last_name" placeholder="Enter last name" required>
						
						<label>Email</label> <input type="email" class="form-control" id="email_address" placeholder="Enter email" required>

						<label>Address</label> <input type="date" class="form-control" id="date_of_birth" placeholder="Enter date of birth" required>
						
						<!-- <label>Salary</label> <input type="number" class="form-control" min="0.01" step="0.01" size="8" value="0" id="salary"> -->
						
						<!-- <label>Job</label> -->



						
					</div>
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