<?php
require_once ('connection.php');

class Cryptocurrency
{
    public function listCryptocurrencies()
    {
        global $conn;
        
        $sqlQuery = "SELECT c.Cryptocurrency AS `Symbol`,
                            c.crypto_name AS `Name`,
                            c.record_date AS `Date`,
                            c.price AS `Price`,
                            c.total_supply AS `Total Supply`,
                            c.market_cap AS `Market Cap`
                     FROM latest_Cryptos c;";
        
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
            $dataRow[] = $sqlRow['Total Supply'];
            $dataRow[] = $sqlRow['Market Cap'];
            
            $dataTable[] = $dataRow;
        }
        
        $output = array(
            "recordsTotal" => $numberRows,
            "recordsFiltered" => $numberRows,
            "data" => $dataTable
        );
        
        echo json_encode($output);
    }

    public function listAllCryptocurrencies()
    {
        global $conn;
        
        $sqlQuery = "SELECT c1.Cryptocurrency AS `Symbol`,
                            c2.crypto_name AS `Name`,
                            c1.record_date AS `Date`,
                            c1.price AS `Price`,
                            c1.total_supply AS `Total Supply`,
                            c1.market_cap AS `Market Cap`
                     FROM Cryptocurrency_Record c1 JOIN Cryptocurrency c2 ON (c1.Cryptocurrency = c2.crypto_symbol);";
        
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
            $dataRow[] = $sqlRow['Total Supply'];
            $dataRow[] = $sqlRow['Market Cap'];
            
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

$crypto = new Cryptocurrency();

if(!empty($_POST['action']) && $_POST['action'] == 'listCryptocurrencies') {
    $crypto->listCryptocurrencies();
} else if(!empty($_POST['action']) && $_POST['action'] == 'listAllCryptocurrencies') {
    $crypto->listAllCryptocurrencies();
}

?>