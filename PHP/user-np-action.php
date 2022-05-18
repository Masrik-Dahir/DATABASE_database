<?php
require_once ('connection.php');

class Employee
{
    public function listEmployees()
    {
        global $conn;
        
        $sqlQuery = "SELECT CONCAT(first_name, ' ', last_name) AS 'Name'
        FROM Users";
        
        if (! empty($_POST["search"]["value"])) {
            $sqlQuery .= 'WHERE (first_name LIKE "%' . $_POST["search"]["value"] . '%" OR last_name LIKE "%' . $_POST["search"]["value"] . '%" or job_title LIKE "%' . $_POST["search"]["value"] . '%") ';
        }
        
        if (! empty($_POST["order"])) {
            $sqlQuery .= 'ORDER BY ' . ($_POST['order']['0']['column'] + 1) . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $sqlQuery .= 'ORDER BY user_id DESC ';
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
            
            // $dataRow[] = $sqlRow['user_id'];
            $dataRow[] = $sqlRow['Name'];
            // $dataRow[] = $sqlRow['email'];
            // $dataRow[] = $sqlRow['typeEMP'];
            // $dataRow[] = $sqlRow['Store ID'];
            // $dataRow[] = $sqlRow['salary'];
            // $dataRow[] = $sqlRow['dob'];
            // $dataRow[] = $sqlRow['address'];
            
            $dataRow[] = '<button type="button" name="update" emp_id="' . $sqlRow["user_id"] . '" class="btn btn-warning btn-sm update">Update</button>
                          <button type="button" name="delete" emp_id="' . $sqlRow["user_id"] . '" class="btn btn-danger btn-sm delete" >Delete</button>';
            
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
            
            $sqlQuery = "SELECT user_id as `ID`,
                            first_name,
                            last_name,
                            email,
                            typeEMP,
                            salary,
                            address
                     FROM USERS JOIN EMPLOYEES
                     USING (user_id)
                     WHERE user_id = :user_id";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':user_id', $_POST["ID"]);
            $stmt->execute();
            
            echo json_encode($stmt->fetch());
        }
    }
    
    public function updateEmployee()
    {
        global $conn;
        
        if ($_POST['ID']) {
            
            $sqlQuery = "UPDATE USERS
                            SET
                            first_name = :first_name,
                            last_name = :last_name,
                            email = :email
                            WHERE user_id = :user_id;
                            UPDATE EMPLOYEES
                            SET
                            typeEMP = :typeEMP,
                            salary = :salary,
                            address = :address                          
                            WHERE user_id = :user_id";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':first_name', $_POST["firstname"]);
            $stmt->bindValue(':last_name', $_POST["lastname"]);
            $stmt->bindValue(':email', $_POST["email"]);
            $stmt->bindValue(':typeEMP', $_POST["job"]);
            $stmt->bindValue(':salary', $_POST["salary"]);
            $stmt->bindValue(':address', $_POST["address"]);
            $stmt->bindValue(':user_id', $_POST["ID"]);
            $stmt->execute();
        }
    }
    
    public function addEmployee()
    {
        global $conn;
        
        $sqlQuery = "INSERT INTO employees
                     (first_name, last_name, manager_ID, department_ID, email, job_ID, salary, hire_date)
                     VALUES
                     (:first_name, :last_name, :manager_ID, :department_ID, :email, :job_ID, :salary, CURDATE())";
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->bindValue(':first_name', $_POST["firstname"]);
        $stmt->bindValue(':last_name', $_POST["lastname"]);
        $stmt->bindValue(':email', $_POST["email"]);
        $stmt->bindValue(':typeEMP', $_POST["job"]);
        $stmt->bindValue(':salary', $_POST["salary"]);
        $stmt->execute();
    }
    
    public function deleteEmployee()
    {
        global $conn;
        
        if ($_POST["ID"]) {
            
            $sqlQuery = "DELETE FROM USERS WHERE user_id = :user_id";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':user_id', $_POST["ID"]);
            $stmt->execute();
        }
    }
}

$employee = new Employee();

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