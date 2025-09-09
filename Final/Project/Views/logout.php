<?php
session_start();
//session destroy
session_unset();
session_destroy();
header("Location:adminLogin.php");
exit;
?>