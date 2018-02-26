<?php
    session_start();
    $name = $_REQUEST['name'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Process</title>
        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <style>
            body{
                background-color : grey;
            }
        </style>
    </head>
    <body>
       <div class="form">
            <h1><?php echo $name?>'s car</h1>
            <?php
                $price = 0;
                
                if(empty($_POST['car']))
                {
                    $car = "Choose a car!";
                    echo $car;
                }
                else
                {
                   echo $_POST['car'] . ":  \$39 000<br>";
                   $price += 39000;
                }

                if(!empty($_POST['color']))
                {
                    echo $_POST['color'] . ":  \$1 000<br>";
                   $price += 1000;
                }

           
                if(!empty($_POST['options']))
                {
                    foreach($_POST['options'] as $value)
                    {
                        echo $value . ":  $10 000;<br>";
                        $price += 10000;
                    }
                }
        
                echo "<br><br>";
                echo "Hello ". $name ."! You ordered a ".$_POST['color']." ". $_POST['car'] ." named ". $_POST['car_name'] .".";
                echo "<h3>Total: $" . $price . "</h3>" ;
            ?>
        </div>
        
    </body>
</html>