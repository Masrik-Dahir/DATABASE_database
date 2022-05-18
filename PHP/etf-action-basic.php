<?php
require_once ('connection.php');

class ETF
{
    public function listETFs()
    {
        global $conn;
        
        $sqlQuery = "SELECT e.ETF as `ETF`,
                            e.stock_name as `ETF Name`,
                            e.record_date as `Record Date`,
                            e.high_price as `High`,
                            e.low_price as `Low`,
                            e.avg_price as `AVG`,
                            e.no_of_shares as `Num`,
                            e.dividend as `Dividend`
                     FROM latest_ETFs e;";
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
        $dataTable = array();
        
        while ($sqlRow = $stmt->fetch()) {
            $dataRow = array();
            
            $dataRow[] = $sqlRow['ETF'];
            $dataRow[] = $sqlRow['ETF Name'];
            $dataRow[] = $sqlRow['Record Date'];
            $dataRow[] = $sqlRow['High'];
            $dataRow[] = $sqlRow['Low'];
            $dataRow[] = $sqlRow['AVG'];
            $dataRow[] = $sqlRow['Num'];
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

    public function listAllETFs()
    {
        global $conn;
        
        $sqlQuery = "SELECT e1.ETF as `ETF`,
                            e2.stock_name as `ETF Name`,
                            e1.record_date as `Record Date`,
                            e1.high_price as `High`,
                            e1.low_price as `Low`,
                            e1.avg_price as `AVG`,
                            e1.no_of_shares as `Num`,
                            e1.dividend as `Dividend`
                     FROM ETF_Record e1 JOIN ETF e2 ON (e1.ETF=e2.stock_symbol);";
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
        $dataTable = array();
        
        while ($sqlRow = $stmt->fetch()) {
            $dataRow = array();
            
            $dataRow[] = $sqlRow['ETF'];
            $dataRow[] = $sqlRow['ETF Name'];
            $dataRow[] = $sqlRow['Record Date'];
            $dataRow[] = $sqlRow['High'];
            $dataRow[] = $sqlRow['Low'];
            $dataRow[] = $sqlRow['AVG'];
            $dataRow[] = $sqlRow['Num'];
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

$etf = new ETF();

if(!empty($_POST['action']) && $_POST['action'] == 'listETFs') {
    $etf->listETFs();
} else if(!empty($_POST['action']) && $_POST['action'] == 'listAllETFs') {
    $etf->listAllETFs();
}

?>