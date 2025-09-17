<?php

require_once('../Model/ALLDB.php');
$conn=getConnection();
$message=$error="";

//insert handle

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $Title=trim($_POST["Title"]);
    $Genre=trim($_POST["Genre"]);
    $RD=trim($_POST["RD"]);
    $Type=trim($_POST["Type"]);
   // $Rating=trim($_POST["Rating"]);


if(empty($Title) || empty($Genre)||empty($RD))
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
  $stmt = $conn->prepare("INSERT INTO upcomings (Title, Genre, RD,Type,Poster) VALUES (?, ?, ?, ?,?)");
$stmt->bind_param("sssss", $Title, $Genre, $RD,$Type,$Poster);

        if($stmt->execute())
        {
            $message="Upcomings inserted successfully";
        }

else{
    $error="Error inserting upcomings:".$stmt->error;
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
    $res=$conn->query("SELECT Poster FROM upcomings WHERE Title='$delTitle'");
    if($res && $row =$res->fetch_assoc())
    {
        $posterFile="../Uploads/".$row['Poster'];
        if(file_exists($posterFile)) unlink($posterFile);

    }
//delete series form db

if($conn->query("DELETE FROM upcomings WHERE Title='$delTitle'"))
{
    $message="Upcomings deleted successfully";
}

else{
    $error="Error deleting upcomings:".$conn->error;
}




}

$upcomingslist=$conn->query("SELECT * FROM  upcomings");


?>



<!Doctype html>
<html>
    <head>
        <title>Upcoming Move and Series Management</title>
        <link rel="stylesheet" href="../css/style13.css">
      
</head>

    <body>
        <?php if($message) echo"<p class='success'>$message</p>";?>
        <?php if($error) echo"<p class='error'>$error</p>";?>

        <section class="container">
            <div class="nav">
                  <img src="download.png" alt="logo">
                
                 <a href="moviesA.php">Movies</a>
                  <a href="seriesA.php">Sereis</a>

                  <a href="upcomingsU.php">Upcoming</a>
                   <a href="adminPage.php">Home</a>
            </div>
            <div class="content">
                <form action="upcomingsA.php" method="post" enctype="multipart/form-data">
                    <h1>Insert Series</h1>
                    <input type="text" name ="Title" placeholder="Title">
                    <input type="text" name ="Genre" placeholder="Genre">
                    <input type="date" name ="RD" placeholder="Relase_Date">
                    <select name="Type" required>
                        <option value="">--Select Type--</option>
                        <option value="Movie">Movies</option>
                        <option value="Series">Series</option>
                    </select>
                    
                    <input type="file" name ="Poster" accept="image/*">
                    <input type="submit" value="Insert">

                </form>
                    <h2>Upcoming List</h2>
                    <table>
                       <tr>
                    <th>Title</th>
                      <th>Genre</th>
                        <th>RD</th>
                         <th>Type</th>
                            <th>Poster</th>
                            <th>Action</th>
                </tr>

                <?php
                if($upcomingslist && $upcomingslist->num_rows>0)
                {
                    while($row=$upcomingslist->fetch_assoc())
                    {
                        echo"<tr>




 <td>{$row['Title']}</td>
                        <td>{$row['Genre']}</td>
                        
                        <td>{$row['RD']}</td>
                        <td>{$row['Type']}</td>
                        <td><img src='../Uploads/{$row['Poster']}' width='80'></td>

                           <td>
                           <a class='delete-btn' href='upcomingsA.php?del={$row['Title']}'
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