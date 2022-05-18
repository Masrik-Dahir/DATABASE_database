<?php
require_once ('connection.php');

class Mutual_Fund
{
    public function listMutualFunds()
    {
        global $conn;

        $sqlQuery = "SELECT mf.fund_symbol as `Symbol`, 
            mf.fund_name as `Mutual Fund`, 
            mfr.record_date as `Date`, 
            mfr.net_asset_value as `Net Asset Value`, 
            mfr.dividend as `Dividend` 
        FROM Mutual_Fund mf 
        JOIN Mutual_Fund_Record mfr ON (mf.fund_symbol = mfr.Mutual_Fund)
        ORDER BY `Date`";
    
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
        $dataTable = array();
        
        while ($sqlRow = $stmt->fetch()) {
            $dataRow = array();
            
            $dataRow[] = $sqlRow['Symbol'];
            $dataRow[] = $sqlRow['Mutual Fund'];
            $dataRow[] = $sqlRow['Date'];
            $dataRow[] = $sqlRow['Net Asset Value'];
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
}

?>