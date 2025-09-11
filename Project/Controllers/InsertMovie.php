<?php
require_once('../Model/ALLDB.php');
if(isset($_POST['Insert']))
{
    $Title=$_POST['Title'];
    $Genre=$_POST['Genre'];
    $Seasons=$_POST['Duration'];
    $Rating=$_POST['Rating'];

if(empty($Title)||empty($Genre)||empty($Duration)||empty($Rating))
{
    header('location:../Views/seriesA.php');
}
else{
    insertSeries($Title,$Genre,$Duration,$Rating);
    header('location:../Views/seriesA.php');
}





}




?>