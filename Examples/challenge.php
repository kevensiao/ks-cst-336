<?php
session_start();

if (!isset($_POST["guess"])) {
     $_SESSION["count"] = 0; //Initialize count
     $message = "Welcome to the guessing machine!";
     $_POST["randomValue1"] = rand(1,10);
     echo $_POST["randomValue1"];
} else if ($_POST["guess"] > $_POST["randomValue1"]) { //greater than
    $message = $_POST["guess"]." is too big! Try a smaller number.";

} else if ($_POST["guess"] < $_POST["randomValue1"]) { //less than
    $message = $_POST["guess"]." is too small! Try a larger number.";
    $_SESSION["count"]++; //Declare the variable $count to increment by 1.

} else { // must be equivalent
    $_SESSION["count"]++;
    $message = "Well done! You guessed the right number in ".$_SESSION["count"]." attempt(s)!"; 
    unset($_SESSION["count"]);
        //Include the $count variable to the $message to show the user how many tries to took him.
}
?>
<html>

    <head>
        <title>A PHP number guessing script</title>
    </head>
    <body>
    <h1><?php echo $message; ?></h1>
        <form action="" method="POST">
        <p><strong>Type your guess here:</strong>
            <input type="text" name="guess"></p>
            <input type="hidden" name="randomValue1" 
                   value="<?php echo $_POST["randomValue1"]; ?>" ></p>
    <p><input type="submit" value="Submit your guess"/></p>
        </form>
    </body>
</html>