<?php

    if(isset($_POST['btnsubmit']))
    {
        $extension = strtolower(pathinfo($_FILES['fileupload']['name'],PATHINFO_EXTENSION));
        $filename = time() . ".". $extension;
        $filepath = "./upload/" . $filename;
        if($extension == "jpg" || $extension == "png" || $extension == "jpeg")
        {
            
            if(move_uploaded_file($_FILES['fileupload']['tmp_name'],$filepath))
                header("Location:./inquiry .php");            
            else
            {
                echo "<h1> Error in file uploaded...</h1>";
            }
        }
        else
        {
            echo "<h1> only jpg file is allowed...!!! </h1>";
        }
        $id = $_GET['id'];
        session_start();
        $userid = $_SESSION['id'];
        //echo $userid;
        $name = $_POST['name'];
        $qualification = $_POST['qualification'];
        $salary = $_POST['salary'];
        $ip = $_SERVER['REMOTE_ADDR'];

        //database connection
        $Conn = new PDO("mysql:host=localhost;dbname=mscit","root","");
        $query ="insert into inquiry(id,name,qualification,salary,fname,ip,time,status,userid) values(NULL,'$name','$qualification','$salary','$filename','$ip',NULL,1,'$userid')";
        $stat = $Conn->prepare($query);
        $stat->execute();
        $Conn = null;
        header("Location:./inquiry.php");
        
        
     }
    else
    {
        header("Location:./login.php");
    } 


?>