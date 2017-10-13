<?php

    include '../dbConnection.php';
    $dbConn = getDatabaseConnection();

    /*
    $host = 'localhost';
    $dbname = "quotes";
    $username = "root";
    $password = "";
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); // creates database connection
    
    // we'll be able to see some errors in the database
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    */

    function getRandomQuote() 
    {
     
        global $dbConn;
        
        // Retrieve all quoteIds
        // Select one quoteId randomly
        // get the quote for Id
        
        // step 1. generating a random quoteId
        
        $sql = 'SELECT quoteId FROM q_quote'; // retrieves all quoteIds
        
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute ();
        $records = $stmt -> fetchAll(); // fetchAll() retrieves ALL records
        
        //$randomIndex = rand(0, count($records)-1 );
        $randomIndex = array_rand($records);
        
        //echo($records[$randomIndex]['quoteId']);
        
        
        $quoteId = $records[$randomIndex]['quoteId'];
        
     
     
        // step 2. retrieving quote based on Random Quote Id
        
        $sql = "SELECT quote, firstName, lastName, authorId 
                FROM q_quote
                NATURAL JOIN q_author
                WHERE quoteId = $quoteId";
        
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute ();
        $record = $stmt -> fetch(); // using "fetch()" bc it's expected to get ONLY ONE record
        
        echo "<div id='quote'><em>" . $record['quote'] . "</em></div><br/>";
        echo "<div id='author'><a target='authorInfo' href='getAuthorInfo.php?authorId=" . $record['authorId'] . "' >- " . $record['firstName'] . " " . $record['lastName'] . "</a></div>";
        
        
        
        
    }



?>
<!DOCTYPE html>
<html>
    <head>
        <title> Lab 5: Random Quote Generator </title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Biryani:700|Kalam:300" rel="stylesheet">
    </head>
    <body>

    <div class="container">
        
        <div id="quoteTitle">
            <h1>Famous Quotes</h1>
        </div>
        
        <?=getRandomQuote()?>
        
        <br />
        <hr>
    
    
        
        <iframe name="authorInfo"></iframe>

    </div>

    </body>
</html>