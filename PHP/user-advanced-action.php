<?php
require_once ('connection.php');

class User
{
    public function listUsers()
    {
        global $conn;
        
        $sqlQuery = "SELECT u.ID as `ID`,
                            concat(u.first_name, ' ', u.last_name) as `name`,
                            u.email_address as `email`,
                            u.date_of_birth as `DOB`,
                            u_p.phone_number as `Phone Number`,
                            u_b.Brokerage as `Brokerage`,
                            CASE u.Permission 
                                WHEN 0 THEN 'User'
                                WHEN 1 THEN 'Admin'
                            END as `permission`
                     FROM Users u
                     LEFT JOIN Users_Phone u_p ON (u_p.user = u.ID)
                     LEFT JOIN User_Broker u_b ON (u_b.user = u.ID)";
        
        if (! empty($_POST["search"]["value"])) {
            $sqlQuery .= 'WHERE (u.first_name LIKE "%' . $_POST["search"]["value"] . '%" OR u.last_name LIKE "%' . $_POST["search"]["value"] . '%" or u.email_address LIKE "%' . $_POST["search"]["value"] . '%") ';
        }
        
        if (! empty($_POST["order"])) {
            $sqlQuery .= 'ORDER BY ' . ($_POST['order']['0']['column'] + 1) . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $sqlQuery .= 'ORDER BY u.ID ASC ';
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
            $dataRow[] = $sqlRow['name'];
            $dataRow[] = $sqlRow['email'];
            $dataRow[] = $sqlRow['DOB'];
            $dataRow[] = $sqlRow['permission'];
            $dataRow[] = $sqlRow['Phone Number'];
            $dataRow[] = $sqlRow['Brokerage'];
            
            $dataRow[] = '<button type="button" name="update" user_id="' . $sqlRow["ID"] . '" class="btn btn-warning btn-sm update">Update</button>
                          <button type="button" name="delete" user_id="' . $sqlRow["ID"] . '" class="btn btn-danger btn-sm delete">Delete</button>';
            
            $dataTable[] = $dataRow;
        }
        
        $output = array(
            "recordsTotal" => $numberRows,
            "recordsFiltered" => $numberRows,
            "data" => $dataTable
        );
        
        echo json_encode($output);
    }
    
    public function getUser()
    {
        global $conn;
        
        if ($_POST["ID"]) {
            
            $sqlQuery = "SELECT ID as `ID`,
                            first_name,
                            last_name,
                            date_of_birth,
                            email_address
                     FROM Users
                     WHERE ID = :user_ID";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':user_ID', $_POST["ID"]);
            $stmt->execute();
            
            echo json_encode($stmt->fetch());
        }
    }
    
    public function updateUser()
    {
        global $conn;
        
        if ($_POST['ID']) {
            
            $sqlQuery = "UPDATE Users
                            SET
                            first_name = :first_name,
                            last_name = :last_name,
                            date_of_birth = :date_of_birth,
                            email_address  = :email_address
                            WHERE ID = :user_ID";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':first_name', $_POST["first_name"]);
            $stmt->bindValue(':last_name', $_POST["last_name"]);
            $stmt->bindValue(':date_of_birth', $_POST["date_of_birth"]);
            $stmt->bindValue(':email_address', $_POST["email_address"]);
            $stmt->bindValue(':user_ID', $_POST['ID']);
            $stmt->execute();
        }
    }
    
    public function addUser()
    {
        global $conn;
        if ($_POST['ID']) {
            $sqlQuery = "UPDATE User_Privileges SET Permission = 1 WHERE ID=:user_ID";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':user_ID', $_POST['ID']);
            $stmt->execute();
        }
    }
    
    public function deleteUser()
    {
        global $conn;
        
        if ($_POST['ID']) {
            
            $sqlQuery = "SET FOREIGN_KEY_CHECKS = 0";
            $stmt = $conn->prepare($sqlQuery);
            $stmt->execute();


            $sqlQuery = "DELETE FROM Users WHERE ID = :user_ID";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':user_ID', $_POST['ID']);
            $stmt->execute();

            $sqlQuery = "SET FOREIGN_KEY_CHECKS = 1";
            $stmt = $conn->prepare($sqlQuery);
            $stmt->execute();
        }
    }
}

$user = new User();

if(!empty($_POST['action']) && $_POST['action'] == 'listUsers') {
    $user->listUsers();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addUser') {
    $user->addUser();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getUser') {
    $user->getUser();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateUser') {
    $user->updateUser();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteUser') {
    $user->deleteUser();
}

?>