<?php require_once('connection.php'); ?>
<?php
    global $conn;

        $sqlQuery = "SELECT `record_date` as `Date`, `high_price` as `High Price`, 
        `low_price` as `Low Price`, `avg_price` as `Avg Price`, `no_of_shares` as `No of Shares`, `dividend` as `Dividend` FROM ETF_Record
        WHERE ETF = 'AAPL'";

        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();

        $numberRows = $stmt->rowCount();
        
        $dataTable = array();
        
        while ($sqlRow = $stmt->fetch()) {
            $dataRow = array();
            
            $dataRow[] = $sqlRow['Date'];
            $dataRow[] = $sqlRow['High Price'];
            $dataRow[] = $sqlRow['Low Price'];
            $dataRow[] = $sqlRow['Avg Price'];
            $dataRow[] = $sqlRow['No of Shares'];
            $dataRow[] = $sqlRow['Dividend'];
            
            $dataTable[] = $dataRow;
        }
        
        $output = array(
            "recordsTotal" => $numberRows,
            "recordsFiltered" => $numberRows,
            "data" => $dataTable
        );

        
        echo json_encode($output);
        
?>