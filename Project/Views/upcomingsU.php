<?php

require_once('../Model/ALLDB.php');

$conn=getConnection();
// Fetch all series

$upcomingslist=$conn->query("SELECT * FROM upcomings");
?>


<!Doctype html>
<html>
    <head>
        <title>Upcomings Series List</title>
        <link rel="stylesheet" href="../css/style7.css">
    </head>
    <body>
        <section  class="container">
            <div class="nav">
                <img src="download.png" alt="logo">
                <a href="moviesU.php">Movies</a>
                 <a href="SeriesU.php">Series</a>
                  <a href="upcomingsU.php">Upcoming</a>
                   <a href="userLogin.php">Logout</a>
            </div>

            <div class="content">

            <h2>Available Upcomings Movies and Series</h2>
            <table>
                <tr>
                    <th>Title</th>
                      <th>Genre</th>
                        <th>RD</th>
                        <th>Type</th>
                         
                            <th>Poster</th>
                </tr>
                <?php
                if($upcomingslist && $upcomingslist->num_rows>0)
                {
                    while($row=$upcomingslist->fetch_assoc())
                    {
                        echo
                        "<tr>
                        <td>{$row['Title']}</td>
                        <td>{$row['Genre']}</td>
                        <td>{$row['RD']}</td>
                        <td>{$row['Type']}</td>
                        <td><img src='../Uploads/{$row['Poster']}' width='80' alt='Poster'>

                        </tr>";
                    }
                    
                }
                else{
                    echo "<tr><td colspan='5'>No upcomings found</td></tr>";
                }
                ?>
            </table>
            </div>
        </section>
    </body>
</html>

<html>

    