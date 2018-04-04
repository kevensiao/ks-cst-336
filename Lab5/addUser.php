<?php
    session_start();
    if (!isset($_SESSION['username'])) { 
        header("Location: index.php");
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
    
    

    function getDepartmentInfo() {
        global $bdd;        
        
        $sql = "SELECT deptName, departmentId FROM department ORDER BY deptName";
        
        $stmt = $bdd->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll();
        
        return $records;
    }
    if (isset($_GET['addUserForm'])) {

        $firstName = $_GET['firstName'];
        $lastName = $_GET['lastName'];
        $email    = $_GET['email'];
        $phone    = $_GET['phone'];
        $gender   = $_GET['gender'];
        $role   = $_GET['role'];
        $deptId   = $_GET['deptId'];
        
        $sql = "INSERT INTO user (firstName, lastName, email, gender, phone, role, deptId) VALUES (:fName, :lName, :email, :gender, :phone, :role, :deptId)";
        
        $parameters = array();
        $parameters[':fName'] =  $firstName;
        $parameters[':lName'] =  $lastName;
        $parameters[':email'] =  $email;
        $parameters[':gender'] = $gender;
        $parameters[':phone']  = $phone;
        $parameters[':role']   = $role;
        $parameters[':deptId'] = $deptId;
        
        $stmt = $bdd->prepare($sql);
        $stmt->execute($parameters);
        
        echo "User has been added successfully! <br>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Adding New User </title>
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
        <a href="admin.php">Back to the menu</a>
        <h1> Welcome to the Admin Section </h1>
        <h2> Adding New Users </h2>
    
        <fieldset>
            <legend><b>Add New User</b></legend>
            
            <form>
                First Name: <input type="text" name="firstName" required /> <br>
                Last Name: <input type="text" name="lastName" required/> <br>
                Email: <input type="text" name="email"/> <br>
                Phone: <input type="text" name="phone"/> <br>
                Gender: <input type="radio" name="gender" value="F" id="genderF" required/> 
                        <label for="genderF">Female</label>
                        <input type="radio" name="gender" value="M" id="genderM"  required/> 
                        <label for="genderM">Male</label><br>
                Role:   <select name="role">
                            <option value=""> Select One </option>
                            <option>Faculty</option>
                            <option>Student</option>
                            <option>Staff</option>
                        </select>
                <br/>
                Department: <select name="deptId">
                                <option value=""> Select One </option>
                                <?php
                                
                                    $departments = getDepartmentInfo();
                                    foreach ($departments as $record) {
                                        echo "<option value='$record[departmentId]'>$record[deptName]</option>";
                                    }
                                
                                ?>
                            </select>
                <br/>
                <input type="submit" name="addUserForm" value="Add User!"/>
            </form>
            
        </fieldset>
        
    </body>
</html>