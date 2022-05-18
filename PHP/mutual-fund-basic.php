<html>
<head>
<title>DATABASE</title>
<?php require_once('header.php'); ?>
<link rel="stylesheet" href="../css/default.css">
<!-- My JS libraries -->
</head>
<?php 
?>
<?php require_once('connection.php'); ?>
<body>
<div class="topnav">
  <a href="index.php">Home</a>
  <a href="advanced-employee.php">Users</a>
  <a href="etf-basic.php">ETF</a>
  <a class="active" href="mutual-fund-basic.php">Mutual Fund</a>
  <a href="option-basic.php">Option</a>
  <a href="cryptocurrency-basic.php">Cryptocurrency</a>
  <a href="exchange.php">Exchanges and Assets</a>
  <a href="temp.php">Market Index</a>
  <!-- <a class="right" href="logout.php">Log Out</a> -->
  <a class="color w3-text-teal;" href="logout.php" style="float: right; color:black;"> <bdi style="margin: 35px;">Log Out</bdi></a>
</div>
<div class="container-fluid mt-3 mb-3">
	<h4>Mutual Funds</h4>
	<div>
		<table id="table-mutual-fund" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Symbol</th>
					<th>Mutual Fund</th>
					<th>Date</th>
					<th>Price</th>
					<th>Dividend</th>
				</tr>
			</thead>
		</table>
	</div>
</div>

<form method="post">
    <div>
        <select name="type" onchange="this.form.submit();" id="type">
            <option value="" selected>Select One of the Options Below</option>
            <option value="present">See Most Recent Mutual Fund Prices</option>
            <option value="all">See All Mutual Fund Prices</option>
        </select>
    </div>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $type = $_POST['type'];
  if (strcmp($type, "present") == 0) {
    echo "<script src=\"../js/mutual-fund-basic.js\"></script>";
  } else if (strcmp($type, "all") == 0) {
    echo "<script src=\"../js/mutual-fund-all.js\"></script>";
  }
}
?>
</body>
</html>