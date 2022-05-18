<?php
require_once ('connection.php');

class Exchange
{
    public function listExchanges()
    {
        global $conn;
        
        $sqlQuery = "SELECT t1.Exchange as `Exchange`, t1.ETF as `Asset Symbol`, t1.Asset as `Asset Type` FROM 
        (SELECT e.Exchange, e.ETF, 'ETF' as 'Asset' FROM Exchange_ETF e) t1 UNION 
        (SELECT e.Exchange, e.Mutual_Fund, 'Mutual_Fund' as `Asset Type` FROM Exchange_Mutual_Fund e) UNION 
        (SELECT e.Exchange, e.Cryptocurrency, 'Cryptocurrency' as `Asset Type` FROM Exchange_Cryptocurrency e)";

        if (! empty($_POST["search"]["value"])) {
            $sqlQuery .= 'WHERE (t1.`Exchange` LIKE "%' . $_POST["search"]["value"] . '%" OR t1.`Asset Symbol` LIKE "%' . $_POST["search"]["value"] . '%" or t1.`Asset Type` LIKE "%' . $_POST["search"]["value"] . '%") ';
        }

        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
        if ($_POST["length"] != - 1) {
            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
        $dataTable = array();
        
        while ($sqlRow = $stmt->fetch()) {
            $dataRow = array();
            
            $dataRow[] = $sqlRow['Exchange'];
            $dataRow[] = $sqlRow['Asset Symbol'];
            $dataRow[] = $sqlRow['Asset Type'];
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

$exchange = new Exchange();

if(!empty($_POST['action']) && $_POST['action'] == 'listExchanges') {
    $exchange->listExchanges();
}

?>
