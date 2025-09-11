<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <link rel ="stylesheet" href ="../css/style3.css">

    </head>
    <body>
        <center>
            <a href = "http://localhost/Project1/Project/Views/Welcome.php">Stark Universe</a>
        </center>
        <center>

<div class = "login">
    <form action ="../Controllers/Checkreg.php" method="post">
    
      <label>Name:
        <input type ="text" name ="name">
     </label>
       <br><br>

       <label>Email:
        <input type ="text" name ="email">
     </label>
       <br><br>


   <label>Number:
        <input type ="number" name ="number">
     </label>
       <br><br>

       <label>Password:
        <input type ="password" name ="password">
     </label>
       <br><br>


             <label>

                User Type:
                <select name="usertype" required>

                <option value="">..Selece User Type</option>
                <option value="User1">User1</option>

            <option value="User2">User2</option>



                </select>





             </label>
               <br><br>

                   <input type ="submit" value ="Submit" name ="submit">


    </form>
</div>
        </center>


    </body>
</html>