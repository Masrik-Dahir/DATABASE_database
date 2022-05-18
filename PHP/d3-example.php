<html>
<head>
<title>HR database - D3.js example</title>
<?php require_once('header.php'); ?>
<link rel="stylesheet" href="../css/d3-example.css">

<!-- My JS libraries -->
<script src="https://d3js.org/d3.v7.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>
<script src="../js/d3-example.js"></script>


</head>

<?php require_once('connection.php'); ?>

<body>
<p>The graph</p>
<div class="container-fluid mt-3 mb-3">
	<svg id="container"></svg>
</div>

</body>

</html>