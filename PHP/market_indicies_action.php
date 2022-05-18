<?php
require_once ('connection.php');

class Exchange_Index
{
    public function listWeeklyIndexHistory()
    {
        global $conn;

        $sqlQuery = "SELECT e.Market_Identifier_Code as `MID`,
                            mi.index_name as `Name`,
                            mi.symbol as `Symbol`,
                            ir.record_date as `Date`,
                            ir.market_value as `Value`
        FROM Exchange e JOIN Exchange_Index ei ON (e.Market_Identifier_Code = ei.Exchange)
        JOIN Market_Index mi ON (ei.Index_Symbol = mi.symbol)
        JOIN Index_Record ir ON (ei.Index_Symbol = ir.Market_Index)
        WHERE DATEDIFF(CURDATE(), ir.record_date) <= 7 ORDER BY ir.record_date DESC";
    
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
        $dataTable = array();
        
        while ($sqlRow = $stmt->fetch()) {
            $dataRow = array();
            
            $dataRow[] = $sqlRow['MID'];
            $dataRow[] = $sqlRow['Name'];
            $dataRow[] = $sqlRow['Symbol'];
            $dataRow[] = $sqlRow['Date'];
            $dataRow[] = $sqlRow['Value'];
            
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

$mutual_fund = new Exchange_Index();

if(!empty($_POST['action']) && $_POST['action'] == 'listWeeklyExchangeHistory') {
    $mutual_fund->listWeeklyExchangeHistory();
}

?>