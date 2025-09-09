<?php

session_start();


//if i donot login it will send me to login page


if(!isset($_SESSION["admin_logged_in"])||$_SESSION["admin_logged_in"]!==true)
{
    header("Location:adminLogin.php");
    exit;
}

?>

<!DOCTYPE html>
<html>


<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style1.css">
</head>

<center>
    <h2>Welcome,Admin</h2>
    <p>You are successfully logged in as <b>Admin</b>.</p>
    <a href="logout.php">Log Out</a>
</center>



</html>