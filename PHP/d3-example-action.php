<?php
require_once ('connection.php');

Class ETF_Table {
    
    public function listETFs() {
        global $conn;

        $sqlQuery = "SELECT `record_date` as `Date`, `high_price` as `High Price`, 
        `low_price` as `Low Price`, `avg_price` as `Avg Price`, `no_of_shares` as `No of Shares`, `dividend` as `Dividend` FROM ETF_Record
        WHERE ETF = 'AAPL'";

        if (! empty($_POST["order"])) {
            $sqlQuery .= 'ORDER BY ' . ($_POST['order']['0']['column'] + 1) . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $sqlQuery .= 'ORDER BY record_date DESC ';
        }

        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();

        $numberRows = $stmt->rowCount();

        if ($_POST["length"] != - 1) {
            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();

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
        }
    }
$etf_graph = new ETF_Table();    
if(!empty($_POST['action']) && $_POST['action'] == 'listETFs') {
    $etf_graph->listETFs();
}
?>
