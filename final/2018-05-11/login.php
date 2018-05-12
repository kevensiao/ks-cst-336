<?php
    session_start();
   
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
    
    
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    
    $sql = "SELECT * FROM `user` WHERE username = :userN AND password = :passW";
    $namedParam = array(":userN" => $username, ":passW" => $password);
    
    $stmt = $bdd -> prepare($sql);
    $stmt -> execute($namedParam);
    $record = $stmt -> fetch(PDO::FETCH_ASSOC);
    
    if(empty($record)) {
        header("Location: scheduler.php?login=Error");
    }
    else {
        $_SESSION['username'] = $record['username'];
        
        header("Location: dashboard.php"); 
    }
?>