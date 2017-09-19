<?php

    $movies = array();
    array_push($movies, "70s", "80s", "90s", "2000s");
    
    $randomDecade = rand(0, 3); // choose random folder

    $movieDuplicate = array();
    array_push($movieDuplicate, rand(0, 5)); // populates the array first with a random number before checking with function

    function displayRandomDecade() {
        
        global $movies;
        global $randomDecade;
        global $movieDuplicate;
        
        $countMovieDuplicate = (count($movieDuplicate)-1); // stores the amount of movies going to be displayed // 
        
        // echo "Movies made in the " . $movies[$randomDecade] . ":";
        
        if ($countMovieDuplicate == 1) { // if only one movie than will echo "movie"
            
            echo "Here is ". $countMovieDuplicate . " movie from the ". $movies[$randomDecade]; 
            
        }
        
        else { // otherwise will echo "movies"
            echo "Here are ". $countMovieDuplicate . " movies from the ". $movies[$randomDecade];
        }        
        
        
    } // end of function

    function displayRandomMovie() {
        
        global $movies;
        global $movieDuplicate;
        global $randomDecade;
        
        $randomMovie = rand(0, 5);
        
        for ($i = 0; $i < rand(1, 5); $i++) {
            
           $randomMovie = randNumberCheck($movieDuplicate); // calling the function to check arrayDuplicates number, and stores it in randomMovie
           array_push($movieDuplicate, $randomMovie); // pushes value of randomMovie to array so not duplicated again
            
            echo "<img src='img/" . $movies[$randomDecade] . "/". $randomMovie . ".png' alt='movies' />";
            
        }
        
    } // end of function
    
    function displayAwardWinner() {
        
        global $movies;
        global $randomDecade;
        
        $randomMovie = rand(0, 5); 
        
        if ($randomMovie == 0) {
            echo "<img src='img/" . $movies[$randomDecade] . "/". $randomMovie . ".png' alt='movies' />";
        }
        
        else {
            echo "No award movies from this list.";
        }
        
    } // end of function
    
    function randNumberCheck($arrayDuplicate) { // // checks whether 2 values are the same in an array
        
        $randomMovie = rand(0, 5); // creates random number between 0 and 5
        
        $notInArray = false; // boolean to set
        
        while ($notInArray == false) { // loops through until the random number is different of that in the arrayDuplicate
            
            if (in_array($randomMovie, $arrayDuplicate)) { // if the number from randomMovie is the same as in the arrayDuplicate 
                $randomMovie = rand(0, 5); // generate new random number
            }
            
            else { // if the numbers are different
                $notInArray = true; // ends the loop
            }
            
        }
        
        return $randomMovie; // returns a number that is random and not included in the arrayDuplicate
        
    } // end of function

?>