<!DOCTYPE html>
<html>
    <head>
        <title>Midterm</title>
    </head>
    <body>
        <?php
            $bdd= new PDO("mysql:host=localhost; dbname=midterm", 'kevens', 'lol');
        ?>
        
        <div id="header">
            <h1>Midterm : Program 2</h1>
        </div>
            
         <?php
            $reponse = $bdd->query('SELECT firstName, lastName FROM m_students WHERE gender = "F" ORDER BY lastName ASC');
            
            echo "<br><b>List of all female students (10 points)</b><br>" ;
            while ($donnees = $reponse->fetch())
            {
                echo $donnees['firstName'] . "-   " ;
                echo $donnees['lastName'] . "</br>"; 
            }
            
            $reponse = $bdd->query('SELECT firstName, lastName, grade FROM m_students NATURAL JOIN m_gradebook WHERE grade < 50 ORDER BY grade ASC');
            
             echo "<br><b>List of students that have assignments with a grade lower than 50 (15 points)</b><br>" ;
            while ($donnees = $reponse->fetch())
            {
                echo $donnees['firstName'] . "   " ;
                echo $donnees['lastName'] . "   " ;
                echo $donnees['grade'] . "</br>"; 
            }
            
            $reponse = $bdd->query('SELECT title, dueDate FROM m_assignments WHERE NOT EXISTS (SELECT assignmentId FROM m_gradebook WHERE m_assignments.assignmentId = m_gradebook.assignmentId)');
            
            echo "<br><b>List of assignments that have not been graded (15 points)</b><br>" ;
            while ($donnees = $reponse->fetch())
            {
                echo $donnees['title'] . "   ";
                echo $donnees['dueDate'] . "</br>";
            }
            $reponse->closeCursor(); 
            
            $reponse = $bdd->query('SELECT firstName,lastName,title,grade FROM m_students NATURAL JOIN m_gradebook NATURAL JOIN m_assignments ORDER BY lastName, title ASC');
            
            echo "<br><b>Gradebook (15 points) </b><br>" ;
            while ($donnees = $reponse->fetch())
            {
                echo $donnees['firstName'] . "   " ;
                echo $donnees['lastName'] . "   " ;
                echo $donnees['title'] . "   " ;
                echo $donnees['grade'] . "</br>"; 
            }
            $reponse->closeCursor(); 
            
            $reponse = $bdd->query('SELECT studentId, firstName, lastName, avg(grade) as average FROM m_gradebook NATURAL JOIN m_students GROUP BY lastName ORDER BY average DESC');
            
            echo "<br><b>List of average grade per student (average of the three assignments) (15 points)</b><br>" ;
            while ($donnees = $reponse->fetch())
            {
                echo $donnees['studentId'] . "   " ;
                echo $donnees['firstName'] . "   " ;
                echo $donnees['lastName'] . "   " ;
                echo $donnees['average'] . "</br>";
            }
            $reponse->closeCursor(); 
        ?>
        
        <br><br><br>
        <table border="1" width="600">
            <tbody><tr>
                <th>#</th>
                <th>Task Description</th>
                <th>Points</th>
            </tr>
            <tr style="background-color:#FFC0C0">
                <td>1</td>
                <td>A report shows all female students ordered by last name, from A to Z</td>
                <td width="20" align="center">10</td>
            </tr>
            <tr style="background-color:#FFC0C0">
                <td>2</td>
                <td>A report shows students that have assignments with a grade lower than 50, ordered by grade, in ascending order</td>
                <td width="20" align="center">15</td>
            </tr>
            <tr style="background-color:#FFC0C0">
                <td>3</td>
                <td>A report lists those assignments that have not been graded and their due date, ordered by due date, ascending</td>
                <td width="20" align="center">15</td>
            </tr>
            <tr style="background-color:#FFC0C0">
                <td>4</td>
                <td>A report shows the Gradebook, which includes first name, last name, assignment title, and grade. It should be ordered by last name and assignment title </td>
                <td align="center">15</td>
            </tr>
            <tr style="background-color:#FFC0C0">
                <td>5</td>
                <td>A report lists each student along with his/her average grade, ordered by average grade, from highest to lowest</td>
                <td width="20" align="center">15</td>
            </tr>
            <tr style="background-color:#99E999">
                <td>6</td>
                <td>This rubric is properly included AND UPDATED (BONUS)</td>
                <td width="20" align="center">2</td>
            </tr>
            <tr>
                <td></td>
                <td>T O T A L </td>
                <td width="20" align="center"><b></b></td>
            </tr>
        </tbody></table>
                            
    </body>
</html>