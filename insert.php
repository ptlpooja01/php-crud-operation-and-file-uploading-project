<?php

if(isset($_POST['btnsubmit']))
{
    $ename =$_POST['ename'];
    $pwd = md5($_POST['pwd']);
    $gender =$_POST['gender'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $mobileno = $_POST['mobileno']; 
    $role = $_POST['role'];
    $ip = $_SERVER['REMOTE_ADDR'];

    //database connection
    $Conn = new PDO("mysql:host=localhost;dbname=mscit","root","");
    $query ="insert into emp values(NULL,'$ename','$pwd','$gender','$city','$email','$mobileno','$role','$ip',NULL,1)";
    $stat = $Conn->prepare($query);
    $stat->execute();
    header("Location:./login.php");
    //echo"Data inserted ";
}
else
header("Location:./registration.php");
?>