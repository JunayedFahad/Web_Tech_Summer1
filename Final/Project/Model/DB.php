<?php
function getConnection()
{
    $server = "localhost";
    $username ="root";
    $password = "";
    $dbname = "ott";
    $conn = new mysqli($server,$username,$password,$dbname);
    return $conn;
}



?>