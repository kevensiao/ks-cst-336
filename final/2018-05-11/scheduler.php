<?php
    session_start();
    
    function checkLogout() {
        if(isset($_POST['logout'])) {
            unset($_SESSION['username']);
            
            session_destroy();
            echo "<h3>Logged Out Successfully!</h3>";
        }
    }
    
    function checkLogin() {
        if($_GET['login'] == "Error") {
            echo "<h2>Wrong Password !</h2>";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>Final</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <meta charset="utf-8"/>
        <style>
            body {
                text-align: center;
                font-family: 'Satisfy', cursive;
                font-size : 150%;
                background-color : lightgrey;
            }
            h1 {
                color : #660000;
            }
            h3 {
                color : #990000;
            }
        </style>
        
        <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
        </style>
    </head>
    <body>
        <div id="title">
            <?=checkLogout()?>
            <?=checkLogin()?>
            <h1>Login Page</h1>
        </div>
        
        <center>
            <div id="content">
                <form method="POST" action="login.php">
                    <table>
                        <tr>
                            <td><strong>Username:</strong></td>
                            <td><input type="text" name="username"/></td>
                        </tr>
                        
                        <tr>
                             <td><strong>Password:</strong></td> 
                             <td><input type="password" name="password"/></td>
                        </tr>
                    
                        <tr>
                            <td></td>
                            <td><input type="submit" name="login" value="Login"/></td>
                        </tr>
                        
                    </table>
                </form>
                 <br>
                <p>Try those usernames : keven, jason, alyssia, alex </p>
                <p> And this password : s3cr3t</p>
            </div>
        </center>

    </body>
</html>