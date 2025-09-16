<?php
require_once('../Model/ALLDB.php');
$conn=getConnection();

$message=$error="";

//delte by nnme
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['delete_name']))

{
    $delete_name =$_POST['delete_name'];
    $sql ="DELETE FROM users WHERE name ='$delete_name'";

    if($conn->query($sql))
    {
        if($conn->affected_rows>0)
        {
            $message="User '$delete_name' deleted successfully";
        }
        else
     {
        $error="No user found with the name'$delete_name'";
        }
    }
    
     else{
        $error="Error deleting user:" . $conn->error;
    }

        
    

    

}
$sql="SELECT id,name,email,number,usertype FROM users ORDER BY id DESC";
$result=$conn->query($sql);
?>

<!Doctype html>
<html>
    <head>
        <title>Registered Users</title>
    </head>
    <body>
        <h1>Registered Users</h1>
        <?php if($message) echo "<p style ='color:green;'>$message</p>";?>
        <?php if($error) echo "<p style ='color:red;'>$error</p>";?>

        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Name</th>
                 <th>Email</th>
                <th>Number</th>
                 <th>User Type</th>
                <th>Action</th>
            </tr>
            <?php
            

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['email']."</td>
                <td>".$row['number']."</td>
                <td>".$row['usertype']."</td>


               <td>
               <form method='post'>
               <input type='hidden'  name='delete_name' value='{$row['name']}'>
               <button type='submit'>Delete</button>
               </form>
               </td>





              </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No users usser Found yet.</td></tr>";
}




            ?>

        </table>

    </body>
</html>