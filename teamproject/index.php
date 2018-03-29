<!DOCTYPE html>
<html>
    <head>
        <title>Team Project</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Share+Tech|Share+Tech+Mono" rel="stylesheet"> 
        
        <script>
        // When the user clicks on div, open the popup
            function myFunction() {
                var popup = document.getElementById("myPopup");
                popup.classList.toggle("show");
            }
            
            function myFunction2() {
                var popup = document.getElementById("myPopup2");
                popup.classList.toggle("show");
            }
        </script>
    </head>
    <body>
        
        <h1>Doctor's appointments</h1>
        
        <div id="menu">
            <h2><center><b><u>Select Menu: </u></b></center></h2>
            
            <div id="select_type">
                <form action="index.php">
                    <br><br>
                    Doctor Name: <input type="text" name="Dname" value="">
                    <br>
                    Patient Name: <input type="text" name="Pname" value="">
                    <br><br>
                    Date :<br>
                    <select name="month">
                        <option value="">Month</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <br>
                    Day: <input type="text" name="day" value="">
                    <br>
                    <br>
                    Options : <br>
                    <input type="checkbox" name="patient" id="patient" /> <label for="patient">Order by patient name</label><br>
                    
                    <input type="radio" name="order1" value="date" />Filter by date (start with the soonest)</label><br>
                    
                    <input type="radio" name="order2" value="date" />Filter by date (start with the farrest)</label><br>
                    <br>
                    <select name="symptoms">
                        <option value="">Select a symptom</option>
                        <option value="Stomachache">Stomachache</option>
                        <option value="Toothache">Toothache</option>
                        <option value="Abdominal pain">Abdominal pain</option>
                        <option value="Headache">Headache</option>
                        <option value="Sensitive teeth">Sensitive teeth</option>
                        <option value="Nausea">Nausea</option>
                        <option value="Ear problems">Ear problems</option>
                        <option value="Mouth sores">Mouth sores</option>
                        <option value="Diarrhea">Diarrhea</option>
                        <option value="Fever">Fever</option>
                        <option value="Bad breath">Bad breath</option>
                        <option value="Constipation">Constipation</option>
                        <option value="Cough">Cough</option>
                        <option value="Dry mouth">Dry mouth</option>
                        <option value="Oral piercing infection">Oral piercing infection</option>
                        <option value="Cold and Flu">Cold and Flu</option>
                        <option value="Stained teeth">Stained teeth</option>
                        <option value="Jaw pain">Jaw pain</option>
                    </select>
                    <br><br>
                    
                    <input type="submit", value="Start"><br>
                </form> 
            </div>
        </div>

        <div id="card">
            <div id="list">
                <?php

                //$connUrl = getenv('JAWSDB_MARIA_URL');
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
                
                $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                
                if ($_GET['symptoms']!='')
                {
                    $reponse = $bdd->query('SELECT * FROM appointment NATURAL JOIN patient NATURAL JOIN doctor WHERE symptoms=\'' . $_GET['symptoms'] . '\'');
                } 
                else if ($_GET['Dname']!='')
                {
                    if ($_GET['Pname']!='')
                        $reponse = $bdd->query('SELECT * FROM appointment NATURAL JOIN patient NATURAL JOIN doctor WHERE doctor_name like \'%' . $_GET['Dname'] . '%\' AND patient_name like \'%' . $_GET['Pname'] . '%\'');
                    else
                        $reponse = $bdd->query('SELECT * FROM appointment NATURAL JOIN patient NATURAL JOIN doctor WHERE doctor_name like \'%' . $_GET['Dname'] . '%\'');
                }
                else if ($_GET['Pname']!='')
                {
                    if ($_GET['Dname']!='')
                        $reponse = $bdd->query('SELECT * FROM appointment NATURAL JOIN patient NATURAL JOIN doctor WHERE doctor_name like \'%' . $_GET['Dname'] . '%\' AND patient_name like \'%' . $_GET['Pname'] . '%\'');
                    else
                        $reponse = $bdd->query('SELECT * FROM appointment NATURAL JOIN patient NATURAL JOIN doctor WHERE patient_name like \'%' . $_GET['Pname'] . '%\'');
                }
                else if ($_GET['patient']!='')
                {
                    $reponse = $bdd->query('SELECT * FROM appointment NATURAL JOIN patient NATURAL JOIN doctor ORDER BY patient_name');
                }
                else if ($_GET['day']!='')
                {
                    if ($_GET['month']!='')
                        $reponse = $bdd->query('SELECT * FROM appointment NATURAL JOIN patient NATURAL JOIN doctor WHERE date_day like \'%' . $_GET['day'] . '%\' AND date_month like \'%' . $_GET['month'] . '%\'');
                    else
                        $reponse = $bdd->query('SELECT * FROM appointment NATURAL JOIN patient NATURAL JOIN doctor WHERE date_day like \'%' . $_GET['day'] . '%\'');
                }
                else if ($_GET['month']!='')
                {
                    if ($_GET['day']!='')
                        $reponse = $bdd->query('SELECT * FROM appointment NATURAL JOIN patient NATURAL JOIN doctor WHERE date_month like \'%' . $_GET['month'] . '%\' AND date_day like \'%' . $_GET['day'] . '%\'');
                    else
                        $reponse = $bdd->query('SELECT * FROM appointment NATURAL JOIN patient NATURAL JOIN doctor WHERE date_month like \'%' . $_GET['month'] . '%\'');
                }
                else if ($_GET['order1']!='')
                {
                    $reponse = $bdd->query('SELECT * FROM appointment NATURAL JOIN patient NATURAL JOIN doctor ORDER BY date_month, date_day ASC');
                }
                else if ($_GET['order2']!='')
                {
                    $reponse = $bdd->query('SELECT * FROM appointment NATURAL JOIN patient NATURAL JOIN doctor ORDER BY date_month DESC, date_day DESC');
                }
                else {
                    $reponse = $bdd->query('SELECT * FROM appointment NATURAL JOIN patient NATURAL JOIN doctor ORDER BY doctor_name');
                }

                while ($donnees = $reponse->fetch())
                {
                ?>
                    <div id="item">
                        <p>
                        <br/><br/>
                        <em><b> Date: <?php echo $donnees['date_month']; ?>/<?php echo $donnees['date_day']; ?>/2018 </b></em><br/>
                        
                    
                        <div class="popup" onclick="myFunction()"><span id='blue'><b>Doctor : </b></span>  <?php echo $donnees['doctor_name']; ?>
                            <span class="popuptext" id="myPopup">
                                <b>Doctor :</b><br/>
                                ID : <?php echo $donnees['doctor_id']; ?> <br/>
                                Name : <?php echo $donnees['doctor_name']; ?> <br/>
                                Phone : <?php echo $donnees['doctor_phone']; ?> <br/>
                                Speciality : <?php echo $donnees['doctor_speciality']; ?> <br/>
                            </span>
 
                        </div><br/>
                        
                        <div class="popup" onclick="myFunction2()">Patient : <?php echo $donnees['patient_name']; ?> 
                            <span class="popuptext" id="myPopup2">
                                <b>Patient :</b><br/>
                                ID : <?php echo $donnees['patient_id']; ?> <br/>
                                Name : <?php echo $donnees['patient_name']; ?> <br/>
                                Phone : <?php echo $donnees['patient_phone']; ?> <br/>
                                Address : <?php echo $donnees['patient_address']; ?> <br/>
                                
                            </span>
                        </div><br/>
                        
                        Symptoms : <?php echo $donnees['symptoms']; ?> <br /> 
                        </p>
                                        
                        <button  type="button" class="btn btn-outline-success">Select this appointment</button><br> <br/>
                         
                    </div>
                <?php
                }
                $reponse->closeCursor();
                ?>
        </div>

    </body>
</html>