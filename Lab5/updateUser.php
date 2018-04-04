<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: index.php");
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
    
    
    function getDepartmentInfo() {
        global $bdd;        
        $sql = "SELECT deptName, departmentId 
                FROM `department` 
                ORDER BY deptName";
        $stmt = $bdd->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll();
        
        return $records;
    }
    function getUserInfo($userId) {
        global $bdd;    
        $sql = "SELECT * FROM `user` WHERE userId = $userId";
        $stmt = $bdd->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch();
        
        // Debugging
        // print_r($record);
        
        return $record;
    }
    if(isset($_GET['updateUserForm'])) {
        $sql = "UPDATE user
                SET firstName = :fName,
                    lastName = :lName,
                    phone = :phone,
                    gender = :gender,
                    role = :role,
                    deptId = :departmentId
    			WHERE userId = :userId";
    	$namedParameters = array();
    	$namedParameters[":fName"] = $_GET['firstName'];
    	$namedParameters[":lName"] = $_GET['lastName'];
    	$namedParameters[":userId"] = $_GET['userId'];
    	$namedParameters[":phone"] = $_GET['phone'];
    	$namedParameters[":gender"] = $_GET['gender'];
    	$namedParameters[":role"] = $_GET['role'];
    	$namedParameters[":departmentId"] = $_GET['deptId'];
        $stmt = $bdd->prepare($sql);
        $stmt->execute($namedParameters);
    }
    if(isset($_GET['userId'])) {
        $userInfo = getUserInfo($_GET['userId']);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Updating User </title>
    </head>
    
    <body>
        <a href="admin.php">Back to the menu</a>
        <h1> Admin Section </h1>
        <h2> Updating User Info </h2>
    
        <fieldset>
            <legend> Update User </legend>
            
            <form>
                <input type="hidden" name="userId" value="<?=$userInfo['userId']?>" />
                First Name: <input type="text" name="firstName" required value="<?=$userInfo['firstName']?>" /> <br>
                Last Name: <input type="text" name="lastName" required value="<?=$userInfo['lastName']?>"/> <br>
                Email: <input type="text" name="email" value="<?=$userInfo['email']?>"/> <br>
                Phone: <input type="text" name="phone" value="<?=$userInfo['phone']?>"/> <br>
                Gender: <input type="radio" name="gender" value="F" id="genderF" <?=(ucfirst($userInfo['gender'])=='F') ? "checked":"" ?> required/> 
                        <label for="genderF">Female</label>
                        <input type="radio" name="gender" value="M" id="genderM" <?=(ucfirst($userInfo['gender'])=='M') ? "checked":"" ?> required/> 
                        <label for="genderM">Male</label><br>
                Role:   <select name="role">
                            <option value=""> Select One </option>
                            <option <?=(lcfirst($userInfo['role']) == 'faculty') ? "selected":""?>>Faculty</option>
                            <option <?=(lcfirst($userInfo['role']) == 'student') ? "selected":""?>>Student</option>
                            <option <?=(lcfirst($userInfo['role']) == 'staff') ? "selected":""?>>Staff</option>
                        </select>
                <br/>
                Department: <select name="deptId">
                                <option value=""> Select One </option>
                                <?php
                                    $departments = getDepartmentInfo();
                                    foreach($departments as $r) {
                                        echo "<option " .(($userInfo['deptId'] == $r['departmentId']) ? 'selected':''). " value='$r[departmentId]'>$r[deptName]</option>";
                                    }
                                ?>
                            </select>
                            <br/>
                <input type="submit" name="updateUserForm" value="Update User!"/>
            </form>
        </fieldset>

    </body>
</html>