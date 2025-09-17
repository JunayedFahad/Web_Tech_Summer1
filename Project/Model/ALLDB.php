<?php
require_once('DB.php');
//register a new user with usertype 
function Reg($name,$email,$number,$username,$password,$usertype)
{
    $conn= getConnection();
    $sql = "INSERT INTO user (name,email,number,password,usertype) VALUES('$name','$email','$number','$username','$password','$usertype')";
    $res = mysqli_query($conn,$sql);
    return $res ? true:false ;
}

//check if user exists by name
function auth($name)
{
    $conn = getConnection();
    $sql="SELECT * FROM users WHERE name = '$name'";
    $res = mysqli_query($conn,$sql);
    return mysqli_num_rows($res)===1;

}
//forgot pass

function authForgot($name)
{
    $conn = getConnection();
    $sql="SELECT * FROM users WHERE name = '$name'";
    $res = mysqli_query($conn,$sql);
    return mysqli_num_rows($res)===1;

}
//user login by usertype


function authLogin($username,$password)
{
    $conn = getConnection();
    $sql="SELECT * FROM users WHERE username = '$username'AND  password =''$password'";
    $res = mysqli_query($conn,$sql);
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
    $conn = getConnection();
    $sql="SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $res = mysqli_query($conn,$sql);
    return mysqli_num_rows($res)===1;
}

//update user password
function UpdatePassword($name,$updatepassword)
{
    $conn = getConnection();
     $sql="UPDATE users SET password = '$updatepassword' WHERE name='$name'";
      $res = mysqli_query($conn,$sql);
      return $res ? true:false;
}
//insert movie
function insertMovie($Title,$Genre,$Duration,$Rating,$Poster)
{
     $conn = getConnection();
       $sql="INSERT INTO movies (Title,Genre,Duration,Rating) VALUES('$Title','$Genre','$Duration','$Rating',$Poster)";
       $res = mysqli_query($conn,$sql);
      return $res ? true:false;
}




//insert series
function insertSeries($Title,$Genre,$Seasons,$Rating,$Poster)
{
     $conn = getConnection();
       $sql="INSERT INTO series (Title,Genre,Seasons,Rating,Poster) VALUES('$Title','$Genre','$Seasons','$Rating','$Poster')";
       $res = mysqli_query($conn,$sql);
      return $res ? true:false;
}

function insertUpcomings($Title,$Genre,$RD,$Type,$Poster)
{
     $conn = getConnection();
       $sql="INSERT INTO series (Title,Genre,RD,Type,Poster) VALUES('$Title','$Genre','$RD',$Type,$Poster)";
       $res = mysqli_query($conn,$sql);
      return $res ? true:false;
}



?>