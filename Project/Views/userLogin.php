<?php
session_start();
require_once('../Model/ALLDB.php');
$conn=getConnection();
$message="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name=isset($_POST["name"])? trim($_POST["name"]) : "";
     $password=isset($_POST["password"])? trim($_POST["password"]) : "";


     if(!empty($name)&&!empty($password))
     {
        $sql ="SELECT * FROM users WHERE name='$name' AND password='$password'";
        $result=$conn->query($sql);

        if($result && $result->num_rows>0)
        {
            $user=$result->fetch_assoc();



             $_SESSION["user_logged_in"]= true;
             $_SESSION["user_name"] =$user["name"];
             $_SESSION["user_type"] =$user["usertype"];

             header("Location:UserPage.php");

             exit;







        }
        else{
            $message="Invalid Username and Password";
        }

     }else{
        $message="Please enter username and password";
     }

}

?>
<!Doctype html>
<html>

<head>
    <title>User Login</title>
    <link rel="stylesheet" href="../css/style10.css">

</head>


<body>
<center>
    <h1 id ="home">Stark Universe</h1>
    <h2>User Login</h2>
    <?php if(!empty($message)) echo "<p class ='msg'>$message</p>" ;?>
    <div class="login">

        <form method="post" action ="">
            <p>
                <label><b>Name:</b></label>
                <input type ="text" name="name" required>
            </p>

            <p>
                <label><b>Password:</b></label>
                <input type ="password" name="password" required>
            </p>
                    <p>
                
                <input type ="submit" value="Login" id="loginBtn">
            </p>
            <p>
            <a href="forgotPass.php" class="forgot-link">Forgot Password</a>

            </p>
                      <p>
                         <a href="Welcome.php" ><button type="button" id="backBtn">Back</button></a>
                      </p>

        </form>
    </div>
</center>    

</body>














</html>














