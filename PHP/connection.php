<?php

// Display all errors, very useful for PHP debugging (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Parameters of the MySQL connection 
$servername = "";
$username = "";
$password = "";
$database = "";
$curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); 

$email = "";
$passw = "";
$first_name = "";
$last_name = "";
$date_of_birth = "";


try {
    // Establish a connection with the MySQL server
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Start or resume session variables
session_start();
       

// If the user_ID session is not set, then the user has not logged in yet
if ($curPageName != "signup.php" && !isset($_SESSION['user_ID']))
{
    // If the page is receiving the email and password from the login form then verify the login data
    if (isset($_POST['email']) && isset($_POST['password']))
    {
        $stmt = $conn->prepare("SELECT ID, password FROM `Users` WHERE email_address=:email");
        $stmt->bindValue(':email', $_POST['email']);
        $stmt->execute();
        
        $queryResult = $stmt->fetch();
        
        // Verify password submitted by the user with the hash stored in the database
        if(!empty($queryResult) && password_verify($_POST["password"], $queryResult['password']))
        {
            // Create session variable
            $_SESSION['user_ID'] = $queryResult['ID'];
            
            // Redirect to URL 
            header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        } else {
            // Password mismatch
            require('login.php');
            exit();
        }
    }
    else
    {
        // Show login page
        require('login.php');
        exit();
    }
}

else if ($curPageName == "signup.php" && !isset($_SESSION['user_ID'])){


    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['first']) && isset($_POST['last']) && isset($_POST['birth']) ){
        
        $stmt = $conn->prepare("SELECT COUNT(email_address) AS email_count from Users WHERE email_address = :email;");
        $stmt->bindValue(':email', $_POST['email']);
        $stmt->execute();

        $d = $_POST['birth'];
        $pieces = explode("-", $d);
        $year = date("Y"); 

        if ($stmt->fetch()['email_count'] > 0) {
            echo '<script type="text/javascript">
                    window.onload = function () { 
                        alert("There is already an account associated with this email address! Please use a different email address or log in.");
                    } 
                </script>';
                // $email = $_POST['email'];
                $passw = $_POST['password'];
                $first_name = $_POST['first'];
                $last_name = $_POST['last'];
                $date_of_birth = $_POST['birth'];
        }

        else if(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i', trim($_POST["email"]))){
            echo '<script type="text/javascript">
                    window.onload = function () { 
                        alert("Please enter a valid email address!");
                    } 
                </script>';
                // $email = $_POST['email'];
                $passw = $_POST['password'];
                $first_name = $_POST['first'];
                $last_name = $_POST['last'];
                $date_of_birth = $_POST['birth'];
        }

        else if(strlen(trim($_POST["password"])) < 6){
            echo '<script type="text/javascript">
                    window.onload = function () { 
                        alert("Password must be at least 6 characters!");
                    } 
                </script>';
                $email = $_POST['email'];
                // $passw = $_POST['password'];
                $first_name = $_POST['first'];
                $last_name = $_POST['last'];
                $date_of_birth = $_POST['birth'];
        }


        else if(!preg_match('/^[a-zA-Z][0-9a-zA-Z_]{2,23}[0-9a-zA-Z]$/',trim($_POST["first"]))){
            echo '<script type="text/javascript">
                    window.onload = function () { 
                        alert("Please enter a valid first name! First Name should be between 3 to 24 characters. No special characters are allowed.");
                    } 
                </script>';
                $email = $_POST['email'];
                $passw = $_POST['password'];
                // $first_name = $_POST['first'];
                $last_name = $_POST['last'];
                $date_of_birth = $_POST['birth'];
        }
        
        
        else if(!preg_match('/^(19|20)\d{2}\-(0[1-9]|1[0-2])\-(0[1-9]|[12][0-9]|3[01])$/',trim($_POST["birth"]))){
            echo '<script type="text/javascript">
                    window.onload = function () { alert("Please enter a valid date!");
                    } 
                </script>';
                $email = $_POST['email'];
                $passw = $_POST['password'];
                $first_name = $_POST['first'];
                $last_name = $_POST['last'];
                // $date_of_birth = $_POST['birth'];
        }

        

        else if(!preg_match('/^[a-zA-Z][0-9a-zA-Z_]{2,23}[0-9a-zA-Z]$/',trim($_POST["last"]))){
            echo '<script type="text/javascript">
                    window.onload = function () { alert("Please enter a valid last name!\nLast Name should be between 3 to 24 characters.\nNo special characters are allowed.");
                    } 
                </script>';
                $email = $_POST['email'];
                $passw = $_POST['password'];
                $first_name = $_POST['first'];
                // $last_name = $_POST['last'];
                $date_of_birth = $_POST['birth'];
        }
        // pieces
        else if(($year - $pieces[0]) < 18){
            echo '<script type="text/javascript">
                    window.onload = function () { alert("Applicant must be 18 years of old!");
                    } 
                </script>';
                $email = $_POST['email'];
                $passw = $_POST['password'];
                $first_name = $_POST['first'];
                $last_name = $_POST['last'];
                // $date_of_birth = $_POST['birth'];
        }
        

        else{
            $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO `Users` (email_address , password, first_name, last_name, date_of_birth, Permission) VALUES (:email, :password, :first, :last, :birth, 0);");
            $stmt->bindValue(':email', $_POST['email']);
            $stmt->bindValue(':password', $pass);
            $stmt->bindValue(':first', $_POST['first']);
            $stmt->bindValue(':last', $_POST['last']);
            $stmt->bindValue(':birth', $_POST['birth']);
            $stmt->execute();
            header("Location: http://cmsc508.com/~nguyenvt35/508-project-nguyenvt35-dahirma/PHP/index.php");
        }
        
    }

    
    
        

    
}

?>