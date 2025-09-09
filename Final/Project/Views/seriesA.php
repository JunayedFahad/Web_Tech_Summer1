<?php
require_once('../Model/ALLDB.php');

$con = getConnection();
$message=$error="" ;
//insert handle;


if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $Title =trim($_POST["Title"]);
    $Genre =trim($_POST["Genre"]);
    $Seasons =trim($_POST["Seasons"]);
    $Rating =trim($_POST["Rating"]);
            if(empty($Title)||empty($Genre)||empty($Seasons)||empty($Rating))
            {
                $error="Please fill all ";
            }
            else
            {
                $check=$con->query("SELECT * FROM series WHERE Title='$Title'");
                if($check->num_rows>0)
                {
                    $error = "Series already exists";
                }
                else{
                    $con->query("INSERT INTO series(Title,Genre,Seasons,Rating)VALUES('$Title','$Genre','$Seasons','$Rating')");
                    $message = "Series inserted successfully";
                }
            }
}
//delete

if(isset($_GET['del']))
{
    $delTitle = $_GET['del'];
    $con->query("DELETE FROM series WHERE Title ='$delTitle'");

}

//fetch all series

$serieslist = $con->query("SELECT * FROM series");


?>
<!DOCTYPE html>
<html>


<head>

<title>Series Managment</title>
<link rel = "stylesheet" href="../css/style4.css">


</head>


<body>
<?php if($message)echo "<p class ='success'>$message</p>";?>
<?php if($error) echo "<p class='error'>$error</p>";?>



<section class="container">
    <div class="nav">
     <img src ="download.png" alt="logo">
         <a href="userInfoA.php">User Information</a>
        <a href="moviesA.php">Movies</a>
        <a href="seriesA.php">Series</a>
        <a href="upcomingsA.php">Upcomings</a>
        <a href="adminPage.php">Home</a>



    </div>


<div class ="content">
<form action =""method ="post">
    <h1>Insert Series</h1>
    <input type="text" name="Title" placeholder="Title">
    <input type="text" name="Genre" placeholder="Genre">
    <input type="text" name="Seasons" placeholder="No_Of_Seasons">
    <input type="number" step="0.1" name="Rating" placeholder="Rating">
    <input type="submit" value="Insert">

</form>

<h2>Series List</h2>
<table>
<tr>
<th>Title</th>
<th>Genre</th>
<th> No Of Seasons</th>
<th>Rating</th>
<th>Action
</th>
</tr>
<?php
if($serieslist && $serieslist->num_rows>0)
{
    while($row = $serieslist->fetch_assoc())
    {
        echo "<tr>
        
        <td>{$row['Title']}</td>
        <td>{$row['Genre']}</td>
        <td>{$row['Seasons']}</td>
        <td>{$row['Rating']}</td>
        <td><a class='delete-btn'href='del={$row['Title']}'>Delete<a></td>

    
        </tr>";

    }
}
   else {
    echo "<tr><td colspan='5'>No series found</td></tr>";
   }
?>


</table>


</div>
</section>

</body>




</html>