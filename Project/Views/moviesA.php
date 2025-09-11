<?php
require_once('../Model/ALLDB.php');

$conn = getConnection();
$message = $error ="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $Title = trim($_POST["Title"]);
    $Genre = trim($_POST["Genre"]);
    $Duration = trim($_POST["Duration"]);
    $Rating = trim($_POST["Rating"]);



    if(empty($Title)||empty($Genre)||empty($Duration)||empty($Rating))
    {
        $error="Please fill all fields" ;
    }
    else
    {
        $check = $conn->query("SELECT * FROM movies WHERE Title='$Title'");
        if($check->num_rows>0)
        {
            $error = "Movies already exits";
        }

        else
        {
            $conn->query("INSERT INTO movies(Title,Genre,Duration,Rating)VALUES('$Title','$Genre','$Duration','$Rating')");
            $message="Series inserted successfully";
        }
    }

}
if(isset($_GET['del']))
{
    $delTitle = $_GET['del'];
    $conn->query("DELETE FROM movies WHERE Title='$delTitle'");
}


//fetch

$movieslist=$conn->query("SELECT * FROM movies");




?>


<!Doctype html>
<html>
    <head>
           <title>Movies Management</title>
            <link rel="stylesheet" href="../css/style4.css">

    </head>

<body>
    <?php if($message) echo"<p class ='success'>$message</p>"; ?>
    <?php if($error) echo"<p class ='error'>$error</p>"; ?>

    <section class="container">

      <div class ="nav";>
           <img src = "download.png" alt="logo">
           <a href = "userInfo.php">User Information</a>
             <a href = "moviesA.php">Movies</a>
              <a href = "seriesA.php">Series</a>
               <a href = "upcomingsA.php">Upcomings</a>
                <a href = "adminPage.php">Home</a>


      </div>

      <div class="content">


            <form action ="" method="post";>
                <h1>
                    Insert Movies
                </h1>

                   <input type="text" name ="Title" placeholder="Title">
                    <input type="text" name ="Genre" placeholder="Genre">
                                        <input type="text" name ="Duration" placeholder="Duration">
                                        <input type="number" step="0.1" name="Rating" placeholder="Rating">
                                        <input type = "submit" vallue="Insert">






            </form>




            <h2>Series List</h2>
            <table>


            <tr>
                <th>Title</th>
                <th>Genre</th>
                <th>Duration</th>
                <th>Rating</th>
                <th>Action</th>
            </tr>
                <?php

                          if($movieslist && $movieslist->num_rows>0)
                          {
                            while($row=$movieslist->fetch_assoc())
                            {
                                echo "<tr>

                                   <td>{$row['Title']}</td>
                                   <td>{$row['Genre']}</td>
                                   <td>{$row['Duration']}</td>
                                   <td>{$row['Rating']}</td>
                                   <td><a class='delete-btn'href='moviesA.php?del={$row['Title']}'>Delete</a></td>


                     



                                </tr>" ;
                            }
                          }
                           else
                           {
                            echo "<tr><td colspan='5'>No Movies found</td></tr>";
                           }






                ?>






            </table>
         
      </div>
      






    </section>



</body>




</html>