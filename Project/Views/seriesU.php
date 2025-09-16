<?php

require_once('../Model/ALLDB.php');

$conn=getConnection();
// Fetch all series

$serieslist=$conn->query("SELECT * FROM series");
?>


<!Doctype html>
<html>
    <head>
        <title>User Series List</title>
        <link rel="stylesheet" href="../css/style7.css">
    </head>
    <body>
        <section  class="container">
            <div class="nav">
                <img src="download.png" alt="logo">
                <a href="moviesU.php">Movies</a>
                 <a href="SeriesU.php">Series</a>
                  <a href="upcomingsU.php">Upcomings</a>
                   <a href="userLogin.php">Logout</a>
            </div>

            <div class="content">

            <h2>Available Series</h2>
            <table>
                <tr>
                    <th>Title</th>
                      <th>Genre</th>
                        <th>No Of Seasons</th>
                          <th>Rating</th>
                            <th>Poster</th>
                </tr>
                <?php
                if($serieslist && $serieslist->num_rows>0)
                {
                    while($row=$serieslist->fetch_assoc())
                    {
                        echo
                        "<tr>
                        <td>{$row['Title']}</td>
                        <td>{$row['Genre']}</td>
                        <td>{$row['Seasons']}</td>
                        <td>{$row['Rating']}</td>
                        <td><img src='../Uploads/{$row['Poster']}' width='80' alt='Poster'>

                        </tr>";
                    }
                    
                }
                else{
                    echo "<tr><td colspan='5'>No series found</td></tr>";
                }
                ?>
            </table>
            </div>
        </section>
    </body>
</html>

<html>

    