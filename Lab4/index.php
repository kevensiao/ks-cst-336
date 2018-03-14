<!DOCTYPE html>
<html>
    <head>
        <title>Lab4 </title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
    </head>
    <body>
        <h1>Tech Checkout - Device Search</h1>
        
        <div id="menu">
            <div id="select_type">
                <form action="index.php">
                    <select name="type">
                        <option value="">Select a type</option>
                        <option value="VR headset">VR headset</option>
                        <option value="Tablet">Tablet</option>
                        <option value="Webcam">Webcam</option>
                        <option value="CheatSheet">CheatSheet</option>
                        <option value="Smartphone">Smartphone</option>
                        <option value="Camera">Camera</option>
                        <option value="Laptop">Laptop</option>
                        <option value="Microphone">Microphone</option>
                        <option value="Dynamic Mics">Dynamic Mics</option>
                        <option value="Tripod">Tripod</option>
                    </select><br>
                    
                    <input type="radio" name="order" value="item_name" />Ranked by name</label>
                    
                    <input type="radio" name="order" value="price" />Ranked by price</label><br>
                    
                    <input type="submit", value="Filter"><br>
                </form> 
            </div>
            
            <div id="select_name">
                <form action="index.php"><br>
                    Search by name:<input type="text" name="name" value=""><br>
                    
                    <input type="checkbox" name="price" id="price" />Ranked by price</label><br>
                    
                    <input type="submit", value="Search">
                </form> 
            </div>
            
            <div id="availability">
                <form action="index.php"><br>
                    <input type="checkbox" name="price" id="price" />Ranked by price</label><br>
                    
                    <input type="checkbox" name="available?" id="available?" /> <label for="available?">Available</label>
                    
                    <input type="checkbox" name="checkedout?" id="checkedout?" /> <label for="checkedout?">Checked Out</label><br>
                    
                    <input type="submit", value="Select">
                </form> 
            </div>
        </div>

      
        <div id="list">
            <?php
        
            $dbConn = new PDO("mysql:host=localhost;dbname=lab4", 'kevens', 'lol');
            
            if ($_GET['type']!='')
            {
               echo 'It is ordered by '. $_GET['type'];
                if($_GET['order']=='price'){
                    echo ' and price.';
                    $input = $dbConn->query('SELECT * FROM device WHERE deviceType=\'' . $_GET['type'] . '\' ORDER BY price');
                } 
                else if ($_GET['order']=='item_name') {
                    echo ' and name.';
                    $input = $dbConn->query('SELECT * FROM device WHERE deviceType=\'' . $_GET['type'] . '\' ORDER BY deviceName');
                }
                else{
                    $input = $dbConn->query('SELECT * FROM device WHERE deviceType=\'' . $_GET['type'] . '\'');
                }
            } 
            
            else if ($_GET['name']!='')
            {
                echo 'It is ordered by '. $_GET['name'];
                if($_GET['price']!=''){
                    echo ' and price.';
                    $input = $dbConn->query('SELECT * FROM device WHERE deviceName OR deviceType LIKE \'%'. $_GET['name'] .'%\' ORDER BY price');
                } 
                else {
                    $input = $dbConn->query('SELECT * FROM device WHERE deviceName OR deviceType LIKE \'%'. $_GET['name'] .'%\' ORDER BY deviceName');
                }
            } 
            
            else if ($_GET['available?']!='')
            {
                echo 'Those articles are available';
                 if($_GET['price']!=''){
                     echo ' and ordered by price.';
                    $input = $dbConn->query('SELECT * FROM device WHERE status=\'Available\'ORDER BY price');
                } 
                else {
                    echo ' and ordered by name.';
                    $input = $dbConn->query('SELECT * FROM device WHERE status=\'Available\'ORDER BY deviceName');
                }
            } 
            
            else if ($_GET['checkedout?']!='')
            {
                echo 'Those articles are checkedout';
                if($_GET['price']!=''){
                    echo ' and ordered by price.';
                    $input = $dbConn->query('SELECT * FROM device WHERE status=\'CheckedOut\' ORDER BY price');
                } 
                else {
                    echo ' and ordered by name.';
                    $input = $dbConn->query('SELECT * FROM device WHERE status=\'CheckedOut\' ORDER BY deviceName');
               }
            } 
            
            else 
            {
                if($_GET['price']!=''){
                    echo 'It is ordered by price.';
                    $input = $dbConn->query('SELECT * FROM device ORDER BY price');
                } 
                else 
                {
                    echo 'It is ordered by name.';
                    $input = $dbConn->query('SELECT * FROM device ORDER BY deviceName');
                }
            }
            
            while ($data = $input->fetch())
            {
            ?>
            
                <div id="item">
                    <p>
                    <strong>Device</strong> :<em> <?php echo '<span class="device_color">'. $data['deviceName'] .'</span>'; ?></em><br />
                    <u>Type :</u> <?php echo $data['deviceType'] ; ?> <br />
                    <u>Price:</u> $<?php echo $data['price']; ?> <br />
                    <u>Status:</u> <?php 
                    if ($data['status'] == 'CheckedOut'){
                        echo '<span class="red">'. $data['status'] .'</span>';
                    }
                    else {
                        echo '<span class="blue">'. $data['status'] .'</span>';
                    }
                    ?>
                    
                    </p>
                </div>
        
        </div>
        
        <?php
        }
        $input->closeCursor(); // Termine le traitement de la requête
    ?>
    </body>
</html>