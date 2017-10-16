<?php
    include 'functions.php';    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Classic Movie Generator </title>
        <meta charset = "utf-8" />
        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>

        <div class="container">
          
          <div class="row title">
              <div class="col">
                  <h1>Classic Movie Generator</h1>
                  <p>Find classic movies to watch from different decades.</p>
              </div>
          </div>
          
          <div class="row refreshBtn">
              <div class="col">
                  <form>
                      <button type="submit" class="btn btn-default">Generate Movies</button>
                  </form>
              </div>
          </div>

          <div class="row">
              <div class="col displayRandomMovie">
                <?php 
                    displayRandomMovie();
                ?>
              </div>
          </div>           
          
          
          <div class="row">
              <div class="col movieDecade"> 
                <h3>
                    <?php
                        displayRandomDecade();
                    ?>
                </h3>
              </div>
          </div>
          
          
          <div class="row">
              <div class="col">
                  <h3>Academy Award Winner:</h3>
              </div>
          </div>          

          <div class="row award">
                <div class="col">
                    
                  <p>
                    <?php
                        displayAwardWinner();
                    ?>
                  </p>                    
                    
                </div>
          </div>          


        </div>

        <footer>
            <p id="footerName">Chelsea Birchall &copy 2017</p>
            <p class="text-muted">CST 352 Web Scripting CSUMB</p>
        </footer>

    </body>
</html>