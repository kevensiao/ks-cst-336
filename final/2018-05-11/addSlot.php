<?php
    session_start();
    if (!isset($_SESSION['username'])) { 
        header("Location: dashboard.php");
    }
    
    $connUrl = "mysql://trn5zsb0tbly80jw:vac4hxlio0wzkrmb@z1ntn1zv0f1qbh8u.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/mlm03i8f43cxocez";
    $hasConnUrl = !empty($connUrl);
    
    $connParts = null;
    if ($hasConnUrl) {
        $connParts = parse_url($connUrl);
    }
    
    $host = $hasConnUrl ? $connParts['host'] : getenv('IP');
    $dbname = $hasConnUrl ? ltrim($connParts['path'],'/') : 'crime_tips';
    $username = $hasConnUrl ? $connParts['user'] : getenv('C9_USER');
    $password = $hasConnUrl ? $connParts['pass'] : '';
    
    $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    
    if (isset($_GET['addSlotForm'])) {

        $date = $_GET['date'];
        $start_time = $_GET['start_time'];
        $duration = $_GET['end_time'] - $_GET['start_time']. " hour(s)";
        $booked_by = $_SESSION['username'];
        
        $sql = "INSERT INTO dashboard (date, start_time, duration, booked_by) VALUES (:date, :start_time, :duration, :booked_by)";
        
        $parameters = array();
        $parameters[':date'] =  $date;
        $parameters[':start_time'] =  $start_time;
        $parameters[':duration'] =  $duration;
        $parameters[':booked_by'] = $booked_by;
        
        $stmt = $bdd->prepare($sql);
        $stmt->execute($parameters);
        
        echo "Slot has been added successfully! <br>";
    }

?>
    
<!DOCTYPE html>
<html>
    <head>
        <title> Dashboard : Add Slot</title>
        <style>
            body{
                font-family: 'Satisfy', cursive;
                font-size : 150%;
                background-color : lightgrey;
            }
            h1 {
                color : #660000;
            }
            h2 {
                color : #990000;
            }
        </style>
        
        <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
    </head>
    
    <body>
        <a href="dashboard.php">Back to the menu</a>
        <h1> Add Time Slot </h1>
        
        <form>
            Date: <input type="date" name="date" required /><br>
            Start Time: <input type="time" name="start_time" required /><br>
            End Time: <input type="time" name="end_time" required /><br>
            
            <input type="submit" name="addSlotForm" value="Add"/>
        </form>
        
    </body>
</html>
