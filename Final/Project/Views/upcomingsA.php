<?php
$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "ott";
$conn = new mysqli($servername, $username, $pass, $dbname);
if (isset($_GET['del'])) {
  $title = $_GET['del'];
  $sql1 = "Delete from upcomings where Title='$title'";
  mysqli_query($conn, $sql1);
} else if (isset($_GET['edit'])) {
  echo $_GET['edit'];
}
$sql = "select * from upcomings";
$res = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html>

<head>
  <title></title>

  <style>
    body{
      background-color: #DAE0E2;
    }
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
      margin-top: 20px;
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
    input{
            margin-top: 10px;
            padding: 12px 20px;
            width: 200px;
        }
        button{
          height: 50px;
            width: 130px;
            background-color: #FF4848;
            border: none;
            color: black;
            font-weight: bold;
            font-size: 20px;
        }
        b{
          font-size: 20px;
        }
        h1{
          color: #26ae60;
          font-size: 30px;
        }
  </style>










</head>

<body>
  <section class="container">
    <div class="nav">
      <img src="download.png" alt="">
      <br>
      <a href="http://localhost/MVCFINAL/Views/userInfoA.php">User Information</a>
      <br>
      <a href="http://localhost/MVCFINAL/Views/moviesA.php">Movies</a>
      <br>
      <a href="http://localhost/MVCFINAL/Views/seriesA.php">Series</a>
      <br>
      <a href="http://localhost/MVCFINAL/Views/upcomingsA.php">Upcomings</a>
      <br>
      <a href="http://localhost/MVCFINAL/Views/adminPage.php">Home</a>

    </div>
    <div>
      <center>
      <h1>Insert Upcomings</h1>
      <form action="../Controllers/InsertUpcomings.php" method="post">
        <b>Title:</b> <input type="text" name="Title" id=""><br>
        
        <b>Genre:</b><input type="text" name="Genre" id=""><br>
        
        <b>Release Date:</b> <input type="date" name="Release_Date" id="">
        
        <br>



        <input type="submit" value="Insert" name="Insert">
      </form>
      </center>











      <form method="get">
        <table border="1">
          <tr>
            <th>Title</th>
            <th>Genre</th>
            <th>Release Date</th>
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
                <?php echo $r["Release_Date"]; ?>
              </td>


              <td><button type="submit" name="del" value="<?php echo $r["Title"]; ?>">Delete</button> </td>
            </tr>
          <?php } ?>
        </table>
      </form>
    </div>


  </section>

























</body>

</html>