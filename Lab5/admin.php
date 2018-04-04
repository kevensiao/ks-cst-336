<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit();
    }
    
    $connUrl = "mysql://trn5zsb0tbly80jw:vac4hxlio0wzkrmb@z1ntn1zv0f1qbh8u.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/mlm03i8f43cxocez";
    $hasConnUrl = !empty($connUrl);
    
    $connParts = null;
    if ($hasConnUrl) {
        $connParts = parse_url($connUrl);
    }
    
    //var_dump($hasConnUrl);
    $host = $hasConnUrl ? $connParts['host'] : getenv('IP');
    $dbname = $hasConnUrl ? ltrim($connParts['path'],'/') : 'crime_tips';
    $username = $hasConnUrl ? $connParts['user'] : getenv('C9_USER');
    $password = $hasConnUrl ? $connParts['pass'] : '';
    
    $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    
    function displayUsers() {
        global $bdd;
        
        $sql = "SELECT * FROM `user` WHERE 1";
        $stmt = $bdd -> prepare($sql);
        $stmt -> execute();
        $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        
        echo "<table>";
        echo "<tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Dept. ID</th>
                <th>Update Info</th>
                <th>Delete User</th>
             </tr>";
             
        foreach($records as $r) {
            echo "<tr><td>" . $r['userId'] . "</td>";
            echo "<td>" . $r['firstName'] . "</td>";
            echo "<td>" . $r['lastName'] . "</td>";
            echo "<td>" . $r['email'] . "</td>";
            echo "<td>" . $r['gender'] . "</td>";
            echo "<td>" . $r['phone'] . "</td>";
            echo "<td>" . $r['role'] . "</td>";
            echo "<td>" . $r['deptId'] . "</td>";
            echo "<td><form action='updateUser.php'><input type='hidden' name='userId' value='".$r['userId']."'><input type='submit' value='Update'></form></td>";
            echo "<td><form action='deleteUser.php' onsubmit='return confirmDelete(\"".$r['firstName']."\")'><input type='hidden' name='userId' value='".$r['userId']."'><input type='submit' value='Delete'></form></td></tr>";
        }
    
    echo "</table>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Portal</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <meta charset="utf-8"/>
        <script>
            function confirmDelete(firstName) {
                return confirm("Are you sure you want to delete " + firstName + "?");
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
            
        </style>
    </head>
    
    <body>
        <div id="title">
            <h1>ADMIN PORTAL</h1>
            <h2>Welcome <?=$_SESSION['adminFullName']?>!</h2>
        </div>
        
        <div id="content">
            
                <form action="addUser.php">
                    <input type="submit" value="Add New User"/>
                </form>
                &nbsp;
                <form method="POST" action="index.php">
                    <input type="submit" name="logout" value="Logout"/>
                </form>
            
            
            <br/>
            <hr/>
        
            <?=displayUsers()?>
            
            <hr/>
            
        </div>
    </body>
</html>