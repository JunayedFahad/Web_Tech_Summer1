<?php
$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "ott";
$conn = new mysqli($servername, $username, $pass, $dbname);
if (isset($_GET['del'])) {
  $id = $_GET['del'];
  $sql1 = "Delete from series where Title='$title'";
  mysqli_query($conn, $sql1);
} else if (isset($_GET['edit'])) {
  echo $_GET['edit'];
}
$sql = "select * from series";
$res = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html>

<head>
  <title></title>
  <style>
    .nav {
      width: 320px;
      height: 1000px;
      background-color: black;
    }

    a {
      font-size: 40px;
      color: #F5BCBA;

      text-decoration: none;

      margin-left: 20px;
    }

    .logout {
      height: 50px;
      width: 130px;
      background-color: #FF4848;
      border: none;
      color: black;
      font-weight: bold;
      font-size: 20px;

    }
    .container{
      display: flex;
    }








    table {
      border-collapse: collapse;
      width: 1500px;
    }
    

    th,
    td {
      text-align: left;
      padding: 8px;
      font-size: 30px;
    }

    th {
      background-color: #04AA6D;

    }

    tr:nth-child(even) {
      background-color: #F5BCBA;
    }
    #d{
      color: green;
      font-size: 20px;
      opacity: .8;
    }
    #d{
      color: green;
      font-size: 20px;
      opacity: .8;
    }
  </style>







</head>

<body>
  <section class="container">
  <div class="nav">
    <img src="download.png" alt="">
    <br>



    <a id="m" href="http://localhost/MVCFINAL/Views/moviesU.php">Movies</a>
    <br>
    <br>

    <br>
    <br>
    <a href="http://localhost/MVCFINAL/Views/seriesU.php">Series</a>
    <br>
    <br>

    <br>
    <br>
    <a href="http://localhost/MVCFINAL/Views/upcomingsU.php">Upcomings</a>

    <br>
    <br>

    <br>
    <br>
    <a href="http://localhost/MVCFINAL/Views/userLogin.php"><button class="logout">Log out</button></a>


  </div>
  <form method="get">
    <table border="1">
      <tr>
        <th>Title</th>
        <th>Genre</th>
        <th>No of Seasons</th>
        <th>Rating</th>
        <th></th>
      </tr>
      <?php while ($r = mysqli_fetch_assoc($res)) { ?>
        <tr>
          <td>
            <?php echo $r["Title"]; ?>
          </td>
          <td>
            <?php echo $r["Genre"]; ?>
          </td>
          <td>
            <?php echo $r["No_of_Seasons"]; ?>
          </td>
          <td>
            <?php echo $r["Rating"]; ?>
          </td>
          <td><a id="d" href="Picture1.png" Download="">Download File</a></td>

        </tr>
      <?php } ?>
    </table>
  </form>

  </section>

  









  
</body>

</html>