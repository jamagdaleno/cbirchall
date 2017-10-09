<?php
    include "functions.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>House Affordability Calculator</title>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
  
    </head>
  
  <body>
      
    <div class="container">
        
        <!-- header -->
        <div class="row">
            <div class="col header">
                <h1>House Payment Calculator</h1>
                <p>Find out what your monthly mortgage could be.</p>
                <?php
                    msg();
                    
                ?>
            </div>
        </div>
        
        <!-- FORM -->
        <div class="row">
            <div class="col-md-6">
                
                <form method="GET">
                    
                    <!-- PURCHASE PRICE -->
                    <div class="form-group row">
                        <label for="price">Purchase Price:</label>
                        <input type="text" name="price" class="form-control col-sm-12" id="inputPrice" placeholder="ex: 500000">
                    </div>
                    
                    <!-- DOWN PAYMENT -->
                    <div class="form-group row">
                        <label for="selectCategory">Down Payment:</label>
                            <select name="downPayment" class="form-control" id="selectCategory">
                                <option>20000</option>
                                <option>40000</option>
                                <option>60000</option>
                                <option>80000</option>
                                <option>100000</option>
                            </select>
                    </div>
                    
                    <!-- INTEREST RATES -->
                    <div class="form-check row">
                        <label for="selectPrice">Interest Rate:</label>
                            <br />
                            <label class="form-check-label" for="selectPrice">
                                <input id="selectPrice" type="radio" name="rate" class="radio-check-input" value="30">
                                <label for="selectPrice">30-year fixed (4.0%)</label>
                            </label>
                            <br>
                            <label class="form-check-label" for="selectPrice">
                                <input id="selectPrice" type="radio" name="rate" class="radio-check-input" value="15">
                                <label for="selectPrice">15-year fixed (3.75%)</label>
                            </label>
                    </div>

                    <div class="row">
                        <div class="col header">
                            <h2>How Much Can I Afford?</h2>
                            <p>Compare your monthly mortgage limit to the above result.</p>
                        </div>
                    </div>
                    
                    <!-- INCOME -->
                    <div class="form-group row">
                        <label for="inputIncome">Annual Income:</label>
                        <input type="text" name="income" class="form-control col-sm-12" id="inputIncome">
                    </div>
                    
                    <!-- DEBTS -->
                    <div class="form-group row">
                        <label for="inputDebt">Total Monthly Debts:</label>
                        <input type="text" name="debt" class="form-control" id="inputDebt">
                    </div>                    
                    
            </div> <!-- end of col -->
        </div> <!-- end of row -->

        <div class="row searchBtn">
            
            <div class="col-md-6">
                
                <div class="form-group row">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
                
                </form> <!-- end of form -->
            
            </div>
            
        </div>


    </div> <!-- end of container -->
  
  </body>
</html>