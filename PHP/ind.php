<html>
<head>
<title>Masrik Dahir</title>
<?php require_once('header.php'); ?>
<?php require_once('connection.php'); ?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>


<body class="w3-white">

<?php

$sqlQuery = "SELECT id, first_name, last_name, date_of_birth FROM Users;";
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
        $dataTable = array();
        
        while ($sqlRow = $stmt->fetch()) {
            $dataRow = array();
            
            $dataRow[] = $sqlRow['id'];
            $dataRow[] = $sqlRow['first_name'];
            $dataRow[] = $sqlRow['last_name'];
            $dataRow[] = $sqlRow['date_of_birth'];
            
            $dataTable[] = $dataRow;
        }
        
        $output = array(
            "recordsTotal" => $numberRows,
            "recordsFiltered" => $numberRows,
            "data" => $dataTable
        );
        echo json_encode($output);
        echo "<br><br>";

        echo "<pre>";
        print_r($output);
        echo "</pre>";
        
?>

</body>
</html>
