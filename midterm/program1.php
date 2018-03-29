<!DOCTYPE html>

<?php

    function makeDeck(){
        $cards = array();
        $cards[] = array('id' => 0, 'type' => "club", 'val' => 1);
        $cards[] = array('id' => 1, 'type' => "club", 'val' => 2);
        $cards[] = array('id' => 2, 'type' => "club", 'val' => 3);
        $cards[] = array('id' => 3, 'type' => "club", 'val' => 4);
        $cards[] = array('id' => 4, 'type' => "club", 'val' => 5);
        $cards[] = array('id' => 5, 'type' => "club", 'val' => 6);
        $cards[] = array('id' => 6, 'type' => "club", 'val' => 7);
        $cards[] = array('id' => 7, 'type' => "club", 'val' => 8);
        $cards[] = array('id' => 8, 'type' => "club", 'val' => 9);
        $cards[] = array('id' => 9, 'type' => "club", 'val' => 10);
        $cards[] = array('id' => 10, 'type' => "club", 'val' => 11);
        $cards[] = array('id' => 11, 'type' => "club", 'val' => 12);
        $cards[] = array('id' => 12, 'type' => "club", 'val' => 13);
        $cards[] = array('id' => 13, 'type' => "diamond", 'val' => 1);
        $cards[] = array('id' => 14, 'type' => "diamond", 'val' => 2);
        $cards[] = array('id' => 15, 'type' => "diamond", 'val' => 3);
        $cards[] = array('id' => 16, 'type' => "diamond", 'val' => 4);
        $cards[] = array('id' => 17, 'type' => "diamond", 'val' => 5);
        $cards[] = array('id' => 18, 'type' => "diamond", 'val' => 6);
        $cards[] = array('id' => 19, 'type' => "diamond", 'val' => 7);
        $cards[] = array('id' => 20, 'type' => "diamond", 'val' => 8);
        $cards[] = array('id' => 21, 'type' => "diamond", 'val' => 9);
        $cards[] = array('id' => 22, 'type' => "diamond", 'val' => 10);
        $cards[] = array('id' => 23, 'type' => "diamond", 'val' => 11);
        $cards[] = array('id' => 24, 'type' => "diamond", 'val' => 12);
        $cards[] = array('id' => 25, 'type' => "diamond", 'val' => 13);
        $cards[] = array('id' => 26, 'type' => "heart", 'val' => 1);
        $cards[] = array('id' => 27, 'type' => "heart", 'val' => 2);
        $cards[] = array('id' => 28, 'type' => "heart", 'val' => 3);
        $cards[] = array('id' => 29, 'type' => "heart", 'val' => 4);
        $cards[] = array('id' => 30, 'type' => "heart", 'val' => 5);
        $cards[] = array('id' => 31, 'type' => "heart", 'val' => 6);
        $cards[] = array('id' => 32, 'type' => "heart", 'val' => 7);
        $cards[] = array('id' => 33, 'type' => "heart", 'val' => 8);
        $cards[] = array('id' => 34, 'type' => "heart", 'val' => 9);
        $cards[] = array('id' => 35, 'type' => "heart", 'val' => 10);
        $cards[] = array('id' => 36, 'type' => "heart", 'val' => 11);
        $cards[] = array('id' => 37, 'type' => "heart", 'val' => 12);
        $cards[] = array('id' => 38, 'type' => "heart", 'val' => 13);
        $cards[] = array('id' => 39, 'type' => "spade", 'val' => 1);
        $cards[] = array('id' => 40, 'type' => "spade", 'val' => 2);
        $cards[] = array('id' => 41, 'type' => "spade", 'val' => 3);
        $cards[] = array('id' => 42, 'type' => "spade", 'val' => 4);
        $cards[] = array('id' => 43, 'type' => "spade", 'val' => 5);
        $cards[] = array('id' => 44, 'type' => "spade", 'val' => 6);
        $cards[] = array('id' => 45, 'type' => "spade", 'val' => 7);
        $cards[] = array('id' => 46, 'type' => "spade", 'val' => 8);
        $cards[] = array('id' => 47, 'type' => "spade", 'val' => 9);
        $cards[] = array('id' => 48, 'type' => "spade", 'val' => 10);
        $cards[] = array('id' => 49, 'type' => "spade", 'val' => 11);
        $cards[] = array('id' => 50, 'type' => "spade", 'val' => 12);
        $cards[] = array('id' => 51, 'type' => "spade", 'val' => 13);
        return $cards;
    }
    
    function getHands($_cards){
        shuffle($_cards);
        $hands = array();
        $curCard = 0;
        $value = 0; 
        if ($_GET['row']*$_GET['column']>39)
        {
            echo 'The product of columns and rows must not exceed 39 ! <br>';
            return $hands;
        }
        else{
            for($i=0; $i< $_GET['row'];$i++){
                $hands[$i] = array();
                $hands[$i]['size'] = $_GET['column'];
                $hands[$i]['cards'] = array();
                $index = 0;
                while($index<$hands[$i]['size']){
                    $hands[$i]['cards'][$index] = $_cards[$curCard]['id']; 
                    $value += $_cards[$curCard]['val'];
                    $index++;
                    $curCard++;
                }
            }
            return $hands;
        }
    }
    
    function printSeats($_hands){
        global $cards;
        global $cpt1;
        global $cpt2;
        global $winner;
        $cpt1 = 0;
        $cpt2 = 0;
        foreach($_hands as $hand){
            echo '
            <div class="seat">
                <div class="clear">';
                    foreach($hand['cards'] as $cardID){
                        foreach($cards as $card){
                            if($card['id']==$cardID){
                                if ($card['id'] == 0 OR $card['id'] == 13 OR $card['id'] == 26 OR $card['id'] == 39)
                                {
                                    echo '<span class="space" id="yellow"><img src="cards/'.$card['type'].'s/'.$card['val'].'.png"></span>';
                                    $cpt1++;
                                }
                                else if ($card['id'] == 12 OR $card['id'] == 25 OR $card['id'] == 38 OR $card['id'] == 51)
                                {
                                    echo '<span class="space" id="cyan"><img src="cards/'.$card['type'].'s/'.$card['val'].'.png"></span>';
                                    $cpt2++; 
                                }
                                else{
                                    echo '<span class="space"><img src="cards/'.$card['type'].'s/'.$card['val'].'.png"></span>';
                                }
                            }
                        }
                    }
                    if ($cpt1 > $cpt2){
                        $winner = 'Aces win !';
                    }
                    else if($cpt1 < $cpt2){
                        $winner = 'Kings win !';
                    }
                    else{
                        $winner = 'Tie - No winner';
                    }
                echo '
                </div>
            
            </div>';
        }

        echo '</div>';
    }
    
    
?>
<html>
    <head>
        <title>Midterm</title>
        <style>
            body{
                text-align: center;
                font-family: 'Pacifico', cursive;
                background-color : lightgrey;
            }
            #winner{
                font-size : 30px;
            }
            .space{
                margin: 5px;
            }
            #yellow{
                background-color : yellow ;
            }
            #cyan{
                background-color : cyan;
            }
            h1{
                color: red;
            }
            #font{
                font-family : calibri;
            } 
        </style>
        
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

    </head>
    <body>
        <div id="header">
            <h1>Midterm : Program 1</h1>
            <h1>Aces vs Kings</h1>
        </div>
        
        <form action="program1.php">
            Number of Rows: 
            <input type="text" name="row" value="5">
            <br>
            Number of Columns: 
            <input type="text" name="column" value="5">             
            <br>
            Suit to omit: <select name="omitSuit">
                 		           <option value="1">Hearts</option>
                 		           <option value="2">Clubs</option>
                 		           <option value="3">Diamonds</option>
                 		           <option value="4">Spades</option>
                 		 </select><br><br>
            
            <input type="submit">
        </form> <br>
        
        <?php
        $cards = makeDeck();
        $hands = getHands($cards);
        printSeats($hands);                  
        
        echo 'Aces :' . $cpt1 .'<br>' ;
        echo 'Kings :' . $cpt2 .'<br><br>' ;
        
        echo '<span id="winner"><b>'.$winner.'</b></span>' ;
        ?>
            
        
        
        
        <div id="font">
            <br><br><br><br>
            <table border="1" width="600">
                <tbody><tr>
                    <th>#</th>
                    <th>Task Description</th>
                    <th>Points</th>
                </tr>
                <tr style="background-color:#FFC0C0">
                    <td>1</td>
                    <td>The page includes the basic form elements as in the Program Sample: Text boxes, Dropdown menu, submit button</td>
                    <td width="20" align="center">5</td>
                </tr>
                <tr style="background-color:#FFC0C0">
                    <td>2</td>
                    <td>When submitting the form, an error message is displayed if the product of columns and rows exceeds 39</td>
                    <td width="20" align="center">5</td>
                </tr>
                <tr style="background-color:#FFC0C0">
                    <td>3</td>
                    <td>When submitting the form, a table is created with random playing cards</td>
                    <td align="center">5</td>
                </tr>
                <tr style="background-color:#FFC0C0">
                    <td>4</td>
                    <td>The size of the table corresponds to the one selected by the user </td>
                    <td align="center">10</td>
                </tr>
                <tr style="background-color:#FFC0C0">
                    <td>5</td>
                    <td>The cards are NOT duplicated </td>
                    <td align="center">10</td>
                </tr>
                <tr style="background-color:#FFC0C0">
                    <td>6</td>
                    <td>No cards of the suit selected by the user are displayed in the game </td>
                    <td align="center">10</td>
                </tr>
                <tr style="background-color:#FFC0C0">
                    <td>7</td>
                    <td>The Aces have a yellow background</td>
                    <td align="center">5</td>
                </tr>
                <tr style="background-color:#FFC0C0">
                    <td>8</td>
                    <td>The Kings have a cyan background</td>
                    <td align="center">5</td>
                </tr>
                <tr style="background-color:#FFC0C0">
                    <td>9</td>
                    <td>The total number of Aces and Kings are displayed</td>
                    <td align="center">5</td>
                </tr>
                <tr style="background-color:#FFC0C0">
                    <td>10</td>
                    <td>A message indicates who won, Aces or Kings, (or neither) </td>
                    <td align="center">5</td>
                </tr>
                <tr style="background-color:#FFC0C0">
                    <td>11</td>
                    <td>At least five CSS rules are included</td>
                    <td align="center">5</td>
                </tr>
                <tr style="background-color:#99E999">
                    <td>12</td>
                    <td>This rubric is properly included AND UPDATED (BONUS)</td>
                    <td width="20" align="center">2</td>
                </tr>
                <tr>
                    <td></td>
                    <td>T O T A L </td>
                    <td width="20" align="center"><b></b></td>
                </tr>
            </tbody></table>
        </div>        
    </body>
</html>