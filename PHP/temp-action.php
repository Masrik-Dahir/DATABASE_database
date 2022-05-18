<?php
require_once ('connection.php');

class ETF
{
    public function listETFs()
    {
        global $conn;

        $sqlQuery = "SELECT e.Market_Identifier_Code as `MID`,
        -- e.CEO as `CEO`,
        -- e.website as `Website`,
        -- e.date_founded as `Date Founded`,
        e.market_cap as `Market Cap`,
        e.no_of_securities as `Number of Securities`,
        e_i.Index_Symbol as `Index`,
        e_i.Name as `Index Name`,
        i_r.record_date as `Date`,
        i_r.market_value as `Average`
        FROM Exchange e JOIN Exchange_Index e_i ON(e_i.Exchange  = e.Market_Identifier_Code)
        JOIN Index_Record i_r ON(i_r.Market_Index  = e_i.Index_Symbol)
        WHERE DATEDIFF(CURDATE(), i_r.record_date) <= 7 ORDER BY i_r.record_date DESC;";
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
        $dataTable = array();
        
        while ($sqlRow = $stmt->fetch()) {
            $dataRow = array();
            
            $dataRow[] = $sqlRow['MID'];
            // $dataRow[] = $sqlRow['CEO'];
            // $dataRow[] = $sqlRow['Website'];
            // $dataRow[] = $sqlRow['Date Founded'];
            $dataRow[] = $sqlRow['Market Cap'];
            $dataRow[] = $sqlRow['Number of Securities'];
            $dataRow[] = $sqlRow['Index'];
            $dataRow[] = $sqlRow['Index Name'];
            $dataRow[] = $sqlRow['Date'];
            $dataRow[] = $sqlRow['Average'];

            
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
        
        $sqlQuery = "SELECT e.Market_Identifier_Code as `MID`,
        -- e.CEO as `CEO`,
        -- e.website as `Website`,
        -- e.date_founded as `Date Founded`,
        e.market_cap as `Market Cap`,
        e.no_of_securities as `Number of Securities`,
        e_i.Index_Symbol as `Index`,
        e_i.Name as `Index Name`,
        i_r.record_date as `Date`,
        i_r.market_value as `Average`
        FROM Exchange e JOIN Exchange_Index e_i ON(e_i.Exchange  = e.Market_Identifier_Code)
        JOIN Index_Record i_r ON(i_r.Market_Index  = e_i.Index_Symbol);";
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
        $dataTable = array();
        
        while ($sqlRow = $stmt->fetch()) {
            $dataRow = array();
            
            $dataRow[] = $sqlRow['MID'];
            // $dataRow[] = $sqlRow['CEO'];
            // $dataRow[] = $sqlRow['Website'];
            // $dataRow[] = $sqlRow['Date Founded'];
            $dataRow[] = $sqlRow['Market Cap'];
            $dataRow[] = $sqlRow['Number of Securities'];
            $dataRow[] = $sqlRow['Index'];
            $dataRow[] = $sqlRow['Index Name'];
            $dataRow[] = $sqlRow['Date'];
            $dataRow[] = $sqlRow['Average'];
            
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
} 
else if(!empty($_POST['action']) && $_POST['action'] == 'listAllETFs') {
    $etf->listAllETFs();
}

?>