



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <style>
        body{
            background-image: url('movie-podium-background-with-movie-objects-3d-rendering_651547-1443.AVIF');
            
        }
        .login{
            padding: 50px;
            margin-top: 220px;
            height: 300px;
            background-color: black;
            opacity: .8;
            color: white;
        }
        input{
            margin-top: 30px;
            padding: 12px 20px;
            width: 200px;
        }
        #login{
            margin-bottom: 10px;
            margin-left: 40px;
            height: 50px;
            width: 130px;
            background-color: #45CE30;
            border: none;
            color: black ;
            font-weight: bold;
            font-size: 20px;
        }
        .msg{
            font-size: 20px;
        }
        a{
            font-size: 20px;
        }
        #home{
            font-size: 80px;
            color: #F5BCBA;
        }
        b{
            font-size: 20px
        }
       
        
        
    </style>
</head>
<body>

    <center><a id="home" href="http://localhost/MVCFINAL/Views/Welcome.php">PopFlix</a>
        <br></center>
    
    <div class="login">
    
    <center>
    <form action="../Controllers/CheckUserLogin.php" method="post">
    <b>Username:</b> <input type="text" name="Username" id="">
    <br>
     <b>Password : </b>  <input type="password" name="Password" id="">
    <br>
    <input type="submit" value="Login" name="Login" id="login">
    <br>
    
    
    <?php 
error_reporting(E_ERROR | E_PARSE);
    session_start();
    $m = $_SESSION['msg'];
   
   echo "<center>$m </center>" ;
   session_destroy();
   
    
    
    
    
    
    ?>
    
    

    <a href="http://localhost/MVCFINAL/Views/forgotPass.php">Forgot Password?</a>
         
    </form>
    </center>
    
    </div>









    
</body>
</html>



