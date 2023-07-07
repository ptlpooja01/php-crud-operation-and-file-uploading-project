<?php
    $id = $_GET['id'];
    $Conn = new PDO("mysql:host=localhost;dbname=mscit","root","");
    $query ="update emp set status=0 where id = $id";
    $stat = $Conn->prepare($query);
    $stat->execute();
    header("Location:./registration.php");
?>