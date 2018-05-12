<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: scheduler.php");
        exit();
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
    
    
    function displayDashboard() {
        global $bdd;
        
        $sql = "SELECT * FROM `dashboard` WHERE 1";
        $stmt = $bdd -> prepare($sql);
        $stmt -> execute();
        $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        
        echo "<table>";
        echo "<tr>
                <th>Date</th>
                <th>Start Time</th>
                <th>Duration</th>
                <th>Booked by</th>
                <th></th>
                <th></th>
             </tr>";
             
        foreach($records as $r){
            echo "<tr><td>" . $r['date'] . "</td>";
            echo "<td>" . $r['start_time'] . "</td>";
            echo "<td>" . $r['duration'] . "</td>";
            echo "<td>" . $r['booked_by'] . "</td>";
            echo "<td><form action=' '><input type='hidden' name=' ' value='".$r[' ']."'><input type='submit' value='Details'></form></td>";
            echo "<td><form action='delete.php' onsubmit='return confirmDelete(\"".$r['date']."\")'><input type='hidden' name='ID' value='".$r['ID']."'><input type='submit' value='Delete'></form></td></tr>";
        }
    echo "</table>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <meta charset="utf-8"/>
        <script>
            function confirmDelete(date) {
                return confirm("Are you sure you want to remove the time slot? " + date + " This cannot be undone.");
            }
        </script>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                padding: 5px;
            }
            
            table {
                margin: auto;
            }
            
            form {
                display: inline;
            }
            
            head, body {
                text-align: center;
            }
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
        <div id="title">
            <h1>DASHBOARD</h1>
            <h2>Welcome <?=$_SESSION['userFullName']?>!</h2>
        </div>
        
        <div id="content"> 
                <form>
                    Invitation Link <input type="text"/>
                </form>
                
                <form action="addSlot.php">
                    <input type="submit" value="Add Multiple Time Slots"/>
                </form>
                
                <form method="POST" action="scheduler.php">
                    <input type="submit" name="logout" value="Logout"/>
                </form>
            
            
            <br/>
            <hr/>
        
            <?=displayDashboard()?>
            
            <hr/>
        </div><br/><br/><br/>
        
        
        <center><img src="ERD.png" alt="ERD"></center><br/><br/><br/>
        
        <table>
            <thead>
            <tr>
            <th style="text-align:left">#</th>
            <th style="text-align:left">Task Description</th>
            <th style="text-align:left">Points</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td style="text-align:left">1</td>
            <td style="text-align:left; background-color: green;">You provide a ERD diagram representing the data and its relationships. This may be included in Cloud9 as a picture or from a designer tool</td>
            <td style="text-align:left">10</td>
            </tr>
            <tr>
            <td style="text-align:left">2</td>
            <td style="text-align:left; background-color: green;">Tables in MySQL match the ERD and support the requirements of the application</td>
            <td style="text-align:left">20</td>
            </tr>
            <tr>
            <td style="text-align:left">3</td>
            <td style="text-align:left; background-color: yellow;">The list of available appointments is pulled from MySQL using the API endpoint and displayed using the specified page design</td>
            <td style="text-align:left">20</td>
            </tr>
            <tr>
            <td style="text-align:left">4</td>
            <td style="text-align:left; background-color: red;">Available times with dates in the past do not show up in the Dashboard list</td>
            <td style="text-align:left">5</td>
            </tr>
            <tr>
            <td style="text-align:left">5</td>
            <td style="text-align:left; background-color: yellow;">A user can add an available time slot to the MySQL using the API endpoint and displayed using the specified modal design</td>
            <td style="text-align:left">20</td>
            </tr>
            <tr>
            <td style="text-align:left">6</td>
            <td style="text-align:left; background-color: yellow;">A user can remove an available time slot from MySQL using the API endpoint</td>
            <td style="text-align:left">15</td>
            </tr>
            <tr>
            <td style="text-align:left">7</td>
            <td style="text-align:left; background-color: yellow;">The user confirms the removal using the specified modal design</td>
            <td style="text-align:left">10</td>
            </tr>
            <tr>
            <td style="text-align:left"></td>
            <td style="text-align:left">TOTAL</td>
            <td style="text-align:left">100</td>
            </tr>
            <tr>
            <td style="text-align:left"></td>
            <td style="text-align:left; background-color: green;">This rubric is properly included AND UPDATED (BONUS)</td>
            <td style="text-align:left">2</td>
            </tr>
            <tr>
            <td style="text-align:left">BD</td>
            <td style="text-align:left; background-color: yellow;">Login works with a User table and BCrypt</td>
            <td style="text-align:left">20</td>
            </tr>
            <tr>
            <td style="text-align:left">BD</td>
            <td style="text-align:left; background-color: green;">The app is deployed to Heroku</td>
            <td style="text-align:left">15</td>
            </tr>
            <tr>
            <td style="text-align:left">BD</td>
            <td style="text-align:left; background-color: red;">A banner file can be uploaded and displayed</td>
            <td style="text-align:left">20</td>
            </tr>
            <tr>
            <td style="text-align:left">BD</td>
            <td style="text-align:left; background-color: green;">The user can add multiple available time slots as specified</td>
            <td style="text-align:left">10</td>
            </tr>
            <tr>
            <td style="text-align:left">BD</td>
            <td style="text-align:left; background-color: red;">In a separate page, you show the correct list of available time slots to the user who navigates to the correct invitation URL</td>
            <td style="text-align:left">10</td>
            </tr>
            <tr>
            <td style="text-align:left">BD</td>
            <td style="text-align:left; background-color: red;">You correctly implement booking of the appointement, including all side effects</td>
            <td style="text-align:left">30</td>
            </tr>
            </tbody>
        </table>
    </body>
</html>