<!DOCTYPE html> 
<html>
    <head>
        <title>Forgot Password</title>
        <link rel="stylesheet" href="../css/style12.css">
    </head>
    <body>
        <div class="login-box">
            <a href="http://localhost/Project1/Project/Views/userLogin.php" class="back-btn" > Go Back </a>
            <h2>Reset Password</h2>
            <form action="../Controllers/retrievePass.php" method="post">
           
             <label for="name">Enter you Name</label>
             <input type="text" name="Name" id="name" required>
             <label for="password">Enter new password</label>
             <input type="password" name="Password" id="password" required>
             <input type="submit" value="Update" name="update" class="update-btn">



             <?php
             error_reporting(E_ERROR | E_PARSE);
             session_start();
             if(isset($_SESSION['msg']))
             {
                echo "<p class='msg'>" . $_SESSION['msg']."</p>";
                session_destroy();
             }
             ?>





            </form>
        </div>
    </body>
</html>