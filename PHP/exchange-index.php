<html>
<head>
<title>DATABASE</title>
<?php require_once('header.php'); ?>
<!-- My JS libraries -->
<script src="../js/exchange-index.js"></script>
</head>

<?php require_once('connection.php'); ?>

<body>

<div class="container-fluid mt-3 mb-3">
	<h4>Market Indices</h4>
	<div>
		<table id="table-exchange" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Market Exchange</th>
					<!-- <th>Index</th>
					<th>Index Symbol</th>
					<th>Date</th>
					<th>Market Value</th> -->
				</tr>
			</thead>
		</table>
	</div>
</div>

</body>
</html>