<?php

require_once('../Model/ALLDB.php');
$message =$error="";

//handle form submit

if($_SERVER["REQUEST_METHOD"]=="POST")
{
      $name=isset($_POST["name"])?trim($_POST["name"]):"";
      $email=isset($_POST["email"])?trim($_POST["email"]):"";
      $number=isset($_POST["number"])?trim($_POST["number"]):"";
      $password=isset($_POST["password"])?trim($_POST["password"]):"";
      $usertype=isset($_POST["usertype"])? $_POST["usertype"]:"";


       if(empty($usertype))
       {
        $error="Please selecet user type";
       }

          else
            {
            //name already here
            $checkSql="SELECT * FROM users WHERE name='$name'";
            $result=$conn->query($checkSql);



            if($result && $result->num_rows>0)
            {
                $error="Name already here";
            }
            else
            {
                $sql="INSERT INTO users(name,email,number,password,usertype) VALUES('$name','$email','$number','$password','$usertype')";
            

if($conn->query($sql)===TRUE)
{
    $message="Registration successful";
}
else
{
    $error="Error:".$conn->error;
}

            }
}


}


//fetch all users

$users=$conn->query("SELECT * FROM users");

?>
<!DOCTYPE html>
<html>
    <head>
     <title>   Registrated users </title>

     </head>
     <body>
        <?php


if(!empty($message)) echo "<p style ='color:green;'>$message</p>";
if(!empty($error))echo "<p style='color:red;'>$error</p>";
        ?>


<h2>Registered Members</h2>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Number</th>
        <th>User Type</th>
    </tr>

<?php
if ($users && $users->num_rows > 0) {
    while ($row = $users->fetch_assoc()) {
        echo "<tr>
                <td>".$row['name']."</td>
                <td>".$row['email']."</td>
                <td>".$row['number']."</td>
                <td>".$row['usertype']."</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No users registered yet.</td></tr>";
}
?>
</table>








</table>


<br>
<a href ="../Views/Registration.php">Go back to Registration</a>

     </body>
</html>