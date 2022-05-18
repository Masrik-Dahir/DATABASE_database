<?php
require_once ('connection.php');

class Mutual_Fund
{
    public function listMutualFunds()
    {
        global $conn;

        $sqlQuery = "SELECT mf.Mutual_Fund as `Symbol`, 
            mf.fund_name as `Name`, 
            mf.record_date as `Date`, 
            mf.price as `Price`, 
            mf.dividend as `Dividend` 
        FROM latest_Mutual_Funds mf";
    
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
        $dataTable = array();
        
        while ($sqlRow = $stmt->fetch()) {
            $dataRow = array();
            
            $dataRow[] = $sqlRow['Symbol'];
            $dataRow[] = $sqlRow['Name'];
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

    }

    public function listAllMutualFunds()
    {
        global $conn;

        $sqlQuery = "SELECT mfr.Mutual_Fund as `Symbol`, 
            mf.fund_name as `Name`, 
            mfr.record_date as `Date`, 
            mfr.price as `Price`, 
            mfr.dividend as `Dividend` 
        FROM Mutual_Fund mf JOIN Mutual_Fund_Record mfr ON (mf.fund_symbol = mfr.Mutual_Fund)";
    
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
        $dataTable = array();
        
        while ($sqlRow = $stmt->fetch()) {
            $dataRow = array();
            
            $dataRow[] = $sqlRow['Symbol'];
            $dataRow[] = $sqlRow['Name'];
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

    }
}

$mutual_fund = new Mutual_Fund();

if(!empty($_POST['action']) && $_POST['action'] == 'listMutualFunds') {
    $mutual_fund->listMutualFunds();
} else if(!empty($_POST['action']) && $_POST['action'] == 'listAllMutualFunds') {
    $mutual_fund->listAllMutualFunds();
} 
?>