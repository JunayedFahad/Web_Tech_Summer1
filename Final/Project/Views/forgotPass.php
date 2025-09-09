<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password</title>

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
        #u{
            margin-left: 130px;
            margin-bottom: 40px;
        }
        #gb{
            margin-bottom: 10px;
            margin-left: 40px;
            height: 40px;
            width: 100px;
            background-color: #45CE30;
            border: none;
            color: black ;
            font-weight: bold;
            font-size: 20px;
        }
       
        
        
    </style>














</head>
<body>
    

   <div class="login">
   <center>
   <a href="http://localhost/MVCFINAL/Views/userLogin.php"><button id="gb">Go Back</button></a>
    <form action="../Controllers/retrievePass.php" method="post">
    Enter your username : <input type="text" name="Username" id="">
    <br>
    <br>
    
    Enter new Password: <input type="password" name="Password" id="">
    <br>
    <br>
    
    <input id="u" type="submit" value="Update" name="update">
    <?php 
error_reporting(E_ERROR | E_PARSE);
    session_start();
    $m = $_SESSION['msg'];
   
   echo "<center>$m </center>" ;
   session_destroy();
   
    
    
    
    
    
    ?>



    
         
    </form>












    </center>
   </div>

    
</body>
</html>