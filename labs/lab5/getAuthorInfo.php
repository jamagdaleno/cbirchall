<?php

    include '../../dbConnection.php';
    
    $conn = getDatabaseConnection();
    
    $sql = "SELECT * FROM q_author WHERE authorId =" . $_GET['authorId'];
    $stmt = $conn -> prepare ($sql);
    $stmt -> execute ();
    $record = $stmt -> fetch();
    
    
    //echo $record['firstName'] . ": " . $record['biography'];

    




?>
<!DOCTYPE html>
<html>
    <head>
        <title> Author Info </title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Biryani:200,400,700|Kalam:300" rel="stylesheet">
    </head>
    <body>
        
        <!--<h1> Author Info </h1>-->
        
        <?php
        
            echo  "<img src='" . $record['picture'] . "' width='200px'> ";
            // echo "<br/>";
        
            echo "<div class='iframeStyle'><strong>Name: </strong>" . $record['firstName'] . " " . $record['lastName'] . "</div>";
            // echo "<br/>";
            
            echo "<div class='iframeStyle'><strong>Gender: </strong>" . $record['gender']  . "</div>";
            // echo "<br/>";
            
            echo "<div class='iframeStyle'><strong>Birth: </strong> " . $record['dob'] . "<div>";
            // echo "<br/>";
            
            echo "<div class='iframeStyle'><strong>Death: </strong> " . $record['dod'] . "<div>";
            // echo "<br/>";
            
            echo "<div class='iframeStyle'><strong>Profession: </strong> " . $record['profession'] . "<div>";
            // echo "<br/>";
            
            echo "<div class='iframeStyle'><strong>Country: </strong> " . $record['country'] . "<div>";
            // echo "<br/>";
            
            echo "<div class='iframeBio iframeStyle'><strong>Biography: </strong> " . $record['biography'] . "<div>";
            echo "<br/>";
            
            
        ?>

    </body>
</html>