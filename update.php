<html>
    <head> </head>
        <body>
            <form action="dbedit.php" method="post">
                <?php
                    $id = $_GET['id'];
                    $Conn = new PDO("mysql:host=localhost;dbname=mscit","root","");
                    $query ="select * from emp where id=$id";
                    $stat = $Conn->prepare($query);
                    $stat->execute();
                    $result = $stat->fetchAll();
                    $r = $result[0];
                    $Conn = null;
                ?>
                <table border="1" align="center">
                    <tr>
                        <th>Edit Form</th>
                    </tr>
                    <tr>
                        <td>
                            <label>Employe Name :</label>
                            <input type="text" name="ename" value="<?php echo $r['ename'];?>" require>
                            <input type="hidden" name="id" value="<?php echo $r['id'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Gender :</label>
                            <?php if($r['gender']=="female") {?>
                                <input type="radio" name="gender" value="female" checked>Female
                                <input type="radio" name="gender" value="male">Male
                            <?php } else {?>
                                <input type="radio" name="gender" value="female">Female
                                <input type="radio" name="gender" value="male" checked>Male
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>City :</label>
                        <input type="text" name="city" value="<?php echo $r['city'];?>" require>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Email :</label>
                        <input type="text" name="email" value="<?php echo $r['email'];?>" require>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Mobile NO :</label>
                        <input type="text" name="mobileno" value="<?php echo $r['mobileno'];?>" require>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label> Role:</label>
                            <select name="role">
                                <?php if($r['role']=="Project Manager") {?>
                                    <option value="Project Manager" selected>Project Manager</option>
                                    <option value="IT Analysts">IT Analysts</option>
                                    <option value="Developers">Developers</option>
                                <?php } else if($r['role']=="IT Analysts") {?>
                                    <option value="Project Manager" >Project Manager</option>
                                    <option value="IT Analysts"selected>IT Analysts</option>
                                    <option value="Developers">Developers</option>
                                <?php } else {?>
                                    <option value="Project Manager" >Project Manager</option>
                                    <option value="IT Analysts">IT Analysts</option>
                                    <option value="Developers"selected>Developers</option>
                               <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Update" name="update">
                        </td>
                    </tr>
                </table>
            </form>
        </body>
   
</html>

<?php
    include "./display.php";
?>