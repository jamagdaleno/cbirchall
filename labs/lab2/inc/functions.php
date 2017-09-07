<?php


function displaySymbol($randomValue, $pos) { // function to display symbol // randomValue passes each symbol
        
        switch ($randomValue) {
            case 0: $symbol = "seven";
                break;
            case 1: $symbol = "cherry";
                break;
            case 2: $symbol = "lemon";
                break;
            case 3: $symbol = "orange"; // new symbol
        }
        
        echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' title='" . ucfirst($symbol) . "'  width='70' />";

    }

    function displayPoints($randomValue1, $randomValue2, $randomValue3) { // function to allocate points to randomValue1, 2, 3
        
        echo "<div id='output'>";
        
        if ($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3) {
            switch ($randomValue1) {
                case 0: $totalPoints = 1000;
                    echo "<h1>Jackpot!</h1>";
                    break;
                case 1: $totalPoints = 500;
                    break;
                case 2: $totalPoints = 250;
                    break;
                case 3: $totalPoints = 900; // new points for orange symbol
            } // end of switch
            
            echo "<h2>You won $totalPoints points!</h2>";
        } 
        
        else {
            echo "<h3>Try again.</h3>";
        }
        
            echo "</div>";
    }
    
    function play() {

        for ($i=1; $i<4; $i++) {
            ${"randomValue" . $i} = rand(0,3);
            displaySymbol(${"randomValue" . $i}, $i ); // calling displaySymbol function
        }
        
        displayPoints($randomValue1, $randomValue2, $randomValue3); // calling displayPoints function
       
    }


?>