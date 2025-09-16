<?php

require_once('../Model/ALLDB.php');
session_start();

if(isset($_POST['update']))
{
    $name=trim($_POST['name']);
    $newPassword=trim($_POST["Password"]);

    if(empty($name) || empty($newPassword))
    {
        $_SESSION['msg']="Please fill all fields";
        header("Location:../Views/forgotPass.php");
        exit;
    }

    if(authForgot($name))
    {

        UpdatePassword($name,$newPassword);

        $_SESSION['msg'] ="Password updated successfully";

    }
    else{
        $_SESSION['msg'] ="name not found";
    }
    header("Location:../Views/forgotPass.php");
    exit;
}

?>