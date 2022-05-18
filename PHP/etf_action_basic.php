<?php
require_once ('connection.php');

class ETF
{
    public function listEmployees()
    {
        global $conn;
        
        $sqlQuery = "SELECT e.ETF as `ETF`,
                            e.record_date as `Record Date`,
                            e.high_price as `High`,
                            e.low_price as `Low`,
                            e.avg_price as `AVG`,
                            e.no_of_shares as `Num`,
                            e.dividend as `Dividend`
                     FROM ETF_Record e;";
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
        $dataTable = array();
        
        while ($sqlRow = $stmt->fetch()) {
            $dataRow = array();
            
            $dataRow[] = $sqlRow['ETF'];
            $dataRow[] = $sqlRow['record_date'];
            $dataRow[] = $sqlRow['high_price'];
            $dataRow[] = $sqlRow['low_price'];
            $dataRow[] = $sqlRow['avg_price'];
            $dataRow[] = $sqlRow['no_of_shares'];
            $dataRow[] = $sqlRow['dividend'];
            
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

$etf = new ETF();

if(!empty($_POST['action']) && $_POST['action'] == 'listEmployees') {
    $etf->listEmployees();
}

?>