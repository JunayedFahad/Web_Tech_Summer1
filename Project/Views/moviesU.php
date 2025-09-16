<?php

require_once('../Model/ALLDB.php');

$conn=getConnection();
// Fetch all series

$movieslist=$conn->query("SELECT * FROM movies");
?>


<!Doctype html>
<html>
    <head>
        <title>User Movies List</title>
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

            <h2>Available Movies</h2>
            <table>
                <tr>
                    <th>Title</th>
                      <th>Genre</th>
                        <th>Duration</th>
                          <th>Rating</th>
                            <th>Poster</th>
                </tr>
                <?php
                if($movieslist && $movieslist->num_rows>0)
                {
                    while($row=$movieslist->fetch_assoc())
                    {
                        echo
                        "<tr>
                        <td>{$row['Title']}</td>
                        <td>{$row['Genre']}</td>
                        <td>{$row['Duration']}</td>
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

    