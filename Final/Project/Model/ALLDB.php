<?php
require_once('DB.php');
//register a new user with usertype 
function Reg($name,$email,$number,$username,$password,$usertype)
{
    $con = getConnection();
    $sql = "INSERT INTO user (name,email,number,password,usertype) VALUES('$name','$email','$number','$username','$password','$usertype')";
    $res = mysqli_query($con,$sql);
    return $res ? true:false ;
}

//check if user exists by name
function auth($name)
{
    $con = getConnection();
    $sql="SELECT * FROM users WHERE name = '$name'";
    $res = mysqli_query($con,$sql);
    return mysqli_num_rows($res)===1;

}
//forgot pass

function authForgot($username)
{
    $con = getConnection();
    $sql="SELECT * FROM users WHERE username = '$username'";
    $res = mysqli_query($con,$sql);
    return mysqli_num_rows($res)===1;

}
//user login by usertype


function authLogin($username,$password)
{
    $con = getConnection();
    $sql="SELECT * FROM users WHERE username = '$username'AND  password =''$password'";
    $res = mysqli_query($con,$sql);
    if (mysqli_num_rows($res)===1)
    {
        $row = mysqli_fetch_assoc($res);

        return $row['usertype'];

    }

    return false;

}

//admin login
function authLoginAdmin($username,$password)
{
    $con = getConnection();
    $sql="SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $res = mysqli_query($con,$sql);
    return mysqli_num_rows($res)===1;
}

//update user password
function UpdatePassword($username,$updatepassword)
{
    $con = getConnection();
     $sql="UPDATE users SET password = '$updatepassword' WHERE username='$username'";
      $res = mysqli_query($con,$sql);
      return $res ? true:false;
}
//insert movie
function insertMovie($Title,$Genre,$Duration,$Rating)
{
     $con = getConnection();
       $sql="INSERT INTO movies (Title,Genre,Duration,Rating) VALUES('$Title','$Genre','$Duration','$Rating')";
       $res = mysqli_query($con,$sql);
      return $res ? true:false;
}




//insert series
function insertSeries($Title,$Genre,$Seasons,$Rating)
{
     $con = getConnection();
       $sql="INSERT INTO series (Title,Genre,Seasons,Rating) VALUES('$Title','$Genre','$Seasons','$Rating')";
       $res = mysqli_query($con,$sql);
      return $res ? true:false;
}

function insertUpcomings($Title,$Genre,$RD)
{
     $con = getConnection();
       $sql="INSERT INTO series (Title,Genre,RD) VALUES('$Title','$Genre','$RD')";
       $res = mysqli_query($con,$sql);
      return $res ? true:false;
}



?>