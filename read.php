
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hiking App</title>

    <link rel="stylesheet" href="hiking.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

<?php
require_once 'connect.php';
?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
$sth = $handler->prepare('SELECT * FROM hiking');
$sth->execute();
?>

    <div class="container-fluid bg-primary">
        <hr>
        <h3>HIKING DATABASE</h3>
        <hr>
    </div>

    <div class="container">

        <div class="row d-flex justify-content-center" >
        
            <table class="table table-hover table-sm table-bordered">
            <thead class="thead-light ">
                <tr>
                    <th>name</th>
                    <th>difficulty</th>
                    <th>distance</th>
                    <th>duration</th>
                    <th>height-diff</th>
                </tr>

                <?php   
                    while($row = $sth->fetch(PDO::FETCH_ASSOC)) {   
                        
                    echo "<tr>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['difficulty']."</td>";
                    echo "<td>".$row['distance']." km"."</td>";
                    echo "<td>".$row['duration']." hrs"."</td>";
                    echo "<td>".$row['heightdifference']." m"."</td>";  
                    
                    // echo "<td><a href=\"edit.php?idnr=$row[idnr]\">Edit</a> | 
                    // 		<a href=\"delete.php?idnr=$row[idnr]\" 
                    //         onClick=\"return confirm('Are you sure you want to delete this record?')\">Delete</a></td>";    

                    echo "</tr>";
                    }
                ?>

            </thead>
            </table>

        </div>
    </div>

    <div class="d-flex justify-content-center">
    <button onclick="location.href='create.php'" name="add" class="btn btn-primary col-sm-2 m-3">ADD HIKE RECORDS</button>
    </div>

</body>
</html>

