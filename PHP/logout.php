<?php require_once('header.php');
    require_once('connection.php');
    unset($_SESSION['user_ID']);
    unset($_POST['email']);
    unset($_POST['password']);
    unset($queryResult);
    session_destroy();
    header("Location: index.php");
    exit;
?>