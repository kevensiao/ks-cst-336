<?php
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
    
    
    $sql = "DELETE FROM dashboard WHERE ID = " . $_GET['ID'];
    
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    
    header("Location: dashboard.php");
?>