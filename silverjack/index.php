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
    
    function getPlayers($number){
        $player = array();
        $player[] = array('name' => "Alice", 'color' => "#ab16fd");
        $player[] = array('name' => "Bobby", 'color' => "#d71c3a");
        $player[] = array('name' => "Charlie", 'color' => "#9f1b45");
        $player[] = array('name' => "Danny", 'color' => "#a18e33");
        $player[] = array('name' => "Elaine", 'color' => "#91ba4d");
        shuffle($player);
        $players = array();
        if($number>5){$number=5;}
        for($i=0;$i<$number;$i++){
            $players[$i] = $player[$i];
        }
        return $players;
    }
    
    function getHands($_cards, $_players){
        global $winning;
        shuffle($_cards);
        $hands = array();
        $curCard = 0;
        $value = 0;
        $winning = 0;
        for($i=0; $i<4;$i++){
            $hands[$i] = array();
            $hands[$i]['player'] = $_players[$i];
            $hands[$i]['size'] = rand(4,6);
            $hands[$i]['cards'] = array();
            $index = 0;
            while($index<$hands[$i]['size']){
                $hands[$i]['cards'][$index] = $_cards[$curCard]['id']; 
                $value += $_cards[$curCard]['val'];
                $index++;
                $curCard++;
            }
            $hands[$i]['score'] = $value;
            if(($value>$winning) && ($value<=42)){
                $winning = $value;
            }
            $value = 0;
        }
        return $hands;
    }
    
    function printSeats($_hands){
        global $winning;
        global $cards;
        foreach($_hands as $hand){
            echo '
            <div class="seat">
                <div class="player">
                    <img src="players/'.$hand['player']['name'].'.jpg" style="border-color:'.$hand['player']['color'].'">
                </div>
                <div class="hand">';
                    foreach($hand['cards'] as $cardID){
                        foreach($cards as $card){
                            if($card['id']==$cardID){
                                echo '<img src="cards/'.$card['type'].'s/'.$card['val'].'.png">';
                            }
                        }
                    }
                    for($i=0;$i<(6-$hand['size']);$i++){
                        echo '<img src="cards/card_back.png">';
                    }
                echo '
                </div>
                <div class="score">'.$hand['score'].'
                </div>
                <div class="winner">';
                if($hand['score']==$winning){
                    echo 'Winner!';
                }
                else{
                    echo 'Loser...';
                }
                echo '</div>
            </div>';
        }
        echo '</div>';
    }
    
    echo '
    <!DOCTYPE HTML>
    <html>
        <head>
            <title>SilverJack</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <div class="super">';
            $cards = makeDeck();
            $players = getPlayers(4);
            $hands = getHands($cards, $players);
            printSeats($hands);
    echo '
        </body>
    </html>';
?>