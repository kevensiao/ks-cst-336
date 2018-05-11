<!DOCTYPE html>
<html>
    <head>
        <title>Midterm practice</title>
    </head>
    <body>
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
            
            $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        ?>
        
        <div id="header">
            <h1>Midterm practice</h1>
        </div>
            
         <?php
            $reponse = $bdd->query('SELECT * FROM mp_town WHERE population BETWEEN 50000 AND 80000');
            
            echo "<br><b>List all cities/towns that have a population between 50,000 and 80,000</b><br>" ;
            while ($donnees = $reponse->fetch())
            {
                echo $donnees['town_name'] . "-   " ;
                echo $donnees['population'] . "</br>"; 
            }
            
            $reponse = $bdd->query('SELECT town_name, county_name, population FROM mp_town NATURAL JOIN mp_county ORDER BY population DESC');
            
             echo "<br><b>List all towns along with their county name and population, ordered by population (from biggest to smallest)</b><br>" ;
            while ($donnees = $reponse->fetch())
            {
                echo $donnees['town_name'] . "   " ;
                echo $donnees['county_name'] . "   " ;
                echo $donnees['population'] . "</br>"; 
            }
            
            $reponse = $bdd->query('SELECT state_name, sum(population) FROM mp_state NATURAL JOIN mp_county NATURAL JOIN mp_town GROUP BY state_name');
            
            echo "<br><b>List the total population per county</b><br>" ;
            while ($donnees = $reponse->fetch())
            {
                echo $donnees['state_name'] . "   ";
                echo $donnees['sum(population)'] . "</br>";
            }
            $reponse->closeCursor(); 
            
            $reponse = $bdd->query('SELECT town_name, population FROM mp_town ORDER BY population ASC LIMIT 3');
            
            echo "<br><b>List the three least populated towns</b><br>" ;
            while ($donnees = $reponse->fetch())
            {
                echo $donnees['town_name'] . "   ";
                echo $donnees['population'] . "</br>";
            }
            $reponse->closeCursor(); 
            
            $reponse = $bdd->query('SELECT county_name FROM mp_county WHERE NOT EXISTS (SELECT county_id FROM mp_town WHERE mp_county.county_id = mp_town.county_id)');
            
            echo "<br><b>List the counties that do not have a town in the 'town' table</b><br>" ;
            while ($donnees = $reponse->fetch())
            {
                echo $donnees['county_name'] . "</br>";
            }
            $reponse->closeCursor(); 
        ?>
        
            
    </body>
</html>