<?php

require_once('../Model/ALLDB.php');
$conn=getConnection();
$message=$error="";

//insert handle

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $Title=trim($_POST["Title"]);
    $Genre=trim($_POST["Genre"]);
    $Seasons=trim($_POST["Seasons"]);
    $Rating=trim($_POST["Rating"]);


if(empty($Title) || empty($Genre)||empty($Seasons)||empty($Rating))
{
    $error = "Please fill all fields" ;
}
else if (!isset($_FILES['Poster'])||$_FILES['Poster']['name']=="")
{
         $error="Please select a poster image";
}

else{
    //hanlde poster upload
    $Poster=time().'_' . basename($_FILES['Poster']['name']);
    $targetDir="../Uploads/";
    if(!is_dir($targetDir)) mkdir($targetDir,0777,true);
    $targetFile=$targetDir.$Poster;


if(move_uploaded_file($_FILES['Poster']['tmp_name'],$targetFile))
{
  $stmt = $conn->prepare("INSERT INTO series (Title, Genre, Seasons, Rating, Poster) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssids", $Title, $Genre, $Seasons, $Rating, $Poster);

        if($stmt->execute())
        {
            $message="Series inserted successfully";
        }

else{
    $error="Error inserting series:".$stmt->error;
    unlink($targetFile);
}


}

else
{
    $error="Error uploading poster image";
}


}


}

if($_SERVER["REQUEST_METHOD"]=='GET' && isset($_GET['del']))
{
    $delTitle=$_GET['del'];
    //fecth poster delete
    $res=$conn->query("SELECT Poster FROM series WHERE Title='$delTitle'");
    if($res && $row =$res->fetch_assoc())
    {
        $posterFile="../Uploads/".$row['Poster'];
        if(file_exists($posterFile)) unlink($posterFile);

    }
//delete series form db

if($conn->query("DELETE FROM series WHERE Title='$delTitle'"))
{
    $message="Series deleted successfully";
}

else{
    $error="Error deleting series:".$conn->error;
}




}

$serieslist=$conn->query("SELECT * FROM  series");


?>



<!Doctype html>
<html>
    <head>
        <title>Sereis Management</title>
        <link rel="stylesheet" href="../css/style14.css">
      
</head>

    <body>
        <?php if($message) echo"<p class='success'>$message</p>";?>
        <?php if($error) echo"<p class='error'>$error</p>";?>

        <section class="container">
            <div class="nav">
                  <img src="download.png" alt="logo">
               
                 <a href="moviesA.php">Movies</a>
                  <a href="upcomingsA.php">Upcomings</a>
                   <a href="adminPage.php">Home</a>
            </div>
            <div class="content">
                <form action="seriesA.php" method="post" enctype="multipart/form-data">
                    <h1>Insert Series</h1>
                    <input type="text" name ="Title" placeholder="Title">
                    <input type="text" name ="Genre" placeholder="Genre">
                    <input type="text" name ="Seasons" placeholder="No_Seasons">
                    <input type="number" step="0.1" name ="Rating" placeholder="Rating">
                    <input type="file" name ="Poster" accept="image/*">
                    <input type="submit" value="Insert">

                </form>
                    <h2>Series List</h2>
                    <table>
                       <tr>
                    <th>Title</th>
                      <th>Genre</th>
                        <th>No Of Seasons</th>
                          <th>Rating</th>
                            <th>Poster</th>
                            <th>Action</th>
                </tr>

                <?php
                if($serieslist && $serieslist->num_rows>0)
                {
                    while($row=$serieslist->fetch_assoc())
                    {
                        echo"<tr>




 <td>{$row['Title']}</td>
                        <td>{$row['Genre']}</td>
                        <td>{$row['Seasons']}</td>
                        <td>{$row['Rating']}</td>
                        <td><img src='../Uploads/{$row['Poster']}' width='80'></td>

                           <td>
                           <a class='delete-btn' href='seriesA.php?del={$row['Title']}'
                           onclick=\"return confirm('Are you sure you want to delete this series?');\">
                                   Delete
                                   </a>
                           </td>
                        
                        </tr>";
                    }
                }
                ?>
                    </table>



            </div>
        </section>

    </body>
</html>