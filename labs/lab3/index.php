<?php

    $deck = range(1, 41); // populate array 1-42
    shuffle($deck); // shuffle array items
    // print_r($deck); // print values
    
    $totalPoints = 0; // set starting totalPoints to zero
    
    function displayHand() {
        
        global $deck, $totalPoints; // access outside function
        $handPoints = 0; // set to starting 0
        $handAces = 0; // initialize $handAces, start at 0
        
        for ($i = 0 ; $i < 5 ; $i++) { // increment 5 times
            
            $lastCard = array_pop($deck); // 'pop' last 5 items out of the array 
            $cardValue = $lastCard % 13; // divides $lastCard item value by 13 to get actual value of card
            $cardSuit; // creates variable $cardSuit
            
            
            if($lastCard <= 13) { // if array item less than 13, assign suit to 'CLUBS'
                $cardSuit = "clubs";
            } 
            else if ($lastCard > 13 && $lastCard <= 26) { // if array item greater than 13, but less/equal to 26, assign suit to 'DIAMONDS'
                $cardSuit = "diamonds";
            } 
            else if ($lastCard > 26 && $lastCard <= 39) { // if array item greater than 26, but less/equal to 39, assign suit to 'HEARTS'
                $cardSuit = "hearts";
            } 
            else if ($lastCard > 39) { // if array item greater than 39, assign suit to 'SPADES'
                $cardSuit = "spades";
            }
            
            if ($cardValue == 0) { // if 0, assign 'KING' to 13 points
                $cardValue = 13;
            }
            
            if ($cardValue == 1) { // if value is 1 ('ACE'), add img class
                echo "<img class='ace' src='img/cards/$cardSuit/$cardValue.png' alt='Ace' />";
                
                $handAces = $handAces + 1; // increment by 1
                // $handAces++; // another method to increment
            }
            
            else { // else, no img class
                echo "<img src='img/cards/$cardSuit/$cardValue.png' alt='Ace' />"; // prints img of cards from img folder
            }
            
            $handPoints = $handPoints + $cardValue;
            
            //  echo "<img class='ace' src='img/cards/$cardSuit/$cardValue.png' alt='Ace' />";
            
        } // end of for loop
        
        echo "Points: " . $handPoints . " ";
        echo "Aces: " . $handAces . " ";
        
        $totalPoints = $totalPoints + $handPoints;
        
        return $handAces;
        
    } // end of function
    
    
    function identifyWinner() {

        global $player1Aces, $player2Aces;

        if ($player1Aces > $player2Aces) { // if player1 has more points than player2
            echo "Human";
        }
        else if ($player1Aces < $player2Aces) { // if player2 has more points
           echo "PC";
        }
        else { // otherwise, same
            echo "Tie";
        }

    } // end of function

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 3: Ace Poker </title>
        <!-- EXTERNAL CSS -->
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <div id="wrapper">
            
            <h1>Ace Poker</h1>
        
            <h2>Player with more aces wins all points</h2>
            
            <div class="hand">
                
                <span class="player">Human: </span>
                    <?php
                        $player1Aces = displayHand(); // returns a value for $player1Aces
                    ?>
                <br>
            
            </div>
            
            <div class="hand">
                <span class="player">PC: </span>
                <?php
                    $player2Aces = displayHand(); 
                ?> 
            </div>
    
            <h2 id="winner">
                <?php
                    identifyWinner();
                ?>
                
                Wins:
                <?=$totalPoints?> points!
            </h2>
    
            <hr>
        
            <footer>
                <p>&copy 2017. Copyright by Chelsea Birchall </p>
            </footer>
            
        </div>
    </body>
</html>