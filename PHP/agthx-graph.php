<?php
    require_once ('connection.php');
    global $conn;
        
        $sqlQuery = "SELECT `record_date` as `Date`, `price` as `Price`, 
        `dividend` as `Dividend` FROM Mutual_Fund_Record
        WHERE Mutual_Fund = 'AGTHX'";
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
        
        $dataTable = array();
        
        while ($sqlRow = $stmt->fetch()) {
            $dataRow = array();
            
            $dataRow[] = $sqlRow['Date'];
            $dataRow[] = $sqlRow['Price'];
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