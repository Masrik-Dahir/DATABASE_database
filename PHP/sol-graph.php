<?php
    require_once ('connection.php');
    global $conn;
        
        $sqlQuery = "SELECT `record_date` as `Date`, `price` as `Price`, 
        `total_supply` as `Total Supply`, `market_cap` as `Market Cap` FROM Cryptocurrency_Record
        WHERE Cryptocurrency = 'SOL';";
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
        
        $dataTable = array();
        
        while ($sqlRow = $stmt->fetch()) {
            $dataRow = array();
            
            $dataRow[] = $sqlRow['Date'];
            $dataRow[] = $sqlRow['Price'];
            $dataRow[] = $sqlRow['Total Supply'];
            $dataRow[] = $sqlRow['Market Cap'];
            
            $dataTable[] = $dataRow;
        }
        
        $output = array(
            "recordsTotal" => $numberRows,
            "recordsFiltered" => $numberRows,
            "data" => $dataTable
        );
        
        echo json_encode($output);

?>