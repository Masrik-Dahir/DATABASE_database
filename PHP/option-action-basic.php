<?php
require_once ('connection.php');

class Option
{
    public function listAllOptions()
    {
        global $conn;

        $sqlQuery = "SELECT ETF_symbol as `Symbol`, 
            expiration_date as `Date`, 
            strike_price as `Strike Price`, 
            CASE PC 
                WHEN 0 THEN 'Put'
                WHEN 1 THEN 'Call'
            END as `PC`,
            asset_class as `Asset Class` 
        FROM Stock_Option";
    
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
        $dataTable = array();
        
        while ($sqlRow = $stmt->fetch()) {
            $dataRow = array();
            
            $dataRow[] = $sqlRow['Symbol'];
            $dataRow[] = $sqlRow['Date'];
            $dataRow[] = $sqlRow['Strike Price'];
            $dataRow[] = $sqlRow['PC'];
            $dataRow[] = $sqlRow['Asset Class'];
            
            $dataTable[] = $dataRow;
        }
        
        $output = array(
            "recordsTotal" => $numberRows,
            "recordsFiltered" => $numberRows,
            "data" => $dataTable
        );
        
        echo json_encode($output);

    }

    public function listUnexpiredOptions()
    {
        global $conn;

        $sqlQuery = "SELECT ETF_symbol as `Symbol`, 
            expiration_date as `Date`, 
            strike_price as `Strike Price`, 
            CASE PC 
                WHEN 0 THEN 'Put'
                WHEN 1 THEN 'Call'
            END as `PC`,
            asset_class as `Asset Class` 
        FROM Stock_Option WHERE expiration_date >= CURDATE()";
    
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
        $dataTable = array();
        
        while ($sqlRow = $stmt->fetch()) {
            $dataRow = array();
            
            $dataRow[] = $sqlRow['Symbol'];
            $dataRow[] = $sqlRow['Date'];
            $dataRow[] = $sqlRow['Strike Price'];
            $dataRow[] = $sqlRow['PC'];
            $dataRow[] = $sqlRow['Asset Class'];
            
            $dataTable[] = $dataRow;
        }
        
        $output = array(
            "recordsTotal" => $numberRows,
            "recordsFiltered" => $numberRows,
            "data" => $dataTable
        );
        
        echo json_encode($output);

    }

    public function listExpiredOptions()
    {
        global $conn;

        $sqlQuery = "SELECT ETF_symbol as `Symbol`, 
            expiration_date as `Date`, 
            strike_price as `Strike Price`, 
            CASE PC 
                WHEN 0 THEN 'Put'
                WHEN 1 THEN 'Call'
            END as `PC`,
            asset_class as `Asset Class` 
        FROM Stock_Option WHERE expiration_date < CURDATE()";
    
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
        $dataTable = array();
        
        while ($sqlRow = $stmt->fetch()) {
            $dataRow = array();
            
            $dataRow[] = $sqlRow['Symbol'];
            $dataRow[] = $sqlRow['Date'];
            $dataRow[] = $sqlRow['Strike Price'];
            $dataRow[] = $sqlRow['PC'];
            $dataRow[] = $sqlRow['Asset Class'];
            
            $dataTable[] = $dataRow;
        }
        
        $output = array(
            "recordsTotal" => $numberRows,
            "recordsFiltered" => $numberRows,
            "data" => $dataTable
        );
        
        echo json_encode($output);

    }
}

$option = new Option();

if(!empty($_POST['action']) && $_POST['action'] == 'listUnexpiredOptions') {
    $option->listUnexpiredOptions();
} else if(!empty($_POST['action']) && $_POST['action'] == 'listExpiredOptions') {
    $option->listExpiredOptions();
} else if(!empty($_POST['action']) && $_POST['action'] == 'listAllOptions') {
    $option->listAllOptions();
}

?>