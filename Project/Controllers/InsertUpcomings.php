<?php
require_once('../Model/ALLDB.php');
if(isset($_POST['Insert']))
{
    $Title=$_POST['Title'];
    $Genre=$_POST['Genre'];
    $RD=$_POST['RD'];
    //$Rating=$_POST['Rating'];

if(empty($Title)||empty($Genre)||empty($RD))
{
    header('location:../Views/upcomingsA.php');
}
else{
    insertUpcomings($Title,$Genre,$RD,$Type,$Poster);
    header('location:../Views/upcomingsA.php');
}





}




?>