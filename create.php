
<?php
    require_once  'connect.php';
?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
    session_start();
    $hike="";
    $diff="";
    $dist="";
    $dura="";
    $heig="";
    $avai="";

    if(isset($_POST["save"])){
    $hike=$_POST["name"];
    $diff=$_POST["difficulty"];
    $dist=$_POST["distance"];
    $dura=$_POST["duration"];
    $heig=$_POST["height"];
    // $avai=$_POST["available"];
    
    $query=['name' => $hike, 'difference' => $diff, 'distance'  => $dist, 'duration'  => $dura, 'height' => $heig, 'available' => $avai];

    $sql="INSERT INTO hiking (name, difficulty, distance, duration, heightdifference) VALUES(:name, :difficulty, :distance, :duration, :height)";

    // $sqlExec = $handler->prepare($sql);
    $query = $handler->prepare($sql);

        $query->bindparam(':name', $hike); 
        $query->bindparam(':difficulty', $diff); 
        $query->bindparam(':distance', $dist); 
        $query->bindparam(':duration', $dura); 
        $query->bindparam(':height', $heig); 

    // if (is )
    // $sqlExec -> execute($query);
    $query -> execute();

        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='read.php'>View Result</a>";

    // header("location: read.php");

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hiking App</title>

    <link rel="stylesheet" href="hiking.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

</head>
<body>

<?php 
require_once 'connect.php'; 
?>

    <div class="container-fluid bg-primary">
        <hr>
        <h3>HIKING DATABASE</h3>
        <hr>
    </div>
    
    <div class = "container">

        <div class = "row d-flex flex-column">

            <form action="" method="POST" class = "d-flex flex-column align-items-center">

            <div class="input-group col-4 m-3">
            <div class="input-group-prepend">
            <button class="btn btn-success" type="button">H-Name</button>
            </div>
            <input type ="text" name="name" value="" placeholder="Name" class="form-control">
            </div>

            <div class="input-group col-4 m-3">
            <div class="input-group-prepend">
            <button class="btn btn-success" type="button">Difficulty</button>
            </div>
                <select class="form-control bg-secondary text-white" name="difficulty">
                <option value="Very Easy">Very Easy</option>
                <option value="Easy">Easy</option>
                <option value="Good">Good</option>
                <option value="Difficult">Difficult</option>
                <option value="Very Difficult">Very Difficult</option>
                </select>
            </div>

            <div class="input-group col-4 m-3">
            <div class="input-group-prepend">
            <button class="btn btn-success" type="button">Distance</button>
            </div>
            <input type ="text" name="distance" value="" placeholder = "Distance" class="form-control">
            </div>

            <div class="input-group col-4 m-3">
            <div class="input-group-prepend">
            <button class="btn btn-success" type="button">Duration</button>
            </div>
            <input type ="text" name="duration" value="" placeholder = "Duration" class="form-control">
            </div>

            <div class="input-group col-4 m-3">
            <div class="input-group-prepend">
            <button class="btn btn-success" type="button">Alt-Height</button>
            </div>
            <input type ="text" name="height" value="" placeholder = "Height" class="form-control">
            </div>


            <!-- <div class="form-group m-3">
                <label>Available:</label>
                <select class="form-control bg-secondary text-white" name="available">
                <option value="Available">Available</option>
                <option value="Not available">Not available</option>
                </select>
            </div> -->


            <div class = "form-group col-12 d-flex justify-content-center">
            <input type="submit" name="save" class="btn btn-primary">
            </div>
                
            </div>
            </form>

        </div>
    </div>
</body>
</html>
