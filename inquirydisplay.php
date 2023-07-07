<html>
    <head>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
    </head>
    <body>
    <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });  
        </script>
        <?php

                $Conn = new PDO("mysql:host=localhost;dbname=mscit","root","");
                $query ="select * from inquiry where status=1 order by time desc";
                $stat = $Conn->prepare($query);
                $stat->execute();
                $result = $stat->fetchAll();
                $Conn = null;
                $count =0;
                echo "<table id='example' class='table table-striped' style='width:100%'>";
                echo "<thead>";
                echo "<tr>";
                    echo "<th>Sr NO# </th>";
                    echo "<th>Name</th>";
                    echo "<th>Qualification</th>";
                    echo "<th>Salary</th>";
                    echo "<th>Download</th>";
                echo "</tr>";
                echo "</thead>";
        
                foreach($result as $r)
                {
                    echo "<tr>";
                        echo "<td>".++$count."</td>";
                        echo "<td>".$r['name']."</td>";
                        echo "<td>".$r['qualification']."</td>";
                        echo "<td>".$r['salary']."</td>";
                        echo "<td><a href=./upload/$r[fname]>Download</a></td>";
                    echo "</tr>";
                }
        ?>
    </body>
</html>