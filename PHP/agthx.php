<!DOCTYPE HTML>
<html>
<?php require_once('header.php'); ?>
<?php require_once('connection.php'); ?>
<head>
<link rel="stylesheet" href="../css/default.css">
<script>
window.onload = function() {
 
var dataPoints = [];
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	zoomEnabled: true,
	title: {
		text: "American Funds Growth Fund of America - 2022"
	},
	axisY: {
		title: "Price in USD",
		titleFontSize: 24,
		prefix: "$"
	},
	data: [{
		type: "line",
		yValueFormatString: "$#,##0.00",
		dataPoints: dataPoints
	}]
});
 
function addData(data) {
	var dps = data.data;
	for (var i = 0; i < dps.length; i++) {
		dataPoints.push({
			x: new Date(dps[i][0]),
			y: dps[i][1]
		});
	}
	
	chart.render();
}

$.getJSON("agthx-graph.php", addData);
 
}


</script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js" defer></script>
</head>
<body>
<div class="topnav">
  <a href="index.php">Home</a>
  <a href="advanced-employee.php">Users</a>
  <a href="etf-basic.php">ETF</a>
  <a href="mutual-fund-basic.php">Mutual Fund</a>
  <a href="option-basic.php">Option</a>
  <a href="cryptocurrency-basic.php">Cryptocurrency</a>
  <a href="exchange.php">Exchanges and Assets</a>
  <a href="temp.php">Market Index</a>
  <!-- <a class="right" href="logout.php">Log Out</a> -->
  <a class="color w3-text-teal;" href="logout.php" style="float: right; color:black;"> <bdi style="margin: 35px;">Log Out</bdi></a>
</div>
<br>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>


</body>
<script src="../js/agthx.js"></script>

<div class="container-fluid mt-3 mb-3">
	<h4>ETFs</h4>
	<div>
		<table id="ttemp" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Date</th>
					<th>Price</th>
					<th>Dividend</th>
				</tr>
			</thead>
		</table>
	</div>
</div>


</html>   



