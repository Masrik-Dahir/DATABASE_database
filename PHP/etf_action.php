<?php
require_once ('connection.php');

class ETF
{
    // Listing employees
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
        
        if (! empty($_POST["search"]["value"])) {
            $sqlQuery .= 'WHERE (e.ETF LIKE "%' . $_POST["search"]["value"] . '%" OR e.record_date LIKE "%' . $_POST["search"]["value"] . '%") ';
        }
        
        if (! empty($_POST["order"])) {
            $sqlQuery .= 'ORDER BY ' . ($_POST['order']['0']['column'] + 1) . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $sqlQuery .= 'ORDER BY e.ETF DESC ';
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
            
            $dataRow[] = $sqlRow['ETF'];
            $dataRow[] = $sqlRow['record_date'];
            $dataRow[] = $sqlRow['high_price'];
            $dataRow[] = $sqlRow['low_price'];
            $dataRow[] = $sqlRow['avg_price'];
            $dataRow[] = $sqlRow['no_of_shares'];
            $dataRow[] = $sqlRow['dividend'];
            
            $dataRow[] = '<button type="button" name="update" emp_id="' . $sqlRow["ID"] . '" class="btn btn-warning btn-sm update">Update</button>
                          <button type="button" name="delete" emp_id="' . $sqlRow["ID"] . '" class="btn btn-danger btn-sm delete" >Delete</button>';
            
            $dataTable[] = $dataRow;
        }
        
        $output = array(
            "recordsTotal" => $numberRows,
            "recordsFiltered" => $numberRows,
            "data" => $dataTable
        );
        
        echo json_encode($output);
    }
    
    // Getting ETF
    public function getEmployee()
    {
        global $conn;
        
        if ($_POST["ETF"]) {
            
            $sqlQuery = "SELECT ETF as `ID`,
                            record_date,
                            high_price,
                            low_price,
                            avg_price,
                            no_of_shares,
                            dividend,
                     FROM ETF_Record
                     WHERE ETF = :ETF";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':ETF', $_POST["ETF"]);
            $stmt->execute();
            
            echo json_encode($stmt->fetch());
        }
    }
    
    // updating etf
    public function updateEmployee()
    {
        global $conn;
        
        if ($_POST['ETF']) {
            
            $sqlQuery = "UPDATE ETF_Record
                            SET
                            record_date = :record_date,
                            high_price = :high_price,
                            low_price = :low_price,
                            avg_price = :avg_price,
                            no_of_shares = :no_of_shares,
                            dividend = :dividend,
                            WHERE ETF = :ETF";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':record_date', $_POST["record_date"]);
            $stmt->bindValue(':high_price', $_POST["high_price"]);
            $stmt->bindValue(':low_price', $_POST["low_price"]);
            $stmt->bindValue(':avg_price', $_POST["avg_price"]);
            $stmt->bindValue(':no_of_shares', $_POST["no_of_shares"]);
            $stmt->bindValue(':dividend', $_POST["dividend"]);
            $stmt->bindValue(':ETF', $_POST["ETF"]);
            $stmt->execute();
        }
    }

    // Add employee
    public function addEmployee()
    {
        global $conn;
        
        $sqlQuery = "INSERT INTO ETF_Record
                     (record_date, high_price, low_price, avg_price, no_of_shares, dividend)
                     VALUES
                     (:record_date, :high_price, :low_price, :avg_price, :no_of_shares, :dividend)";
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->bindValue(':record_date', $_POST["record_date"]);
        $stmt->bindValue(':high_price', $_POST["high_price"]);
        $stmt->bindValue(':low_price', $_POST["low_price"]);
        $stmt->bindValue(':avg_price', $_POST["avg_price"]);
        $stmt->bindValue(':no_of_shares', $_POST["no_of_shares"]);
        $stmt->bindValue(':dividend', $_POST["dividend"]);
        $stmt->execute();
    }
    
    public function deleteEmployee()
    {
        global $conn;
        
        if ($_POST["ETF"]) {
            
            $sqlQuery = "DELETE FROM ETF_Record WHERE ETF = :ETF";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':ETF', $_POST["ETF"]);
            $stmt->execute();
            
            $sqlQuery = "DELETE FROM ETF WHERE stock_symbol = :stock_symbol";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':stock_symbol', $_POST["stock_symbol"]);
            $stmt->execute();
        }
    }
}

$employee = new ETF();

if(!empty($_POST['action']) && $_POST['action'] == 'listEmployees') {
    $employee->listEmployees();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addEmployee') {
    $employee->addEmployee();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getEmployee') {
    $employee->getEmployee();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateEmployee') {
    $employee->updateEmployee();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteEmployee') {
    $employee->deleteEmployee();
}

?>