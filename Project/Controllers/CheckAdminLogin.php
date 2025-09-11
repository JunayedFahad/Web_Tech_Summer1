<?php
session_start();
require_once('../Model/ALLDB.php');
$conn = getConnection();

// if not logged in, send to login page
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: adminLogin.php");
    exit;
}

// for now we are using the static login check (admin/123456)
// so we’ll just set the username manually
$username = "admin";

// fetch from DB if exists
$admin = $conn->query("SELECT username FROM admin WHERE username='$username'");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Check Admin Login</title>
    <link rel="stylesheet" href="../css/style5.css">
</head>
<body>
    <h2>Admin Account</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Username</th>
        </tr>
        <?php
        if ($admin && $admin->num_rows > 0) {
            while ($row = $admin->fetch_assoc()) {
                echo "<tr>
                        <td>".$row['username']."</td>
                      </tr>";
            }
        } else {
            // fallback if not found in DB
            echo "<tr><td>".$username."</td></tr>";
        }
        ?>
    </table>

    <br>
    <a href="adminDashboard.php">Go to Dashboard</a> |
    <a href="logout.php">Log Out</a>
</body>
</html>
