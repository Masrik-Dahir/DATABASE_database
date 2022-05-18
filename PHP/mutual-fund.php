<html>
<head>
<title>Mutual Funds</title>
<?php require_once('header.php'); ?>
<!-- My JS libraries -->
<script src="js/mutual-fund.js"></script>
</head>

<?php require_once('connection.php'); ?>

<body>

<div class="container-fluid mt-3 mb-3">
	<h4>Mutual Funds</h4>
	<div>
		<table id="table-mutual-fund" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Symbol</th>
					<th>Mutual Fund</th>
					<th>Date</th>
					<th>Net Asset Value</th>
					<th>Dividend</th>
				</tr>
			</thead>
		</table>
	</div>
</div>

</body>
</html>