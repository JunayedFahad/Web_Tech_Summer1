<?php
require_once('../Model/ALLDB.php');
if(isset($_POST['Insert']))
{
    $Title=$_POST['Title'];
    $Genre=$_POST['Genre'];
    $Seasons=$_POST['Seasons'];
    $Rating=$_POST['Rating'];

if(empty($Title)||empty($Genre)||empty($Seasons)||empty($Rating))
{
    header('location:../Views/seriesA.php');
}
else{
    insertSeries($Title,$Genre,$Seasons,$Rating);
    header('location:../Views/seriesA.php');
}





}




?>