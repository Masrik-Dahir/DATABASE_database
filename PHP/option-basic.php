<html>
<head>
<title>DATABASE</title>
<?php require_once('header.php'); ?>
<link rel="stylesheet" href="../css/default.css">
<!-- My JS libraries -->
<script src="../js/option-basic.js"></script>
</head>

<?php require_once('connection.php'); ?>

<body>
<div class="topnav">
  <a href="index.php">Home</a>
  <a href="advanced-employee.php">Users</a>
  <a href="etf-basic.php">ETF</a>
  <a href="mutual-fund-basic.php">Mutual Fund</a>
  <a class="active" href="option-basic.php">Option</a>
  <a href="cryptocurrency-basic.php">Cryptocurrency</a>
  <a href="exchange.php">Exchanges and Assets</a>
  <a href="temp.php">Market Index</a>
  <!-- <a class="right" href="logout.php">Log Out</a> -->
  <a class="color w3-text-teal;" href="logout.php" style="float: right; color:black;"> <bdi style="margin: 35px;">Log Out</bdi></a>
</div>
<div class="container-fluid mt-3 mb-3">
	<h4>Options</h4>
	<div>
		<table id="table-option" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Symbol</th>
					<th>Expiration Date</th>
					<th>Strike Price</th>
          <th>Put/Call</th>
					<th>Asset Class</th>
				</tr>
			</thead>
		</table>
	</div>
</div>

<form method="post">
    <div>
        <select name="type" onchange="this.form.submit();" id="type">
            <option value="" selected>Select One of the Options Below</option>
            <option value="present">See Ongoing Options</option>
            <option value="past">See Expired Options</option>
            <option value="all">See All Options</option>
        </select>
    </div>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $type = $_POST['type'];
  if (strcmp($type, "past") == 0) {
    echo "<script src=\"../js/option-basic-expired.js\"></script>";
  } else if (strcmp($type, "present") == 0) {
    echo "<script src=\"../js/option-basic-ongoing.js\"></script>";
  } else if (strcmp($type, "all") == 0) {
    echo "<script src=\"../js/option-basic-all.js\"></script>";
  }
}
?>

</body>
</html>
