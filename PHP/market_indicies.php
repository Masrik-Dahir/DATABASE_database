<html>
<head>
<title>DATABASE - Exchanges</title>
<?php require_once('header.php'); ?>
<link rel="stylesheet" href="../css/default.css">
<!-- My JS libraries -->
</head>

<?php require_once('connection.php'); ?>

<body>

<script src="../js/market_indicies.js"></script>

<div class="topnav">
  <a href="index.php">Home</a>
  <?php
  $stmt = $conn->prepare("SELECT Permission FROM `Users` WHERE ID=:ID");
  $stmt->bindValue(':ID', $_SESSION['user_ID']);
  $stmt->execute();
  $queryResult = $stmt->fetch();
  if ($queryResult['Permission'] == 1) {
  echo "<a href=\"user.php\">Users</a>"; } ?>
  <a href="etf-basic.php">ETF</a>
  <a href="mutual-fund-basic.php">Mutual Fund</a>
  <a href="option-basic.php">Option</a>
  <a href="cryptocurrency-basic.php">Cryptocurrency</a>
  <a class="active" href="exchange.php">Exchanges and Assets</a>
  <!-- <a class="right" href="logout.php">Log Out</a> -->
  <a class="color w3-text-teal;" href="logout.php" style="float: right; color:black;"> <bdi style="margin: 35px;">Log Out</bdi></a>
</div>

<div class="container-fluid mt-3 mb-3">
	<h4>Exchanges</h4>
	<div>
		<table id="table-exchange" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Exchange</th>
					<th>Index Symbol</th>
					<th>Name</th>
				</tr>
			</thead>
		</table>
	</div>
</div>

</body>

</html>