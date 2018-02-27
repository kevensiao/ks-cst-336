<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Vroom Vroom</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <body>
        <div class="form">

            <h1>Custom your car</h1>
            
            <div>
                <h2>What is your budget ?</h2>
                <form></form>
                <form oninput="x.value=parseInt(a.value) * 1000">
                    $0
                    <input type="range" name="a" value="50">
                    $100 000<br>
                    Budget :
                    $<output name="x">0</output>
                </form>
            </div>
            
            <form action="process.php" method="POST">
                <div>
                    <br><br><label>Enter your name: </label>
                    <input type="text" name="name" required/>
                </div>
                
                <div>
                    <h2>Which car do you prefer ?</h2>
                    <select name = "car" class = "car" required>
                        <option selected disabled hidden value = ''></option>
                        <option value = "Rolls-Royce">Rolls-Royce</option>
                        <option value = "Bentley">Bentley</option>
                        <option value = "Ferrari">Ferrari</option>
                        <option value = "Lamborghini">Lamborghini</option>
                        <option value = "Maserati">Maserati</option>
                        <option value = "Aston Martin">Aston Martin</option>
                        <option value = "Bugatti">Bugatti</option>
                    </select>
                </div>
                
                <div>
                    <h2>Choose a color</h2>
                    <input type="radio" name="color" value="Black" checked>Black<br>
                    <input type="radio" name="color" value="White">White<br>
                    <input type="radio" name="color" value="Blue">Blue<br>
                    <input type="radio" name="color" value="Green">Green<br>
                    <input type="radio" name="color" value="Purple">Purple<br>
                    <input type="radio" name="color" value="Gold">Gold<br><br>
                </div>
                
                
                <div>
                    <label>Name your new baby :</label>
                    <input type="text" name="car_name" required/>
                </div>
                
                
                <div>
                    <h2>Pick some extra options</h2> <!--The options are not required because there are options-->
                    <input type="checkbox" name="options[]" value="Chrome">Chrome<br> 
                    <input type="checkbox" name="options[]" value="Leather seat">Leather seats<br>
                    <input type="checkbox" name="options[]" value="Voice control">Voice control<br>
                    <input type="checkbox" name="options[]" value="Seat heating">Seat heating<br>
                    <input type="checkbox" name="options[]" value="Comfort memory">Comfort memory seat<br>
                    <input type="checkbox" name="options[]" value="Steering wheel heating">Steering wheel heating<br>
                </div>
                
                <div>
                    <h2>Anything else to perfect your car ?</h2>
                    <textarea name="message" rows="10" cols="50" required></textarea>
                </div>
                
                
                <div>
                    <h2>Do you want a receipt </h2>
                    <select name="receipt" size="2" multiple required>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                
                <div class = "submit">
                    <input class = "submit" type="image" src="https://d30y9cdsu7xlg0.cloudfront.net/png/94733-200.png" border="0" width=25% height =25% alt="Submit" />
                </div>
                
            </form>
            
        </div>
    </body>
</html>