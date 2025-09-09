<?php
session_start();
$message="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username=isset($_POST["username"]) ? trim($_POST["username"]):"";
     $password=isset($_POST["password"]) ? trim($_POST["password"]):"";



if($username==="admin"&&  $password==="123456")
{
    $_SESSION["admin_logged_in"]=true;
    header("Location:adminDashboard.php");
    exit;
}
else
{
    $message="Invalid Username or Password!";
}


}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" href="../css/style1.css">
</head>


<body>
    <center>
        <h2>Admin Login</h2>
        <?php

       if(!empty($message))
        echo "<p style='color:red;'>$message</p>" ;
        ?>

        <div class="login">
            <form method="post" action="">

              <label>
                Username:
                <input type="text" name="username" required>

              </label>
              <br><br>    
                <label>
                    Password:
                    <input type="password" name="password" required>
                </label>
                <br><br>

                <input type="submit" value="Login">











            </form>
        </div>
    </center>
</body>
</html>