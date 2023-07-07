<?php
    $id = $_POST['id'];
    $ename =$_POST['ename'];
    $gender =$_POST['gender'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $mobileno = $_POST['mobileno']; 
    $role = $_POST['role'];

    $Conn = new PDO("mysql:host=localhost;dbname=mscit","root","");
    $query ="update emp set ename='$ename',gender='$gender',city='$city',email='$email',mobileno='$mobileno',role='$role',time=NULL where id=$id";
    //echo "data inserted";
    $stat = $Conn->prepare($query);
    $stat->execute();
    header("Location:./registration.php");
?>