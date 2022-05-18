<?php
require_once ('connection.php');
$email_address = "";
$password = "";
$first_name = "";
$last_name = "";
$date_of_birth = "";

class Employee
{
    public function listEmployees()
    {
        global $conn;
        
        $sqlQuery = "SELECT e.ID as `ID`,
                            e.email_address as `Email Address`, 
                            e.first_name as `First Name`, 
                            e.last_name as `Last Name`,
                            e.date_of_birth as `Date of Birth`,
                            CASE e.Permission 
                                WHEN 0 THEN 'User'
                                WHEN 1 THEN 'Admin'
                            END as `Permission`
                            -- e.salary as `salary`,
                            -- concat(m.first_name, ' ', m.last_name) as `manager`,
                            -- d.department_name as `department`,
                            -- e.email as `email`,
                            -- j.job_title as `job`
                     FROM Users e
                    --  INNER JOIN employees m ON (e.manager_ID = m.employee_ID)
                    --  INNER JOIN departments d ON (e.department_ID = d.department_ID)
                    --  INNER JOIN jobs j ON (e.job_ID = j.job_ID) 
                     ";
        
        if (! empty($_POST["search"]["value"])) {
            $sqlQuery .= 'WHERE (e.first_name LIKE "%' . $_POST["search"]["value"] . '%" OR e.last_name LIKE "%' . $_POST["search"]["value"] . '%") ';
        }
        
        if (! empty($_POST["order"])) {
            $sqlQuery .= 'ORDER BY ' . ($_POST['order']['0']['column'] + 1) . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $sqlQuery .= 'ORDER BY e.ID DESC ';
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
            
            $dataRow[] = $sqlRow['ID'];
            $dataRow[] = $sqlRow['Email Address'];
            $dataRow[] = $sqlRow['First Name'];
            $dataRow[] = $sqlRow['Last Name'];
            $dataRow[] = $sqlRow['Date of Birth'];
            $dataRow[] = $sqlRow['Permission'];
            // $dataRow[] = $sqlRow['salary'];
            // $dataRow[] = $sqlRow['manager'];
            // $dataRow[] = $sqlRow['department'];
            // $dataRow[] = $sqlRow['email'];
            // $dataRow[] = $sqlRow['job'];
            
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
    
    public function getEmployee()
    {
        global $conn;
        
        if ($_POST["ID"]) {
            
            $sqlQuery = "SELECT ID as `ID`,
                            email_address,
                            first_name,
                            password,
                            last_name,
                            date_of_birth
                            -- Permission
                     FROM Users
                     WHERE ID = :ID";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':ID', $_POST["ID"]);
            $stmt->execute();
            
            echo json_encode($stmt->fetch());
        }
    }
    
    public function updateEmployee()
    {
        global $conn;
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        if ($_POST['ID']) {
            
            $sqlQuery = "UPDATE `Users`
                            SET
                            email_address = :email_address,
                            password = :password,
                            first_name = :first_name,
                            last_name = :last_name,
                            date_of_birth = :date_of_birth
                            -- Permission = :Permission
                            WHERE ID = :ID";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':email_address', $_POST["email_address"]);
            $stmt->bindValue(':password', $pass);
            $stmt->bindValue(':first_name', $_POST["first_name"]);
            $stmt->bindValue(':last_name', $_POST["last_name"]);
            $stmt->bindValue(':date_of_birth', $_POST["date_of_birth"]);
            // $stmt->bindValue(':Permission', $_POST["Permission"]);
            $stmt->bindValue(':ID', $_POST["ID"]);
            $stmt->execute();
        }
    }
    
    public function addEmployee()
    {
        global $conn;
        
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO `Users` (email_address , password, first_name, last_name, date_of_birth, Permission) VALUES (:email_address, :password, :first_name, :last_name, :date_of_birth, 0);");
        $stmt->bindValue(':email_address', $_POST['email_address']);
        $stmt->bindValue(':password', $pass);
        $stmt->bindValue(':first_name', $_POST['first_name']);
        $stmt->bindValue(':last_name', $_POST['last_name']);
        $stmt->bindValue(':date_of_birth', $_POST['date_of_birth']);
        // $stmt->bindValue(':Permission', $_POST['Permission']);
        $stmt->execute();
    }
    
    public function deleteEmployee()
    {
        global $conn;
        
        if ($_POST["ID"]) {
            
            // $sqlQuery = "DELETE FROM job_history WHERE employee_ID = :employee_ID";
            
            // $stmt = $conn->prepare($sqlQuery);
            // $stmt->bindValue(':employee_ID', $_POST["ID"]);
            // $stmt->execute();
            
            $sqlQuery = "DELETE FROM Users WHERE ID = :ID";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue('ID', $_POST["ID"]);
            $stmt->execute();
        }
    }
}

$employee = new Employee();


$stmt = $conn->prepare("SELECT Permission FROM `Users` WHERE ID=:ID");
$stmt->bindValue(':ID', $_SESSION['user_ID']);
$stmt->execute();
$queryResult = $stmt->fetch();
if ($queryResult['Permission'] == 1) 
{
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

} 
  
  
  
  




?>